<!-- Edit -->
@if (!empty($dp))
    <div id="edit_dpribadi{{ $dp->id }}" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Pribadi & Dokumen Perlengkapan</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form id="" action="{{ route('dpribadi.update', $dp->id) }}" method="POST"
                    class="form-horizontal" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">NIK</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nik" value="{{ $dp->nik }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Nama Lengkap (Sesuai KTP Anda)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" value="{{ $dp->nama }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="jk" value="{{ $dp->jk }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Tempat Lahir CF</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="tempat_lahir"
                                    value="{{ $dp->tempat_lahir }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="tanggal_lahir"
                                    value="{{ $dp->tanggal_lahir }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="alamat" value="{{ $dp->alamat }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" value="{{ $dp->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">No Telp</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_telp" value="{{ $dp->no_telp }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Agama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="agama" value="{{ $dp->agama }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">CV :</label>
                            <div class="col-sm-9">
                                <input type="file" name="cv" accept=".pdf">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">KTP :</label>
                            <div class="col-sm-9">
                                <input type="file" name="ktp" accept=".pdf">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Surat Lamaran :</label>
                            <div class="col-sm-9">
                                <input type="file" name="surat_lamaran" accept=".pdf">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Sertifikat Toefl :</label>
                            <div class="col-sm-9">
                                <input type="file" name="sertifikat_teofl" accept=".pdf">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Foto :</label>
                            <div class="col-sm-9">
                                <input type="file" name="foto" accept=".pdf">
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Link :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="link" value="{{ $dp->link }}">
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" form="form_edit_dpribadi" class="btn btn-link"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-dark">Submit form</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endif
<!-- /Edit -->
