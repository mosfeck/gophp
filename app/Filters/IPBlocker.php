<?php 
namespace App\Filters;

use CodeIgniter\Config\Services;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class IPBlocker implements FilterInterface{
    public function before(RequestInterface $request)
    {
        $throttler = Services::throttler();
        if($throttler->check('test', 4, MINUTE)===false)
        {
            return Services::response()->setStatusCode(429)->setBody('Too many hits');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response)
    {
        
    }

}