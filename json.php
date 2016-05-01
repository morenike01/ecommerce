<!DOCTYPE html>
<html>
<body>

<p>How to create a JavaScript object array.</p>

<p id="demo"></p>

<script>
var employees = [
    {
    "Name":"John",
    "City":"Accra"
      "Country":"Ghana"
    }, 
     {
    "Name":"John",
    "City":"Accra"
      "Country":"Ghana"
    },
    {
    "Name":"John",
    "City":"Accra"
      "Country":"Ghana"
    },
];

employees[0].Name="John";
document.getElementById("demo").innerHTML =
employees[0].Name + " " + employees[0].City + employees[0].Country ;
</script>

</body>
</html>
