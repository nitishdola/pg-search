<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
  		//$this->call('AmenitiesTableSeeder');
        //$this->command->info("Amanities table seeded :)"); 

        // $this->call('StatesTableSeeder');
        // $this->command->info("States table seeded :)");

        // $this->call('DistrictsTableSeeder');
        // $this->command->info("Districts table seeded :)"); 

        //$this->call('LandmarksTableSeeder');
        //$this->command->info("Landmarks table seeded :)");
    }
}
class AmenitiesTableSeeder extends Seeder {
 
   public function run()
   {
     //insert s records
     DB::table('amenities')->insert(array(
         array('name'=>'Geyser','icon'=>'amaenity-icons/fridge.png'),
         array('name'=>'Fridge','icon'=>'amaenity-icons/geyser.png'),
         array('name'=>'TV','icon'=>'amaenity-icons/tv.png'),
         array('name'=>'WiFi','icon'=>'amaenity-icons/wifi.png'),
      )); 
   }
}

class StatesTableSeeder extends Seeder {
 
   public function run()
   {
     //insert s records
     DB::table('states')->insert(array(
         array('name'=>'Assam'),
         array('name'=>'Meghalaya'),
         array('name'=>'Delhi'),
         array('name'=>'Karnataka'),
      )); 
   }
}


class DistrictsTableSeeder extends Seeder {
 
   public function run()
   {
     //insert s records
     DB::table('districts')->insert(array(
        array('name'=>'Guwahati', 'state_id' => 1),
        array('name'=>'Shillong', 'state_id' => 2),
      )); 
   }
}


class LandmarksTableSeeder extends Seeder {
 
   public function run()
   {
     //insert s records
     DB::table('landmarks')->insert(array(
        array('name'=>'Chandmari', 'latitude' => '26.189121', 'longitude' => '91.773937'),
        array('name'=>'Ganeshguri', 'latitude' => '26.149978', 'longitude' => '91.785199'), 
        array('name'=>'Paltan Bazari', 'latitude' => '26.179268', 'longitude' => '91.751406'), 
        array('name'=>'Beltola', 'latitude' => '26.123522', 'longitude' => '91.798722'),
      )); 
   }
}
