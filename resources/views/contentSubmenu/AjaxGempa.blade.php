
@extends('Admin.main')
@section('content')
<div class="container-fluid" style="margin-top: 100px">
    <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h1>Data Gempa Terkini</h1>
            <div id="map"></div>
    
            <div id="gempa-info">
                <p><strong>Waktu Gempa:</strong> <span id="waktu"></span></p>
                <p><strong>Lintang:</strong> <span id="lintang"></span></p>
                <p><strong>Bujur:</strong> <span id="bujur"></span></p>
                <p><strong>Magnitude:</strong> <span id="magnitude"></span></p>
                <p><strong>Kedalaman:</strong> <span id="kedalaman"></span></p>
                <p><strong>Wilayah:</strong> <span id="wilayah"></span></p>
                <p><strong>Potensi:</strong> <span id="potensi"></span></p>
            </div>
        
            <script>
                $(document).ready(function(){
                    $.ajax({
                        url: "https://data.bmkg.go.id/DataMKG/TEWS/autogempa.json",
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            // Mengambil data gempa terkini dari response API
                            var gempa = data.Infogempa.gempa;
                            // Menampilkan data di halaman HTML
                            $('#waktu').text(gempa.Tanggal + ' ' + gempa.Jam);
                            $('#lintang').text(gempa.Lintang);
                            $('#bujur').text(gempa.Bujur);
                            $('#magnitude').text(gempa.Magnitude);
                            $('#kedalaman').text(gempa.Kedalaman);
                            $('#wilayah').text(gempa.Wilayah);
                            $('#potensi').text(gempa.Potensi);
                        },
                        error: function() {
                            // Menampilkan pesan error jika data gagal diambil
                            $('#gempa-info').html('<p>Gagal memuat data gempa terkini.</p>');
                        }
                    });
                });
            </script>
        </div>
    </div>
</div>
@endsection
