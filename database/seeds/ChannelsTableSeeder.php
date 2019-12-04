<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
          'name' => 'Laravel 6.0',
          'slug' => str_slug('Laravel 6')
        ]);

        Channel::create([
          'name' => 'Vue.js 3',
          'slug' => str_slug('vue js 3')
        ]);

        Channel::create([
          'name' => 'Angular 7',
          'slug' => str_slug('Angular 7')
        ]);

        Channel::create([
          'name' => 'Node.js',
          'slug' => str_slug('Node js')
        ]);
    }
}
