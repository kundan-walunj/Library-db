<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style media="screen">
    header{
      position:sticky;
      top:0;
    }

    .header {
    margin: 0;
    padding: 0 20px;
    overflow: hidden;
    background-color: #3175db;
}

    .header h1{
      float: left;
      display: block;
      color: white;
    }
    .header ul {
      list-style-type: none;
    }

    .header li {
      float: right;
    }

    .header li a {
      display: block;
      color: white;
      text-align: center;
      padding: 16px;
      text-decoration: none;
    }

    .header li a:hover {
      background-color: #1e58b1;
    }
 .container{

     background: #3175db;
     width: 450px;
     margin:200px auto;
     font-size: 18px;
     padding: 50px;
     font-family: Arial, Helvetica, sans-serif;
     height: 250px;
     color:white;
     border-radius: 25px;
 }
    input[type=text] {

      width: 200px;
      padding: 10px;
      display: inline-block;
    }
    label {
        font-size: 20px;
    }
    .btn {

      color: black;
      padding: 10px 10px;
      border-radius: 5px;
      cursor: pointer;
      margin-left: 10px;


    }

    }
    </style>
  </head>
  <body>

    <header>


        <div class="header">
             <h1>MyLibrary</h1>
             <ul>
                <li><a href="form.html">Insert</a></li>
                <li><a href="update.php">Update</a></li>
                <li><a href="delete.php">Delete</a></li>
                <li><a href="display.php">Display</a></li>
            </ul>
       </div>

    </header>

      <form action = "delete.php" method="post">
      	 <div class="container">
       <center>  <h1>Delete a Book</h1> </center>

      <center>
      <label> <b> Enter ISBN </b></label>
      <input type="text" name="isbn"  required>
      <p></p>

      <button type="submit"  name="submit" value="Delete " class="btn btn-outline-light" required>Delete</button>
      </center>
      <br>
      </div>
      </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database ="BOOK";
    $conn = new mysqli($servername,$username,$password,$database);
    if($conn->connect_error)
    {
      die("connection failed:". $connect_error);
    }

    if (isset($_POST['submit']))  
    {
        $isbn=$_POST["isbn"];   //get value of isbn and send it to server
        $sqlget="SELECT * FROM bookinfo WHERE ISBNNO=$isbn;";
            $result = mysqli_query($conn,$sqlget);
            $resultCheck=MYSQLI_NUM_ROWS($result);//returns the number of rows in a result set.

        if($resultCheck>0)
        {
            $sql="DELETE FROM bookinfo WHERE ISBNNO ='$isbn'";
            if($conn->query($sql))
            {
              echo '<script>alert("Record Deleted Successfully");';
              echo 'window.location.href="display.php"</script>';
            }
            else {
            echo "Error:" .$sql . "<br>" . $conn->error;
            }
        }
        else
        {
            echo '<script>alert("Record Doesnot Exists");</script>';
        }
      }
    ?>


  </body>
</html>
