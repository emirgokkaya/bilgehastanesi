<?php

namespace Database\Seeders;

use Database\Factories\DoctorFactory;
use Illuminate\Database\Seeder;

class DoctorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DoctorFactory::class
        ], 20);
    }
}
