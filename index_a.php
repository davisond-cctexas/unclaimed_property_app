<?php 


// require_once 'Paginator.php';

//   $firstname = "AARON";
//     $lastname = $_POST["lastname"];
//     // $docket = 1955565;
//     $docket = $_POST["docket"];;
//     $servername = "localhost";
//     $username = "root";
//     $password = "velu12";
//     $dbname = "unclaimed_property_db";
//     $table = "";

 
//     $conn       = new mysqli($servername, $username, $password, $dbname);
//     $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 25;
//     $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
//     $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;

//      $query = "SELECT * FROM INFO where FIRST_NAME LIKE '%".$firstname."%' and LAST_NAME LIKE '%".$lastname."%' and DOCKET LIKE '%".$docket."%'";

//         // $query = "SELECT * FROM INFO";


//     $Paginator  = new Paginator( $conn, $query );
 
//     $results    = $Paginator->getData( $page, $limit );
    

 ?>
<!DOCTYPE html>
    <head>
    

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
    <body>
        <div class="container">
                 <div class="py-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
        <h2>Corpus Christi Unclaimed Property App</h2>
        <!-- <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
      </div>

             
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





                <div class="col-md-10 col-md-offset-1">
                
                <table class="table table-striped table-condensed table-bordered table-rounded">
                        <thead>
                                <tr>
                                <th width="20%">Full Name</th>
                                <th width="20%">First Name</th>
                                <th width="25%">Last Name</th>
                                <th width="25%">Suffix</th>
                                <th width="25%">Address</th>
                                <th width="25%">City</th>
                                <th width="25%">Zipcode</th>
                                <th width="25%">Docket</th>
                                <th width="25%">Total</th>
                        </tr>
                        </thead>
                        <tbody>

                <?php 
                  if (!empty($_POST)) {  
                    echo $_POST['firstname'] . '<br>';
                    echo $_POST['lastname'] . '<br>';
                    echo $_POST['docket'] . '<br>';

                    require_once 'Paginator.php';

                    $firstname = $_POST['firstname'];
                    $lastname = $_POST["lastname"];
                    $docket = $_POST["docket"];;

                    $servername = "localhost";
                    $username = "root";
                    $password = "velu12";
                    $dbname = "unclaimed_property_db";
                    $conn       = new mysqli($servername, $username, $password, $dbname);
                    $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
                    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
                    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;

     $query = "SELECT * FROM INFO where FIRST_NAME LIKE '%".$firstname."%' or LAST_NAME LIKE '%".$lastname."%' or DOCKET LIKE '%".$docket."%'";

                    $Paginator  = new Paginator( $conn, $query );
                    $results    = $Paginator->getData();
                  }

                 ?>

                <?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
                <tr>
                <td><?php echo $results->data[$i]['NAME_FULL']; ?></td>
                <td><?php echo $results->data[$i]['FIRST_NAME']; ?></td>
                <td><?php echo $results->data[$i]['LAST_NAME']; ?></td>
                <td><?php echo $results->data[$i]['SUFFIX']; ?></td>
                <td><?php echo $results->data[$i]['ADDRESS']; ?></td>
                <td><?php echo $results->data[$i]['CITY']; ?></td>
                <td><?php echo $results->data[$i]['ZIPCODE']; ?></td>
                <td><?php echo $results->data[$i]['DOCKET']; ?></td>
                <td><?php echo $results->data[$i]['TOTAL']; ?></td>
                </tr>
                <?php endfor; ?>






                        </tbody>
                </table>
        <nav aria-label="Page navigation example">
                   <?php echo $Paginator->createLinks( $links, 'pagination justify-content-center' ); ?> 
               </nav>
                </div>
        </div>
    

    
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>


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
