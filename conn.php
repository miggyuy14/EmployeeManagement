<?php
$conn = new mysqli('sql308.epizy.com', 'epiz_26426127', 'wh5Gs02lDdr', 'epiz_26426127_biometrics');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>