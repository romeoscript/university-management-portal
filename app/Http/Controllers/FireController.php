<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FireController extends Controller
{
    public function report()
    {
        $data = ['success' => true];
        return $data;
    }

    public function daily()
    {
        $data = ['success' => true];
        return $data;
    }

    public function offBuzzer()
    {
        $data = ['success' => true];
        return $data;
    }
}
