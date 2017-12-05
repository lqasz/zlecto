<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Category;

class HomeController extends Controller
{
  public function index()
  {
  	$zlecenia = new Order();
  	$kategorie = new Category();

    return [
    	"zlecenia" => $zlecenia->where('czy_zarchiwizowno', 0)->where('czy_usunieto', 0)->get(),
    	"kategorie" => $kategorie->where('czy_usunieto', 0)->get()
    ];
  }
}
