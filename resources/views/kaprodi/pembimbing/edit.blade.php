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
                    <h1>Tambah pembimbing {{$mahasiswa->nim}}</h1>
                </div>
                {!! Form::open(['route'=>['kaprodi.pembimbing.update', $mahasiswa->nim],'method'=>'put']) !!}
                <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('nama', 'Nama') !!}
                            {!! Form::text('nama', $mahasiswa->nama, ['class'=>'form-control form-control-alternative','placeholder'=>'NIM']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('pembimbing_pertama', 'Pembimbing 1') !!}
                            {!! Form::select('pembimbing_pertama', $pembimbing , (isset($pem1->dosen_id)) ? $pem1->dosen_id : '', ['class' => 'form-control form-control-alternative','placeholder' => 'Pembimbing 1']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('pembimbing_kedua', 'Pembimbing 2') !!}
                            {!! Form::select('pembimbing_kedua', $pembimbing , (isset($pem2->dosen_id)) ? $pem2->dosen_id : '', ['class' => 'form-control form-control-alternative','placeholder' => 'Pembimbing 2']) !!}
                        </div>
                    </div>

                    <div class="card-footer">
                        <a type="button" href="{{route('kaprodi.pembimbing.index')}}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary" >Simpan</button>
                    </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
    {{-- @include('layouts.headers.cards') --}}
@endsection
