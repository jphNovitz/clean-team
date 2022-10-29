<?php

namespace App\Actions\Products;

use App\Models\MissingArchives;
use App\Models\MissingProducts;
use App\Models\Product;
use App\Models\Type;
use Barryvdh\DomPDF\Facade\Pdf;

class CreatePdf
{

    public function create($datas = null)
    {
        $pdf =  Pdf::loadView('pdf.report', ['archive' => $datas]);
        return $pdf->download('report.pdf');
    }
}
