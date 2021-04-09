<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\NewsLetterExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportFileController extends Controller
{
        public function __construct()
    {
        $this->middleware(['admin']);


    }
    public function exportCSV()
    {
        return Excel::download(new NewsLetterExport, 'newsletter.xlsx');
    }
}
