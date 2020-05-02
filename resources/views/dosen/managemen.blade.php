@extends('layouts.app',['navTitle' => 'Managemen Judul Tugas Akhir'])

{{-- @section('form-search')
{!! Form::open(['class'=>'navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto']) !!}
        <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
                <button>Search</button>
            </div>
        </div>
{!! Form::close() !!}
@endsection --}}

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
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm">
                                    <h3 class="">Mahasiswa</h3>
                                </div>
                                <div class="col-sm d-flex justify-content-end">
                                    <form action="">
                                        <div class="form-group">
                                            <div class="input-group">
                                                {!! Form::text('search', '', ['class'=>'form-control-sm form-control-alternative']) !!}
                                                <div class="input-group-prepend">
                                                    <button type="submit" class="btn btn-sm btn-primary">Cari</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-12"></div>

                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Tugas Akhir</th>
                                        <th scope="col">Status TA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($mahasiswas as $mahasiswa)
                                    <tr>
                                        <td>{{$mahasiswa->nim}}</td>
                                        <td>{{$mahasiswa->nama}}</td>
                                        <td>{{$mahasiswa->kelas}}</td>
                                        <td>
                                            <a href="{{route('dosen.managemen.show',$mahasiswa->nim)}}" class="btn btn-sm btn-primary">Lihat</a>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-secondary">{{$mahasiswa->judul_tugas_akhir->status_ta}}</button>
                                        </td>
                                    </tr>
                                    @empty
                                    <td>Tidak ada data</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer py-4">
                            <nav
                                class="d-flex justify-content-end"
                                aria-label="..."
                            ></nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
