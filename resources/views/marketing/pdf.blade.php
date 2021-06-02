<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pemesanan Rumah</title>
</head>

<body style="margin: auto;">
    <p>
        <center><b> SURAT PEMESANAN RUMAH (SPR)</b></center>
    </p>
    <p style="padding-top: 200;">

        <center><b> No. {{$data->No_SPR}}</b></center>
    </p>

    <p>Yang bertanda tangan dibawah ini :</p>
    <p><u> <b>Data Konsumen</b></u></p>
    <table border="0">
        <tbody>
            <tr>
                <td>Nama Konsumen</td>
                <td>:</td>
                <td>{{$data->NamaLengkap}}<br></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{$data->JenisKelamin}}<br></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{$data->Alamat}}<br></td>
            </tr>
            <tr>
                <td>No Telepon</td>
                <td>:</td>
                <td>{{$data->Telepon}}<br></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>{{$data->TanggalLahir}}<br></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{$data->Email}}<br></td>
            </tr>
        </tbody>
    </table>
    <p><u> <b> Data Unit</b></u></p>
    <table border="0">
        <tbody>
            <tr>
                <td>Nama Tipe</td>
                <td>:</td>
                <td>{{$data->NamaTipe}}<br></td>
            </tr>
            <tr>
                <td>Luas Bangunan</td>
                <td>:</td>
                <td>{{$data->LuasBangunan}}<br></td>
            </tr>
            <tr>
                <td>Luas Tanah</td>
                <td>:</td>
                <td>{{$data->LuasTanah}}<br></td>
            </tr>
            <tr>
                <td>Harga Unit</td>
                <td>:</td>
                <td>Rp. {{$data->Harga}}<br></td>
            </tr>
        </tbody>
    </table>
    <p><u> <b> Rincian Pembayaran</b></u></p>
    <table border="0">
        <tbody>
            <tr>
                <td>Uang Muka</td>
                <td>:</td>
                <td>Rp. {{$data->UangMuka}}<br></td>
            </tr>
            <tr>
                <td>Sisa Pembayaran</td>
                <td>:</td>
                <td>Rp. {{($data->Harga)-($data->UangMuka)}}<br></td>
            </tr>
        </tbody>
    </table>
    <br><br>
    Banyuwangi, {{ Carbon\Carbon::parse($data->TanggalSPR)->translatedFormat("d F Y") }}
    <br><br><br><br><br>
    <p>_______________
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_______________
    </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pemesan
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Manajer</p>
</body>

</html>