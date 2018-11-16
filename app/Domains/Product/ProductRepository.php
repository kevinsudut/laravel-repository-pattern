<?php

namespace App\Domains\Product;

use App\Domains\Core\Repository;
use App\Model\Product;

class ProductRepository extends Repository
{

    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function newModel()
    {
        return new Product();
    }

    public function fill(array $data, $model)
    {
        $model->name = $data['name'];
        $model->price = $data['price'];
        return $model;
    }

}
