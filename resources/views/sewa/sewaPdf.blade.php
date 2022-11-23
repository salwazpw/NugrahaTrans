<!DOCTYPE html>

<head>
    <title>Cetak Bukti Sewa {{ $sewa->id}}</title>
    <meta charset="utf-8">
    <style>
        #judul {
            text-align: center;
        }

        #halaman {
            width: 650px;
            height: 370px;
            position: absolute;
            border: 2px solid;
            padding-top: 30px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 80px;
            font-size: 20px;
        }
    </style>

</head>

<body>
    <div style="border: 1px solid #000; margin: 20px ; padding: 20px; width: 80%; background-color: none; margin-left: 90px">
        <style type="text/css">
            table tr td,
            table tr th {
                font-size: 10pt;
            }
        </style>
        <table align="center" style="border-collapse:collapse;">
            <!-- <td style="border-bottom:2px solid #000; text-align: center;padding: 2px; width: 100px; width:100px">
                    <img src="{{ public_path("admin/images/logo-siterpi.png") }}" alt="" style="width: 150px; height: 150px;">
                </td> -->
            <td style="border-bottom:2px solid #000; text-align: center;padding: 2px; width: 200px; width:800px">
                <h3 align="center">NUGRAHA TRANS<br> BUKTI SEWA </h3>
                <p align="center">Perumahan Joyogrand B1/10, Merjosari Kec.Lowokwaru, Kota Malang, Jawa Timur 65144
                    <br>
                    Telepon: 081234141643, Email : Nugrahacorp.inc@gmail.com
                </p>
            </td>

        </table>
        <table>
            <tr>
                <td>ID Sewa</td>
                <td>:</td>
                <td>{{ $sewa->id }}</td>
            </tr>

            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $sewa->nik }}</td>
            </tr>

            <td colspan="4">----------------------------------------------------------------------------------------------------------</td>

            <tr>
                <td>Plat Nomor</td>
                <td>:</td>
                <td>{{ $sewa->katalog->plat }}</td>
            </tr>

            <tr>
                <td>Tanggal Sewa</td>
                <td>:</td>
                <td>{{ $sewa->tanggalSewa }}</td>
            </tr>

            <tr>
                <td>Tanggal Ambil</td>
                <td>:</td>
                <td>{{ $sewa->tanggalAmbil }}</td>
            </tr>

            <tr>
                <td>Tanggal Kembali</td>
                <td>:</td>
                <td>{{ $sewa->tanggalKembali }}</td>
            </tr>

            <tr>
                <td>Total Hari</td>
                <td>:</td>
                <td>{{ $sewa->hari }}</td>
            </tr>

            <tr>
                <td>Harga</td>
                <td>:</td>
                <td>{{ $sewa->harga }}</td>
            </tr>

            <tr>
                <td>Total Pembayaran</td>
                <td>:</td>
                <td>{{ $sewa->totalPembayaran }}</td>
            </tr>

            <td colspan="4">----------------------------------------------------------------------------------------------------------------------------------------------------------</td>

        </table>
        <h4 align="center">PAYMENT METHOD</h4>
        <table align="center" style="border:1px solid #000; text-align: center;padding: 3px; width: 230px;">
            <tr>
                <td><b>BNI</b> 0614380382<br>
                    A/n : Bhekty widokanti
                    <br> <br>
                    <b>BCA</b> 0113320343<br>
                    A/n : Rexy Gilang Ramadhan Nugraha
                </td>
            </tr>
        </table>
    </div>
</body>

</html>