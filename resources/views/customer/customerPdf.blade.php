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

        #footer{
            padding-top: 200px; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 80px;
            font-size: 10px;
        }

    </style>

</head>

<body>
    <div id=halaman>
        <h3 id=judul>KARTU MEMBER</h3>
        

        <table>
            <tr>
                <td style="width: 30%;">NIK</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"> {{ $customer->id}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"> {{ $customer->namaCustomer}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Alamat</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$customer->alamat}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">No. Telepon</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$customer->telepon}}</td>
            </tr>
        </table>

    </div>

            
    <h6 id="footer">
        <p align="center">Perumahan Joyogrand B1/10, Merjosari Kec.Lowokwaru</p>
        <p align="center">Kota Malang, Jawa Timur 65144</p>
        <p align="center"> Nugrahacorp.inc@gmail.com</p>
        <p align="center">Telp:  081234141643</p>
        </h6>

    
</body>

</html>