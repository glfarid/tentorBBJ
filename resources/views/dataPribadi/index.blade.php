@extends('layouts.app')
@section('page_title', 'Data Pribadi')
@section('content')

    <!-- Form validation -->
    @if (auth()->user()->usertype == 'Peserta' && count($dpribadi) < 1)
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Data Diri & Dokumen Perlengkapan</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <form class="form-validate-jquery" enctype="multipart/form-data" action="{{ route('dpribadi.store') }}"
                    method="POST">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Data Diri</legend>


                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">NIK :</label>
                            <div class="col-lg-9">
                                <input type="text" name="nik" class="form-control" required placeholder="NIK"
                                    value="{{ old('nik') }}">

                                @error('nik')
                                    <span class="text-warning">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Nama Lengkap (Sesuai KTP Anda) :</label>
                            <div class="col-lg-9">
                                <input type="text" name="nama" class="form-control" required
                                    placeholder="Nama Lengkap" value="{{ old('nama') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Jenis Kelamin :</label>
                            <div class="col-lg-9">
                                <input type="text" name="jk" class="form-control" required
                                    placeholder="Jenis Kelamin" value="{{ old('jk') }}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Tempat Lahir :</label>
                            <div class="col-lg-9">
                                <input type="text" name="tempat_lahir" class="form-control" required
                                    placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Tanggal Lahir :</label>
                            <div class="col-lg-9">
                                <input type="text" name="tanggal_lahir" class="form-control" required
                                    placeholder="ex : 09-09-1999" value="{{ old('tanggal_lahir') }}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Alamat :</label>
                            <div class="col-lg-9">
                                <input type="text" name="alamat" class="form-control" required
                                    placeholder="Alamat saat ini" value="{{ old('alamat') }}">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Email :</label>
                            <div class="col-lg-9">
                                <input type="email" name="email" class="form-control" required
                                    placeholder="budi@gmail.com" value="{{ old('email') }}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">No telp :</label>
                            <div class="col-lg-9">
                                <input type="number" name="no_telp" class="form-control" required
                                    placeholder="+628-218******" value="{{ old('no_telp') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Agama :</label>
                            <div class="col-lg-9">
                                <input type="text" name="agama" class="form-control" required placeholder="Agama"
                                    value="{{ old('agama') }}">
                            </div>
                        </div>


                        <legend class="text-uppercase font-size-sm font-weight-bold">Dokumen Kelengkapan</legend>


                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">CV: </label>

                            <div class="col-lg-9">
                                <span class="badge bg-warning" style="display: inline-block; margin-bottom: 5px;">PDF</span>
                                <br>
                                <input type="file" name="cv" class="form-input-styled" required data-fouc
                                    accept=".pdf">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">KTP :</label>
                            <div class="col-lg-9">
                                <span class="badge bg-warning"
                                    style="display: inline-block; margin-bottom: 5px;">PDF</span>
                                <br>
                                <input type="file" name="ktp" class="form-input-styled" required data-fouc
                                    accept=".pdf">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Surat Lamaran :</label>
                            <div class="col-lg-9">
                                <span class="badge bg-warning"
                                    style="display: inline-block; margin-bottom: 5px;">PDF</span>
                                <br>
                                <input type="file" name="surat_lamaran" class="form-input-styled" required data-fouc
                                    accept=".pdf">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Sertifikat Toefl :</label>
                            <div class="col-lg-9">
                                <span class="badge bg-warning"
                                    style="display: inline-block; margin-bottom: 5px;">PDF</span>
                                <br>
                                <input type="file" name="sertifikat_teofl" class="form-input-styled" required
                                    data-fouc accept=".pdf">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Foto :</label>
                            <div class="col-lg-9">
                                <span class="badge bg-warning"
                                    style="display: inline-block; margin-bottom: 5px;">PDF</span>
                                <br>
                                <input type="file" name="foto" class="form-input-styled" required data-fouc
                                    accept=".pdf">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Link :</label>
                            <div class="col-lg-9">
                                <input type="text" name="link" class="form-control" required
                                    placeholder="https://drive.google.com/1_4MjFPyeBkcGlkMQ-WF_73UH2bJfbORO"
                                    value="">
                            </div>
                        </div>


                    </fieldset>


                    <div class="d-flex justify-content-end align-items-center">
                        <button type="reset" class="btn btn-light" id="reset">Reset <i
                                class="icon-reload-alt ml-2"></i></button>
                        <button type="submit" class="btn btn-primary ml-3">Submit <i
                                class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    @endif
    <!-- /form validation -->


    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Data Diri & Dokumen Perlengkapan</h5>

        </div>

        <div class="card-body">

        </div>

        <table class="table datatable-basic fixed_header">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>No Telp</th>
                    <th>CV</th>
                    <th>KTP</th>
                    <th>Surat Lamaran</th>
                    <th>Sertifikat Toefl</th>
                    <th>Foto</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($dpribadi as $dp)
                    <tr>
                        <td>{{ $dp->nik }}</td>
                        <td>{{ $dp->nama }}</td>
                        <td>{{ $dp->email }}</td>
                        <td>{{ $dp->no_telp }}</td>
                        <td><a href="{{ asset('storage/dokumen/' . $dp->cv) }}" class="icon-eye2"></a></td>
                        {{-- <td><a href="{{ route('pdf',$dp->cv) }}">Download</a></td> --}}
                        <td><a href="{{ asset('storage/dokumen/' . $dp->ktp) }}" class="icon-eye2"></a></td>
                        <td><a href="{{ asset('storage/dokumen/' . $dp->surat_lamaran) }}" class="icon-eye2"></a></td>
                        <td><a href="{{ asset('storage/dokumen/' . $dp->sertifikat_teofl) }}" class="icon-eye2"></a></td>
                        <td><a href="{{ asset('storage/dokumen/' . $dp->foto) }}" class="icon-eye2"></a></td>
                        <td>{{ $dp->link }}</td>
                        <td><span
                                class="badge {{ $dp->status == 'Validasi' ? 'badge-success' : 'badge-danger' }}">{{ $dp->status }}</span>
                        </td>
                        <td class="text-center">

                            <form id="delete_{{ $dp->user_id }}" action="{{ route('dpribadi.destroy', $dp->user_id) }}"
                                method="POST">
                                @csrf
                                @method('delete')

                            </form>

                            <div class="btn-group mr-2">
                                <button class="btn bg-dark btn-labeled btn-labeled mr-2" data-toggle="modal"
                                    data-target="#edit_dpribadi{{ $dp->id }}"><i class="icon-eye2"></i></button>
                                <button onclick="document.querySelector('#delete_{{ $dp->user_id }}').submit()"
                                    class="btn bg-dark btn-labeled btn-labeled" id="delete"><i class="icon-x"></i></a>

                            </div>

                        </td>
                    </tr>
                    @include('dataPribadi.modal.dpribadi_modal')
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->
    @include('dataPribadi.modal.dpribadi_modal')


    <script>
        $('.fixed_header').DataTable({
            "paging": false,
            "scrollX": true,
            "info": false,
            "searching": false
        });
    </script>


@endsection
