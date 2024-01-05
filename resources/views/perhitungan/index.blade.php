@extends('layouts.app')
@section('page_title', 'Data Perhitungan')
@section('content')

    <!-- Table Index Nilai -->
    @foreach ($aspek as $ap)
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Aspek {{ $ap->keterangan }}</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="bg-blue">
                            <th>#</th>
                            <th>Alternatif</th>
                            @foreach ($ap->kriteria as $kr)
                                <th>{{ $kr->kode_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatif as $al)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $al->nama }}</td>
                                @foreach ($ap->penilaian as $n)
                                    {{-- @dump($n->alternatif_id,$al->id) --}}
                                    {{-- nilai untuk berdasarkan alternatif_ID --}}
                                    @if ($n->alternatif_id == $al->id)
                                        <td>{{ $n->nilai }}</td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
    <!-- /table Index Nilai -->

    <!-- Table GAP -->
    @foreach ($aspek as $ap)
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Pemataan GAP Aspek {{ $ap->keterangan }} (Nilai Alternatif - Nilai Target)</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="bg-blue">
                            <th>#</th>
                            <th>Alternatif</th>
                            @foreach ($ap->kriteria as $kr)
                                <th>{{ $kr->kode_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatif as $al)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $al->nama }}</td>
                                @foreach ($gap as $item)
                                    {{-- @dump(  $item->aspek_id) --}}
                                    @if ($item->alternatif_id == $al->id && $item->aspek_id == $ap->id)
                                        <td>{{ $item->hasil }}</td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
    <!-- /table GAP -->


    <!-- Bordered striped table -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Bobot Nilai GAP</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>


        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr align="center" class="bg-blue">
                        <th>Selisih</th>
                        <th>Nilai Bobot</th>
                        <th>Keterangan</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($konversi as $kv)
                        <tr align="center">
                            <td>{{ $kv->selisih }}</td>
                            <td>{{ $kv->nilai_bobot }}</td>
                            <td>{{ $kv->keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /bordered striped table -->

    <!-- Table Konversi Gap -->
    @foreach ($aspek as $ap)
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Pembobotan GAP Aspek {{ $ap->keterangan }}</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="bg-blue">
                            <th>#</th>
                            <th>Alternatif</th>
                            @foreach ($ap->kriteria as $kr)
                                <th>{{ $kr->kode_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatif as $al)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $al->nama }}</td>
                                @foreach ($gap as $item)
                                    @if ($item->alternatif_id == $al->id && $item->aspek_id == $ap->id)
                                        {{-- @dump($item->selisih) --}}
                                        <td>{{ $item->selisih }}</td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
    <!-- /table Konversi Gap -->

    <!-- Table Perhitungan -->
    @php
        $total = [];
    @endphp
    @foreach ($aspek as $ap)
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Perhitungan & Pengelompokan Core dan Secondary Factor {{ $ap->keterangan }}</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="bg-blue">
                            <th>#</th>
                            <th>Alternatif</th>
                            <th>Core Factor N<sub>CF</sub>(i)</th>
                            <th>Secondary Factor N<sub>SF</sub>(i)</th>
                            <th>Nilai Total N(i)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatif as $item)
                            @php
                                $core = core_factor($gap, $item->id, $ap->id);
                                $second = secondary_factor($gap, $item->id, $ap->id);
                                $total[$item->id][$ap->id] = t_nilai($core, $second, $ap);
                                // @dump($total[$item->id][$ap->id]);
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td> {{ $core }} </td>
                                <td> {{ $second }} </td>
                                <td> {{ $total[$item->id][$ap->id] }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
    <!-- /table Perhitungan -->


    <!-- Table Perhitungan Total Semua Aspek -->

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Perhitungan Total Semua Aspek</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="bg-blue">
                        <th>#</th>
                        <th>Alternatif</th>
                        @foreach ($aspek as $ap)
                            <th> {{ $ap->keterangan }} ({{ $ap->persentase }}%)</th>
                        @endforeach
                        <th>Nilai Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatif as $item)
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>

                        @foreach ($aspek as $ap)
                            <td>{{ $total[$item->id][$ap->id] }}</td>
                        @endforeach


                        <td>{{ ts_nilai($total[$item->id], $aspek, $item->id) }} </td>
                        {{-- @dump($aspek->toArray()) --}}



                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>

    <!-- /table Perhitungan Total Semua Aspek -->



@endsection
