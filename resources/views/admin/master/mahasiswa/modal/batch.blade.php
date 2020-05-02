
<!-- Modal -->
<div class="modal fade" id="tambahBatch" tabindex="-1" role="dialog" aria-labelledby="tambahBatchLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="tambahBatchLabel">Tambah Batch Mahasiswa</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                {!! Form::open(['route'=>'admin.master.mahasiswa.store','id'=>'form-tambah-batch','files'=>true]) !!}
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::file('file',['class'=>'form-control form-control-alternative','placeholder'=>'File']) !!}
                        <small class="text-nowrap">File harus <strong>.json</strong></small>
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
