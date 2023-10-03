<?php

namespace App\Contracts;

interface DatatablesInterface {
    public function query($builder);

    public function options();
}
