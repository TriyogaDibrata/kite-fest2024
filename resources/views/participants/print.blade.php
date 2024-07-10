<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Cetak Bukti Pendaftaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

        .separator {
            display: block;
            height: 0;
            border-bottom: 1px solid #eff2f5;
        }

        .separator.separator-dashed {
            border-bottom-style: dashed;
            border-bottom-color: #E4E6EF;
        }
    </style>
    <div class="p-4">
        <div style="padding-inline: 16px;">
            <table>
                <tr>
                    <td>
                        <img style="height: 100px; width: 100px;" src="{{ asset('assets/images/kop-surat1.png') }}" />
                    </td>
                    <td class="text-center" style="width: 500px;">
                        <div class="d-flex flex-column p-4">
                            <h2 style="font-weight: 1000;">SEKHA PELAYANG BADUNG KITE FESTIVAL #2</h2>
                            <div> Email : pelayangbadung@gmail.com &#x2022; Instagram : &#64;sekhapelayangbadung</div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class='separator'></div>

        <div class="p-4">
            <div class="text-center">
                <h3 style="font-weight: 700;">Bukti Pendaftaran Peserta Lomba</h3>
            </div>

            <table>
                <tr>
                    <td width="200" style="font-size: 12pt;"><h6 style="font-weight: 700;">Nomor Registrasi</h6></td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">{{ $participant->trx_number }}</td>
                </tr>

                <tr>
                    <td width="200" style="font-size: 12pt;"><h6 style="font-weight: 700;">Tanggal</h6></td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">{{ formattedDate($participant->created_at) }}</td>
                </tr>
            </table>

            <div class='separator my-2'></div>

            <div class="my-2">
                <h5 style="font-weight: 700;">Informasi Peserta</h5>
            </div>

            <table>
                <tr>
                    <td width="200" style="font-size: 12pt;"><h6 style="font-weight: 700;">Nama Sekha</h6></td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">{{ $participant->name }}</td>
                </tr>

                <tr>
                    <td width="200" style="font-size: 12pt;"><h6 style="font-weight: 700;">Alamat</h6></td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">{{ $participant->address }}</td>
                </tr>


                <tr>
                    <td width="200" style="font-size: 12pt;"><h6 style="font-weight: 700;">No. Hp</h6></td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">{{ $participant->phone }}</td>
                </tr>

                <tr>
                    <td width="200" style="font-size: 12pt;"><h6 style="font-weight: 700;">Kategori Lomba</h6></td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">{{ $participant->category->name }}</td>
                </tr>

                <tr>
                    <td width="200" style="font-size: 12pt;"><h6 style="font-weight: 700;">Seri/Jadwal Terbang</h6></td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">
                        {{ $participant->flight->serie . $participant->flight->session . ' - ' . formattedDate($participant->flight->date) }}
                    </td>
                </tr>

                <tr>
                    <td width="200" style="font-size: 12pt;"><h6 style="font-weight: 700;">Waktu Terbang</h6></td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">
                        {{ formatTimeHi($participant->flight->start) ." - ". formatTimeHi($participant->flight->end) ." WITA"}}
                    </td>
                </tr>

                <tr>
                    <td width="200" style="font-size: 12pt;"><h6 style="font-weight: 700;">Nomor Peserta</h6></td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">{{ explode('-', $participant->chest_no)[1] }}</td>
                </tr>
            </table>

            <div class='separator my-2'></div>

            <div class="my-2">
                <h5 style="font-weight: 700;">Status Pembayaran</h5>
            </div>

            <table>
                <tr>
                    <td width="200" style="font-size: 12pt;"><h6 style="font-weight: 700;">Biaya Pendaftaran</h6></td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">
                        {{ 'Rp. ' . Number::format($participant->category->price, null, null, 'id') }}</td>
                </tr>

                <tr>
                    <td width="200" style="font-size: 12pt;"><h6 style="font-weight: 700;">Status</h6></td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">
                        @if ($participant->status == 1)
                            Lunas
                        @else
                            Belum Bayar
                        @endif
                    </td>
                </tr>

            </table>

            <div class='separator my-2'></div>

            <table style="margin-top: 20px;">
                <tr>
                    <td><img src="data:image/png;base64, {!! base64_encode($qrcode) !!} "></td>
                    <td style="width: 500px; text-align:right;">
                            <div style="text-align: end;">Badung, {{ formattedDate($date) }}</div>
                            <div style="text-align: end;">Panitia,</div>
                            <h6 style="padding-top: 80px; font-weight: 600; text-align: end;">
                                {{ Auth::user()->name }}
                            </h6>
                    </td>
                </tr>
            </table>

            {{-- <img src="data:image/png;base64, {!! base64_encode()) !!} "> --}}
            {{-- <img src="data:image/png;base64, {!! $qrcode !!}"> --}}

            {{-- <div style="margin-top: 20px;">
                <div style="text-align: end;">Badung, {{ formattedDate($date) }}</div>
                <div style="text-align: end;">Panitia,</div>
                <h6 style="padding-top: 80px; font-weight: 600; text-align: end;">
                    {{ Auth::user()->name }}
                </h6>
            </div> --}}

            <div style="margin-top: 16px; font-size: 10pt; text-align: center;">** NB: Simpan form pendaftaran ini sebagai bukti keikutsertaan lomba **</div>

        </div>
    </div>

</body>

</html>
