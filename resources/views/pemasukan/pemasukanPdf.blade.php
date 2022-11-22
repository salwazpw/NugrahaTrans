<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Pemasukan</title>
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
                <h3 align="center">NUGRAHA TRANS<br> LAPORAN PEMASUKAN </h3>
                <p align="center">Perumahan Joyogrand B1/10, Merjosari Kec.Lowokwaru, Kota Malang, Jawa Timur 65144
                    <br>
                    Telepon: 081234141643, Email : Nugrahacorp.inc@gmail.com
                </p>
            </td>

        </table>

        <h4 style="text-align: center;" > LAPORAN DATA PEMASUKAN</h4>
        <p style="text-indent :5em;"> <b>Tanggal </b> :
            @php
                echo date(' d F Y');
            @endphp </p>

        <p style="text-indent :5em;"> <b>Waktu </b>   :
        @php
            date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
            echo date('h:i:s a'); // menampilkan jam sekarang
        @endphp </p>
        <table align="center" style="border-collapse:collapse;">
            <thead>
                <tr>
                  <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">ID</th>
                  <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">Tanggal Pemasukan</th>
                  <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">Jenis Pemasukan</th>
                  <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">Jumlah Pemasukan</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($pemasukan as $data)
                  {{-- {{dd($pemasukan)}} --}}
                   <tr>

                      <td style="border:1px solid #000; text-align: center;padding: 3px; width: 40px;">{{$data->id}}</td>
                      <td style="border:1px solid #000; text-align: center;padding: 3px; width: 120px;">{{$data->tanggalPemasukan}}</td>
                      <td style="border:1px solid #000; text-align: center;padding: 3px; width: 100px;">{{$data->jenisPemasukan}}</td>
                      <td style="border:1px solid #000; text-align: center;padding: 3px; width: 180px;">Rp. {{number_format($data->jumlahPemasukan, 0, ",", ".")}}</td>
                   </tr>
                  @endforeach
              </tbody>
            </table>
    </div>
</body>
</html>
