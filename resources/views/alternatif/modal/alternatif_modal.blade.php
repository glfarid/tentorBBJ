<div id="modal_form_horizontal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Alternatif</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form id="form_tambah" action="{{ route('alternatif.store') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="modal-body kelas">
                    <div class="form-group row">
                        <label class="col-form-label">Nama Alternatif</label>
                        <div class="col-sm-12">
                            <input type="text" name="nama" class="form-control" required>
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
@if(!empty($data))
<div id="edit_alternatif-{{ $data->id }}" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Alternatif</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form id="form_edit_alternatif" action="{{ route('alternatif.update',$data->id) }}" method="POST" class="form-horizontal">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Nama Alternatif</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama" value="{{ $data->nama }}">
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