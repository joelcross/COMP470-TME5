<!DOCTYPE html>
<html>
<body style="margin: 50px;">
<h1 style="color:blue; text-align:center;">Joel's Pet Adoption Agency</h1>

<?php
    include 'db_connection.php';
    $conn = OpenCon();

    $sql = "SELECT id, animal, name, price, details, sex FROM animals";
    $result = $conn->query($sql);
    echo "<div align='right'><a href='https://staff.joelspetadoption.com'><button>Staff Login</button></a></div>";
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<b>Name</b>: " . $row["name"]. ' (' . $row["sex"] . ')' . "<br>";
            echo "<b>Type of animal</b>: " . $row["animal"]. "<br>";
            echo "<b>Price</b>: " . strval($row["price"]). "<br>";
            echo "<b>Details</b>: " . $row["details"]. "<br>";
            echo "<a href='https://joelspetadoption.com/adopt'><button>Apply to Adopt</button></a>";
            echo "<br><br>";
        }
      } else {
        echo "No results";
      }
    CloseCon($conn);
?>

</body>
</html> 
