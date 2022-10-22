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

        $filtered = array_map(function ($v) {
            return $v->product_id;
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

            // return response()->json('success');

            return redirect()->back();
        } catch (Throwable $e) {
            return response()->json($e);
        }
        // return redirect()->back()->with(['message' => 'saved']); 

    }

    public function report()
    { 
        // TODO create a table to store ids name and teamid => possiblity of recreate report in the future

        // Get the lists of ids
        $rowIds = DB::table('missing_products')
        ->select('missing_products.id as id')
        ->where('team_id', '=', auth()->user()->currentTeam->id)
        ->where('reported', "=", "false")
        ->get();
        foreach($rowIds as $item){
            $ids[] = $item->id;
        }

        // The object to be stored
        $give_me_a_name = [
            'name' => date('m-d-Y_hia'),
            'team_id' => auth()->user()->currentTeam->id,
            'ids' => json_encode($rowIds)
        ];

        dd($give_me_a_name);
        dd($ids);

        
        $journal = DB::table('missing_products')
            ->leftJoin('products', 'products.id', '=', 'missing_products.product_id')
            ->select('missing_products.id as id', 'missing_products.active as active', 'missing_products.quantity as quantity', 
                       'missing_products.reported as reported', 'missing_products.team_id as team_id', 'missing_products.created_at as created_at', 'missing_products.updated_at as updated_at', 
                       'products.name as name', 'products.type_id as type_id', 'products.description as description')
            ->where('team_id', '=', auth()->user()->currentTeam->id)
            ->where('reported', "=", "false")
            ->get();
            
            foreach ($journal as $line){
                if($line->type_id === 1)
                    $grouped[1][] = $line; 
                else $grouped[2][] = $line;
            }
            asort($grouped);

        die('ok');
    }
}
