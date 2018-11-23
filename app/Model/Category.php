<?php

namespace App\Model;

use App\Model\Core\ModelUUID;

class Category extends ModelUUID
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
