<?php

use App\Models\Opportunity;
use App\Models\OpportunityDetail;
use Illuminate\Database\Seeder;

class OpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Opportunity::class, 300)->create()->each(function ($opportunity){
             $opportunity->detail()->save(factory(OpportunityDetail::class)->make());
        });
    }
}
