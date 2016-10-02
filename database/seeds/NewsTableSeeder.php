<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $user = User::inRandomOrder()->first();
            DB::table('news')->insert([
                'user_id' => $user->id,
                'title' => ucwords($faker->text(20)),
                'summary' => $faker->text(200),
                'image' => $faker->imageUrl($width = 800, $height = 400),
                'content' => $faker->paragraphs(5, true),
                'publish' => $faker->boolean(),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime()
            ]);
        }
    }
}
