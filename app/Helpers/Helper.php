<?php

use App\Helpers\Larapattern;

/**
 * Custom Class Helper
 *
 */

if (!function_exists('larapattern')) {
    function larapattern() {
        return new Larapattern;
    }
}

if (!function_exists('component_form')) {
    function component_form($blade)
    {
        return config('larapattern.components.core').".".$blade;
    }
}
