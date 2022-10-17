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

    public function productsNotInJournal(Request $request){
        
        $available_products = DB::table('products')
            ->leftJoin('missing_products', 'products.id', '=', 'missing_products.product_id')
            ->select('products.name', 'products.id')
            ->where('missing_products.team_id', '!=', auth()->user()->currentTeam->id )
            ->get(); 

        return response()->json($available_products);

    }

    public function addProductInJournal(Request $request){

        try{
        $journal = new MissingProducts();

        $journal->team_id = auth()->user()->currentTeam->id;
        $journal->product_id = $request['id'];

        
        $journal->save();

        $this->middleware('SharedProductsData');
        return response()->json('success');
        } catch (Throwable $e) {
            return response()->json($e);
        }
        // return redirect()->back()->with(['message' => 'saved']); 

    }
}
