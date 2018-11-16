<?php

namespace App\Domains\Auth;

use App\Domains\Core\Repository;
use App\Model\Auth\User;

class UserRepository extends Repository
{

    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function newModel()
    {
        return new User();
    }

    public function fill(array $data, $model)
    {
        $model->name = $data['name'];
        $model->email = $data['email'];
        $model->password = bcrypt($data['password']);
        return $model;
    }

}
