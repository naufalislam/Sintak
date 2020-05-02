@extends('layouts.app',['navTitle' => 'Master / Kaprodi / show'])

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt--8">
    <div class="col-md-12">
        <div class="row-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h1>Detail {{$kaprodi->nama}}</h1>
                </div>
                <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('nama', 'Nama') !!}
                            {!! Form::text('nama', $kaprodi->nama, ['class'=>'form-control form-control-alternative','placeholder'=>'Nama','disabled'=>true]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email', $kaprodi->email, ['class'=>'form-control form-control-alternative','placeholder'=>'Email','disabled'=>true]) !!}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
    {{-- @include('layouts.headers.cards') --}}
@endsection
