
<!-- Modal -->
<div class="modal fade" id="aksiManage" tabindex="-1" role="dialog" aria-labelledby="aksiManageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="aksiManageLabel">Manage Mahasiswa</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <a href="{{route('admin.managemen.mahasiswa.show')}}" type="button" class="btn btn-lg btn-success btn-block">Ubah password</a>
                        <a href="{{route('admin.managemen.mahasiswa.show')}}" type="button" class="btn btn-lg btn-warning btn-block">Edit profile</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
