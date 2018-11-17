<?php

/**
 * @author Kevin Surya Wahyudi <kevinsuryaw@gmail.com>
 *
 * Copyright © 2018 | All rights reserved.
 */

namespace App\Domains\Auth;

use App\Domains\Core\Repository;
use App\Model\Auth\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends Repository
{

    /**
     * Constructor function of UserRepository
     *
     * @param \Illuminate\Database\Eloquent\Model
     *
     * @return void
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function newModel()
    {
        return new User();
    }

    public function fill(array $data, Model $model)
    {
        $model->name = $data['name'];
        $model->email = $data['email'];
        $model->password = bcrypt($data['password']);
        return $model;
    }

}
