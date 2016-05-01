<!DOCTYPE html>
<html>
<head>
  <title>Products</title>
  <link href="site.css" rel="stylesheet">
</head>
<body>

<nav id="nav01"></nav>

<div id="main">
  <h1>Products</h1>
  <div id="id01"></div>
  <footer id="foot01"></footer>
</div>
<script src="script.js"></script>
<script>
var xmlhttp = new XMLHttpRequest();
var url = "product.php";
xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        myFunction(xmlhttp.responseText);
    }
}
xmlhttp.open("GET", url, true);
xmlhttp.send();

function myFunction(response) {
    var obj = JSON.parse(response);
    var arr = obj.records;
    var i;
    var out = "<table><tr><th>Name</th><th>Price</th><th>Service Charge</th></tr>";

    for(i = 0; i < arr.length; i++) {
        out += "<tr><td>" + 
        arr[i].product_name +
        "</td><td>" +
        arr[i].price +
        "</td><td>" +
        arr[i].service_charge +
        "</td></tr>";
    }
    out += "</table>"
    document.getElementById("id01").innerHTML = out;
}
</script>

</body>
</html>
