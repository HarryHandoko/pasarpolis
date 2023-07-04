<html>
    <head>
        <title>Laporan Klaim Asuransi Periode {{date('d-m-Y',strtotime($date_awal))}} - {{date('d-m-Y',strtotime($date_akhir))}}</title>
    </head>
    <body style="font-family: Arial, Helvetica, sans-serif">
        <h3>
            <center>
                    <b>Laporan Klaim Asuransi</b>
            </center>
        </h3>
        <h4 style="margin-bottom:2px;margin-top:35px">Periode</h4>
        <p style="font-size:11pt;margin-top:0px">{{date('d-m-Y',strtotime($date_awal))}} s/d {{date('d-m-Y',strtotime($date_akhir))}}</p>
        <table cellspacing=0 style="width:100%">
            <tr>
                <th style="background-color:rgb(231, 231, 231);padding:15px;font-size:9pt;border:1px solid black">No.</th>
                <th style="background-color:rgb(231, 231, 231);padding:15px;font-size:9pt;border:1px solid black">Nama Peserta Asuransi</th>
                <th style="background-color:rgb(231, 231, 231);padding:15px;font-size:9pt;border:1px solid black">Nama Claim Benefit</th>
                <th style="background-color:rgb(231, 231, 231);padding:15px;font-size:9pt;border:1px solid black">Tanggal Request</th>
                <th style="background-color:rgb(231, 231, 231);padding:15px;font-size:9pt;border:1px solid black">Jumlah Claim</th>
                <th style="background-color:rgb(231, 231, 231);padding:15px;font-size:9pt;border:1px solid black">Status Claim</th>
            </tr>
            @if ($datacount == 0)
                <tr>
                    <td colspan='6' style="border:1px solid black;font-size:9pt;padding:15px;"><i>Data Tidak Ada</i></td>
                </tr>
            @else
            @foreach ($data as $key => $item)
                <tr>
                    <td style="border:1px solid black;font-size:9pt;padding:15px;">{{ $key+1 }}</td>
                    <td style="border:1px solid black;font-size:9pt;padding:15px;">{{ $item->employee->name }}</td>
                    <td style="border:1px solid black;font-size:9pt;padding:15px;">{{ $item->productBenefit->name }}</td>
                    <td style="border:1px solid black;font-size:9pt;padding:15px;">{{ date('d F Y',strtotime($item->tanggal)) }}</td>
                    <td style="border:1px solid black;font-size:9pt;padding:15px;">Rp. {{ number_format($item->jumlah_claim) }}</td>
                    <td style="border:1px solid black;font-size:9pt;padding:15px;">{{ $item->status}}</td>
                </tr>
            @endforeach

            @endif
        </table>

        <p style="margin-top:40px;font-size:10pt">
            Bekasi, {{date('d F Y',strtotime(date('Y-m-d')))}} <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            (.............................................)
        </p>
    </body>
</html>