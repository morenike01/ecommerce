<!DOCTYPE html>
<html>
<head>
<script>
function validateForm() {
    var x = document.forms["demo_form"]["product.php"].value;
    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
}
</script>
</head>
<body>

<form name="demo_form.asp" action="product.php"
onsubmit="return validateForm()" method="post">
Name: <input type="text" name="fname">
<input type="submit" value="Submit">
</form>

</body>
</html>

