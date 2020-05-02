
<!-- Modal -->
<div class="modal fade" id="tambahTA" tabindex="-1" role="dialog" aria-labelledby="tambahTALabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="tambahTALabel">Tambah Judul Tugas Akhir</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                {!! Form::open(['route'=>'mahasiswa.TA.store','id'=>'form-tambah-ta']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::text('judul', '', ['class'=>'form-control form-control-alternative','placeholder'=>'Judul Tugas Akhir']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::textarea('deskripsi', '', ['class'=>'form-control form-control-alternative','placeholder'=>'Deksripsi']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::textarea('manfaat','', ['class'=>'form-control form-control-alternative','placeholder'=>'Manfaat']) !!}
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
