<!doctype html>
<html lang="en">
  <head>
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 
<script type="text/javascript" src="DataTables/datatables.min.js"></script>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <title>Unclaimed Property App</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
        <h2>Corpus Christi Unclaimed Property App</h2>
        <!-- <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
      </div>
<?php //include 'form.php'; ?> 
   <div class="row">
        <div class="col-md-12 order-md-1">
          <!-- <h4 class="mb-3">Billing address</h4> -->
<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="firstName">First name</label>
                <input type="text" name="firstname" class="form-control" id="firstName" placeholder="" value="" >
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" name="lastname" class="form-control" id="lastName" placeholder="" value="" >
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="lastName">Docket Number</label>
                <input type="text" name="docket" class="form-control" id="docket" placeholder="" value="" >
                <div class="invalid-feedback">
                  Valid Number is required.
                </div>
              </div>
            </div>
         
            <button class="btn btn-primary btn-lg btn-block" type="submit">SEARCH</button>
          </form>
          <br>

   <hr class="mb-4">
<?php 

  if (!empty($_POST)) {  

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $docket = $_POST["docket"];
    $servername = "localhost";
    $username = "root";
    $password = "velu12";
    $dbname = "unclaimed_property_db";
    $table = "";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 



    $sql = "SELECT * FROM INFO where FIRST_NAME LIKE '%".$firstname."%' and LAST_NAME LIKE '%".$lastname."%' and DOCKET LIKE '%".$docket."%'";
    // limit 10 offset 10";


    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

      echo "<table class='table-striped'>
      <tr>
      <th>NAME_FULL</th>
      <th>FIRST_NAME</th>
      <th>LAST_NAME</th>
      <th>SUFFIX</th>
      <th>ADDRESS</th>
      <th>CITY</th>
      <th>STATE</th>
      <th>ZIPCODE</th>
      <th>DOCKET</th>
      <th>TOTAL</th>
      </tr>";
      while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['NAME_FULL'] . "</td>";
          echo "<td>" . $row['FIRST_NAME'] . "</td>";
          echo "<td>" . $row['LAST_NAME'] . "</td>";
          echo "<td>" . $row['SUFFIX'] . "</td>";
          echo "<td>" . $row['ADDRESS'] . "</td>";
          echo "<td>" . $row['CITY'] . "</td>";
          echo "<td>" . $row['STATE'] . "</td>";
          echo "<td>" . $row['ZIPCODE'] . "</td>";
          echo "<td>" . $row['DOCKET'] . "</td>";
          echo "<td>" . $row['TOTAL'] . "</td>";
          echo "</tr>";
      }
      echo "</table>";
      $conn->close();

    } else {
        echo "0 results";
    }
  }
?>
<nav aria-label="...">
  <ul class="pagination">
    <li class="page-item disabled">
      <span class="page-link">Previous</span>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active">
      <span class="page-link">
        2
        <span class="sr-only">(current)</span>
      </span>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
        </div>
      </div>



      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 City of Corpus Christi</p>
        <ul class="list-inline">
        <!--   <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li> -->
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="vendor/popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="holder.min.js"></script>
    <script>

      $(document).ready( function () {
    $('#table_id').DataTable();
} );
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
