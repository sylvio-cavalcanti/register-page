<?php
// $_POST[''] Here we must put the name we gave to our Submit Button in the index.php file
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // $conn is a variable which will hold a conection with our data base using the 'mysqli_connect()' function
    // mysqli_connect(host, username, password, dbname, port, socket)
    $conn= mysqli_connect('localhost', 'root', '', 'register_page') or die("Connection Faild: " .mysqli_connect_error());
    
    // 'isset()' checks whether a variable is set, which means that it has to be declared and is not NULL
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['bgroup'])) {
      // These variables here will be receiving the data from the input feilds in the index.php file
      // NOTE: The names must match what you've put in the 'name' attribute in each input element
      $name= $_POST['name']; 
      $email= $_POST['email']; 
      $phone= $_POST['phone'];
      $bgroup= $_POST['bgroup'];  

      // Inserting the data into the data base, into a specific TABLE. In this case, 'users'
      $sql= "INSERT INTO `users` (`name`, `email`, `phone`, `bgroup`) VALUES ('$name', '$email', '$phone', '$bgroup')";
      
      // Creating a 'query'
      $query = mysqli_query($conn, $sql);
      // Giving a message if it's successful or not
      if ($query) {
        echo 'Entry successful';
      } else {
        echo 'Error Occurred';
      }
    }
  }
?>
