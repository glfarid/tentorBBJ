@extends('layouts.app')
@section('page_title', 'Data Peserta')
@section('content')

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Data Peserta</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
        </div>

        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Peserta as $ps)
                    <tr>
                        <td>{{ $ps->nik }}</td>
                        <td>{{ $ps->nama }}</td>
                        <td>{{ $ps->email }}</td>
                        <td>
                            <div class="form-check form-check-switchery">
                                <label class="form-check-label">
                                    <input type="checkbox" id="status{{ $ps->id }}"
                                        class="form-check-input-switchery status_id"
                                        onclick="updateStatus({{ $ps->id }})"
                                        {{ $ps->status == 'Validasi' ? 'checked' : '' }} data-fouc>
                                </label>
                            </div>
                        </td>
                        <td class="text-center">


                            <div>
                                <a href="{{ route('peserta.show', $ps->id) }}" data-toggle="tooltip" title="Detail Data Peserta"
                                    class="btn bg-dark btn-labeled btn-labeled"><i class="icon-info22"></i></a>
                                <a href="{{ route('peserta.jawaban', $ps->user_id) }}" data-toggle="tooltip"
                                    title="Response Question" class="btn bg-dark btn-labeled btn-labeled"><i
                                        class="icon-question3"></i></a>
                                <a href="{{ route('peserta.jawabanpemahaman', $ps->user_id) }}" data-toggle="tooltip"
                                    title="Response Pemahaman" class="btn bg-dark btn-labeled btn-labeled"><i
                                        class="icon-question3"></i></a>


                            </div>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

    <script>
        //updateStatus
        function updateStatus(id) {
            console.log(id);
            var url = '{{ route('peserta.update', ':id') }}';
            url = url.replace(':id', id);
            if ($('#status' + id).is(':checked')) {
                $.ajax({
                    url: url,
                    method: "PUT",
                    data: {
                        id: id,
                        status: 'Validasi',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        console.log(data);
                    }
                });
            } else {
                $.ajax({
                    url: url,
                    method: "PUT",
                    data: {
                        id: id,
                        status: 'Belum Validasi',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        console.log(data);
                    }
                });
            }
        }
    </script>


@endsection
