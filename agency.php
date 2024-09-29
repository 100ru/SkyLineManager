<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--<title>Registration Form in HTML CSS</title>-->
    <!---Custom CSS File--->
    <link rel="stylesheet" href="style2.css" />
  </head>
  <body>
    <section class="container">
      <header>Agency Form</header>
      
      <form method="POST" class="form" onsubmit="return openPopup()">
        <div class="input-box">
          <label>a_id</label>
          <input type="text" placeholder="Enter Agency id" pattern="[a-z A-Z 0-9]*" name="ai" required />
        </div>

        <div class="input-box">
          <label>a_name</label>
          <input type="text" placeholder="Enter Agency Name" name="an" required />
        </div>
        <div class="input-box address">
          <label>a_city</label>
            <input type="text" placeholder="Enter Agency city"  name="ac" required />
          </div>
        <button><input type="submit" name="sb"></button>
        <button><a href="index.html#insert">Back</button></a>
      </form>
    </section>
    <?php 
$servername="localhost:3306";
$username="root";
$password="";
$database="dbms";
$con=mysqli_connect($servername,$username,$password,$database);
if(isset($_POST['sb']))
{
    $a_id=$_POST['ai'];
    $a_name=$_POST['an'];
    $a_city=$_POST['ac'];
    $query="INSERT INTO agency(a_id,a_name,a_city) values ('$a_id','$a_name','$a_city')";
    $run=mysqli_query($con,$query);
}

?>
<script>
        function openPopup() {
            var confirmation = confirm("Are you sure you want to submit the form?");

            return confirmation;
        }
    </script>
  </body>
</html>