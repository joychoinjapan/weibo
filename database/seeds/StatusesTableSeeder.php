<?php

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = ['1', '2', '3'];
        //Faker容器のインスタンスを取得
        $faker = app(Faker\Generator::class);

        $statuses = factory(Status::class)
            ->times(100)
            ->make()
            ->each(function ($status) use ($faker, $user_ids) {
                //1,2,3のuser_idから任意の値をstatusに与える。
                $status->user_id = $faker->randomElement($user_ids);
            });

        Status::insert($statuses->toArray());
    }
}
