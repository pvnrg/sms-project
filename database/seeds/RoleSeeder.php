<?php

use Illuminate\Database\Seeder;

use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $role = Role::create(
            [
                'name' => 'SU',
                'label' => 'Super Admin'
            ]);

        $role->permissions()->sync(\App\Permission::pluck('id'));

    }
}
