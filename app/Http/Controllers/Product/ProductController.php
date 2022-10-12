<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Throwable;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        try{
           $product =  new Product ;
           $product->name = $request['name'];
           $product->default = $request['default'];
           $product->type_id = $request['type_id'];
           $product->save();
                   
            return redirect()->route('missing_products')->with(['message' => 'created']);
        } catch (Throwable $e) {
            dd($e);
            // Report
        }
    }
    public function update(Request $request)
    {

        try {
         $product = Product::where('id', $request['id'])->firstOrFail();
            
                $product->name = $request['name'];
                $product->type_id = $request['type_id'];
                $product->default = $request['default'];
                $product->save();
                      
            return redirect()->route('missing_products')->with(['message' => 'saved']);
        } catch (Throwable $e) {

            // Report
        }
    }
}
