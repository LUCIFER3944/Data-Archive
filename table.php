<?php
include("server.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    table{
        margin-top: 150px;
        font-size: 20px;
    }
</style>
<body>
<?php
  require('nav.php')
  ?>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">sno</th>
            <th scope="col">Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">address</th>
          </tr>
        </thead>
        <?php
        $sql="SELECT * FROM `users`";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){
      
          echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['fname'] . '</td>';
                echo '<td>' . $row['lname'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['phone'] . '</td>';
                echo '<td>' . $row['address'] . '</td>';
                echo '</tr>';
   
        }

        
        ?>
      </table>
</body>
</html>