<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\PharmacyRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;

class HomeController extends Controller
{
    /**
     * @var PharmacyRepositoryInterface $pharmacyRepository 
     * @var ProductRepositoryInterface $productRepository 
     */
    private $pharmacyRepository;
    private $productRepository;

    /**
     * HomeController Constructor
     */
    public function __construct(PharmacyRepositoryInterface $pharmacyRepository,
        ProductRepositoryInterface $productRepository)
    {
        $this->pharmacyRepository = $pharmacyRepository;
        $this->productRepository = $productRepository;
    }
    
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('index', [
            'latestPharmacies' => $this->pharmacyRepository->latest(),
            'latestProducts' => $this->productRepository->latest()
        ]);
    }
}
