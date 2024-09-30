
@extends('Admin.main')
@section('content')
<div class="container-fluid" style="margin-top: 100px">
    <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h1>Data Gempa Terkini</h1>
            <h1>Data Gempa Dirasakan dari BMKG</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>Waktu Gempa</th>
                <th>Lintang</th>
                <th>Bujur</th>
                <th>Magnitude</th>
                <th>Kedalaman</th>
                <th>Wilayah</th>
            </tr>
        </thead>
        <tbody id="gempaTable">
            <!-- Data gempa akan diisi di sini -->
        </tbody>
    </table>

    <script>
        $(document).ready(function(){
            // Melakukan AJAX request ke API BMKG
            $.ajax({
                url: "https://data.bmkg.go.id/DataMKG/TEWS/gempadirasakan.json",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    // Mengambil array gempa yang dirasakan
                    var gempaList = data.Infogempa.gempa;

                    // Iterasi melalui data gempa dan menampilkannya ke dalam tabel
                    $.each(gempaList, function(index, gempa) {
                        var row = '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + gempa.Tanggal + ' ' + gempa.Jam + '</td>' +
                            '<td>' + gempa.Lintang + '</td>' +
                            '<td>' + gempa.Bujur + '</td>' +
                            '<td>' + gempa.Magnitude + '</td>' +
                            '<td>' + gempa.Kedalaman + '</td>' +
                            '<td>' + gempa.Wilayah + '</td>' +
                            '</tr>';
                        
                        // Menambahkan baris data ke tabel
                        $('#gempaTable').append(row);
                    });
                },
                error: function() {
                    // Menampilkan pesan error jika data gagal diambil
                    $('#gempaTable').html('<tr><td colspan="7">Gagal memuat data gempa dirasakan.</td></tr>');
                }
            });
        });
    </script>

           
        </div>
    </div>
</div>
@endsection
