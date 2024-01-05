<div id="modal_form_questions" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Soal</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form id="form_tambah" action="{{ route('questions.store') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="modal-body kelas">
                    <div class="form-group row">
                        <label class="col-form-label">Soal</label>
                        <div class="col-sm-12">
                            <input type="text" name="soal" class="form-control" required>
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
@if(!empty($qs))
<div id="edit_questions-{{ $qs->id }}" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Questions</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form id="form_edit_questions" action="{{ route('questions.update',$qs->id) }}" method="POST" class="form-horizontal">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Soal</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="soal" value="{{ $qs->soal }}">
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