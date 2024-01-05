@extends('layouts.app')
@section('page_title', 'Data Konversi GAP')
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            <span class="font-weight-semibold">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header header-elements-inline mb-3">
            <h5 class="card-title">{{ $title }}</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <button type="button" class="btn bg-dark btn-labeled btn-labeled-left" data-toggle="modal"
                        data-target="#modal_form_horizontal"><b><i class="icon-add"></i></b>
                        Tambah
                </div>
            </div>
        </div>


        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>Selisih</th>
                    <th>Nilai Bobot</th>
                    <th>Keterangan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($konversi as $kv)
                    <tr>
                        <td>{{ $kv->selisih }}</td>
                        <td>{{ $kv->nilai_bobot }}</td>
                        <td>{{ $kv->keterangan }}</td>
                      <td>
                        <form id="delete_{{ $kv->id }}" action="{{ route('konversi.destroy', $kv->id) }}"
                            method="POST">
                            @csrf
                            @method('delete')

                        </form>

                        <div>
                            <button class="btn bg-dark btn-labeled btn-labeled" data-toggle="modal"
                                data-target="#edit_konversi{{ $kv->id }}"><i class="icon-pencil7"></i></button>
                            <button onclick="document.querySelector('#delete_{{ $kv->id }}').submit()"
                                class="btn bg-dark btn-labeled btn-labeled" id="delete"><i class="icon-x"></i></a>
                            {{-- <a href="{{ route('aspekDelete', $ap->id) }}"
                                class="btn bg-dark btn-labeled btn-labeled delete"><i class="icon-x"></i></a> --}}
                        </div>
                      </td>

                        
                         

                    </tr>


                    @include('konversi.modal.konversi_modal')
                @endforeach


            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

    @include('konversi.modal.konversi_modal')

@endsection
