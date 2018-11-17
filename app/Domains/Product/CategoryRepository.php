<?php

namespace App\Domains\Product;

use App\Domains\Core\Repository;
use App\Model\Category;

class CategoryRepository extends Repository
{

    /**
     * Constructor function of CategoryRepository
     *
     * @param \Illuminate\Database\Eloquent\Model
     *
     * @return void
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function newModel()
    {
        return new Category();
    }

    public function fill(array $data, Model $model)
    {
        $model->name = $data['name'];
        return $model;
    }

}
