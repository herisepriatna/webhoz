@extends('layouts.main')

@section('title','Category')


@section('section-title','Index Category')



@section('content')
  <a href="{{ route('category.create') }}" class="btn btn-info" style="margin-bottom: 10px;">Create New Category </a>
  @if(session()->has('status'))
    <div class="alert  alert-primary" rol="alert">
      {{ session()->get('status')}}
    </div>
  @endif

  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">User</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $cat)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{optional($cat->user)->name}}</td>
      <td>{{$cat->name}}</td>
      <td>{{$cat->description}}</td>
      <td>

          <a class="btn btn-info" href="{{ route('category.edit',str_slug($cat->name)) }}">edit</a>
          <a class="btn btn-danger" href="{{ route('category.destroy',$cat->id) }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure ?">delete</a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
