<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\MissingProducts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MissingProductsController extends Controller
{
    public function index(){
       

        //dd(MissingProducts::with('products')->get());
         return Inertia::render('MissingProducts/Show', [
            'journal' => MissingProducts::with('products')->get()
         ]);
    }
}
