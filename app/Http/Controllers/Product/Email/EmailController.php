<?php

namespace App\Http\Controllers\Product\Email;

use App\Actions\Products\CreateReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Products\FindReport;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     *  sendEmail archive action
     */
    public function sendReport(CreateReport $createReport){
        
        if (!$report = $createReport()) return redirect()->route('missing_products');
        
        Mail::to('toto@toto.be')
        ->send(new \App\Mail\MissingProductsReport($report));

        return redirect()->back();
    }

    /**
     *  sendEmail archive action
     */
    public function sendArchive(int $id = null, FindReport $findeReport){
        
        if (empty($id)) return redirect()->back();
        
        Mail::to(auth()->user()->email)->send(new \App\Mail\MissingProductsReport($findeReport($id)));
        // change auth()->user()->email to other email ... add field in Model
        return redirect()->back();
    }
}
