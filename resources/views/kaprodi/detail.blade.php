@extends('layouts.app',['navTitle' => 'TA / Detail'])

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
                    <h1>Detail TA {{$ta->mahasiswa->nim}}</h1>
                </div>
                <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('nama', 'Nama') !!}
                            {!! Form::text('nama', $ta->mahasiswa->nama, ['class'=>'form-control form-control-alternative','placeholder'=>'NIM']) !!}
                        </div>
                        <div class="form-group">
                                {!! Form::label('judul', 'Judul Tugas Akhir',['class'=>'form-control-label']) !!}
                                {!! Form::text('judul', $ta->judul, ['class'=>'form-control form-control-alternative']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('deskripsi', 'Deskripsi',['class'=>'form-control-label']) !!}
                                {!! Form::textarea('deskripsi', $ta->deskripsi, ['class'=>'form-control form-control-alternative']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('manfaat', 'Manfaat',['class'=>'form-control-label']) !!}
                                {!! Form::text('manfaat', $ta->manfaat, ['class'=>'form-control form-control-alternative']) !!}
                            </div>
                    </div>

                    <div class="card-footer">
                        <a type="button" href="{{route('kaprodi.TA.index')}}" class="btn btn-secondary">Kembali</a>
                    </div>
            </div>
        </div>
    </div>
</div>
    {{-- @include('layouts.headers.cards') --}}
@endsection
