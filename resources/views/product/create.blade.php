@extends('layouts.main')

@section('title','Product')


@section('section-title','Product')



@section('content')
  @include('errors.errors_message')

    <form action="/product/@yield('editid')" method="POST">
      @csrf
      @section('editmethod')
      @show
      <div class="form-group">
        <label >Category</label>
        <select name="category" class="form-control">
          <option value="">--Please Select--</option>
          @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label >Nama Product</label>
        <input type="text" class="form-control" value="@yield('editname')"name="name" placeholder="Enter Product">
      </div>
      <div class="form-group">
        <label >Description</label>
        <textarea rows="8" class="form-control" name="description" cols="80">@yield('editdescription')</textarea>
      </div>
      <div class="form-group">
        <label >Stock</label>
        <input type="number" class="form-control" value="@yield('editstock')"name="stock" placeholder="Enter Stock">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
