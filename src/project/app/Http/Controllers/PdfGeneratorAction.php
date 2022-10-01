<?php

namespace App\Http\Controllers;

use App\Jobs\PdfGenerator;
use Illuminate\Http\Request;

class PdfGeneratorAction extends Controller
{
    public function __invoke()
    {
        PdfGenerator::dispatch(storage_path('pdf/sample.pdf'));
    }
}
