<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Execute an action on the controller.
     *
     * Overrides the function at Illuminate\Routing\Controller
     * Convert the $parameters array into a list of positional arguments.
     * 
     * Awaiting a fix for PHP8 named arguments:
     * @link https://github.com/laravel/framework/issues/37231
     * @link https://lindevs.com/named-arguments-in-php-8-0/
     * @link https://www.php.net/manual/en/functions.arguments.php#functions.named-arguments
     *
     * @param  string $method
     * @param  array  $parameters
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function callAction($method, $parameters)
    {
        $paramList = [];
        foreach ($parameters as $key => $value) {
            $paramList[] = $value;
        }
        return call_user_func_array([$this, $method], $paramList);
    }
}
