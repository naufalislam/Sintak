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
                            <div class="row">
                                <div class="col-12">
                                    <a id="btn-tambah-mhs" data-toggle="modal" data-target="#tambahMahasiswa" href="" class="btn btn-sm btn-secondary text-green">
                                        Tambah Judul
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12"></div>

                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Manfaat</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tas as $jdl)
                                    <tr>
                                        <td>{{$jdl->nim}}</td>
                                        <td>{{$jdl->judul}}</td>
                                        <td>{{$jdl->deskripsi}}</td>
                                        <td>{{$jdl->manfaat}}</td>
                                        <td>{{$jdl->status_ta}}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a
                                                    class="btn btn-sm btn-icon-only text-light"
                                                    href="#"
                                                    role="button"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{route('dosen.managemen.edit', $jdl->id)}}">Edit</a>
                                                    <form action="{{ route('dosen.managemen.destroy',$jdl->id) }}" method="POST">
                                                    	@csrf
									                    @method('DELETE')

									      				<button type="submit" class="btn btn-danger">Delete</button>
									                </form>
                                                    <!-- <a class="dropdown-item" href="{{route('dosen.managemen.destroy',$jdl->nim)}}">Delete</a> -->
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <td>Tidak ada data</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer py-4">
                                {{$tas->render()}}
                            <nav
                                class="d-flex justify-content-end"
                                aria-label="..."
                            ></nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    {{-- @include('layouts.footers.auth') --}}

	<div class="modal fade" id="tambahMahasiswa" tabindex="-1" role="dialog" aria-labelledby="tambahMahasiswaLabel" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	              <h5 class="modal-title" id="tambahMahasiswaLabel">Tambah Judul</h5>
	              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	              </button>
	            </div>
	            {!! Form::open(['route'=>'dosen.managemen.store','id'=>'form-tambah-jdl']) !!}
	            <div class="modal-body">
	                <div class="form-group">
	                    {!! Form::text('nim', '', ['class'=>'form-control form-control-alternative','placeholder'=>'NIM']) !!}
	                </div>
	                <div class="form-group">
	                    {!! Form::text('judul', '', ['class'=>'form-control form-control-alternative','placeholder'=>'Judul']) !!}
	                </div>
	                <div class="form-group">
	                    {!! Form::textarea('deskripsi', '', ['class'=>'form-control form-control-alternative','placeholder'=>'Deskripsi']) !!}
	                </div>
	                <div class="form-group">
	                    {!! Form::textarea('manfaat', '', ['class' => 'form-control form-control-alternative','placeholder'=>'Manfaat']) !!}
	                </div>
	                <div class="form-group">
	                    {!! Form::select('status_ta',['menunggu'=>'menunggu','ditolak'=>'ditolak','diterima'=>'diterima'], '', ['class'=>'form-control form-control-alternative','placeholder'=>'Status TA']) !!}
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	                <button type="submit" class="btn btn-primary">Save changes</button>
	            </div>
	            {!! Form::close() !!}
	        </div>
	    </div>
	</div>


    <script>
        document.getElementById("btn-tambah-mhs").addEventListener("click", function(){
            document.getElementById("form-tambah-mhs").reset();
        });
    </script>
@endsection
