<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
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
        <div class="d-flex flex-row align-items-center p-4 border-bottom">
            <div class="p-4">
                <img style="height: 100px; width: 100px;" src="{{ asset('assets/images/kop-surat1.png') }}" />
            </div>
            <div class="p-4">
                <h1 style="font-weight: 1000;">Pelayang Badung Kite Fest #2</h1>
                <div class="d-flex flex-column">
                    <div>Email : pelayangbadung@gmail.com</div>
                    <div>Instagram : sekhapelayangbadung</div>
                </div>
            </div>
        </div>

        <div class="p-4">
            <div class="text-center my-4">
                <h2 style="font-weight: 700;">Bukti Pendaftaran Peserta Lomba</h2>
            </div>

            <table>
                <tr>
                    <td width="200" style="font-size: 12pt; font-weight: 600;">Nomor Pendaftaran</td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">{{ $participant->trx_number }}</td>
                </tr>

                <tr>
                    <td width="200" style="font-size: 12pt; font-weight: 600;">Tanggal</td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">{{ formattedDate($participant->created_at) }}</td>
                </tr>
            </table>

            <div class='separator my-3'></div>

            <div class="my-4">
                <h5 style="font-weight: 700;">Informasi Peserta</h5>
            </div>

            <table>
                <tr>
                    <td width="200" style="font-size: 12pt; font-weight: 600;">Nama Sekaha</td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">{{ $participant->name }}</td>
                </tr>

                <tr>
                    <td width="200" style="font-size: 12pt; font-weight: 600;">Alamat</td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">{{ $participant->address }}</td>
                </tr>


                <tr>
                    <td width="200" style="font-size: 12pt; font-weight: 600;">No. Hp</td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">{{ $participant->phone }}</td>
                </tr>

                <tr>
                    <td width="200" style="font-size: 12pt; font-weight: 600;">Kategori Lomba</td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">{{ $participant->category->name }}</td>
                </tr>

                <tr>
                    <td width="200" style="font-size: 12pt; font-weight: 600;">Serie Terbang</td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">
                        {{ $participant->flight->serie . $participant->flight->session . ' - ' . formattedDate($participant->flight->date) }}
                    </td>
                </tr>

                <tr>
                    <td width="200" style="font-size: 12pt; font-weight: 600;">Nomor Peserta</td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">{{ explode('-', $participant->chest_no)[1] }}</td>
                </tr>
            </table>

            <div class='separator my-3'></div>

            <div class="my-4">
                <h5 style="font-weight: 700;">Status Pembayaran</h5>
            </div>

            <table>
                <tr>
                    <td width="200" style="font-size: 12pt; font-weight: 600;">Biaya Pendaftaran</td>
                    <td width="20" style="font-size: 12pt;">:</td>
                    <td style="font-size: 12pt;">
                        {{ 'Rp. ' . Number::format($participant->category->price, null, null, 'id') }}</td>
                </tr>

                <tr>
                    <td width="200" style="font-size: 12pt; font-weight: 600;">Status</td>
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

            <div class="d-flex justify-content-between p-4">
                <div></div>
                <div class="d-flex flex-column text-center">
                    <div>Badung, 21 Juni 2024</div>
                    <div>Panitia</div>
                    <div style="padding-top: 100px;">
                        Joko Hanung Brahmantiyo Dyajadiningrat
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- <center>
		<h5>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
		<h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5>
	</center> --}}

    {{-- <table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Alamat</th>
				<th>Telepon</th>
				<th>Pekerjaan</th>
			</tr>
		</thead> --}}
    {{-- <tbody>
			@php $i=1 @endphp
			@foreach ($pegawai as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->nama}}</td>
				<td>{{$p->email}}</td>
				<td>{{$p->alamat}}</td>
				<td>{{$p->telepon}}</td>
				<td>{{$p->pekerjaan}}</td>
			</tr>
			@endforeach
		</tbody>
	</table> --}}

</body>

</html>
