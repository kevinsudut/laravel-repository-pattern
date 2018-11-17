<?php

namespace App\Domains\Auth;

use App\Domains\Core\Repository;
use App\Model\Auth\User;

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
