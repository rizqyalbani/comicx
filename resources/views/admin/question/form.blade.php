@extends('layouts.admin')
@section('title')
@if($models->exists) Edit @else Tambah @endif Pertanyaan
@endsection
@section('back_button')
<a href="{{route('admin.question.index')}}" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('content')
<div class="card shadow mb-4">

    <!-- Card Body -->
   <div class="card-body ">
    <form action="@if($models->exists)  {{route('admin.question.update',$models->id)}} @else  {{route('admin.question.store')}} @endif" method="POST" enctype="multipart/form-data">
        @csrf
        
        @if($models->exists) @method('PUT') @else @method('POST') @endif
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <p><small>Oleh : {{$models->user ? $models->user->name : '-'}}</small></p>
                        <hr>
                        <label for="" class="label">Pertanyaan</label>
                        <input type="text" class="form-control" autocomplete="off" name="question" required value="{{$models->question}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="label">Jawaban</label>
                        <textarea id="editor" class="form-control" name="answer" rows="20" cols="50">{!!$models->answer!!}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="label">Tipe</label>
                        <select name="competition_type_id"  class="form-control">
                            <option value="">Umum</option>
                                @foreach ($type as $item)
                                    <option @if($models->exists && ($models->competition_type_id == $item->id)) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                
            </div>
        
            
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-danger">Reset</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
   </div>
  </div>

@endsection

@section('script')
<script src="{{asset('editor/ckeditor/ckeditor.js')}}"></script>
<link href="{{ asset('editor/ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') }}" rel="stylesheet">
<script src="{{ asset('editor/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>
<script>
  var konten = document.getElementById("editor");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;
</script>
<script>hljs.initHighlightingOnLoad();</script>
@endsection

