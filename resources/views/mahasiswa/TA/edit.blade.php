@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">

        @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="alert-inner--text">{{session('success')}}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
            </div>
        @endif

        <div class="row mt-3">

        {{-- Detail TA --}}
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h1>Detail Judul TA</h1>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route'=>['mahasiswa.TA.update',$ta->id],'method'=>'put']) !!}
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
                        <div class="form-group">
                            {!! Form::label('status', 'Status Judul', ['class'=>'form-control-label']) !!}
                            <br>
                            <span class="btn btn-sm btn-success">{{$ta->status_ta}}</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a type="button" href="{{route('mahasiswa.TA.index')}}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary" >Simpan</button>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        {{-- End detail --}}
        </div>

    </div>
@endsection
