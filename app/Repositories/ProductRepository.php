<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
     * @var Model $model
     */
    protected $model;

    /**
     * ProductRepository Constructor
     *
     * @param Model $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }
}