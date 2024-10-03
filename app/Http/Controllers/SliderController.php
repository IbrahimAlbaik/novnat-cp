<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Slider;
use App\Traits\ImageUpload;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    use ImageUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request)
    {
        $inputs = $request->all();
        //dd($inputs);
        DB::transaction(function () use ($request, &$inputs) {
            if ($request->hasFile('media')) {
                $inputs['media'] = $this->storeImage($request->file('media'), 'sliders');
            }
            if ($request->hasFile('cover_youtube_image')) {
                $inputs['cover_youtube_image'] = $this->storeImage($request->file('cover_youtube_image'), 'sliders');
            }
            Slider::create($inputs);
        });
        return redirect()->route('sliders.index')->with($this->notification('Slider created successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $inputs = $request->all();
        DB::transaction(function () use ($request, $slider, &$inputs) {
            if ($request->hasFile('media')) {
                $this->deleteImage($slider->media, 'sliders');
                $inputs['media'] = $this->storeImage($request->file('media'), 'sliders');
            }
            if ($request->hasFile('cover_youtube_image')) {
                $this->deleteImage($slider->media, 'cover_youtube_image');
                $inputs['cover_youtube_image'] = $this->storeImage($request->file('cover_youtube_image'), 'sliders');
            }
            $slider->update($inputs);
        });
        return redirect()->route('sliders.index')->with($this->notification('Slider updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        DB::transaction(function () use ($slider) {
            $this->deleteImage($slider->media, 'sliders');
            $this->deleteImage($slider->cover_youtube_image, 'sliders');
            $slider->delete();
        });
        return redirect()->route('sliders.index')->with($this->notification('Slider deleted successfully.'));
    }

    public function uploadMedia(Request $request)
    {
        $request->validate([
            'media' => 'required',
        ]);
        if ($request->hasFile('media')) {
            $mediaPath = $this->storeImage($request->file('media'), 'sliders');
            return response()->json([
                'status' => true,
                'media' => $mediaPath,
                'message' => 'Media uploaded successfully!',
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'No Media uploaded.',
        ]);
    }
}
