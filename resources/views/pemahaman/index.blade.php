@extends('layouts.app')
@section('page_title', 'Tes Pemahaman')
@section('content')
    <!-- Table header styling -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title"></h5>
            <div class="header-elements">
                <div class="list-icons">
                    <button type="button" class="btn bg-dark btn-labeled btn-labeled-left" data-toggle="modal"
                        data-target="#modal_form_pemahaman"><b><i class="icon-add"></i></b>
                        Tambah
                    </button>
                </div>
            </div>
        </div>



        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="bg-blue">
                        <th>No</th>
                        <th>Soal</th>
                        <th class="text-center">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($pem as $pm)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pm->soal }}</td>
                            <td class="text-center">

                                <form id="delete_{{ $pm->id }}" action="{{ route('questionspemahaman.destroy', $pm->id) }}"
                                    method="POST">
                                    @method('delete')
                                    @csrf

                                </form>

                                <div class="btn-group mr-2">
                                    <button class="btn bg-dark btn-labeled btn-labeled mr-2" data-toggle="modal"
                                        data-target="#edit_pemahaman-{{ $pm->id }}"><i
                                            class="icon-pencil7"></i></button>
                                    <button onclick="document.querySelector('#delete_{{ $pm->id }}').submit()"
                                        class="btn bg-dark btn-labeled btn-labeled" id="delete"><i
                                            class="icon-x"></i></a>
                                </div>
                            </td>
                        </tr>
                        @include('pemahaman.modal.pemahaman_modal')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('pemahaman.modal.pemahaman_modal')

    <!-- /table header styling -->

@endsection
