<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Exports\ProductExport as ProductExportAlias;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelDownloadController extends Controller
{
    public function downloadExcel(){
        return Excel::download(new ProductExport, 'products.xlsx');
    }
}
