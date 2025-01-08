<?php

namespace App\Http\Controllers;

use App\Models\books;
use Illuminate\Http\Request;

class emonController extends Controller
{
    //

    public function show(){

       $book=books::all(); 
         
       // return $book;
       foreach($book as $b){

        echo $b->title ."<br>";
       }
       

    
    }
}
