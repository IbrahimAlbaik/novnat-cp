<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Gallery;
use App\Models\Image;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    use ImageUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeOld(StoreGalleryRequest $request)
    {
        $inputs = $request->except('album');
        if ($request->hasFile('image')) {
            $inputs['image'] = $this->storeImage($request->file('image'), 'galleries');
        }
        $gallery = Gallery::create($inputs);

        $images = $request->file('album');
        $uploadedImages = [];
        foreach ($images as $image) {
            $path = $this->storeImage($image, 'albums');
            $uploadedImages[] = ['image_path' => $path];
        }

        // If images were uploaded, save them
        if (count($uploadedImages)) {
            $gallery->images()->createMany($uploadedImages);
        }

        $notification = array(
            'message' => 'Gallery added successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('gallery.index')->with($notification);
    }

    public function store(StoreGalleryRequest $request)
    {
        $inputs = $request->except('album');

        // Used DB::transaction() to wrap database operations like image uploads, gallery creation, and updates.
        // This ensures data consistency in case of errors during execution.
        DB::transaction(function () use ($request, &$inputs) {
            // Upload main image if exists
            if ($request->hasFile('image')) {
                $inputs['image'] = $this->storeImage($request->file('image'), 'galleries');
            }
            $gallery = Gallery::create($inputs);

            // Handle multiple image uploads for the album
            if ($request->hasFile('album')) {
                $images = $request->file('album');
                $uploadedImages = [];

                foreach ($images as $image) {
                    $path = $this->storeImage($image, 'albums');
                    $uploadedImages[] = ['image_path' => $path];
                }

                if (count($uploadedImages)) {
                    $gallery->images()->createMany($uploadedImages);
                }
            }
        });

        return redirect()->route('gallery.index')->with($this->notification('Gallery added successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        $inputs = $request->all();

        DB::transaction(function () use ($request, $gallery, &$inputs) {
            if ($request->hasFile('image')) {
                $this->deleteImage($gallery->image, 'galleries');
                $inputs['image'] = $this->storeImage($request->file('image'), 'galleries');
            }
            $gallery->update($inputs);
        });

        return redirect()->route('gallery.index')->with($this->notification('Gallery updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        DB::transaction(function () use ($gallery) {
            $this->deleteImage($gallery->image, 'galleries');
            $gallery->images()->delete();
            $gallery->delete();
        });

        return redirect()->route('gallery.index')->with($this->notification('Gallery deleted successfully.'));
    }
}

