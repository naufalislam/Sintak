@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid">
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
        <div class="row mt--7">
            <div class="col">
                <div class="alert alert-warning" role="alert">
                    <span class="alert-inner--icon"><i class="ni ni-fat-remove"></i></span>
                    <span class="alert-inner--text"><strong>Peringatan!</strong> Anda belum menginputkan judul Tugas Akhir</span>
                </div>
            </div>
        </div>
        <a id="btn-tambah-ta" data-toggle="modal" data-target="#tambahTA" class="btn btn-icon btn-3 btn-secondary" type="button">
            <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
            <span class="btn-inner--text">Masukkan Judul Tugas Akhir</span>
        </a>
    </div>
    @include('mahasiswa.modal.tambah_ta')
    @endsection
