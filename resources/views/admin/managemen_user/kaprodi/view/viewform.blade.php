{!! Form::open(['route'=>['admin.managemen.kaprodi.destroy',$data->id],'method'=>'delete']) !!}
<a class="btn btn-sm btn-icon btn-2 btn-warning" type="button" href="{{route('admin.managemen.kaprodi.edit',$data->id)}}">
                                                <span class="btn-inner--icon text-white"><i class="ni ni-settings-gear-65 text-white"></i>Ubah</span>
                                            </a>

        <button class='btn btn-sm btn-icon btn-2 btn-danger' type='submit' onclick="return confirm('Apakah anda ingin menghapus data ini?')">
        <span class='btn-inner--icon text-white'><i class='ni ni-fat-remove text-white'></i>Hapus</span>
        </button>
{!! Form::close() !!}