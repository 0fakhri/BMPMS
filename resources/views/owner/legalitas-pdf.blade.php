<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legalitas</title>
</head>

<body>
    <!-- bgcolor="#80bf7f" -->
    <center><b>SURAT LEGALITAS</b></center>
    <br>
    <table border="1">
        <tbody>
            <tr>
                <td>
                    <b>a). HAK PAKAI</b>
                    <p>No Unit. {{$data->No_Unit}}</p>
                    <p>Kelurahan Giri, Kecamatan Giri</p>
                </td>
                <td><b>f).
                        <center>NAMA PEMEGANG HAK <br> PEMERINTAH KOTAMADYA DAERAH TINGKAT II <br> BANYUWANGI</center>
                    </b></td>
            </tr>
            <tr>
                <td><b>b). NAMA JALAN</b>
                    <p>Jl. M.H Thamrin, Kelurahan Giri,<br> Kecamatan Giri, Banyuwangi</p>
                </td>
                <td><b>g). PEMBUKUAN</b>
                    <p>Banyuwangi, Tgl {{ Carbon\Carbon::parse($data->TanggalTerbit)->subDays(1)->translatedFormat("d F Y")  }}</p>
                    <p>No Legalitas : {{$data->No_Legalitas}}</p>
                    <p>
                        <center><b>Owner PT. Bukit Mas Mandiri</b><br>
                            <p><b>Banyuwangi</b></p>
                            <br><br><br>
                            ________________________ <br> &nbsp;
                        </center>
                    </p>
                </td>

            </tr>
            <tr>
                <td><b>c). ASAL PARSIL</b>
                    <p>Pemberian hak Atas Tanah & Bangunan</p>
                </td>
                <td><b>h). PENERBITAN SERTIFIKAT</b>
                    <p>Banyuwangi, Tgl {{ Carbon\Carbon::parse($data->TanggalTerbit)->translatedFormat("d F Y") }}</p>
                    <p>No Legalitas : {{$data->No_Legalitas}}</p>
                    <p>
                        <center><b>Owner PT. Bukit Mas Mandiri</b><br>
                            <p><b>Banyuwangi</b></p>
                            <br><br><br>
                            ________________________ <br> &nbsp;
                        </center>
                    </p>
                </td>
            </tr>
            <tr>
                <td><b>d). SURAT KEPUTUSAN KEPALA KANTOR WILAYAH <br>BADAN PERTANAHAN NASIONAL <br>PROV - JAWA TIMUR</b>
                    <p>Tgl.8 Januari 2012 <br>No. 05/HP/2012 </p>
                    <p>Uang pemasukan/biaya administrasi Rp.15.000,-</p>
                    <p>Lamanya hak berlaku <b>Selama dipergunakan</b></p>
                </td>
                <td><b>i). PENUNJUK</b>
                    <p><br>
                        <center>Tanah Negara</center>
                    </p>
                </td>
            </tr>
            <tr>
                <td><b>e). GAMBAR SITUASI</b>
                    <p>Luas Tanah &nbsp;&nbsp;&nbsp;: {{$data->LuasTanah}} M2</p>
                    <p>Luas Bangunan : {{$data->LuasBangunan}} M2</p>
                </td>
        </tbody>
    </table>
</body>

</html>