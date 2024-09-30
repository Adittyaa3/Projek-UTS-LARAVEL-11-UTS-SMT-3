<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("button").click(function(){
    $("div").animate({
      left: '250px',
      opacity: '0.5',
      height: '100',
      width: '300'
    });
  });
});
</script> 
</head>
<body>

<button>Start </button>

<p>lets start</p>

<div style="background:red;height:100px;width:100px;position:absolute;"></div>

</body>
</html>
@extends('menu.main')
@section('content')
<div class="container-fluid" style="margin-top: 100px">
    <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="row">
          </div>
        </div>
    </div>
</div>
@endsection
