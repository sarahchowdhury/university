<?php
   session_start();
   $_id = $_SESSION['userid'];
   $dbconnect = mysqli_connect("localhost","root","","university");
   $check = "select * from student where ID = '$_id'";
   $query = mysqli_query($dbconnect,$check);
   while ($row = mysqli_fetch_array($query)){
   	$userid = $row['ID'];
   	$name = $row['name'];
   	//$email = $row['email'];
   }
   $_SESSION['username'] = $name;
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Home</title>
      <!-- Css Library -->
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
      <link rel="stylesheet" type="text/css" href="bootstrap/css/all.min.css" />
   </head>
   <body>
      <nav class="navbar navbar-default">
         <div class="container-fluid">
            <div class="navbar-header">
               <a class="navbar-brand" href="s_home.php">UIU e-Sites</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="s_home.php">Home</a></li>
            <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">Registration<span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li> <a href="preadvising.php">Pre-Advising</a></li>
                  <li><a href="selectsection.php">Section Selection</a></li>
                  </li>
               </ul>
            <li><a href="s_show_course.php">Resource</a></li>
            <li><a href="s_account.php">Account</a></li>
            <li><a href="s_result.php">Result</a></li>
            <li><a href="s_script_check.php">Script Recheck</a></li>
            <li><a href="#">Help</a></li>
            <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['username']?><span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>
			   </ul>
			   </li>
         </div>
      </nav>
      <div class="container text-center">
      <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
      <form role="form" action="sendmail.php" method="post">
      <div class="form-group">
      <label for="from">Your mail:</label>
      <input type="email" class="form-control" name="mail_from" required>
      </div>
      <div class="form-group">
      <label for="from">Email password:</label>
      <input type="password" class="form-control" name="pass" required>
      </div>
      <div class="form-group">
      <label for="from">Recipient:</label>
      <input type="email" class="form-control" name="mail_to" required>
      </div>
      <div class="form-group">
      <label for="sel1">Choose you problem</label>
      <select class="form-control" name="option" required>
      <option></option>
      <option name="P_registration">Registration</option>
      <option name="P_balance">Balance Update</option>
      <option name="P_courseDrop">Course Drop</option>
      <option name="P_courseSelection">Course and Section Selection</option>
      </select>
      </div>
      <div class="form-group">
      <label for="body">Description</label>
      <textarea class="form-control" rows="8" name="body" required>
      </textarea>
      </div>
      <button class="btn btn-lg btn-success custom" type="submit" name="send">Send</button>
      </form>
      </div>
      <div class="col-sm-2"></div>
      </div>
      </div>
      </div>
      <!-- javascript library -->
      <script type="text/javascript" src="bootstrap/js/jquery-1.10.2.min.js"></script>
      <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="bootstrap/js/all.min.js"></script>
   </body>
</html>