@extends('layouts.app',['navTitle' => 'Managemen user / Kaprodi / Edit'])

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
                    <h1>Edit {{$kaprodi->nama}}</h1>
                </div>
                {!! Form::open(['route'=>['admin.managemen.kaprodi.update',$kaprodi->id],'method'=>'put']) !!}
                <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('nama', 'Nama') !!}
                            {!! Form::text('nama', $kaprodi->nama, ['class'=>'form-control form-control-alternative','placeholder'=>'Nama']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email', $kaprodi->email, ['class'=>'form-control form-control-alternative','placeholder'=>'Email']) !!}
                        </div>
                        <hr>
                        <div class="form-group">
                            {!! Form::label('password', 'Password') !!}
                            <small class="text-danger">*Kosongkan bila tidak diganti</small>
                            {!! Form::password('password', ['class'=>'form-control form-control-alternative','placeholder'=>'Password']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('konfirmasi_password', 'Konfirmasi Password') !!}
                            {!! Form::password('password_confirmation', ['class'=>'form-control form-control-alternative','placeholder'=>'Konfirmasi password']) !!}
                        </div>
                    </div>
                    <div class="card-footer">
                        <a type="button" href="{{route('admin.managemen.kaprodi.index')}}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary" >Simpan</button>
                    </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
    {{-- @include('layouts.headers.cards') --}}
@endsection
