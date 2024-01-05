<div id="modal_form_horizontal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Aspek</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form id="form_tambah" action="{{ route('aspek.store') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="modal-body kelas">
                    <div class="form-group row">
                        <label class="col-form-label">Kode Aspek</label>
                        <div class="col-sm-12">
                            <input type="text" name="kode_aspek" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label">Nama Aspek</label>
                        <div class="col-sm-12">
                            <input type="text" name="keterangan" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label">Persentase %</label>
                        <div class="col-sm-12">
                            <input type="number" name="persentase" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label">Bobot Core Factor (%)</label>
                        <div class="col-sm-12">
                            <input type="number" name="bobot_cf" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">

                        <label class="col-form-label">Bobot Secondary Factor (%)</label>
                        <div class="col-sm-12">
                            <input type="number" name="bobot_sf" class="form-control" required>
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
@if(!empty($ap))
<div id="edit_aspek{{ $ap->id }}" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Aspek</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form id="form_edit_aspek" action="{{ route('aspek.update',$ap->id) }}" method="POST" class="form-horizontal">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Kode Aspek</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="kode_aspek" value="{{ $ap->kode_aspek }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Nama Aspek</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name="keterangan"  value="{{ $ap->keterangan }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Persentase</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="persentase"  value="{{ $ap->persentase }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Bobot CF</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="bobot_cf"  value="{{ $ap->bobot_cf }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Bobot SF</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="bobot_sf"  value="{{ $ap->bobot_sf }}">
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