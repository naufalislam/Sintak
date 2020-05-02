@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--9">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <span class="alert-inner--text">{{$error}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            @endforeach
        @endif
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-inner--text">{{session('success')}}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
        @endif
        <div class="row">

            {{-- Dosen pembimbing --}}

            @if ($ta->status_ta == 'diterima')
                @forelse ($pembimbings as $keys => $pembimbing)
                    @if ($pembimbing != null)
                        <div class="col">
                                <div class="card shadow">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-3 order-lg-2">
                                            <!-- <div class="card-profile-image">
                                                <a href="#">
                                                    <img src="https://argon-dashboard-laravel.creative-tim.com/argon/img/theme/team-4-800x800.jpg" class="rounded-circle">
                                                </a>
                                            </div> -->
                                        </div>
                                    </div>
                                    <!-- <div class="card-header py-6">

                                    </div> -->
                                    <div class="card-body pt-0 pt-md-4">
                                    
                                    <!-- <div class="row">
                                    <div class="col">
      <div class="icon icon-shape bg-primary text-dark rounded-circle shadow">
          <i class="ni ni-paper-diploma"></i>
      </div>
    </div>
    <div class="col-auto">
        <h5 class="card-title text-uppercase text-muted mb-0 text-black">Total Judul TA</h5>
        <span class="h2 font-weight-bold mb-0 text-black">ss</span>
    </div>

</div> -->
   
                                        <div class="row">
                                        <div class="col col-lg-1">
      <div class="icon icon-shape bg-primary text-dark rounded-circle shadow">
          <i class="ni ni-satisfied"></i>
      </div>
    </div>
                                      <div class="col-auto">
                                                <h1>{{$keys}}</h1>
                                                <span>{{$pembimbing->dosen->nama}}</span>
                                            </div>
                                            <div class="col-auto ml-9">
    </div>                              

                                            <div class="col col-lg-1">
      <div class="icon icon-shape bg-primary text-dark rounded-circle shadow">
          <i class="ni ni-email-83"></i>
      </div>
    </div>   
    
                                            <div class="col-auto">
                                                <h1>Email</h1>
                                                <span>{{$pembimbing->dosen->email}}</span>
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col">
                                                <span>{{$pembimbing->dosen->nama}}</span>
                                            </div>
                                            <div class="col">
                                                <span>{{$pembimbing->dosen->email}}</span>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty

                @endforelse
            @endif
            {{-- End dosbing --}}

        </div>

        <div class="row mt-3 ml-4 mr-4">

        {{-- Detail TA --}}
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h1>Detail Judul TA</h1>
                    </div>
                    <div class="card-body">
                        {!! Form::open() !!}
                        <div class="form-group">
                            {!! Form::label('judul', 'Judul Tugas Akhir',['class'=>'form-control-label']) !!}
                            {!! Form::text('judul', $ta->judul, ['class'=>'form-control form-control-alternative','disabled']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('deskripsi', 'Deskripsi',['class'=>'form-control-label']) !!}
                            {!! Form::textarea('deskripsi', $ta->deskripsi, ['class'=>'form-control form-control-alternative','disabled']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('manfaat', 'Manfaat',['class'=>'form-control-label']) !!}
                            {!! Form::text('manfaat', $ta->manfaat, ['class'=>'form-control form-control-alternative','disabled']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status Judul', ['class'=>'form-control-label']) !!}
                            <br>
                            <span class="btn btn-sm btn-success">{{$ta->status_ta}}</span>
                        </div>
                        @if ($ta->status_ta != 'diterima')
                            <a href="{{route('mahasiswa.TA.edit',$ta->id)}}" class="btn btn-primary">Edit</a>
                        @endif
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        {{-- End detail --}}
        </div>

    </div>
@endsection
