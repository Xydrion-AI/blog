<?php
namespace Tests\Framework;


use Framework\App;
use GuzzleHttp\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    public function test404() 
    {
        $app = new App();
        $request = new ServerRequest('GET', '/404/'); //Need to install a new library https://packagist.org/ -> https://packagist.org/packages/guzzlehttp/psr7 and in terminal, write : composer require guzzlehttp/psr7 to install guzzlehttp/psr7
        /*$_SERVER['REQUEST_URI'] = '/estelle/'; Why this part was written and deleted ?!*/
        $response = $app->run($request);
        $this->assertStringContainsString('<h1>Error 404</h1>', (string)$response->getBody());
        $this->assertEquals(404, $response->getStatusCode());
    }
}