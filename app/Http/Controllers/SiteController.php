<?php

namespace App\Http\Controllers;


/**
 * SiteController
 */
class SiteController extends Controller
{
        
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return view('welcome');
    }
}
