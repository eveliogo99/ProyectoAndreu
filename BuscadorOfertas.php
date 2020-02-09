<!DOCTYPE html>

<html>

    <head>

        <title> PHP SELECT OPTIONS FROM DATABASE </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body onload='showOferta("")'>

        <!--Method One-->

        <input id ="buscador" onchange="showOferta(this.value)">
        <div id="ofertes"></div>


    </body>

</html>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script>
$(document).ready(function () {

$('input#buscador')
  .keypress(function (event) {
    if (this.value.length === 20) {
      return false;
    }
  });
}); 
function showOferta(str) {
  var xhttp;    

  if (str == "") {
    xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("ofertes").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ShowOfertes.php", true);
  xhttp.send();
}


  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("ofertes").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ShowOfertes.php?q="+str, true);
  xhttp.send();
}
</script>
