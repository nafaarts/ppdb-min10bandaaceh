<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pendaftaran</title>

    <style>
        th,
        td {
            text-align: left;
            padding: 3px 0;
        }

        @media print {
            .wrapper {
                width: 21cm;
                padding: 15mm 15mm;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div style="text-align: center">
            <h2>Bukti Pendaftaran Sekolah</h2>
            <h4>Madrasah Ibtidaiyah Negeri 10 Banda Aceh</h4>
        </div>
        <hr>
        <div style="padding: 20px">
            <p>Dengan surat ini, menyatakan bahwa saudara :</p>
            <table>
                <tr>
                    <th>Nomor Daftar</th>
                    <td style="padding: 0 10px">:</td>
                    <td>{{ $siswa->no_daftar }}</td>
                </tr>
                <tr>
                    <th>Nama Lengkap</th>
                    <td style="padding: 0 10px">:</td>
                    <td>{{ $siswa->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td style="padding: 0 10px">:</td>
                    <td>{{ $siswa->nik }}</td>
                </tr>
                <tr>
                    <th>Tempat, Tanggal Lahir</th>
                    <td style="padding: 0 10px">:</td>
                    <td>{{ $siswa->tempat_lahir }}, {{ now()->parse($siswa->tanggal_lahir)->translatedFormat('d F Y') }}
                    </td>
                </tr>
                <tr>
                    <th>Nama Ayah</th>
                    <td style="padding: 0 10px">:</td>
                    <td>{{ $siswa->nama_ayah }}</td>
                </tr>
            </table>
            <p>Telah mendaftar pada portal PPDB MIN 10 Banda Aceh Tahun Ajaran {{ date('Y') }} / {{ date('Y') + 1 }}
            </p>

            <table style="margin-top: 150px; width: 100%">
                <tr>
                    <td style="width: 65%"></td>
                    <td style="padding-left: 25px;">
                        <table style="width: 100%; margin: 20px 0;">
                            <tr>
                                <td colspan="2">Banda Aceh, {{ now()->translatedFormat('d F Y') }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">Orang Tua</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div style="width: 200px; height: 80px; border-bottom: 1px solid grey">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <small><i>digenerate oleh sistem pada tanggal {{ date('d M Y H:i:s') }}</i></small>
        </div>
    </div>
</body>

</html>
