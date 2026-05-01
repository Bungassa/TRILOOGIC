<!DOCTYPE html>
<html>
<head>
    <title>Slip Gaji - {{ $penggajian->karyawan->nama }}</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; line-height: 1.6; color: #333; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #AB6F6E; padding-bottom: 10px; }
        .header h1 { margin: 0; color: #AB6F6E; }
        .info-section { margin-bottom: 20px; }
        .info-table { width: 100%; border-collapse: collapse; }
        .info-table td { padding: 5px 0; }
        .salary-table { width: 100%; margin-top: 20px; border: 1px solid #eee; }
        .salary-table th { background: #f9f9f9; padding: 10px; text-align: left; border-bottom: 1px solid #eee; }
        .salary-table td { padding: 10px; border-bottom: 1px solid #eee; }
        .salary-table .total-row { font-weight: bold; background: #f9f9f9; }
        .footer { margin-top: 50px; text-align: right; }
        .signature { margin-top: 80px; display: inline-block; width: 200px; border-top: 1px solid #333; text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h1>EKKY REFLEKSI FAMILY</h1>
        <p>Jl. D. I. Panjaitan No. 65, Soklat, Subang</p>
    </div>

    <div class="info-section">
        <table class="info-table">
            <tr>
                <td width="150"><strong>NIK</strong></td>
                <td>: {{ $penggajian->karyawan->nik }}</td>
                <td width="150"><strong>Periode</strong></td>
                <td>: {{ Carbon\Carbon::create()->month((int)$penggajian->bulan)->translatedFormat('F') }} {{ $penggajian->tahun }}</td>
            </tr>
            <tr>
                <td><strong>Nama Karyawan</strong></td>
                <td>: {{ $penggajian->karyawan->nama }}</td>
                <td><strong>Tanggal Cetak</strong></td>
                <td>: {{ date('d/m/Y') }}</td>
            </tr>
        </table>
    </div>

    <table class="salary-table" cellspacing="0">
        <thead>
            <tr>
                <th>Keterangan</th>
                <th style="text-align: right;">Jumlah (Rp)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Gaji Pokok</td>
                <td style="text-align: right;">{{ number_format($penggajian->gaji_pokok, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Bonus / Lembur</td>
                <td style="text-align: right; color: green;">{{ number_format($penggajian->bonus, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Potongan / Alpa</td>
                <td style="text-align: right; color: red;">({{ number_format($penggajian->potongan, 0, ',', '.') }})</td>
            </tr>
            <tr class="total-row">
                <td><strong>Total Gaji Diterima (THP)</strong></td>
                <td style="text-align: right;"><strong>{{ number_format($penggajian->total_gaji, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>Subang, {{ date('d F Y') }}</p>
        <p>Admin Payroll,</p>
        <div class="signature">
            ( Admin Ekky Refleksi )
        </div>
    </div>
</body>
</html>
