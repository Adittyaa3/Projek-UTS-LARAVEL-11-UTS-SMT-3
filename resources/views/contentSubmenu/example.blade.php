<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#hide").click(function(){
    $("h1,p").hide();
  });
  $("#show").click(function(){
    $("h1").show();
  });
});
</script>
</head>
<body>

<p>hei im study in universiy of alangga</p>
<h1>yah u did it</h1>

<button id="hide">Hide</button>
<button id="show">Show</button>

</body>
</html>
