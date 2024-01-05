@extends('layouts.app')
@section('page_title', 'Data Peserta')
@section('content')


    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Data Peserta</h5>

        </div>

        <div class="card-body">

        </div>

        <table class="table datatable-basic fixed_header">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>No Telp</th>
                    <th>CV</th>
                    <th>KTP</th>
                    <th>Surat Lamaran</th>
                    <th>Sertifikat Toefl</th>
                    <th>Foto</th>
                    <th>Link</th>
                    <th>Status</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($dpribadi as $dp)
                    <tr>
                        <td>{{ $dp->nik }}</td>
                        <td>{{ $dp->nama }}</td>
                        <td>{{ $dp->email }}</td>
                        <td>{{ $dp->no_telp }}</td>
                        <td><a href="{{ asset('storage/dokumen/' . $dp->cv) }}" class="icon-eye2"></a></td>
                        {{-- <td><a href="{{ route('pdf',$dp->cv) }}">Download</a></td> --}}
                        <td><a href="{{ asset('storage/dokumen/' . $dp->ktp) }}" class="icon-eye2"></a></td>
                        <td><a href="{{ asset('storage/dokumen/' . $dp->surat_lamaran) }}" class="icon-eye2"></a></td>
                        <td><a href="{{ asset('storage/dokumen/' . $dp->sertifikat_teofl) }}" class="icon-eye2"></a></td>
                        <td><a href="{{ asset('storage/dokumen/' . $dp->foto) }}" class="icon-eye2"></a></td>
                        <td>{{ $dp->link }}</td>

                        <td><span
                                class="badge {{ $dp->status == 'Validasi' ? 'badge-success' : 'badge-danger' }}">{{ $dp->status }}</span>
                        </td>
           
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

    <script>
        $('.fixed_header').DataTable({
            "paging": false,
            "scrollX": true,
            "info": false,
            "searching": false
        });
    </script>
@endsection