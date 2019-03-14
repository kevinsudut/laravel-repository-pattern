<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

abstract class ModelUUID extends Model
{
    public $incrementing = false;

    protected $keyType = 'string';

    /**
     * Change laravel default id from int to string
     * Extends model class using this class if the model use uuid as primary key
     */
    protected $casts = [
        'id' => 'string',
    ];
}
