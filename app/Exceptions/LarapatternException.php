<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class LarapatternException extends Exception {
    protected $error_message;

    public function __construct($error_message) {
        $this->error_message = $error_message;

        $code = time().rand(1, 100);

        $this->message = 'Error Code : '.$code;

        Log::error('ERROR CODE: '.$code.' - '.$this->error_message);
    }
}
