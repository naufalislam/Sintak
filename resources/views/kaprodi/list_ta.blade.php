@extends('layouts.app',['navTitle' => 'List Tugas Akhir'])

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
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Tugas Akhir</h3>
                                </div>
                                <div class="col text-right">
                                </div>
                            </div>
                        </div>

                        <div class="col-12"></div>

                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush data-table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Status TA</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @forelse ($list_ta as $ta)
                                    <tr>
                                        <td>{{$ta->mahasiswa->nim}}</td>
                                        <td>{{$ta->mahasiswa->nama}}</td>
                                        <td>{{$ta->judul}}</td>
                                        <td>
                                            <button class="btn btn-sm btn-secondary">{{$ta->status_ta}}</button></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-icon btn-2 btn-primary" type="button" href="{{route('kaprodi.TA.show',$ta->id)}}">
                                                <span class="btn-inner--icon text-white"><i class="ni ni-settings-gear-65 text-white"></i>Detail</span>
                                            </a>
                                            @if ($ta->status_ta != 'diterima')
                                            {!! Form::open(['route'=>['kaprodi.TA.destroy',$ta->id],'method'=>'delete']) !!}
                                            <button class="btn btn-sm btn-icon btn-2 btn-danger" type="submit" onclick="return confirm('Yakin?')">
                                                <span class="btn-inner--icon text-white"><i class="ni ni-fat-remove text-white"></i>hapus</span>
                                            </button>
                                            {!! Form::close() !!}
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                        <td>Tidak ada data</td>
                                    @endforelse --}}
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="card-footer py-4">
                                {{$list_ta->render()}}
                            <nav
                                class="d-flex justify-content-end"
                                aria-label="..."
                            ></nav>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- @include('admin.managemen_user.mahasiswa.modal.aksi') --}}
@endsection
@push('js')
<script>
    $(function(){
            const table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('kaprodi.TA.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'nim', name: 'nim'},
                    {data: 'nama', name: 'nama'},
                    {data: 'judul', name: 'judul'},
                    {data: 'status_ta', name: 'status_ta'},
                    {data: 'aksi', name: 'aksi', orderable: false, searchable: false},
                ]
            })
        })
</script>
@endpush
