<?php

namespace App\Actions\Products;

use App\Models\MissingArchives;
use App\Models\MissingProducts;
use App\Models\Product;
use App\Models\Type;

class FindReport
{

    public function find(int $id)
    {
        // return MissingArchives::where('id', '=', $id)->first();

        return [
            'archive' =>  MissingProducts::with('product')
                ->where('missing_archives_id', '=', $id)
                ->get(),
            'members' => auth()->user()->currentTeam->allUsers(),
        ];
    }
}
