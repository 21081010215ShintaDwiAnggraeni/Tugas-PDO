<?php
include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PRODUCTS</title>
</head>
<body>
    <h2 align="center">DATA PRODUCTS</h2>
    <table border="1" align="center" >
        <thead>
        <tr bgcolor="yellow" >
            <th>productCode</th>
            <th>productName</th>
            <th>productLine</th>
            <th>productScale</th>
            <th>productVendor</th>
            <th>productDescription</th>
            <th>quantityInStock</th>
            <th>buyPrice</th>
            <th>MSRP</th>
        </tr>
        </thead>
        <tbody>
                <?php 
                  $query = "SELECT * FROM products";
                  $result = $conn->query($query);
                 ?>

                  <?php while($data = $result->fetch(PDO::FETCH_ASSOC) ): ?>
                  <tr>
                    <td><?php echo $data['productCode'];  ?></td>
                    <td><?php echo $data['productName'];  ?></td>
                    <td><?php echo $data['productLine'];  ?></td>
                    <td><?php echo $data['productScale'];  ?></td>
                    <td><?php echo $data['productVendor'];  ?></td>
                    <td><?php echo $data['productDescription'];  ?></td>
                    <td><?php echo $data['quantityInStock'];  ?></td>
                    <td><?php echo $data['buyPrice'];  ?></td>
                    <td><?php echo $data['MSRP'];  ?></td>
                    <td>
                      <a href="<?php echo "update_products.php?productCode=".$data['productCode'] ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                      <a href="<?php echo "delete_products.php?productCode=".$data['productCode'] ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                      <a href="<?php echo "create_products.php?productCode=".$data['productCode'] ?>" class="btn btn-outline-danger btn-sm"> Create</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
    </table>
</body>
</html>