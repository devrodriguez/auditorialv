<?php

use Illuminate\Database\Seeder;

class AuditorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Auditoria\Auditor::class, 3)->create();
    }
}
