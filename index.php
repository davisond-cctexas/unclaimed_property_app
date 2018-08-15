<html>
<head>
    <!-- Bootstrap CDN -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Unclaimed Property Application</title>
    <link href="form-validation.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .table-condensed{ font-size: 14px !important;}
        .container{ max-width: 90% !important}
    </style>
</head>
<body class="bg-light">

<!-- =================================================================HEADING TITLE================================================================= -->
    <div class="container">
      <div class="py-5 text-center">
      <!--   <img class="d-block mx-auto mb-4" src="https://cdn.frontify.com/api/screen/thumbnail/cNRMIorqFHLeI8asIsP5lmfNOO2Z7Nlq_Y8VixAEC_82__GkIV8hs4Q26WCN9kpsh-norQV8dvG9lfMG-AW_qw/400" alt="" width="150" height="150"> -->
        <h2>Corpus Christi Unclaimed Property Application</h2>
        <!-- <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
      </div>
<?php //include 'form.php'; ?> 

<!-- =================================================================FORM================================================================= -->
   <div class="row">
        <div class="col-md-12 order-md-1">
          <!-- <h4 class="mb-3">Billing address</h4> -->
<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="firstName">First name</label>
                <input type="text" name="firstname" class="form-control" id="firstName" placeholder="" value=""  >
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" name="lastname" class="form-control" id="lastName" placeholder="" value=""  >
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="lastName">Docket Number</label>
                <input type="text" name="docket" class="form-control" id="docket" placeholder="" value=""  >
                <div class="invalid-feedback">
                  Valid Number is required.
                </div>
              </div>
            </div>
         <br>
            <button class="btn btn-primary btn-lg btn-block" type="submit">SEARCH</button>
          </form>
          

   <hr class="mb-4">


<!-- =================================================================TABLE RESULTS================================================================= -->

    <?php
      
      // if (!empty($_POST)) {  
            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $no_of_records_per_page = 20;
            $offset = ($pageno-1) * $no_of_records_per_page;

            $conn=mysqli_connect("localhost","root","velu12","unclaimed_property_db");
            // Check connection
            if (mysqli_connect_errno()){
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                die();
            }

            $total_pages_sql = "SELECT COUNT(*) FROM INFO";
            $result = mysqli_query($conn,$total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $docket = $_POST["docket"];
            $sql = "SELECT * FROM INFO where    FIRST_NAME LIKE '%".$firstname."%' and LAST_NAME LIKE '%".$lastname."%' and DOCKET LIKE '".$docket."%' LIMIT $offset, $no_of_records_per_page";
            $res_data = mysqli_query($conn,$sql);
            echo "<table class='table table-striped table-condensed table-bordered table-rounded'>
                  <tr>
                  <th>FULL NAME</th>
                  <th>FIRST NAME</th>
                  <th>LAST NAME</th>
                  <th>SUFFIX</th>
                  <th>ADDRESS</th>
                  <th>CITY</th>
                  <th>STATE</th>
                  <th>ZIPCODE</th>
                  <th>DOCKET</th>
                  <th>TOTAL</th>
                  </tr>";
            while($row = mysqli_fetch_array($res_data)){
          
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
            mysqli_close($conn);
      // } //ending if (!empty($_POST)) {  

    ?>
<div class="row text-center">
    <ul class="pagination justify-content-center">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
    </div>

</div>
<!-- =================================================================FOOTER================================================================= -->

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 City of Corpus Christi</p>
        <ul class="list-inline">
        <!--   <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li> -->
        </ul>
      </footer>
    </div>

<!-- =================================================================JAVASCRIPT LIBRARIES================================================================= -->

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