<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $customerNumber = $_POST['customerNumber'];
      $customerName = $_POST['customerName'];
      $contactLastName = $_POST['contactLastName'];
      $contactFirstName = $_POST['contactFirstName'];
      $phone = $_POST['phone'];
      $addressLine1 = $_POST['addressLine1'];
      $addressLine2 = $_POST['addressLine2'];
      $city = $_POST['city'];
      $state = $_POST['state'];
      $postalCode = $_POST['postalCode'];
      $country = $_POST['country'];
      $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
      $creditLimit = $_POST['creditLimit'];

      //query with PDO
      $query = $conn->prepare("INSERT INTO customers (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) 
                VALUES('$customerNumber','$customerName','$contactLastName','$contactFirstName','$phone','$addressLine1','$addressLine2','$city','$state','$postalCode','$country','$salesRepEmployeeNumber','$creditLimit')"); 
      //binding data
      $query->bindParam(':customerNumber',$customerNumber);
      $query->bindParam(':customerName',$customerName);
      $query->bindParam(':contactLastName',$contactLastName);
      $query->bindParam(':phone',$phone);
      $query->bindParam(':addressLine1',$addressLine1);
      $query->bindParam(':addressLine2',$addressLine2);
      $query->bindParam(':city',$city);
      $query->bindParam(':state',$state);
      $query->bindParam(':postalCode',$postalCode);
      $query->bindParam(':country',$country);
      $query->bindParam(':salesRepEmployeeNumber',$salesRepEmployeeNumber);
      $query->bindParam(':creditLimit',$creditLimit);

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
    <title>Example</title>
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
                <a class="nav-link" href="<?php echo "customers.php"; ?>">Data Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "create_customers.php"; ?>">Tambah Data</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Customers berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Customers gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Customers</h2>
          <form action="create_customers.php" method="POST">
            
            <div class="form-group">
              <label>customerNumber</label>
              <input type="text" class="form-control" placeholder="customerNumber" name="customerNumber" required="required">
            </div>
            <div class="form-group">
              <label>customerName</label>
              <input type="text" class="form-control" placeholder="customerName" name="customerName" required="required">
            </div>
            <div class="form-group">
              <label>contactLastName</label>
              <input type="text" class="form-control" placeholder="contactLastName" name="contactLastName" required="required">
            </div>
            <div class="form-group">
              <label>contactFirstName</label>
              <input type="text" class="form-control" placeholder="contactFirstName" name="contactFirstName" required="required">
            </div>
            <div class="form-group">
              <label>phone</label>
              <input type="text" class="form-control" placeholder="phone" name="phone" required="required">
            </div>
            <div class="form-group">
              <label>addressLine1</label>
              <input type="text" class="form-control" placeholder="addressLine1" name="addressLine1" required="required">
            </div>
            <div class="form-group">
              <label>addressLine2</label>
              <input type="text" class="form-control" placeholder="addressLine2" name="addressLine2" required="required">
            </div>
            <div class="form-group">
              <label>city</label>
              <input type="text" class="form-control" placeholder="city" name="city" required="required">
            </div>
            <div class="form-group">
              <label>state</label>
              <input type="text" class="form-control" placeholder="state" name="state" required="required">
            </div>
            <div class="form-group">
              <label>postalCode</label>
              <input type="text" class="form-control" placeholder="postalCode" name="postalCode" required="required">
            </div>
            <div class="form-group">
              <label>country</label>
              <input type="text" class="form-control" placeholder="country" name="country" required="required">
            </div>
            <div class="form-group">
              <label>salesRepEmployeeNumber</label>
              <input type="text" class="form-control" placeholder="salesRepEmployeeNumber" name="salesRepEmployeeNumber" required="required">
            </div>
            <div class="form-group">
              <label>creditLimit</label>
              <input type="text" class="form-control" placeholder="creditLimit" name="creditLimit" required="required">
            </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>