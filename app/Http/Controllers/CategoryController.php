<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

    public function index()
    {
        $categories = Category::all();//menampilkan semua isi tabel Category
        return view('category.index',compact('categories'));//mempersiapkan semua isi tabel category agar bisa dipanggil oleh view
    }

    public function create()
    {
        return view('category.create');

    }

    public function store()
    {
      //validasi
            $this->validate(Request(),[
              'name'=>'required',
              'description'=>'required'
            ]); //kalo ingin menambahkan pesan error dalam bahasa indonesia harus membuat array baru
            //insert ke database
            Category::create([
              'name'=>request('name'),
              'slug'=>str_slug(request('name')),
              'description'=>request('description'),
              'user_id'=>auth()->user()->id
            ]);
            //redirect ke category sekaligus menampilkan flash message
            return redirect()->route('category.index')->with('status','Category has been created!');
            //ambil input
            //insert

            //redirect
    }


    public function show($id)
    {

    }

    public function edit($slug)
    {
      $categories = Category::where('slug',$slug)->first();//menampilkan semua isi tabel Category
      //dd($categories);
      return view('category.edit',compact('categories'));
    }

    public function update(Request $request,$id)
    {
      //validasi
      $categories = Category::find($id);
            $this->validate($request,[
              'name'=>'required',
              'description'=>'required',
            ]); //kalo ingin menambahkan pesan error dalam bahasa indonesia harus membuat array baru
            //insert ke database

            //update
            Category::find($id)->update([
              'name'=>$request->name,
              'slug'=>str_slug($request->name),
              'description'=>$request->description
            ]);

            //redirect ke category sekaligus menampilkan flash message
            return redirect()->route('category.index')->with('status','Category has been modified!');
            //ambil input
            //insert

            //redirect
    }


    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.index')->with('status','Category has been deleted!');

    }
}
