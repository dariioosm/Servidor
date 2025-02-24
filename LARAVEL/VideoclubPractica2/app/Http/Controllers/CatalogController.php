<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
 public function getIndex(){
    return view('auth.login');
 }
 public function getSow($id){
    return view('catalog.index',array('id'=>$id));
 }

 public function getCreate(){
    return view('');
 }

 public function getEdit(){

 }
}
