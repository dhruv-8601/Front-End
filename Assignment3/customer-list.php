
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; 
   charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Book Template</title>

<link rel="shortcut icon" href="../../assets/ico/favicon.png">

<!-- Bootstrap core CSS -->
<link href="bootstrap3_bookTheme/dist/css/bootstrap.min.css"
	rel="stylesheet">
<!-- Bootstrap theme CSS -->
<link href="bootstrap3_bookTheme/theme.css" rel="stylesheet">


<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
   <script src="bootstrap3_bookTheme/assets/js/html5shiv.js"></script>
   <script src="bootstrap3_bookTheme/assets/js/respond.min.js"></script>
   <![endif]-->
</head>

<body>
<?php
$host = "localhost";
$username = "bookrep";
$password = "book@rep20";
$database = "bookcrm";
$pdo = mysqli_connect($host, $username, $password);
if (! $pdo)
    die("Could not connect to the database.");

mysqli_select_db($pdo, $database);
?>

<?php include 'includes/book-header.inc.php'; ?>
 
<div class="container">
		<div class="row">
			<!-- start main content row -->

			<div class="col-md-2">
				<!-- start left navigation rail column -->
         <?php include 'includes/book-left-nav.inc.php'; ?>
      </div>
			<!-- end left navigation rail -->

			<div class="col-md-8">
				<!-- start main content column -->

				<!-- book panel  -->
				<div class="panel panel-danger spaceabove">
					<div class="panel-heading">
						<h4>My Customers</h4>
					</div>
					<table class="table">
						<tr>
							<th><a href="customer-list.php?sort=lastName">Name</a></th>
							<th>Email</th>
							<th>Address</th>
							<th><a href="customer-list.php?sort=city">City</a></th>
							<th><a href="customer-list.php?sort=country">Country</a></th>
						</tr>
     <?php
    if (isset($_GET["sort"])) {
        if ($_GET["sort"] == "lastName") {
            $sqlQuery = "SELECT * FROM customers ORDER BY lastName ASC";
        }
        if ($_GET["sort"] == "city") {
            $sqlQuery = "SELECT * FROM customers ORDER BY city ASC";
        }
        if ($_GET["sort"] == "country") {
            $sqlQuery = "SELECT * FROM customers ORDER BY country ASC";
        }
    } else {
        $sqlQuery = "SELECT * FROM customers ORDER BY lastName ASC";
    }
    $result = mysqli_query($pdo, $sqlQuery);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount == 0)
        echo "*** There are no rows to display from the Person table ***";
    else {
        for ($i = 0; $i < $rowCount; ++$i) {
            $row = mysqli_fetch_row($result);

            echo "<br/>";
            // ini_set('display_errors', 1);

            echo "<table>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<th>" . $row["firstName"] . " " . $row["lastName"] . "</th>";
                echo "<th>" . $row["email"] . "</th>";
                echo "<th>" . $row["address"] . "</th>";
                echo "<th>" . $row["city"] . "</th>";
                echo "<th>" . $row["country"] . "</th>";
                echo "</tr>";
            }

            mysqli_close($pdo);
            // ini_set('display_errors', 1);
        }
    }
    ?> 
           </table>
				</div>
			</div>

			<div class="col-md-2">
				<!-- start left navigation rail column -->
				<div class="panel panel-info spaceabove">
					<div class="panel-heading">
						<h4>Categories</h4>
					</div>
					<ul class="nav nav-pills nav-stacked">

					</ul>
				</div>

				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>Imprints</h4>
					</div>
					<ul class="nav nav-pills nav-stacked">

					</ul>
				</div>
			</div>
			<!-- end left navigation rail -->


		</div>
		<!-- end main content column -->
	</div>
	<!-- end main content row -->
	</div>
	<!-- end container -->





	<!-- Bootstrap core JavaScript
 ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="bootstrap3_bookTheme/assets/js/jquery.js"></script>
	<script src="bootstrap3_bookTheme/dist/js/bootstrap.min.js"></script>
	<script src="bootstrap3_bookTheme/assets/js/holder.js"></script>
</body>
</html>
