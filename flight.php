<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--<title>Registration Form in HTML CSS</title>-->
    <!---Custom CSS File--->
    <link rel="stylesheet" href="style3.css" />
  </head>
  <body>
    <section class="container">
      <header>Flight Form</header>
      <form method="POST" class="form" onsubmit="return openPopup()">
        <div class="input-box">
          <label>f_id</label>
          <input type="text" placeholder="Enter Flight id" pattern="[a-z A-Z 0-9]*" name="fi" required />
        </div>

        <div class="input-box">
          <label>f_date</label>
          <input type="date" placeholder="Enter flight time" name="fd" required />
        </div>
          <div class="input-box">
            <label>f_time</label>
            <input type="time" placeholder="Enter flight date" name="ft" required />
          </div>
        </div>
        <div class="input-box address">
          <label>Source</label>
            <input type="text" placeholder="Enter your Source"  name="sr" required />
        <label>Destination</label>
        <input type="text" placeholder="Enter your Destination" name="des" required />
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
        $f_id=$_POST['fi'];
        $f_date=$_POST['fd'];
        $f_time=$_POST['ft'];
        $Source=$_POST['sr'];
        $Destination=$_POST['des'];
        $query="INSERT INTO flight(f_id,f_date,f_time,Source,Destination) values ('$f_id','$f_date','$f_time','$Source','$Destination')";
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