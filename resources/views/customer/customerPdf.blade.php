<!DOCTYPE html>
<head>
    <title>Cetak Kartu Member {{ $customer->id}}</title>
    <meta charset="utf-8">
    <style>
        #judul{
            text-align:center;
        }

        #halaman{
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
                    <h3 align="center">NUGRAHA TRANS<br> KARTU MEMBER </h3>
                    <p align="center">Perumahan Joyogrand B1/10, Merjosari Kec.Lowokwaru, Kota Malang, Jawa Timur 65144
                        <br>
                        Telepon: 081234141643, Email : Nugrahacorp.inc@gmail.com
                    </p>
                </td>
    
            </table>
        <table>
            <tr>
                <td style="width: 30%;">NIK</td>
                <td style="width: 30%;">:</td>
                <td style="width: 65%;"> {{ $customer->id}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 30%;">:</td>
                <td style="width: 65%;"> {{ $customer->namaCustomer}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Alamat</td>
                <td style="width: 30%;">:</td>
                <td style="width: 65%;">{{$customer->alamat}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">No. Telepon</td>
                <td style="width: 30%;">:</td>
                <td style="width: 65%;">{{$customer->telepon}}</td>
            </tr>
        </table>

    </div>
</body>

</html>