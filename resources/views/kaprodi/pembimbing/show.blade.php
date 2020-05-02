@extends('layouts.app',['navTitle' => 'Pembimbing / Edit'])

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt--8">
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
    <div class="col-md-12">
        <div class="row-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h1>Detail pembimbing {{$mahasiswa->nim}}</h1>
                </div>
                <div class="row p-3">
                    <div class="col-sm-6">
                        <div class="card bg-gradient-default shadow">
                            <div class="card-header bg-transparent">
                                <h2 class="text-white">Pembimbing 1</h2>
                                <h5 class="text-white">{{$pem1->dosen->nama}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card bg-gradient-default shadow">
                            <div class="card-header bg-transparent">
                                <h2 class="text-white">Pembimbing 2</h2>
                                <h5 class="text-white">{{$pem2->dosen->nama}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col">
                        <a href="{{route('kaprodi.pembimbing.edit',$mahasiswa->nim)}}" class="btn btn-primary">Edit pembimbing</a>
                    </div>
                </div>
                {!! Form::open(['route'=>['kaprodi.pembimbing.update', $mahasiswa->nim],'method'=>'put']) !!}
                <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('nama', 'Nama') !!}
                            {!! Form::text('nama', $mahasiswa->nama, ['class'=>'form-control form-control-alternative','placeholder'=>'NIM']) !!}
                        </div>
                        <div class="form-group">
                                {!! Form::label('judul', 'Judul Tugas Akhir',['class'=>'form-control-label']) !!}
                                {!! Form::text('judul', $mahasiswa->judul_tugas_akhir->judul, ['class'=>'form-control form-control-alternative']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('deskripsi', 'Deskripsi',['class'=>'form-control-label']) !!}
                                {!! Form::textarea('deskripsi', $mahasiswa->judul_tugas_akhir->deskripsi, ['class'=>'form-control form-control-alternative']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('manfaat', 'Manfaat',['class'=>'form-control-label']) !!}
                                {!! Form::text('manfaat', $mahasiswa->judul_tugas_akhir->manfaat, ['class'=>'form-control form-control-alternative']) !!}
                            </div>
                    </div>

                    <div class="card-footer">
                        <a type="button" href="{{route('kaprodi.pembimbing.index')}}" class="btn btn-secondary">Kembali</a>
                    </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
    {{-- @include('layouts.headers.cards') --}}
@endsection
