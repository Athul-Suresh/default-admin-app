<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // create menu
         $menu = Menu::create([
            'name' => 'Admin',
            'code' => 'admin',
            'description' => 'Admin Menu',
        ]);
        $menu_items = [
            [
                'name'      => 'Dashboard',
                'uri'       => '/<admin>',
                'enabled'   => 1,
                'order'    => 0,
            ],
            [
                'name'      => 'Permissions',
                'uri'       => '/<admin>/permission',
                'enabled'   => 1,
                'order'    => 1,
            ],
            [
                'name'      => 'Roles',
                'uri'       => '/<admin>/role',
                'enabled'   => 1,
                'order'    => 2,
            ],
            [
                'name'      => 'Users',
                'uri'       => '/<admin>/user',
                'enabled'   => 1,
                'order'    => 3,
            ],
            [
                'name'      => 'Menus',
                'uri'       => '/<admin>/menu',
                'enabled'   => 1,
                'order'    => 4,
            ],
        ];
        $menu->menuItems()->createMany($menu_items);
    }
}
