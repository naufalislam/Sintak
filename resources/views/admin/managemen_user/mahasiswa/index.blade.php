@extends('layouts.app',['navTitle' => 'Managemen user / Mahasiswa'])

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
                            </div>
                            <div class="row">
                            </div>
                        </div>

                        <div class="col-12"></div>

                        <div class="table-responsive p-3">
                            <table class="table data-table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    {{-- @include('layouts.footers.auth') --}}

    @push('js')
    <script>

        $(function(){
            const table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.managemen.mahasiswa.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'nama', name: 'nama'},
                    {data: 'nim', name: 'nim'},
                    {data: 'aksi', name: 'aksi', orderable: false, searchable: false},
                ]
            })
        })
    </script>
    @endpush
@endsection
