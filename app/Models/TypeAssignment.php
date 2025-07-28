<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAssignment extends Model
{
    use HasFactory;

     protected $fillable = ['product_type_id','product_id'];

      public function type()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

}
