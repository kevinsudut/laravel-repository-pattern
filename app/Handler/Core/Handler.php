<?php

/**
 * @author Kevin Surya Wahyudi <kevinsuryaw@gmail.com>
 *
 * Copyright © 2019 | All rights reserved.
 */

namespace App\Handler\Core;

use App\Handler\Core\Exceptions\UndefinedCallVariable;

abstract class Handler implements HandlerInterface
{
    /**
     * Constructor function of Handler
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function repository($repository)
    {
        try {
            return $this->{$repository . 'Repository'};
        } catch (\Exception $e) {
            throw new UndefinedCallVariable("Undefined call variable {$repository}Repository");
        }
        return null;
    }
}
