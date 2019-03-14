<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Handler\ProductHandler;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var \App\Handler\ProductHandler
     */
    private $productHandler = null;

    /**
     * Constructor function of ProductController
     *
     * @param all handler class that would be used in this class
     *
     * @return void
     */
    public function __construct(ProductHandler $productHandler)
    {
        $this->productHandler = $productHandler;
    }

    public function index(Request $request)
    {
        // Example how to use CategoryRepository using handler class
        $this->productHandler->repository('category')->getAll();

        // Example to how use ProductRepository using handler class
        $this->productHandler->repository('product')->getAll();
    }
}
