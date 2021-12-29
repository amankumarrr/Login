<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        $uri = service('uri');
        // Do something here
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url() . '/');
        } else
        if (session()->get('role') == "customer" && $uri->getSegment(1) == 'home') {
            return redirect()->to(base_url() . '/dashboard');
        } else
        if (session()->get('role') == "staff" && $uri->getSegment(1) == 'dashboard') {
            return redirect()->to(base_url() . '/home');
        } else
        if ((session()->get('role') == "admin" || session()->get('role') == "super-admin")  && ($uri->getSegment(1) == 'dashboard' || $uri->getSegment(1) == 'home')) {
            return redirect()->to(base_url() . '/admin');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}
