<?php

/**
 * @author Kevin Surya Wahyudi <kevinsuryaw@gmail.com>
 *
 * Copyright © 2019 | All rights reserved.
 */

namespace App\Handler\Core;

interface HandlerInterface
{
    /**
     * Function to use repository class from var
     *
     * @return \App\Domains\Core\Repository
     */
    public function repository($repository);
}
