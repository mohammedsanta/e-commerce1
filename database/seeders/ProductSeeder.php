<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Product::factory()
            ->count(25)
            ->state(
                new sequence(
                    ['type'=>'Camera'],
                    ['type'=>'Computer'],
                    ['type'=>'Mobile'],
                    ['type'=>'Watch'],
                )
            )
            ->state(
                new Sequence(
                    ['color'=>'red,blue,white'],
                    ['color'=>'red'],
                    ['color'=>'blue'],
                    ['color'=>'white'],
                )
            )
            ->create();

    }
}
