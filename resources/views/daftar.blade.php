<form action="" method="get">
{!! Form::select('kelas', [''=>'semua', '6A'=>'6A','6B'=>'6B','6C'=>'6C','6D'=>'6D'], $kelas??$reqKelas, []) !!}
{!! Form::submit('cari', []) !!}
</form>
<table border="1px solid black">
    <thead>
        <th>Kelas</th>
        <th>Nama</th>
    </thead>
    <tbody>
        @foreach ($myArr as $arr)
            <tr>
                <td>{{$arr['kelas']}}</td>
                <td>{{$arr['nama']}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

