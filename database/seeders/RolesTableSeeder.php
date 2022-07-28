<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Silber\Bouncer\Database\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Role::count() === 1) {

            $permissions = [];

            $roles = json_decode(file_get_contents("database/seeders/json/roles.json"), true);
            foreach ($roles as $role) {
                $role_obj = Role::create([
                    'name' => $role['name'],
                    'title' => $role['title'],
                    'scope' => 1,
                ]);
                foreach ($role["permissions"] as $permission) {
                    $ability = DB::table('abilities')->where('name', $permission)->first();
                    $permissions[] = [
                        'ability_id' => $ability->id,
                        'entity_id' => $role_obj->id,
                        'entity_type' => 'roles',
                        'forbidden' => 0,
                        'scope' => 1
                    ];
                }
            }

            DB::table('permissions')->insert($permissions);
        }
    }
}
