@extends('layouts.app')
@section('page_title', 'Data Response Tes Pemahaman Peserta')
@section('content')


    <!-- Content area -->
    <div class="content">

        <!-- Text color options -->
        <div class="card">
          


            <div class="table-responsive">
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th style="width: 20%;">No</th>
                            <th style="width: 20%;">Soal</th>
                            <th class="text-center">Jawaban</th>
                        </tr>
                    </thead>
                    @foreach ($jawabanpemahaman as $jbp)
                        <tbody>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jbp->questions_pemahaman->soal}}</td>
                                <td>
                                    <div class="col-lg-10">
                                        <textarea  class="form-control" placeholder="Default textarea">{{ $jbp->response }}</textarea>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        <!-- /text color options -->




    </div>
    <!-- /content area -->

@endsection
