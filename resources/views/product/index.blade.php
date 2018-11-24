@extends('layouts.main')

@section('title','Product')


@section('section-title','Index Product')



@section('content')
  <a href="{{ route('product.create') }}" class="btn btn-info" style="margin-bottom: 10px;">Create New Product </a>
  @if(session()->has('status'))
    <div class="alert  alert-primary" rol="alert">
      {{ session()->get('status')}}
    </div>
  @endif

  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
        <th scope="col">Stock</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $prod)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{optional($prod->category)->name}}</td>
      <td>{{$prod->name}}</td>
      <td>{{$prod->description}}</td>
      <td>{{$prod->stock}}</td>
      <td>

          <a class="btn btn-info" href="{{ route('product.edit',str_slug($prod->name)) }}">edit</a>
          <a class="btn btn-danger" href="{{ route('product.destroy',$prod->id) }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure ?">delete</a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
