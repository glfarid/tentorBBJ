<div id="modal_form_horizontal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Konversi</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form id="form_tambah" action="{{ route('konversi.store') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="modal-body kelas">
                    <div class="form-group row">
                        <label class="col-form-label">Selisih</label>
                        <div class="col-sm-12">
                            <input type="number" min="-4" max="4" name="selisih" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label">Nilai Bobot</label>
                        <div class="col-sm-12">
                            <input type="number" step="0.1" name="nilai_bobot" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label">Keterangan</label>
                        <div class="col-sm-12">
                            <input type="text" name="keterangan" class="form-control" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-dark">Submit form</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Create -->

<!-- Edit -->
@if(!empty($kv))
<div id="edit_konversi{{ $kv->id }}" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Konversi</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form id="form_edit_konversi" action="{{ route('konversi.update',$kv->id) }}" method="POST" class="form-horizontal">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Selisih</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="selisih" value="{{ $kv->selisih }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Nilai Bobot</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nilai_bobot" value="{{ $kv->nilai_bobot }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="keterangan" value="{{ $kv->keterangan }}">
                        </div>
                    </div>

               
                </div>

                <div class="modal-footer">
                    <button type="button" form="form_edit_aspek" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-dark">Submit form</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
<!-- /Edit -->