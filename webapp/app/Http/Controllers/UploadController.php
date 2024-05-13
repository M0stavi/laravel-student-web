<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    public function uploadPost(Request $request){
        if ($request->has('uploadButton')) {
            // Form was submitted
            // Your code here
        $file = $request->file("filing");
        echo 'File name ' . $file->getClientOriginalName();
        } else {
            // Form was not submitted
        }
        // dd($request->all());
    }
}
