<?php

namespace App\Http\Controllers\Product;

use App\Actions\Products\UpdateLine;
use App\Http\Controllers\Controller;
use App\Models\MissingProducts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Throwable;

class MissingProductsController extends Controller
{
    public function index()
    {


        //dd(MissingProducts::with('products')->get());
        return Inertia::render('MissingProducts/Show', [
            'journal' => MissingProducts::with('users')->get(),

        ]);
    }

    public function updateLine(Request $request, UpdateLine $updateLine)
    {
        try {
            $updateLine->update(
                MissingProducts::where('id', $request['id'])->firstOrFail(),
                $request->all()
            );
            return redirect()->back()->with(['message' => 'saved']);
        } catch (Throwable $e) {
            // Report
        }
    }
}
