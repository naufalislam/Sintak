
<!-- Modal -->
<div class="modal fade" id="tambahKaprodi" tabindex="-1" role="dialog" aria-labelledby="tambahKaprodiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="tambahKaprodiLabel">Tambah Kaprodi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                {!! Form::open(['route'=>'admin.master.kaprodi.store','id'=>'form-tambah-kap']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::text('nama', '', ['class'=>'form-control form-control-alternative','placeholder'=>'Nama']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::email('email', '', ['class'=>'form-control form-control-alternative','placeholder'=>'Email']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::password('password', ['class'=>'form-control form-control-alternative','placeholder'=>'Password']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::password('password_confirmation', ['class'=>'form-control form-control-alternative','placeholder'=>'Konfirmasi password']) !!}
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
