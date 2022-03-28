<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style media="screen">
    .container{
      background: #3175db;
      width: 500px;
      margin:10px auto;
      font-size: 18px;
      padding: 50px;
      color:white;
      font-family: Arial, Helvetica, sans-serif;
      height: 450px;
      border-radius: 25px;
    }
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
    </style>
  </head>
  <body>

    <header>
      <div class="header">
           <h1>Library</h1>
           <ul>
              <li><a href="form.html">Insert</a></li>
              <li><a href="update.php">Update</a></li>
              <li><a href="delete.php">Delete</a></li>
              <li><a href="display.php">Display</a></li>
          </ul>
     </div>
    </header>
    <div class="container">
      <h2 align="center">BOOK RECORDS</h2>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database ="BOOK";
    $conn = new mysqli($servername,$username, $password,$database);
    if($conn->connect_error)
    {
      die("connection failed:". $conn->connect_error);
    }
    $sql = "SELECT * FROM bookinfo";   //sql query to display table
    $result=$conn->query($sql);         //store it in result variable
    if($result->num_rows > 0)
    {

      echo"<table border='2', align='center' ,cellpadding='10' ,cellspacing='10'>
      <tr>
      <th> Book Name </th>
      <th>ISBN NO</th>
      <th> Title </th>
      <th> Author </th>
      <th> Publication </th>
      </tr>";


      while($row=$result->fetch_assoc())   //fetches a result row as an associative array.
      {

        echo "<tr><td>".$row["BookName"]."</td><td>".$row["ISBNNO"]."</td><td>".$row["BookTitle"]."</td><td>".$row["AuthorName"]."</td><td>".$row["PublisherName"]."</td>
        </tr>";
      }
      echo "</table>";
      }
      else
      echo "<center>No books found in the library  </center>" ;
      ?>
      </table>

        </div>
  </body>
</html>
