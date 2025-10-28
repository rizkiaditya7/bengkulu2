<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Buku Tamu Digital - UPT BKN Palu</title>
    <style>
    body {
        font-family: DejaVu Sans, sans-serif;
        font-size: 12px;
        color: #333;
    }

    h2 {
        text-align: center;
        color: #0a58ca;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #999;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #0d6efd;
        color: #fff;
    }

    img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 6px;
    }

    .center {
        text-align: center;
    }
    </style>
</head>

<body>
    <h2>📖 Buku Tamu Digital UPT BKN Palu</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No. HP</th>
                <th>Jabatan</th>
                <th>Instansi</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>{{ $item->instansi }}</td>
                <td class="center">
                    @if ($item->foto)
                    <img src="{{ public_path('storage/' . $item->foto) }}" alt="Foto">
                    @else
                    <span>-</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>