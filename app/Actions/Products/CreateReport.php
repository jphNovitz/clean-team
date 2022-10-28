<?php

namespace App\Actions\Products;

use App\Models\MissingArchives;
use App\Models\MissingProducts;
use App\Models\Product;
use App\Models\Type;

class CreateReport
{

    public function create()
    {

        try {
            /** RETRIEVE LINES */

            $lines = MissingProducts::with('product')
                ->where('team_id', '=', auth()->user()->currentTeam->id)
                ->where('reported', "=", "false")
                ->get();
            
                if ($lines->isEmpty()) return false ;
            $types = Type::all();

            /** STORE THE ARCHIVE */

            $archive =  new MissingArchives();
            $archive->name = date('m-d-Y_hia');
            $archive->team_id = auth()->user()->currentTeam->id;
            $archive->save();
            
            foreach ($lines as $line) {
                // dd($line);
                $line->reported = true;
                $archive->lines()->save($line);
            }
           
            $archive->save();
            // dd($archive->lines);
            return [
                'archive' => $archive->lines,
                'members' => auth()->user()->currentTeam->allUsers(),
            ];
        } catch (\Throwable $e) {
            
            return false;
        }
    }
}
