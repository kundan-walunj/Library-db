<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style media="screen">
  header {
    position: sticky;
    top: 0;
  }

  .header {
    margin: 0;
    padding: 0px 20px;
    overflow: hidden;
    background-color: #000000;
  }

  .header h1 {
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
    background-color: #111111;
  }
</style>

<body>

  <header>
    <h1 align="center">LIBRARY MANAGEMENT SYSTEM</h1>
  </header>

  <div class="header">
    <h1>Library</h1>
    <ul>
      <li><a href="form.html">Insert</a></li>
      <li><a href="update.php">Update</a></li>
      <li><a href="delete.php">Delete</a></li>
      <li><a href="display.php">Display</a></li>
    </ul>
  </div>


  <?php
  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "BOOK";
  $conn = new mysqli($servername, $username, $password, $database);
  if ($conn->connect_error) {
    die("connection failed:" .$conn->connect_error);
  }


  $name = $_POST["name"];
  $isbn = $_POST["no"];
  $title = $_POST["titl"];
  $author = $_POST["author"];
  $publication = $_POST["publish"];

  $sql = "INSERT INTO bookinfo(BookName,ISBNNO,BookTitle,AuthorName,PublisherName) values ('$name','$isbn','$title','$author','$publication')";
  if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Record Inserted Successfully");';
    echo 'window.location.href="display.php"</script>';
  } else {
    echo "Error:" . $sql . "<br>" . $conn->error;
  }
  ?>

  
  </div>
</body>

</html>