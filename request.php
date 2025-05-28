
<!DOCTYPE html>
<html>
<head>
    <title>Select 10 Cities</title>
    <script>
        function validateForm() {
            const checkboxes = document.querySelectorAll('input[name="cities[]"]:checked');
            if (checkboxes.length > 10) {
                alert("Please select at most 10 Cities.");
                return false;
            }
            return true;
        }
    </script>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<div class="city-form-wrapper">
    <form action="ShowAqi.php" method="post" onsubmit="return validateForm()">
        <h2>Select at most 10 Cities</h2>
        <div class="city-checkboxes">

            <label><input type='checkbox' name='cities[]' value='Dhaka'>Dhaka</label>
            <label><input type='checkbox' name='cities[]' value='Rajshahi'>Rajshahi</label>
            <label><input type='checkbox' name='cities[]' value='New Delhi'>New Delhi</label>
            <label><input type='checkbox' name='cities[]' value='Shanghai'>Shanghai</label>
            <label><input type='checkbox' name='cities[]' value='Tokyo'>Tokyo</label>
            <label><input type='checkbox' name='cities[]' value='New York'>New York</label>
            <label><input type='checkbox' name='cities[]' value='London'>London</label>
            <label><input type='checkbox' name='cities[]' value='Beijing'>Beijing</label>
            <label><input type='checkbox' name='cities[]' value='Paris'>Paris</label>
            <label><input type='checkbox' name='cities[]' value='Cairo'>Cairo</label>
            <label><input type='checkbox' name='cities[]' value='Moscow'>Moscow</label>
            <label><input type='checkbox' name='cities[]' value='Sydney'>Sydney</label>
            <label><input type='checkbox' name='cities[]' value='Sao Paulo'>Sao Paulo</label>
            <label><input type='checkbox' name='cities[]' value='Lagos'>Lagos</label>
            <label><input type='checkbox' name='cities[]' value='Bangkok'>Bangkok</label>
            <label><input type='checkbox' name='cities[]' value='Jakarta'>Jakarta</label>
            <label><input type='checkbox' name='cities[]' value='Istanbul'>Istanbul</label>
            <label><input type='checkbox' name='cities[]' value='Mexico City'>Mexico City</label>
            <label><input type='checkbox' name='cities[]' value='Los Angeles'>Los Angeles</label>
            <label><input type='checkbox' name='cities[]' value='Toronto'>Toronto</label>
        </div>
        <br>
        <input type="submit" value="Submit">
    </form>

</div>
</body>
</html>
