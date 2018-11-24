<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title = 'Dashboard';
        $prod = Product::all();
        $lava = new Lavacharts;
        $products = $lava->DataTable();
        $products->addStringColumn('Date')->addNumberColumn('Products Total');
        foreach ($prod as $row) {
          $products->addRow([
            Carbon::parse($row->created_at)->format('d-m-y'),$row->stock
          ]);
        }
        $lava->BarChart('products_total',$products)->setOptions([
          'orientation'=>'horizontal'
        ]);
        return view('home',compact('title','lava'));
    }
}
