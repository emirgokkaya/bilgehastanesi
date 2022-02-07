<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function view($filename) {
        $file = storage_path('app/corporate/job_applications/') . $filename;

        if (file_exists($file)) {
            $headers = [
                'Content-Type' => 'application/pdf'
            ];

            return response()->download($file, 'Test File', $headers, 'inline');
        } else {
            abort(404, 'File not found!');
        }
    }
}
