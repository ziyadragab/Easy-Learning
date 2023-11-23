<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::create([
            'name'=>'admins'
        ]);
        Group::create([
            'name'=>'users'
        ]);
        $this->command->comment('======== Information Groups created ========');
    }
}
