<?php

namespace App\Helpers;

class Menu {
    public $menus = [];
    public $sidebar = [];
    public $top_right = [];

    /**
     * __construct dinamic menu & submenu
     */
    public function __construct()
    {
        // dd(file_exists(app_path('/Menus/MenuSidebar.php')));
        if (larapattern()->getOption('menu-sidebar')) {
            $this->sidebar = json_decode(json_encode(larapattern()->getOption('menu-sidebar')), true);
        } else {
            $this->sidebar = file_exists(app_path('/Menus/MenuSidebar.php')) ? require(app_path('/Menus/MenuSidebar.php')) : [];
        }

        if (larapattern()->getOption('menu-top')) {
            $this->sidebar = json_decode(json_encode(larapattern()->getOption('menu-top')), true);
        } else {
            $this->top_right = file_exists(app_path('/Menus/MenuTopbar.php')) ? require(app_path('/Menus/MenuTopbar.php')) : [];
        }

        $this->menus = array_merge($this->sidebar, $this->top_right);
    }

    /**
     * Gate name, access, permission menus
     */
    public function gates ($menus) {
        $gates = [];

        foreach ($menus as $menu) {
            $gates[] = $menu['gate'];

            foreach ($menu['permissions'] as $gate) {
                $gates[] = $gate['gate'];
            }

            if (isset($menu['submenus'])) {
                if ($this->gates($menu['submenus'])) {
                    foreach ($this->gates($menu['submenus']) as $key => $sub) {
                        if (!in_array($sub, $gates)) {
                            $gates[] = $sub;
                        }
                    }
                }
            }
        }

        return count($gates) > 0 ? $gates : null;
    }
}
