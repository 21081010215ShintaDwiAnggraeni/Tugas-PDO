<?php
include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CUSTOMERS</title>
</head>
<body>
    <h2 align="center">DATA CUSTOMERS</h2>
    <table border="1" align="center" >
        <thead>
        <tr bgcolor="pink" >
            <th>customerNumber</th>
            <th>customerName</th>
            <th>contactLastName</th>
            <th>contactFirstName</th>
            <th>phone</th>
            <th>addressLine1</th>
            <th>addressLine2</th>
            <th>city</th>
            <th>state</th>
            <th>postalCode</th>
            <th>country</th>
            <th>salesRepEmployeeNumber</th>
            <th>creditLimit</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
                <?php 
                  $query = "SELECT * FROM customers";
                  $result = $conn->query($query);
                 ?>

                  <?php while($data = $result->fetch(PDO::FETCH_ASSOC) ): ?>
                  <tr>
                    <td><?php echo $data['customerNumber'];  ?></td>
                    <td><?php echo $data['customerName'];  ?></td>
                    <td><?php echo $data['contactLastName'];  ?></td>
                    <td><?php echo $data['contactFirstName'];  ?></td>
                    <td><?php echo $data['phone'];  ?></td>
                    <td><?php echo $data['addressLine1'];  ?></td>
                    <td><?php echo $data['addressLine2'];  ?></td>
                    <td><?php echo $data['city'];  ?></td>
                    <td><?php echo $data['state'];  ?></td>
                    <td><?php echo $data['postalCode'];  ?></td>
                    <td><?php echo $data['country'];  ?></td>
                    <td><?php echo $data['salesRepEmployeeNumber'];  ?></td>
                    <td><?php echo $data['creditLimit'];  ?></td>
                    <td>
                      <a href="<?php echo "update_customers.php?customerNumber=".$data['customerNumber'] ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                      <a href="<?php echo "delete_customers.php?customerNumber=".$data['customerNumber'] ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                      <a href="<?php echo "create_customers.php?customerNumber=".$data['customerNumber'] ?>" class="btn btn-outline-danger btn-sm"> Create</a>
                    </td>

                  </tr>
                 <?php endwhile ?>
          </tbody>
    </table>
</body>
</html>