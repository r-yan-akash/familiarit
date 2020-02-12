<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Services;
use App\Models\Contact;
use App\Models\Quote;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Setting::class,5)->create();
        factory(Slider::class,5)->create();
        factory(Team::class,5)->create();
        factory(Services::class,5)->create();
        factory(Contact::class,5)->create();
        factory(Quote::class,5)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
