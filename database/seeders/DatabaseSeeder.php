<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AirLine;
use App\Models\AirPort;
use App\Models\Baggage;
use App\Models\BaggageCheck;
use App\Models\BoardingPass;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\FlightManifest;
use App\Models\NoFlyList;
// use App\Models\Pessenger1;
// use App\Models\Pessenger2;
use App\Models\PessengerOne;
use App\Models\PessengerTwo;
use App\Models\SecurityCheck;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        PessengerOne::factory(100)->create();
        PessengerTwo::factory(100)->create();
        Booking::factory(100)->create();
        AirPort::factory(100)->create();
        AirLine::factory(100)->create();
        SecurityCheck::factory(100)->create();
        NoFlyList::factory(100)->create();
        BaggageCheck::factory(100)->create();
        Baggage::factory(100)->create();
        BoardingPass::factory(100)->create();
        Flight::factory(100)->create();
        FlightManifest::factory(100)->create();
    }
}
