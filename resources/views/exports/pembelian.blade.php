<!DOCTYPE html>
<html>
<head>
    <title>Data Pembelians</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Data Pembelians</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Pembelian</th>
                <th>Nama Pembelian</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>total</th>
                <th>alamat</th>
                <th>methode pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembelians as $pembelian)
                <tr>
                    <td>{{ $pembelian->id }}</td>
                    <td>{{ $pembelian->user_id }}</td>
                    <td>{{ $pembelian->nama_profile }}</td>
                    <td>{{ $pembelian->jumlah_produk }}</td>
                    <td>{{ $pembelian->harga_barang }}</td>
                    <td>{{ $pembelian->total_harga }}</td>
                    <td>{{ $pembelian->alamat }}</td>
                    <td>{{ $pembelian->metode_pembayaran }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
