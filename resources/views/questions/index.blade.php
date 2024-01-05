@extends('layouts.app')
@section('page_title', 'Questions')
@section('content')
    <!-- Table header styling -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title"></h5>
            <div class="header-elements">
                <div class="list-icons">
                    <button type="button" class="btn bg-dark btn-labeled btn-labeled-left" data-toggle="modal"
                        data-target="#modal_form_questions"><b><i class="icon-add"></i></b>
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
                    @foreach ($Questions as $qs)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $qs->soal }}</td>
                            <td class="text-center">

                                <form id="delete_{{ $qs->id }}" action="{{ route('questions.destroy', $qs->id) }}"
                                    method="POST">
                                    @method('delete')
                                    @csrf

                                </form>

                                <div class="btn-group mr-2">
                                    <button class="btn bg-dark btn-labeled btn-labeled mr-2" data-toggle="modal"
                                        data-target="#edit_questions-{{ $qs->id }}"><i
                                            class="icon-pencil7"></i></button>
                                    <button onclick="document.querySelector('#delete_{{ $qs->id }}').submit()"
                                        class="btn bg-dark btn-labeled btn-labeled"><i
                                            class="icon-x"></i></a>
                                </div>
                            </td>
                        </tr>
                        @include('questions.modal.questions_modal')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('questions.modal.questions_modal')

    <!-- /table header styling -->

@endsection
