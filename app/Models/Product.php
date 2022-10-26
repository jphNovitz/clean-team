<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

        /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    protected $fillable = ['name', 'description'];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    
    public function missing_products(){
        return $this->hasMany(MissingProducts::class);
    }

    // public function missing_products(){
    //     return $this->HasMany(MissingProducts::class);
    // }
    
    // To be removed
    public function journals(){
        return $this->belongsToMany(MissingProducts::class, 'missing_products_products');
    }



}
