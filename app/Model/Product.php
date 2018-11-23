<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Core\ModelUUID;

class Product extends ModelUUID
{
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
