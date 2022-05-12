<?php

namespace Database\Seeders;

use App\Models\Relay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RelaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Relay::create([
            'relay_1' => 1,
            'relay_2' => 1,
            'relay_3' => 1,
            'relay_4' => 1,
        ]);
    }
}
