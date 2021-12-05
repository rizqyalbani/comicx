@extends('layouts.admin')

@section('title') Pemberitahuan @endsection
@section('back_button')
<a href="/home" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('content')
<div class="card shadow mb-4">

    <!-- Card Body -->
   <div class="card-body ">
    <div class="small text-gray-800">{{$models->date()}}</div> <br>
    <h5 class="font-weight-bold text-gray-800">{{$models->name}}</h5>
    <p class="text-gray-800">{!!$models->description!!}</p>
   </div>
  </div>

@endsection







