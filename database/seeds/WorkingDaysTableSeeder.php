<?php

use Illuminate\Database\Seeder;

class WorkingDaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $week = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        for ($i=0; $i < sizeof($week); $i++)
        {
            factory(App\WorkingDay::class)->create([
                'name' => $week[$i],
                'index' => $i
            ]);
        }
    }
}
