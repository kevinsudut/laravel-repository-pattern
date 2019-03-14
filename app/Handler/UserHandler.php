<?php

/**
 * @author Kevin Surya Wahyudi <kevinsuryaw@gmail.com>
 *
 * Copyright © 2019 | All rights reserved.
 */

namespace App\Handler;

use App\Handler\Core\Handler;
use App\Domains\Auth\UserRepository;

class UserHandler extends Handler
{
    /**
     * @var \App\Domains\Auth\UserRepository
     */
    protected $userRepository = null;

    /**
     * Constructor function of UserHandler
     *
     * @return void
     */
    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }
}
