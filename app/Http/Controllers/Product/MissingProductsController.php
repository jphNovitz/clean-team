<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MissingProductsController extends Controller
{
    public function index(){
       
         return Inertia::render('MissingProducts/Show', [
            'products'=>Product::all()
         ]);
    }
}
