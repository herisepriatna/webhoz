@extends('layouts.main')

@section('title')
  {{$title}}
@endsection

@section('section-title')
  {{$title}}
@endsection

@section('content')
  <div id="products_total"></div>
  {!! $lava->render('BarChart','products_total','products_total') !!}
@endsection
