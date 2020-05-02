{!! Form::open(['route'=>['admin.managemen.mahasiswa.destroy',$data->nim],'method'=>'delete']) !!}
<a class="btn btn-sm btn-icon btn-2 btn-warning" type="button" href="{{route('admin.managemen.mahasiswa.edit',$data->nim)}}">
    <span class="btn-inner--icon text-white"><i class="ni ni-settings-gear-65 text-white"></i>Ubah</span>
</a>
<button class="btn btn-sm btn-icon btn-2 btn-danger" type="submit" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
         <span class="btn-inner--icon text-white"><i class="ni ni-fat-remove text-white"></i>Hapus</span>
</button>
{!! Form::close() !!}