@extends('layouts.app',['navTitle' => 'Managemen Judul TA / Edit'])

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
                    <h1>Edit {{$tas->nim}}</h1>
                </div>
                {!! Form::open(['route'=>['dosen.managemen.update', $tas->id],'method'=>'put']) !!}
                <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('nim', 'NIM') !!}
                            {!! Form::text('nim', $tas->nama, ['class'=>'form-control form-control-alternative','placeholder'=>'NIM']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('judul', 'Judul') !!}
                            {!! Form::text('judul', $tas->judul, ['class'=>'form-control form-control-alternative','placeholder'=>'Judul']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('deskripsi', 'Deskripsi') !!}
                            {!! Form::textarea('deskripsi', $tas->deskripsi, ['class'=>'form-control form-control-alternative','placeholder'=>'Deskripsi']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('tahun', 'Tahun') !!}
                            {!! Form::textarea('tahun', $tas->tahun, ['class'=>'form-control form-control-alternative','placeholder'=>'Tahun']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status_ta', 'Status TA') !!}
                            {!! Form::select('status_ta', ['menunggu'=>'menunggu','ditolak'=>'ditolak','diterima'=>'diterima'], $tas->status_ta, ['class'=>'form-control form-control-alternative']) !!}
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <a type="button" href="{{route('dosen.managemen.index')}}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary" >Simpan</button>
                    </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
    {{-- @include('layouts.headers.cards') --}}
@endsection
