<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //Controller
    public function show($name)
    {
      // standard return 'Hello From Controller '. $name;
      return "Hello From Controller {$name}"; //yang banyak dipakai
    }
    public function show1($name,$age)
    {
      // standard return 'Hello From Controller '. $name;
      return "Hello From Controller, {$name} {$age}"; //lebih dari satu parameter
    }
    public function withCondition($name,$age = null)
    {
      // standard return 'Hello From Controller '. $name;
        if($age == null) {
          return 'Umur anda kosong, isi dongse!';
        }
        return "hello nama saya {$name} umur saya {$age}";
    }
    //lempar variable ke views
    public function index()
    {
      $name = 'john';
      $LastName = 'doe';
      $html = '<h2>tag html</h2>';

      return view('welcome',[
        'name1'=> $name,
        'last_name'=> $LastName,
        'html1'=> $html
      
      ]);
    }

}
