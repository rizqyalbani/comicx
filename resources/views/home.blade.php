@extends('layouts.admin')

@section('title') Dashboard @endsection

@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6 mb-2">
      <div class="card border-left-danger h-100 py-2">
        <div class="card-body">
        <a href="{{route('account.index')}}">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Halo</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{Auth::user()->name}}</div>
              </div>
              
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-2">
      <div class="card border-left-primary h-100 py-2">
        <div class="card-body">
        <a href="{{route('app.competitor.create')}}">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><span class="badge badge-primary">1</span> Pilih</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">Perlombaan</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-trophy fa-2x text-gray-300"></i>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-2">
        <div class="card border-left-warning h-100 py-2">
          <div class="card-body">
          <a href="{{route('app.payment.create')}}">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><span class="badge badge-warning">2</span>  Lakukan</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Pembayaran</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-wallet fa-2x text-gray-300"></i>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-2">
        <div class="card border-left-success h-100 py-2">
          <div class="card-body">
          <a href="{{route('app.upload.index')}}">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><span class="badge badge-success">3</span> Upload</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Karya</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-upload fa-2x text-gray-300"></i>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    
</div>
<hr>
<div class="row mb-2">
  <div class="col-md-4 mb-2">
    <div class="card border-left-info h-100 py-2 mb-2">
      
      <div class="card-body">
        <div class="h5 mb-0 font-weight-bold text-gray-800">Pemberitahuan</div>
        <hr>
        <div style="height: 250px; overflow-y: scroll;">
          @forelse ($message as $item)
            <div class="notification">
              <div class="h6 mb-0 font-weight-bold text-gray-800">{{$item->name}}</div>
              <p class="text-gray-800">{!!$item->description!!}
                <br>
                <small>{{$item->date()}}</small>
              </p>
           
            </div>
            <hr>
        @empty
            <p>Belum ada pemberitahuan</p>
        @endforelse
        </div>
      </div>
    </div>
    
  </div>
  <div class="col-md-4">
    <div class="card border-left-primary py-2 mb-2">
      
      <div class="card-body text-gray-800">
        <div class="h5 mb-0 font-weight-bold text-gray-800">Kontak Kami</div>
        <hr>
        <b>Sabil</b> <br>
        <small>
          <a href="http://wa.me/6281529039723" target="_blank"  class="btn btn-success btn-sm mt-1 mr-1" style="font-size: 12px;background: #5cc762; border-color: #5cc762;"><i class="fab fa-whatsapp"></i> WhatsApp</a>
          <a href="http://line.me/ti/p/~sabilaquar" target="_blank"  class="btn btn-success btn-sm mt-1 mr-1" style="font-size: 12px; background: #53b42d; border-color: #53b42d;"><i class="fab fa-line"></i> Line</a>
        </small>
        <hr>
        <b>Anggita</b> <br>
        <small>
          <a href="http://wa.me/6285330096712" target="_blank" class="btn btn-success btn-sm mt-1 mr-1" style="font-size: 12px;background: #5cc762; border-color: #5cc762;"><i class="fab fa-whatsapp"></i> WhatsApp</a>
          <a href="http://line.me/ti/p/~4nggita01" target="_blank"  class="btn btn-success btn-sm mt-1 mr-1" style="font-size: 12px; background: #53b42d; border-color: #53b42d;"><i class="fab fa-line"></i> Line</a>
        </small>
        <hr>
        <b>Erla</b> <br>
        <small>
          <a href="http://wa.me/6287897362113" target="_blank"  class="btn btn-success btn-sm mt-1 mr-1" style="font-size: 12px;background: #5cc762; border-color: #5cc762;"><i class="fab fa-whatsapp"></i> WhatsApp</a>
          <a href="http://line.me/ti/p/~erlaayuu" target="_blank"  class="btn btn-success btn-sm mt-1 mr-1" style="font-size: 12px; background: #53b42d; border-color: #53b42d;"><i class="fab fa-line"></i> Line</a>
        </small>
        
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card border-left-warning py-2 mb-2">
      
      <div class="card-body text-gray-800">
        <div class="h5 mb-0 font-weight-bold text-gray-800">Bantuan</div>
        <hr>
        <a href="{{route('panduan.index')}}" target="_blank" class="btn btn-warning btn-sm mr-1">Panduan</a>
        <a href="{{route('qa.index')}}" target="_blank" class="btn btn-warning btn-sm">Pertanyaan</a>
      </div>
    </div>
  </div>
</div>
@endsection


