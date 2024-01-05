@extends('layouts.app')
@section('page_title', 'Data Hasil Akhir')
@section('content')


    <!-- Table header styling -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Hasil Akhir Perangkingan</h5>
            <div class="header-elements">
                <div class="list-icons">
                    {{-- <a class="list-icons-item" data-action="collapse"></a>  --}}
                    <div class="list-icons">
                        {{-- <button type="button" class="btn bg-dark btn-labeled btn-labeled-left" data-toggle="modal"
                            data-target="#modal_form_horizontal"><b><i class="icon-add"></i></b>
                            Cetak  --}}
                            <a href="{{ route('laporan') }}" class="btn bg-dark"> <i class="icon-printer2"></i> Cetak Data </a>
                        </div>

                </div>
            </div>
        </div>

    

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="bg-blue">
                        <th>Nama Alternatif</th>
                        <th>Total Nilai</th>
                        <th>Seleksi</th>
                    </tr>
                </thead> 
                <tbody>
                    @foreach ($total as $al)
                        <tr>
                            <td>{{ $al->alternatif->nama }}</td>
                            <td>{{ $al->total }}</td>
                            <td>{{ $loop->iteration }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <!-- /table header styling -->


@endsection
