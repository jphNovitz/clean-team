<?php

namespace App\Http\Controllers\Product;

use App\Actions\Products\UpdateLine;
use App\Http\Controllers\Controller;
use App\Models\MissingProducts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Throwable;

class MissingProductsController extends Controller
{
    public function index()
    {

        return Inertia::render('MissingProducts/Show', [
            'journal' => MissingProducts::where('team_id', auth()->user()->currentTeam->id)->get(),
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

    public function productsNotInJournal(Request $request)
    {
   
        $existing_lines_current_team = DB::table('missing_products')
            ->select('missing_products.product_id')
            ->where('team_id', '=', auth()->user()->currentTeam->id)
            ->distinct()
            ->get()
            ->toArray();
            
        $filtered = array_map(function($v){
            return $v->product_id ;
        }, $existing_lines_current_team);

        
        
        $available_products = DB::table('products')
            ->select('products.*')
            ->whereNotIn('id', $filtered)
            ->distinct()
            ->orderBy('products.id', 'ASC')
            ->get();

        return response()->json($available_products);
    }

    public function addProductInJournal(Request $request)
    {

        try {
            $journal = new MissingProducts();

            $journal->team_id = auth()->user()->currentTeam->id;
            $journal->product_id = $request['id'];


            $journal->save();

            return response()->json('success');
        } catch (Throwable $e) {
            return response()->json($e);
        }
        // return redirect()->back()->with(['message' => 'saved']); 

    }
}
