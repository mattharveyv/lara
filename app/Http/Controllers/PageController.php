<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        return view('welcome', [
            'title' => 'Shop the Latest Deals',
            'subtitle' => 'Premium gadgets and everyday essentials at unbeatable prices.',
        ]);
    }

    public function home()
    {
        return $this->welcome();
    }

    public function about()
    {
        return view('about', [
            'title' => 'About Us',
            'description' => 'We help customers discover quality products at great prices.',
        ]);
    }

    public function contact()
    {
        return view('contact', [
            'title' => 'Contact Us',
            'description' => 'We would love to hear from you about your order or questions.',
        ]);
    }
}
