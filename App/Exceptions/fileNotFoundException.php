<?php

/**
 * User: birukindrias
 * Date: 7/25/2020
 * Time: 11:35 AM
 */

namespace App\App\Exceptions;
use App\config\App;


class fileNotFoundException extends \Exception
{
    protected $message = 'Oops internal error!';
    protected $code = 404;
    
}