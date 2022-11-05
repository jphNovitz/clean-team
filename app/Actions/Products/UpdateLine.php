<?php

namespace App\Actions\Products;

use App\Models\MissingProducts;
use App\Models\Product;

class UpdateLine {
    
    public function update(MissingProducts $line, Array $datas){
        
    // dd($datas);
        $line->active = $datas['active'];
        $line->reported = $datas['reported'];
        $line->quantity = $datas['quantity'];
        $line->product_id = $datas['product_id'];
        $line->save();
// dd($line);
        return true;
    }
}