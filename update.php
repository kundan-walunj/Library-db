<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style media="screen">
    <style>
  header{
    position:sticky;
    top:0;
  }

  .header{
    margin: 0;
    padding: 0px 20px;
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

  .f1 {
    background: #3175db;
    width: 500px;
    margin:10px auto;
    font-size: 18px;
    padding: 50px;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    border-radius: 25px;

  }
  .container p{
    margin-left: 0;
    font-size: 10px;
    font-weight: bold;

  }

  input[type=text] {

    width: 400px;
    padding: 10px;
    display: inline-block;
  }
  button {
    padding: 10px ;
    cursor: pointer;
    text-align: center;
    width: 150px;
    border-radius: 25px;
    margin-left: 50px;

  }


    </style>
    <script type="text/javascript" >

     function myvalidate()
     {
       var name=document.getElementById('bookname').value;
       var no=document.getElementById('no').value;
       var ti=document.getElementById('titl').value;
       var au=document.getElementById('author').value;
       var pu=document.getElementById('publish').value;


       var flag=1;

       if (name == "")
       {
         document.getElementById('bname').innerHTML="Please enter a name";
          flag=0;

       }
       if (isNaN(no) || no.length!=4)
       {
         document.getElementById('ino').innerHTML="Please Enter a Valid ISBN NO";
         falg=0 ;

       }
       if (ti == "")
       {
         document.getElementById('btitle').innerHTML="Please enter Book Title";

         flag=0;
       }
       if (au == "")
       {
         document.getElementById('bauthor').innerHTML="Please Enter Author Name";

         flag=0;
       }
       if (pu == "")
       {
         document.getElementById('bpublish').innerHTML="Please Enter Publisher Name";


         flag=0;
       }

       if(flag==0)
       {
         return false;
       }
       else {
         return true;
       }
     }

      function validate()
      {
        document.getElementById('bname').innerHTML="";
        document.getElementById('ino').innerHTML="";
        document.getElementById('btitle').innerHTML="";
        document.getElementById('bauthor').innerHTML="";
        document.getElementById('bpublish').innerHTML="";

      }
    </script>

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
      <form class="fm" action="update.php" onsubmit="return myvalidate()" method="post">
        <div class="f1">


          <label for="">Book Name</label>
          <br>
          <input type="text" id="bookname" class="iname" name="name" value="">
          <p id="bname" class="error"></p>

          <label for="">ISBN NO</label>
          <br>
          <input type="text" class="ino"id="no" name="no" value="">
          <p id="ino" class="error"></p>

          <label for="">Book Title</label>
          <br>
          <input type="text" id="titl" name="titl" value="">
          <p id="btitle" class="error" value=""></p>


          <label for="">Author Name</label>
          <br>
          <input type="text" id="author" name="author" value="">
          <p id="bauthor" class="error"></p>


          <label for="">Publisher Name</label>
          <br>
          <input type="text" id="publish" name="publish" value="">
          <p id="bpublish" class="error"></p>
          <br>


        <button type="submit" class=" btn btn-outline-light submit" name="submit">UPDATE</button>
        <button type="reset" class="btn btn-outline-light" id="reset" onclick="validate()" value="reset" name="reset">RESET</button>


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
              echo "hello";

                $name=$_POST["name"];
                $isbn=$_POST["no"];
                $title=$_POST["titl"];
                $author=$_POST["author"];
                $publication=$_POST["publish"];

                $sqlget="SELECT * FROM bookinfo WHERE ISBNNO=$isbn;";
                $result = mysqli_query($conn,$sqlget);
                $resultCheck=MYSQLI_NUM_ROWS($result);//returns the number of rows in a result set.

                if($resultCheck>0)
                {                       //update that row
                  $sql="UPDATE  bookinfo SET BookName='$name',BookTitle='$title',AuthorName='$author',PublisherName='$publication' WHERE ISBNNO=$isbn;";
                  if($conn->query($sql)) //true
                  {
                    echo '<script>alert("Record Updated Successfully");';
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
