{!! Form::open(['route'=>['kaprodi.TA.destroy',$data->id],'method'=>'delete']) !!}
        <button class='btn btn-sm btn-icon btn-2 btn-danger' type='submit' onclick="return confirm('Yakin?')">
        <span class='btn-inner--icon text-white'><i class='ni ni-fat-remove text-white'></i>hapus</span>
        </button>
{!! Form::close() !!}
