<?php

namespace App\Http\Controllers\Product;

use App\Actions\Products\CreatePdf;
use App\Actions\Products\CreateReport;
use App\Actions\Products\FindReport;
use App\Actions\Products\UpdateLine;
use App\Http\Controllers\Controller;
use App\Http\Middleware\ShareProductsData;
use App\Models\MissingArchives;
use App\Models\MissingProducts;
use App\Models\MissingProductsArchive;
use App\Models\Product;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Throwable;
use Barryvdh\DomPDF\Facade\Pdf;

use function Termwind\render;

class MissingProductsController extends Controller
{


    public function index()
    {
   
        return Inertia::render('MissingProducts/Show', [
            'journal' => MissingProducts::with('product')
                ->where('team_id', auth()->user()->currentTeam->id)
                ->where('reported', false)->get(),
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
            ->where('reported', "=", 0)
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

    public function report(CreateReport $reporter)
    {

        if(!$report = $reporter->create()) return redirect()->route('missing_products');
        
        return Pdf::loadView('pdf.report', $report)
            ->download('linge_manquant_'.date('m-d-Y_hia').'.pdf', [
                'location' => route('missing_products')
            ] );
       
       /* $journal = DB::table('missing_products')
            ->leftJoin('products', 'products.id', '=', 'missing_products.product_id')
            ->select(
                'missing_products.id as id',
                'missing_products.active as active',
                'missing_products.quantity as quantity',
                'missing_products.reported as reported',
                'missing_products.team_id as team_id',
                'missing_products.created_at as created_at',
                'missing_products.updated_at as updated_at',
                'products.name as name',
                'products.type_id as type_id',
                'products.description as description'
            )
            ->where('team_id', '=', auth()->user()->currentTeam->id)
            ->where('reported', "=", "false")
            ->get();

        foreach ($journal as $line) {
            if ($line->type_id === 1)
                $grouped[1][] = $line;
            else $grouped[2][] = $line;
        }
        asort($grouped); */
    }

    public function archivePdf(int $id = null, FindReport $finder){
        
        if (empty($id)) return redirect()->back();

        $archive = $finder->find($id);
        return Pdf::loadView('pdf.report', $archive)
        ->download('linge_manquant_'.date('m-d-Y_hia').'.pdf');


    }

    public function archivesList(){
// dd(MissingArchives::where('team_id', '=', auth()->user()->currentTeam->id)->orderBy('created_at', 'desc')->get());
        return Inertia::render('MissingProducts/Archive', [
            'archive' => MissingArchives::where('team_id', '=', auth()->user()->currentTeam->id)
            ->orderBy('created_at', 'desc')->get()
        ]);
    }
}
