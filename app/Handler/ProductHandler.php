<?php

/**
 * @author Kevin Surya Wahyudi <kevinsuryaw@gmail.com>
 *
 * Copyright © 2019 | All rights reserved.
 */

namespace App\Handler;

use App\Handler\Core\Handler;
use App\Domains\Product\CategoryRepository;
use App\Domains\Product\ProductRepository;

class ProductHandler extends Handler
{
    /**
     * @var \App\Domains\Product\CategoryRepository
     */
    protected $categoryRepository = null;

    /**
     * @var \App\Domains\Product\ProductRepository
     */
    protected $productRepository = null;

    /**
     * Constructor function of ProductHandler
     *
     * @return void
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }
}
