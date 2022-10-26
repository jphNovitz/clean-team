<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MissingProducts extends Model
{
    use HasFactory;

    protected $fillable = ['active', 'reported', 'quantity'];

    public function users(){
        return $this->belongsToMany(User::class, 'missing_products_users');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
    // public function product(){
    //     return $this->hasOne(Product::class);
    // }

    public function archive(){
        return $this->BelongsTo(MissingArchives::class, 'archive_id');
    }

    
}
