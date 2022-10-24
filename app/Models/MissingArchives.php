<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissingArchives extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function lines(){
        return $this->hasMany(MissingProducts::class);
    }
}
