<?php

namespace App\Domains\Product;

use App\Domains\Core\Repository;
use App\Model\Product;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends Repository
{

    /**
     * Constructor function of ProductRepository
     *
     * @param \Illuminate\Database\Eloquent\Model
     *
     * @return void
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function newModel()
    {
        return new Product();
    }

    public function fill(array $data, Model $model)
    {
        $model->name = $data['name'];
        $model->category_id = $data['category'];
        $model->price = $data['price'];
        return $model;
    }

}
