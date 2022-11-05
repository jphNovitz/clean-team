<?php

namespace App\Actions\Products;

use App\Models\MissingArchives;
use App\Models\MissingProducts;
use App\Models\Product;
use App\Models\Type;

class CreateReport
{

    public function __invoke()
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
            $archive->name = date('Y-m-d H:i:s');
            $archive->team_id = auth()->user()->currentTeam->id;
            $archive->save();
            
            foreach ($lines as $line) {
                $line->reported = true;
                $archive->lines()->save($line);
            }
           
            $archive->save();

            return [
                'archive' => $archive->lines,
                'members' => auth()->user()->currentTeam->allUsers(),
            ];
        } catch (\Throwable $e) {
            
            return false;
        }
    }
}
