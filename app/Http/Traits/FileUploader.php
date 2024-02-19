<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait FileUploader
{
    public function uploadFile($request, $data, $name, $inputName = 'image')
    {
        $requestFile = $request->file($inputName);
        try {
            $file = $requestFile;
             // اسم المجلد الذي ترغب في تخزين الصورة فيه

            $fileName = $data . '-' . $name . '.' . $file->getClientOriginalExtension();

            // نقل الصورة إلى المجلد المطلوب في public
            $file->move($name, $fileName);
            $url = url( $name . '/' . $fileName);
            $request->image = $url;
            return $url;

        } catch (\Throwable $th) {
            report($th);

            return $th->getMessage();
        }
    }

    // delete file
    public function deleteFile($fileName = 'files')
    {
        try {
            if ($fileName) {
                Storage::delete('public/files/' . $fileName);
            }

            return true;
        } catch (\Throwable $th) {
            report($th);

            return $th->getMessage();
        }
    }

    public function uploadImage($request, $data, $name, $inputName = 'image')
    {
        $requestFile = $request->file($inputName);
        try {
            $dir = 'public/images/' . $name;
            $fixName = time() . '-' . $name . '.' . $requestFile->extension();

            if ($requestFile) {
                Storage::putFileAs($dir, $requestFile, $fixName);
                $request->image = $fixName;
            }

            return $fixName;
        } catch (\Throwable $th) {
            report($th);

            return $th->getMessage();
        }
    }

    public function uploadPhoto($request, $data, $name)
    {
        try {
            $dir = 'public/photos/' . $name;
            $fixName = $data->id . '-' . $name . '.' . $request->file('photo')->extension();
            if ($request->file('photo')) {
                Storage::putFileAs($dir, $request->file('photo'), $fixName);
                $request->photo = $fixName;

                $data->update([
                    'photo' => $request->photo,
                ]);
            }
        } catch (\Throwable $th) {
            report($th);

            return $th->getMessage();
        }
    }

    public function uploadMultiImage($request, $data, $name, $inputName = 'images')
    {
        $requestFiles = $request->file($inputName);

        if (!is_array($requestFiles)) {
            return ['status' => 'Error', 'message' => 'The input must be an array of files for: ' . $inputName];
        }

        $uploadedImages = [];

        foreach ($requestFiles as $file) {
            $dir = 'public/images/' . $name;
            $fixName = $data->id . '-' . $name . '_'  . $file->getClientOriginalExtension();

            if ($file) {
                Storage::putFileAs($dir, $file, $fixName);
                $uploadedImages[] = [
                    'url' => $dir . '/' . $fixName,
                ];
            }
        }

        return $uploadedImages;
    }
}