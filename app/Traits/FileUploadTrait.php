<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;

trait FileUploadTrait   // comment
{
    function uploadImage(Request $request, $inputFieldName, $oldPath = null, $path = '/uploads'): ?string
    {
        if ($request->hasFile($inputFieldName)) {
            $uploadedImage = $request->$inputFieldName;
            $uploadedImageExtension = $uploadedImage->getClientOriginalExtension();
            $storedImageName = 'media_' . $inputFieldName . '_' . uniqid() . '.' . $uploadedImageExtension;

            $uploadedImage->move(public_path($path), $storedImageName);

            // Delete previous image
            if ($oldPath && File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }

            return $path . '/' . $storedImageName;
        }
        return null;
    }
}
