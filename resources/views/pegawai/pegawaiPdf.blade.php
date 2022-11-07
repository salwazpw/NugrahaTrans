<!DOCTYPE html>
<head>
    <title>Surat Slip Gaji {{ $pegawai->id}}</title>
    <meta charset="utf-8">
    <style>
        #judul{
            text-align:center;
        }

        #halaman{
            width: auto; 
            height: auto; 
            position: absolute; 
            border: 1px solid; 
            padding-top: 30px; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 80px;
        }

    </style>

</head>

<body>
    <div id=halaman>
        <h3 id=judul>SURAT SLIP GAJI </h3>

        <p>Saya yang bertanda tangan di bawah ini :</p>

        <table>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">Rexy Gilang Ramadhan Nugraha</td>
            </tr>
            <tr>
                <td style="width: 30%;">Jabatan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">Pemilik Nugraha Trans</td>
            </tr>
        </table>   
            <p>Menerangkan dengan sebenar-benarnya bahwa:</p>

            <table>
            <tr>
                <td style="width: 30%; vertical-align: top;">NIP</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{ $pegawai->id}}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Nama</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{ $pegawai->namaPegawai}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Jabatan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $pegawai->jabatan}}</td>
            </tr>
        </table>
            <p>Hingga saat ini yang bersangkutan masih aktif bekerja dan perusahaan memberikan penghasilan dengan rincian sebagai berikut:</p>
            <table>
                <tr>
                    <td style="width: 30%;">Gaji Pokok</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">Rp. {{ $pegawai->gaji}}</td>
                </tr>
            </table>
            

        <div style="width: 30%; text-align: left; float: right;">Malang, <?php  echo date(" d F Y");?></div><br>
        <div style="width: 70%; text-align: left; float: right;">Yang bertanda tangan,</div><br><br><br><br><br>
        <div style="width: 35%; text-align: left; float: right;">Rexy Gilang Ramadhan Nugraha</div>

    </div>
</body>

</html>

<script>
   date(“format date and time”);
    </script>