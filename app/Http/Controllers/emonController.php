<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class emonController extends Controller
{
    //

    public function show(){

        $data = [
            'name' => 'Emon',
            'age' => 25,
            'skills' => ['Laravel', 'React', 'Next.js'],
        ];

        return  response()->json($data);

        
    }
}
