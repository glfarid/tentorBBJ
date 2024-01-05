@extends('layouts.app')
@section('page_title', 'Data Penilaian')
@section('content')

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header header-elements-inline mb-3">
            <h5 class="card-title">{{ $title }}</h5>
            <div class="header-elements">

            </div>
        </div>


        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Alternatif</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>

                @forelse  ($alternatif as $alt)


                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alt->nama }}</td>
                        <td class="text-center">
                            {{-- @dump($nilai->firstwhere('alternatif_id',$alt->id)) --}}
                            @php
                                $edit = $nilai->firstwhere('alternatif_id', $alt->id);

                            @endphp

                            @if (!$edit)
                                <a data-toggle="modal" href="#set{{ $alt->id }}" class="btn btn-success btn-sm"><i
                                        class="fa fa-plus"></i> Input</a>
                            @else
                                <a data-toggle="modal" href="#edit{{ $alt->id }}" class="btn btn-warning btn-sm"><i
                                        class="fa fa-edit"></i> Edit</a>
                            @endif

                        </td>
                    </tr>

                    <div class="modal fade" id="set{{ $alt->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Input Penilaian
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <form action="{{ route('penilaian.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        @forelse ($aspek as $ap)
                                            <span class="badge badge-primary">{{ $ap->keterangan }}</span>
                                            <hr />
                                            @forelse ($ap->kriteria as $krt)
                                                <input type="hidden" name="id_alternatif" value="{{ $alt->id }}">
                                                <input type="hidden" name="id_aspek[]" value="{{ $krt->aspek_id }}">
                                                <input type="hidden" name="id_kriteria[]" value="{{ $krt->id }}">
                                                <div class="row">
                                                    <div class="form-group col-md-1"></div>
                                                    <div class="form-group col-md-9">
                                                        <label class="font-weight-bold">({{ $krt->kode_kriteria }})
                                                            {{ $krt->deskripsi }}</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <input autocomplete="off" type="number" min="1"
                                                            max="5" name="nilai[]" required class="form-control" />
                                                    </div>
                                                </div>
                                            @empty
                                                Inputkan Kriteria
                                            @endforelse
                                        @empty
                                            <p>Inputkan Menu Aspek Dan Kriteria</p>
                                        @endforelse
                                    </div>
                                    <div class="modal-footer">
                                        @if (count($aspek) > 0 && count($aspek->pluck('kriteria')->collapse()) > 0)
                                            <button type="button" class="btn btn-warning" data-dismiss="modal"><i
                                                    class="fa fa-times"></i> Batal</button>
                                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                                                Simpan</button>
                                        @else
                                            <button type="button" class="btn btn-warning" data-dismiss="modal"><i
                                                    class="fa fa-times"></i> Close</button>
                                        @endif
                                    </div>
                                </form>
                                {{-- <form action="{{ route('penilaian.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        @forelse ($aspek as $ap)
                                          
                                            <span class="badge badge-primary">{{ $ap->keterangan }}</span>
                                            <hr />
                                            @foreach ($ap->kriteria as $krt)
                                                <input type="hidden" name="id_alternatif" value="{{ $alt->id }}">
                                                <input type="hidden" name="id_aspek[]" value="{{ $krt->aspek_id }}">
                                                <input type="hidden" name="id_kriteria[]" value="{{ $krt->id }}">
                                                <div class="row">
                                                    <div class="form-group col-md-1"></div>
                                                    <div class="form-group col-md-9">
                                                        <label class="font-weight-bold">({{ $krt->kode_kriteria }})
                                                            {{ $krt->deskripsi }}</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <input autocomplete="off" type="number" min="1"
                                                            max="5" name="nilai[]" required class="form-control" />
                                                    </div>
                                                </div>
                                            @endforeach
                                         
                                        @empty
                                            Inputkan Menu Aspek Dan Kriteria
                                        @endforelse
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i
                                                class="fa fa-times"></i> Batal</button>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                                            Simpan</button>
                                    </div>
                                </form> --}}
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="edit{{ $alt->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Edit Penilaian
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <form action="{{ route('penilaian.update') }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="modal-body">
                                        @forelse ($aspek as $ap)
                                            {{-- @if ($ap->kriteria != null) --}}
                                            <span class="badge badge-primary">{{ $ap->keterangan }}</span>
                                            <hr />
                                            @foreach ($nilai as $nl)
                                                @if ($nl->alternatif_id == $alt->id)
                                                    @if ($ap->id == $nl->aspek_id)
                                                        <input type="hidden" name="id_alternatif"
                                                            value="{{ $alt->id }}">
                                                        <input type="hidden" name="id_aspek[]"
                                                            value="{{ $ap->id }}">
                                                        <input type="hidden" name="id_kriteria[]"
                                                            value="{{ $nl->kriteria_id }}">
                                                        <div class="row">
                                                            <div class="form-group col-md-1"></div>
                                                            <div class="form-group col-md-9">
                                                                <label class="font-weight-bold">({{ $nl->kode_kriteria }})
                                                                    {{ $nl->kriteria }}</label>
                                                            </div>


                                                            <div class="form-group col-md-2">
                                                                <input autocomplete="off" type="number" min="1"
                                                                    max="5" name="nilai[]"
                                                                    value="{{ $nl->nilai }}" required
                                                                    class="form-control" />
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @empty
                                        @endforelse
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i
                                                class="fa fa-times"></i> Batal</button>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                                            Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="3">
                            Inputkan Data Alternatif Terlebih Dahulu
                        </td>
                    </tr>
                @endforelse


            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

@endsection
