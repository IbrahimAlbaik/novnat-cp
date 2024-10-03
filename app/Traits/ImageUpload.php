<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

trait ImageUpload
{
    public function storeImage($file, $folder, $model = null)
    {
        // Retrieve the original file extension
        $extension = $file->getClientOriginalExtension();

        // Generate a new filename with the original extension
        $filename = uniqid() . '.' . $extension;

        // Store the file with the new filename
        $path = $file->storeAs('upload/' . $folder, $filename, 'public');

        // Check if this model uses a polymorphic relation for images
        if ($model) {
            if (method_exists($model, 'images')) {
                // Create a new image record with the file path
                $image = new Image(['image_path' => basename($path)]);
                $model->images()->save($image);
            } else {
                throw new \Exception("The model does not support polymorphic 'images' relation.");
            }
        }

        return basename($path); // Return the file name with the correct extension
    }


//    public function storeImage($file, $folder, $model = null)
//    {
//        $path = $file->store('upload/' . $folder, 'public');
//
//        // check if this model using polymorphic relation
//        if ($model) {
//            if (method_exists($model, 'images')) {
//                $image = new Image(['image_path' => basename($path)]);
//                $model->images()->save($image);
//            } else {
//                throw new \Exception("The model does not support polymorphic 'images' relation.");
//            }
//        }
//
//        return basename($path);
//    }

    public function deleteImage($imageName, $folder, $model = null)
    {
        Storage::disk('public')->delete('upload/' . $folder . '/' . $imageName);

        if ($model) {
            $model->delete();
        }
    }
}
