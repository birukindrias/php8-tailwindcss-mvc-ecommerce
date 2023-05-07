<?php

namespace App;

use App\config\App;
use PHPUnit\Framework\TestCase;
use App\config\Router;

class RouterTest extends TestCase
{
    public function testRoute()
    {
 
        $router = new Router();
        $router->get('/hello', function ($params) {
            return 'Hello ' ;
        });
        $this->request->urlMethod(){
            return 'get';
        };
        $this->request->urlPath(){
            return '/hello'
;        }
        $result = $router->resolve();

        $this->assertEquals('Hello ', $result);
    }
}