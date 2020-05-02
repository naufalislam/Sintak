
<!-- Modal -->
<div class="modal fade" id="tambahMahasiswa" tabindex="-1" role="dialog" aria-labelledby="tambahMahasiswaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tambahMahasiswaLabel">Tambah Mahasiswa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            {!! Form::open(['route'=>'admin.master.mahasiswa.store','id'=>'form-tambah-mhs']) !!}
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::text('nama', '', ['class'=>'form-control form-control-alternative','placeholder'=>'Nama']) !!}
                </div>
                <div class="form-group">
                    {!! Form::text('nim', '', ['class'=>'form-control form-control-alternative','placeholder'=>'NIM']) !!}
                </div>
                <div class="form-group">
                    {!! Form::text('semester', '', ['class'=>'form-control form-control-alternative','placeholder'=>'Semester']) !!}
                </div>
                <div class="form-group">
                    {!! Form::select('kelas', ['A'=>'A','B'=>'B','C'=>'C','D'=>'D'], '', ['class' => 'form-control form-control-alternative','placeholder'=>'Kelas']) !!}
                </div>
                <div class="form-group">
                    {!! Form::text('tahun', '', ['class'=>'form-control form-control-alternative','placeholder'=>'Tahun']) !!}
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
