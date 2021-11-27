<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Container\Container;
use Faker\Generator;

class PharmacyProductTableSeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create pharmacies
        \App\Models\Pharmacy::factory(100)->create();
        
        // create products
        \App\Models\Product::factory(500)->create();

        // create relations
        foreach (\App\Models\Pharmacy::all() as $pharmacy) {
            $pharmacy->products()->attach([
                $this->faker->numberBetween(1, 500) => [
                    'price' => $this->faker->randomFloat(2, 10, 500),
                    'quantity' => $this->faker->numberBetween(10, 500),
                ]
            ]);
        }
    }
}
