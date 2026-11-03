<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $fillable = [
        'supplier_name',
        'phone',
        'email',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'supplier_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'supplier_id', 'id');
    }
}
