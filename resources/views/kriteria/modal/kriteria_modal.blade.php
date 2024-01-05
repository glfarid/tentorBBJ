<!-- Create -->

<div id="create_kriteria-{{ $value->id }}" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $value->keterangan }}</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{ route('kriteria.store') }}" method="POST" class="form-horizontal">
                @csrf
                <input type="hidden" name="aspek_id" value="{{ $value->id }}">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Kode</label>
                        <div class="col-sm-9">
                            <input type="text" name="kode_kriteria" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Nama Kriteria</label>
                        <div class="col-sm-9">
                            <input type="text" name="deskripsi" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Nilai</label>
                        <div class="col-sm-9">
                            <input autocomplete="off" type="number" id="nilai" min="1" max="5" name="nilai" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Jenis</label>
                        <div class="col-sm-9">
                            <select name="jenis" class="form-control" required>
                                <option value="">--Pilih Jenis Kriteria--</option>
                                <option value="Core Factor">Core Factor</option>
                                <option value="Secondary Factor">Secondary Factor</option>
                            </select>
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
@if(!empty($value_kriteria))
<div id="edit_kriteria-{{$value_kriteria->id}}" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{ route('kriteria.update',$value_kriteria->id) }}" method="POST" class="form-horizontal">
                @method('put')
                @csrf
                
                <div class="modal-body">
                    <input type="hidden" name="aspek_id" value="{{ $value_kriteria->id }}">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Kode</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="kode_kriteria"
                                value="{{ $value_kriteria->kode_kriteria }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Nama Kriteria</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="deskripsi"
                                value="{{ $value_kriteria->deskripsi }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Nilai</label>
                        <div class="col-sm-9">
                            <input type="number" min="1" max="5" class="form-control" name="nilai"
                                value="{{ $value_kriteria->nilai }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Jenis</label>
                        <div class="col-sm-9">
                            <select name="jenis" class="form-control" required>
                                <option value="Core Factor" {{ $value_kriteria->jenis == 'Core Factor' ? 'selected' : '' }}>Core
                                    Factor</option>
                                <option value="Secondary Factor"
                                    {{ $value_kriteria->jenis == 'Secondary Factor'? 'selected' : '' }}>Secondary Factor</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" form="form_edit_kriteria" class="btn btn-link"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-dark">Submit form</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
<!-- /Edit -->
