<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;


class ProductController extends Controller
{

          public function index()
          {
              $products = Product::all();//menampilkan semua isi tabel Category
              return view('product.index',compact('products'));//mempersiapkan semua isi tabel category agar bisa dipanggil oleh view
          }

          public function create()
          {
              $categories = Category::all();
              return view('product.create',compact('categories'));

          }

          public function store()
          {
            //validasi
                  $this->validate(request(),[
                    'category'=>'required',
                    'name'=>'required',
                    'description'=>'required',
                    'stock'=>'required'
                  ]); //kalo ingin menambahkan pesan error dalam bahasa indonesia harus membuat array baru
                  //insert ke database
                  Product::create([
                    'category_id'=>request('category'),
                    'name'=>request('name'),
                    'slug'=>str_slug(request('name')),
                    'description'=>request('description'),
                    'stock'=>request('stock')

                  ]);
                  //redirect ke category sekaligus menampilkan flash message
                  return redirect()->route('product.index')->with('status','Product has been created!');
                  //ambil input
                  //insert

                  //redirect
          }


          public function show($id)
          {

          }

          public function edit($slug)
          {
            $product = Product::where('slug',$slug)->first();
            $categories = Category::all();
            return view('product.edit',compact('product','categories'));

          }

          public function update(Request $request,$id)
          {
            //validasi
            $products = Product::find($id);
                  $this->validate($request,[
                    'name'=>'required',
                    'description'=>'required',
                    'stock'=>'required'
                  ]); //kalo ingin menambahkan pesan error dalam bahasa indonesia harus membuat array baru
                  //insert ke database

                  //update
                  Product::find($id)->update([
                    'category_id'=>$request->category,
                    'name'=>$request->name,
                    'slug'=>str_slug($request->name),
                    'description'=>$request->description,
                    'stock'=>$request->stock

                  ]);

                  //redirect ke category sekaligus menampilkan flash message
                  return redirect()->route('product.index')->with('status','Product has been modified!');
                  //ambil input
                  //insert

                  //redirect
          }


          public function destroy($id)
          {
              Product::find($id)->delete();
              return redirect()->route('product.index')->with('status','Product has been deleted!');

          }
      }
