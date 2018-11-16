<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domains\Product\ProductRepository;

class ProductController extends Controller
{
    private $productRepository = null;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

}
