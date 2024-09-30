
@extends('Admin.main')
@section('content')
<div class="container-fluid" style="margin-top: 100px">
    <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <script>
                $(document).ready(function(){
                    $("#hide").click(function(){
                        $("p").hide();
                    });
                    $("#show").click(function(){
                        $("P").show();
                        });
                   $("button").click(function(){
                    $("#div1").fadeToggle();
                    $("#div2").fadeToggle("slow");
                    $("#div3").fadeToggle(3000);
                   })
                });
        
            </script>
        </head>
        <body>
            <p>if u click on the" hide " button" it will disappear</p>
        
            <button id="hide">hide</button>
            <button id="show">show</button>
            <button>click to fade in/out boxes</button> <br><br>
        
            <div id="div1" style="width: 80px; height:80px; background-color:red;"></div>
            
            <div id="div2" style="width: 80px; height:80px; background-color:green;"></div>
            
            <div id="div3" style="width: 80px; height:80px; background-color:blue;"></div>
        
        </div>
    </div>
</div>
@endsection
