<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Cetak Rekapitulasi</title>
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
        <div class="text-center">
            <h3 style="font-weight: 700;">Rekapitulasi {{ $recap->category->name }}</h3>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th rowspan="2" scope="col" class="text-center">Ranking</th>
                    <th rowspan="2" scope="col">Nama Peserta</th>
                    <th rowspan="2" scope="col">Nomor Peserta</th>
                    <th colspan="3" class="text-center">Nilai</th>
                    <th rowspan="2">Photo</th>
                    <th rowspan="2" scope="col" class="text-center">Total</th>
                </tr>
                <tr>
                    <th scope="col" class="text-center">1</th>
                    <th scope="col" class="text-center">2</th>
                    <th scope="col" class="text-center">3</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ( $recap_details as $recap_detail)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $recap_detail->participant->name }}</td>
                    <td>{{ explode('-', $recap_detail->participant->chest_no)[1] }}</td>
                    <td class="text-center">{{ $recap_detail->score_1 }}</td>
                    <td class="text-center">{{ $recap_detail->score_2 }}</td>
                    <td class="text-center">{{ $recap_detail->score_3 }}</td>
                    <td class="text-center">
                        @if ($recap_detail->photo)
                            <img style="width: 100px; height: 100px; object-fit: cover;" src="{{ $recap_detail->photo->fullpath }}" />
                        @else
                            -- Tidak ada photo --
                        @endif
                    </td>
                    <td class="text-center">{{ $recap_detail->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
