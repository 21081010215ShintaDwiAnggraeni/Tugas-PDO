<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $productCode = $_POST['productCode'];
      $productName = $_POST['productName'];
      $productLine = $_POST['productLine'];
      $productScale = $_POST['productScale'];
      $productVendor = $_POST['productVendor'];
      $productDescription = $_POST['productDescription'];
      $quantityInStock = $_POST['quantityInStock'];
      $buyPrice = $_POST['buyPrice'];
      $MSRP = $_POST['MSRP'];
      
      //query with PDO
      $query = $conn->prepare("INSERT INTO products (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP) 
                VALUES('$productCode','$productName','$productLine','$productScale','$productVendor','$productDescription','$quantityInStock','$buyPrice','$MSRP')"); 
      
      //binding data
      $query->bindParam(':productCode',$productCode);
      $query->bindParam(':productName',$productName);
      $query->bindParam(':productLine',$productLine);
      $query->bindParam(':productScale',$productScale);
      $query->bindParam(':productVendor',$productVendor);
      $query->bindParam(':productDescription',$productDescription);
      $query->bindParam(':quantityInStock',$quantityInStock);
      $query->bindParam(':buyPrice',$buyPrice);
      $query->bindParam(':MSRP',$MSRP);
 
      //eksekusi query
      if ($query->execute()) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Products</title>
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pemrograman Web</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "products.php"; ?>">Data Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "create_products.php"; ?>">Create Data</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Products berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Products gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Products</h2>
          <form action="create_products.php" method="POST">
            
            <div class="form-group">
              <label>productCode</label>
              <input type="text" class="form-control" placeholder="productCode" name="productCode" required="required">
            </div>
            <div class="form-group">
              <label>productName</label>
              <input type="text" class="form-control" placeholder="productName" name="productName" required="required">
            </div>
            <div class="form-group">
              <label>productLine</label>
              <input type="text" class="form-control" placeholder="productLine" name="productLine" required="required">
            </div>
            <div class="form-group">
              <label>productScale</label>
              <input type="text" class="form-control" placeholder="productScale" name="productScale" required="required">
            </div>
            <div class="form-group">
              <label>productVendor</label>
              <input type="text" class="form-control" placeholder="productVendor" name="productVendor" required="required">
            </div>
            <div class="form-group">
              <label>productDescription</label>
              <input type="text" class="form-control" placeholder="productDescription" name="productDescription" required="required">
            </div>
            <div class="form-group">
              <label>quantityInStock</label>
              <input type="text" class="form-control" placeholder="quantityInStock" name="quantityInStock" required="required">
            </div>
            <div class="form-group">
              <label>buyPrice</label>
              <input type="text" class="form-control" placeholder="buyPrice" name="buyPrice" required="required">
            </div>
            <div class="form-group">
              <label>MSRP</label>
              <input type="text" class="form-control" placeholder="MSRP" name="MSRP" required="required">
            </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>