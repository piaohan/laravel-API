<?php

    namespace App\Http\Controllers\WEB;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class AppController extends Controller
    {
        public function getApp()
        {
            return view('app');
        }

        public function getLogin()
        {
            return view('login');

        }
    }
