<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductSearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:search {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Search for cheapest 5 prices to a product';

    /**
     * @var ProductRepositoryInterface $productRepository 
     */
    private $productRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        parent::__construct();
        $this->productRepository = $productRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $pharmacies = [];
        $product = $this->productRepository->find($this->argument('id'));
        
        foreach ($product->pharmacies->sortBy('pivot.price')->values()->take(5) as $pharmacy) {
            $pharmacies[] = [
                'id' => $pharmacy->id,
                'name' => $pharmacy->name,
                'price' => $pharmacy->pivot->price,
                'quantity' => $pharmacy->pivot->quantity,
            ];
        }

        print(json_encode($pharmacies) . PHP_EOL);
    }
}
