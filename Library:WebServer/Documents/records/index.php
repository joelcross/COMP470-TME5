<!DOCTYPE html>
<html>
<body style="margin: 50px;">
<h1 style="color:blue; text-align:center;">Joel's Pet Adoption Agency</h1>
<h2 style="text-align:center;">Private Adoption Records</h2>

<?php
    include 'db_connection.php';
    $conn = OpenCon();

    $sql = "SELECT animal_name, animal_type, date_adopted, adoptee_name, adoptee_email FROM records";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<li><b>" . $row["animal_name"]. '</b> (' . $row["animal_type"] . ') was adopted by ' . $row["adoptee_name"] . " (" . $row["adoptee_email"] . ") on " . $row["date_adopted"] . "</li>";
        }
      } else {
        echo "No results";
      }
    CloseCon($conn);
?>

</body>
</html> 
