@extends('layouts.app')
@section('page_title', 'Data Aspek')
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
                    <th>No</th>
                    <th>Kode Aspek</th>
                    <th>Nama Aspek</th>
                    <th>Persentase %</th>
                    <th>Bobot Core Factore %</th>
                    <th>Bobot Secondary Factore %</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aspek as $ap)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ap->kode_aspek }}</td>
                        <td>{{ $ap->keterangan }}</td>
                        <td>{{ $ap->persentase }}</td>
                        <td>{{ $ap->bobot_cf }}</td>
                        <td>{{ $ap->bobot_sf }}</td>
                        <td class="text-center">
                            {{-- <form id="delete_{{ $ap->id }}" action="{{ route('aspek.destroy', $ap->id) }}"
                                method="POST">
                                @csrf
                                @method('delete')

                            </form> --}}

                            <div>
                                <button class="btn bg-dark btn-labeled btn-labeled" data-toggle="modal"
                                    data-target="#edit_aspek{{ $ap->id }}"><i class="icon-pencil7"></i></button>
                                {{-- <button onclick="document.querySelector('#delete_{{ $ap->id }}').submit()"
                                    class="btn bg-dark btn-labeled btn-labeled" id="delete"><i class="icon-x"></i></a> --}}
                                <a href="{{ route('aspekDelete', $ap->id) }}"
                                    class="btn bg-dark btn-labeled btn-labeled delete"><i class="icon-x"></i></a>
                            </div>

                            <div class="success" data-success="{{ Session::get('success') }}"></div>

                    </tr>


                    @include('aspek.modal.aspek_modal')
                @endforeach


            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

    @include('aspek.modal.aspek_modal')

@endsection
