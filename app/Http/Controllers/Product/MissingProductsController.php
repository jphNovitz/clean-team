<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\MissingProducts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Throwable;

class MissingProductsController extends Controller
{
    public function index(){
       

        //dd(MissingProducts::with('products')->get());
         return Inertia::render('MissingProducts/Show', [
            'journal' => MissingProducts::with('users')->get(),
            
         ]);
    }

    public function updateLine(Request $request){
        try {
        $product = MissingProducts::where('id', $request['id'])->firstOrFail();
        
        $product->active = $request['active'];
        $product->reported = $request['reported'];
        $product->quantity = $request['quantity'];
        $product->product_id = $request['product_id'];
        $product->save();
        
        return redirect()->back()->with(['message'=>'saved']);
        } catch (Throwable $e){
            // Report
        }
    }
}
