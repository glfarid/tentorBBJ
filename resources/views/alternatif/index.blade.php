@extends('layouts.app')
@section('page_title', 'Data Alternatif')
@section('content')

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header header-elements-inline mb-3">
            <h5 class="card-title">{{ $title }}</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <button type="button" class="btn bg-dark btn-labeled btn-labeled-left" data-toggle="modal"
                        data-target="#modal_form_horizontal"><b><i class="icon-add"></i></b>
                        Tambah
                    </button>

                </div>
            </div>
        </div>

        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Alternatif</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alternatif as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama }}</td>
                        <td class="text-center">

                            {{-- <form id="delete_{{ $data->id }}" action="{{ route('alternatif.destroy', $data->id) }}"
                                method="POST">
                                @method('delete')
                                @csrf

                            </form> --}}

                            <div class="btn-group mr-2">
                                <button class="btn bg-dark btn-labeled btn-labeled mr-2" data-toggle="modal"
                                    data-target="#edit_alternatif-{{ $data->id }}"><i class="icon-pencil7"></i></button>
                                {{-- <button onclick="document.querySelector('#delete_{{ $data->id }}').submit()"
                                    class="btn bg-dark btn-labeled btn-labeled"><i class="icon-x"></i></a> --}}

                                    <a href="{{ route('alternatifDelete', $data->id) }}"
                                        class="btn bg-dark btn-labeled btn-labeled delete"><i class="icon-x"></i></a>
                            </div>
                        </td>
                    </tr>
                    @include('alternatif.modal.alternatif_modal')
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

    @include('alternatif.modal.alternatif_modal')
@endsection
