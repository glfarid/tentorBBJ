@extends('layouts.app')
@section('page_title', 'Data Kriteria')
@section('content')



    @if (count($aspek) == 0)
        <div class="card">

            <div class="card-header header-elements-inline bg-primary">
                <h5 class="card-title">Daftar Data Kriteria </h5>
                <div class="header-elements">
                    <div class="list-icons">

                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="alert alert-info">
                    Data masih kosong.
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            <span class="font-weight-semibold">Info!</span> <span> Setiap Masing Kriteria Harus Mempunyai Jenis Core Dan
                Secondary </span>
        </div>
    @endif


    @if (Session::get('success'))
        <div class="alert alert-info">
            <span class="font-weight-semibold">{{ Session::get('success') }}</span>
        </div>
    @endif




    @foreach ($aspek as $value)
        <div class="card">


            <div class="card-header header-elements-inline bg-primary">

                <h5 class="card-title">{{ $value->keterangan }} ({{ $value->kode_aspek }}) </h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <button type="button" class="btn bg-dark btn-labeled btn-labeled-left" data-toggle="modal"
                            data-target="#create_kriteria-{{ $value->id }}"><b><i class="icon-add"></i></b>
                            Tambah
                        </button>
                        {{-- <a class="list-icons-item" data-action="collapse"></a> --}}
                    </div>
                </div>
            </div>
            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Kriteria</th>
                        <th>Nilai</th>
                        <th>Jenis</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($value->kriteria as $value_kriteria)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value_kriteria->kode_kriteria }}</td>
                            <td>{{ $value_kriteria->deskripsi }}</td>
                            <td>{{ $value_kriteria->nilai }}</td>
                            <td>{{ $value_kriteria->jenis }}</td>
                            <td class="text-center">

                                {{-- <form id="delete_{{ $value_kriteria->id }}"
                                    action="{{ route('kriteria.destroy', $value_kriteria->id) }}" method="POST">
                                    @method('delete')
                                    @csrf

                                </form> --}}

                                <div class="btn-group mr-2">
                                    <button class="btn bg-dark btn-labeled btn-labeled mr-2" data-toggle="modal"
                                        data-target="#edit_kriteria-{{ $value_kriteria->id }}"><i
                                            class="icon-pencil7"></i></button>
                                    {{-- <button type="submit"
                                        onclick="document.querySelector('#delete_{{ $value_kriteria->id }}').submit()"
                                        class="btn bg-dark btn-labeled btn-labeled delete"><i class="icon-x"></i></a> --}}

                                    <a href="{{ route('kriteriaDelete', $value_kriteria->id) }}"
                                        class="btn bg-dark btn-labeled btn-labeled delete"><i class="icon-x"></i></a>
                                </div>
                                <div class="success" data-success="{{ Session::get('success') }}"></div>

                            </td>
                        </tr>
                        @include('kriteria.modal.kriteria_modal')
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('kriteria.modal.kriteria_modal')
    @endforeach


@endsection
