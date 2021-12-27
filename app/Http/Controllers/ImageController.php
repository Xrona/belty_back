<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageDeleteRequest;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Storage;

class ImageController extends Controller
{
    public function upload(Request $request) {
        $files = $request->file('file');
        $imagePaths = [];

        foreach($files as $file) {
           if(!$this->checkImage($file->getMimeType())) {
               return  ['error' => 'incorrect filetype'];
           }

           $path = $file->store('uploads', 'public');

           $imagePaths[] = asset('/storage/' . $path);
        }

        return $imagePaths;
    }

    public function delete(ImageDeleteRequest $request) {
        $requestData = $request->all();

        if ($request->input('id')) {
            ProductImage::destroy($requestData['id']);
        }

        $data = Storage::disk('public')->delete('uploads/'. $requestData['name']);

        return [
            'response' => $data,
        ];
    }

    private function checkImage (String $type) {
        if ($type === 'image/png' || $type === 'image/jpeg') {
            return true;
        }

        return  false;
    }
}
