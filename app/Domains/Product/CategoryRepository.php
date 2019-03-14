<?php

/**
 * @author Kevin Surya Wahyudi <kevinsuryaw@gmail.com>
 *
 * Copyright © 2018 | All rights reserved.
 */

namespace App\Domains\Product;

use App\Domains\Core\Repository;
use App\Model\Product\Category;
use Illuminate\Database\Eloquent\Model;

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
