<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function download($filename) {
        $path = public_path() . '/imagenes/' . $filename;
        return response()->download($path);
    }

}
