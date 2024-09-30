
@extends('Admin.main')
@section('content')
<div class="container-fluid" style="margin-top: 100px">
    <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <p>ALAMAT IP: <input type="text" id="satu">
                <button id="loadData">Get IP</button>
                <p id="result"></p>
            
                <script>
                    $(document).ready(function(){
                        $('#loadData').click(function(){
                            $.ajax({
                                url : 'https://api.ipify.org?format=json',  
                                type : 'GET',
                                dataType : 'json',
                                success : function(data){
                                    $('#satu').val(data.ip);  
                                },
                                error : function(error){
                                    $('#result').html('Terjadi kesalahan dalam memuat data');  
                                }
                            });
                        });
                    });
                </script>
        </div>
    </div>
</div>
@endsection
