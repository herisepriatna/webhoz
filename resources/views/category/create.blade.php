@extends('layouts.main')

@section('title','Category')


@section('section-title','Category')



@section('content')
  @include('errors.errors_message')

    <form action="/category/@yield('editid')" method="POST">
      @csrf
      @section('editmethod')
      @show
      <div class="form-group">
        <label >Nama Category</label>
        <input type="text" class="form-control" value="@yield('editname')"name="name" placeholder="Enter Category">
      </div>
      <div class="form-group">
        <label >Description</label>
        <textarea rows="8" class="form-control" name="description" cols="80">@yield('editdescription')</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
