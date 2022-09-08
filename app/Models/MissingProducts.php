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
        return $this->belongsToMany(User::class, 'user');
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'product');
    }
}
