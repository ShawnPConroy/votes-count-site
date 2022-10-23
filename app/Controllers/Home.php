<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function index($page = 'home')
    {
        $data['title'] = ucfirst($page); // Capitalize the first letter
        return view('home', $data);
    }
    
    public function view_old($page = 'home')
    {
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $data['title'] = ucfirst($page); // Capitalize the first letter
        return view('templates/header', $data)
            . view('home' . $page)
            . view('templates/footer');
    }
}
