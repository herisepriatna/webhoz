@extends('category.create')

@section('editid',$categories->id);
@section('editname',$categories->name);
@section('editdescription',$categories->description);
@section('editmethod')
  {{method_field('PUT')}}
@endsection
