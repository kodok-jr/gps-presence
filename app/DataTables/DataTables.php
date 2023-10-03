<?php

namespace App\DataTables;

use App\Exceptions\LapatternException;
use Yajra\DataTables\DataTables as BaseDataTables;

class DataTables extends BaseDataTables
{
    /**
     * Property [Array] required
     */
    public static $data;

    /**
     * Render blade
     *
     * @param strin $blade
     * @param array $data
     */
    public static function view(?String $blade = 'lapattern.index', ?Array $data = [])
    {
        return self::build($blade, $data);
    }

    /**
     * Proccess to render blade and ajax request
     *
     * @param [String] $blade
     * @param array $data
     */
    private static function build($blade, $data = [])
    {
        /** Set data */
        static::$data = $data;

        $child = app(get_called_class());

        if (request()->ajax()) {
            if (method_exists($child, 'render')) {
                return $child->render();
            }

            throw new LapatternException('No method render found in the class '. get_called_class());
        }

        if (method_exists($child, 'options')) {
            $options = array_merge($data, $child->options());

            return view($blade, $options);
        }

        throw new LapatternException('No method options found in the class '.get_called_class());
    }
}
