<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domains\Product\ProductRepository;
use App\Domains\Product\CategoryRepository;

class ProductController extends Controller
{
    /**
     * @var \App\Domains\Product\ProductRepository
     */
    private $productRepository = null;

    /**
     * @var \App\Domains\Product\CategoryRepository
     */
    private $categoryRepository = null;

    /**
     * Constructor function of ProductController
     *
     * @param all repository that would be used in this class
     *
     * @return void
     */
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {

    }

}
