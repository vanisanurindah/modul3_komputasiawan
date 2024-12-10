<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Data Barang</h2>
    <table>
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Deskripsi Barang</th>
                <th>Gambar Barang</th>
                <th>Satuan Barang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $item)
            <tr>
                <td>{{ $item->Kode_Barang }}</td>
                <td>{{ $item->Nama_Barang }}</td>
                <td>{{ $item->Harga_Barang }}</td>
                <td>{{ $item->Deskripsi_Barang }}</td>
                <td><img src="{{ asset($item->gambar) }}" alt="Gambar Barang" style="max-width: 100px;"></td>
                <td>{{ $item->satuan->Nama_Satuan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
