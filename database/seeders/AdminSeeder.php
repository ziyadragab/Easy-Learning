<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Group;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=User::create([

            'first_name'=>'ziyad',
            'last_name'=> 'ragab',
            'email'=>'suber_admin@admin.com',
            'password'=>bcrypt('123456'),
            'phone'=>'01231231321',
            'address'=>'Egypt/Ciaro',
        ]);
        $group = Group::where('name', 'admins')->first();
        $user = User::find($user->id);
        $user->attachGroup($group->id);
    }
}
