<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ImageUpload;

class TechnologyController extends Controller
{
    use ImageUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $inputs = $request->except('album');

        DB::transaction(function () use ($request, &$inputs) {
            if ($request->hasFile('image')) {
                $inputs['image'] = $this->storeImage($request->file('image'), 'technologies');
            }
            $technology = Technology::create($inputs);

            if ($request->hasFile('album')) {
                $images = $request->file('album');
                $uploadedImages = [];

                foreach ($images as $image) {
                    $path = $this->storeImage($image, 'albums');
                    $uploadedImages[] = ['image_path' => $path];
                }

                if (count($uploadedImages)) {
                    $technology->images()->createMany($uploadedImages);
                }
            }
        });

        return redirect()->route('technologies.index')->with($this->notification('Technology added successfully.'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $inputs = $request->all();

        DB::transaction(function () use ($request, $technology, &$inputs) {
            if ($request->hasFile('image')) {
                $this->deleteImage($technology->image, 'technologies');
                $inputs['image'] = $this->storeImage($request->file('image'), 'technologies');
            }
            $technology->update($inputs);
        });

        return redirect()->route('technologies.index')->with($this->notification('Technology updated successfully.'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        DB::transaction(function () use ($technology) {
            $this->deleteImage($technology->image, 'technologies');
            $technology->images()->delete();
            $technology->delete();
        });

        return redirect()->route('technologies.index')->with($this->notification('Technology deleted successfully.'));
    }
}
