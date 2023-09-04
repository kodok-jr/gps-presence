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
