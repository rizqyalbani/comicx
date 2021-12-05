@extends('layouts.admin')

@section('title') Detail Peserta @endsection
@section('back_button')
<a href="{{route('admin.competitor.index')}}" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-header text-gray-800">
                <b>Detail Peserta</b>
            </div>
            <div class="card-body text-gray-800">
              <b class="">{{$models->number()}}</b>
              <p>Lomba : {{$models->competitionCategory->name()}}</p>
              <b>Detail Peserta</b> <br>
              <small>
                No HP : {{$models->phone}}
                @if($models->songs_id != "")
                    <br>
                    Lagu : {{$models->song->name}}
                @endif
              </small>
       
              @foreach ($models->competitorDetail as $detail)
              <hr>
                    <li>
                        
                        <small style="display: inline-block;"><b>{{$detail->name}}</b> <br>
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        Tempat Lahir
                                    </td>
                                    <td></td>
                                    <td>
                                        : {{$detail->birth_place}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tanggal Lahir
                                    </td>
                                    <td></td>
                                    <td>
                                        : {{date('d M Y', strtotime($detail->birth_date))}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Asal
                                    </td>
                                    <td></td>
                                    <td>
                                        : {{$detail->from}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Kelas
                                    </td>
                                    <td></td>
                                    <td>
                                        : {{$detail->class}} 
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Gender
                                    </td>
                                    <td></td>
                                    <td>
                                        : {{$detail->gender}} 
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Dokumen</b> :</td>
                                </tr>
                                <tr>
                                    <td>Pas Foto</td>
                                    <td>:</td>
                                <td>@if($detail->image != null) <span class="badge badge-success"><span class="fa fa-check"></span></span> <a target="_blank" href="{{$detail->getFile('image')}}"><i class="fa fa-eye"></i></a> @else <span class="badge badge-danger"><span class="fa fa-times"></span></span> @endif</td>
                                </tr>
                                <tr>
                                    <td>Identitas</td>
                                    <td>:</td>
                                    <td>@if($detail->student_identity != null) <span class="badge badge-success"><span class="fa fa-check"></span></span> <a target="_blank" href="{{$detail->getFile('identity')}}"><i class="fa fa-eye"></i></a> @else <span class="badge badge-danger"><span class="fa fa-times"></span></span> @endif</td>
                                </tr>
                            </table>
                        </small>
                        
                    </li>
                    <br>
                   
                    <small>Status Edit : <b>{{$detail->lockStatus()}}</b></small><br>
                    @if($detail->identity_lock == 0)
                        <a href="{{\Request::url()}}?access_edit=1&detail={{$detail->uuid}}" class="btn-sm btn btn-danger">Kunci</a>
                    @else
                        <a href="{{\Request::url()}}?access_edit=0&detail={{$detail->uuid}}" class="btn-sm btn btn-success">Buka Kunci</a>
                    @endif
              @endforeach
              
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header text-gray-800">
                <b>Detail User</b>
            </div>
            <div class="card-body text-gray-800">
              
            <small>
                Nama : {{$models->user->name}} <br>
                No Telepon : {{$models->user->phone}}<br>
                Email : {{$models->user->email}}
            </small>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card mb-3">
            <div class="card-header text-gray-800">
                <b>Pembayaran</b>
            </div>
            <div class="card-body text-gray-800">
                @if($models->invoice)
            <h5><a href="{{route('admin.payment.edit', $models->invoice->uuid)}}">{{$models->invoice->invoice()}}</a></h5>
                    
                    <b>Tanggal</b> : {{$models->invoice->date()}}  <br>
                    <b>Konfirmasi</b> : {{$models->invoice->approvedTime()}} <br>
                    <b>Oleh</b> : {{$models->invoice->approve ? $models->invoice->approve->name : '-'}} <br>
                    {!!$models->invoice->getStatus()!!} <br>
                    
                @else 
                    <p>Belum ada data pembayaran</p>
                @endif
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header text-gray-800">
                <b>Karya</b>
            </div>
            <div class="card-body text-gray-800">

                @if($models->competitor_status < 1)
                    
                <p>Peserta belum melakukan pembayaran</p>

                @else
                    @if($models->submission_url == null)
                        <p>Karya belum diupload</p>
                    @else
                        <b>Deskripsi : </b> <br>
                        @if($models->submission_description == null) Tidak ada deskripsi @else {{$models->submission_description }} @endif
                        <br>
                        <a href="{{$models->submission_url}}" target="_blank" rel="noopener noreferrer" class="badge badge-primary">Lihat Karya<i></i></a>
                        <hr>
                        <b>Status : </b> {!!$models->statusKarya()!!}
                        <br> 
                        @if($models->submission_status == 1)
                            <b>Diterima oleh</b> : {{$models->approved ? $models->approved->name : '-'}} ({{$models->approvedTime()}}) <br>
                            <br>
                            <a href="{{route('admin.competitor.upload', $models->uuid)}}?status=0" class="btn btn-danger btn-sm btn-block">Tolak</a>
                        @else
                            <br>
                            <a href="{{route('admin.competitor.upload', $models->uuid)}}?status=1" class="btn btn-success btn-sm btn-block">Terima</a>
                            <a href="{{route('admin.competitor.upload', $models->uuid)}}?status=0" class="btn btn-danger btn-sm btn-block">Tolak</a>
                        @endif
                    @endif

                @endif
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header text-gray-800">
                <b>Riwayat Upload</b>
            </div>
            <div class="card-body">
                @forelse ($models->submissionLog as $item)
                    <span class="badge badge-{{$item->type}}">{{$item->type}}</span> <br>
                    <small class="text-gray-800">
                        <b>{{$item->description}}</b> <br>
                        {{$item->date()}}
                    </small>
                    <hr>
                @empty
                    <p class="text-gray-800">Belum ada riwayat upload</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection