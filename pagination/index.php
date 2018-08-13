<?php 


require_once 'Paginator.php';

  $firstname = "AARON";
    $lastname = $_POST["lastname"];
    // $docket = 1955565;
    $docket = $_POST["docket"];;
    $servername = "localhost";
    $username = "root";
    $password = "velu12";
    $dbname = "unclaimed_property_db";
    $table = "";

 
    $conn       = new mysqli($servername, $username, $password, $dbname);
 
    $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 25;
    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;

     $query = "SELECT * FROM INFO where FIRST_NAME LIKE '%".$firstname."%' and LAST_NAME LIKE '%".$lastname."%' and DOCKET LIKE '%".$docket."%'";

        // $query = "SELECT * FROM INFO";


    $Paginator  = new Paginator( $conn, $query );
 
    $results    = $Paginator->getData( $page, $limit );
    echo count($results);

 ?>
<!DOCTYPE html>
    <head>
        <title>PHP Pagination</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
        <div class="container">
                <div class="col-md-10 col-md-offset-1">
                <h1>Pagination</h1>
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
                   <?php echo $Paginator->createLinks( $links, 'pagination' ); ?> 
               </nav>
                </div>
        </div>

        <nav aria-label="Page navigation example">
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
</nav>

        </body>
</html>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="bootstrap.min.js"></script>