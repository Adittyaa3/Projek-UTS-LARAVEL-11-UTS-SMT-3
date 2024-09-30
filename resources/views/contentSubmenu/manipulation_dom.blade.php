
@extends('Admin.main')
@section('content')
<div class="container-fluid" style="margin-top: 100px">
    <div class="container-fluid">
        <div class="card">
          <div class="card-body">
        
                <style>
                    .important{
                        font-weight: bold;
                        font-size: xx-large;
                    }
                    .blue{
                        color: red; 
                    }        
                </style>
                <script>
                    $(document).ready(function(){
                        $("#btn1").click(function(){
                            $("#test1").text("hello word");
                        });
                        $("#btn2").click(function(){
                            $("#test2").html("<b> hello word </b>");
                        });
                        $("#btn3").click(function(){
                            $("#test3").val("dolly duck");
                        });
                        $("#button").click(function(){
                            $("h1,h2,p").addClass("blue");
                        });
                    });
                </script>
                <h1>Heading 1</h1>
                <h2>Heading 2</h2>
                <p id="test1"> this is a pragraph</p>
                <p id="test2"> this is a another paragraph</p>
                <p>input field <input type="text" id="test3" value="micky mouse"></p>
            
                <button id="btn1"> set text</button>
                <button id="btn2">set html</button>
                <button id="btn3">set value</button>
                <button id="button">add class to element</button>
          
        </div>
    </div>
</div>
@endsection
