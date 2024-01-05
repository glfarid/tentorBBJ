<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil </title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 40px;
    }

    #header {
        text-align: center;
        margin-bottom: 20px;
    }

    #judul {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    #subjudul {
        font-size: 18px;
        margin-bottom: 20px;
    }

    #konten {
        margin-bottom: 40px;
    }

    #footer {
        text-align: center;
        margin-top: 20px;
    }
</style>


<?php
$tanggal = date('d F Y');
?>

<body>
    <div id="header">
        <img src="{{ asset('global_assets/images/BBJ.png') }}" alt="Logo Perusahaan" width="100">
        <div id="judul">Hasil Rangking Calon Tentor Bina Bahasa Jaya</div>
        <div id="subjudul">Periode : {{ $tanggal }}</div>
    </div>
    <table border="1" id="konten" width="100%">
        <thead>
            <tr align="center">
                <th>Alternatif</th>
                <th>Total Nilai</th>
                <th width="15%">Ranking</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($hasil as $h)
                <tr align="center">
                    <td>{{ $h->alternatif->nama }}</td>
                    <td>{{ $h->total }}</td>
                    <td>{{ $loop->iteration }}</td>
                </tr>
            @endforeach


            <div id="footer">
                <p>&copy; 2023</p>
            </div>
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>
