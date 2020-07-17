<?php

use App\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = Client::create([
            'name' => 'joe',
            'address' => 'giza,egypt',
            'phone' => '01150894731'
        ]);
    }
}