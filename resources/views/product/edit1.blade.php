@extends('product.create')

@section('editid',$products->id);
@section('editname',$products->name);
@section('editdescription',$products->description);
@section('editstock',$products->stock);
@section('editmethod')
  {{method_field('PUT')}}
@endsection
