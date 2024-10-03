<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Traits\ImageUpload;

class ImageController extends Controller
{
    use ImageUpload;

    public function store(Request $request, $modelName, $modelId)
    {
        // Dynamically resolve the model
        $model = app("App\\Models\\" . ucfirst($modelName))::findOrFail($modelId);
        $this->storeImage($request->file('image'), 'albums', $model);
        return redirect()->back()->with($this->notification('Image added to album successfully.'));
    }

    public function destroy(Image $image)
    {
        $this->deleteImage($image->image_path, 'album');
        $image->delete();
        return redirect()->back()->with($this->notification('Image deleted from album successfully.'));
    }
}

