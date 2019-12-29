<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\Status;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            ['id' => Status::IN_PROGRESS, 'name' => 'IN_PROGRESS'],
            ['id' => Status::DONE, 'name' => 'DONE'],
        ]);
    }
}
