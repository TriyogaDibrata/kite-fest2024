<?php

namespace App\Helpers;

use App\Models\Menu;

class MenuHelper {

    public static function getMenus() {
        $menus = Menu::with('subMenus')->where('parent_id', 0)->get();

        return $menus;
    }

}