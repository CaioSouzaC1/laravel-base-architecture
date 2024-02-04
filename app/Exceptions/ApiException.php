<?php

namespace App\Exceptions;

use App\Builder\ReturnApi;
use Exception;

class ApiException extends Exception
{

    protected $code = 400;
    protected $message = "";

    public function render()
    {
        return ReturnApi::error($this->message, $status = $this->code);
    }
}
