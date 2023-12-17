<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $division = [
            [
                'name' => 'skai',
            ],
            [
                'name' => 'project',
            ],
            [
                'name' => 'product',
            ],
        ];

        
        foreach ($division as $divison) {
            Division::create($divison);
        };
    }
}
