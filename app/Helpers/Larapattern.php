<?php

namespace App\Helpers;

use App\Models\LarapatternOption;
use Illuminate\Support\Facades\Cache;

class Larapattern
{
    protected $cache_alias = 'larapattern-cache-';

    /**
     * This method for protect teh controller
     *
     * @param [type] $gates
     * @return boolean
     */
    public function allow($gates)
    {
        if (Gate::denies($gates)) {
            return abort(403);
        }
    }

    /**
     * Load component form
     */
    function component_path($blade) {
        return config('template.component.form') . "." . $blade;
    }

    /**
     * Get larapattern option
     */
    public function getOption($name, $default = null) {
        $value = Cache::get($this->cache_alias.$name);

        if (is_null($value)) {
            try {
                $option = LarapatternOption::where('option_name', $name)->first();

                if ($option) {
                    $value = $option->option_value;

                    /** Cache Option */
                    if (config('larapattern.cache_option', true)) {
                        Cache::rememberForever($this->cache_alias.$name, function () use ($value) {
                            return $value;
                        });
                    }
                }
            } catch (\Exception $e) {
                //throw $th;
            }
        }

        if (@is_null($value)) {
            $array = json_decode($value);
            $value = is_array($array) || is_object($array) ? $array : $value;
        }

        return is_null($value) ? $default : $value;
    }
}
