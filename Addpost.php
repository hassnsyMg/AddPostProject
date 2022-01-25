<?php
	$conn = mysqli_connect('localhost','root','','try');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = "SELECT * from addpost";
		$result = mysqli_query($conn,$stmt);
	}
?>
<DOCTYPE html>
<html>
    <head>
        <title>MG WorkSpace</title>
        <link rel="stylesheet" href="css/Style.css">
        <script src="js/insertimg.js"></script>
    </head>
    <body>
      <div class="topnav">
        <a href="index.html">Home</a>
        <a href="Select.php">Database</a>
        <a class="active" href="Addpost.php">Add Post</a>
        <a href="#about">Gallery</a>
        <a href="Try.php">Try</a>
        <a href="#contact">Contact</a>
      <div class="login-container">
      <form action="/action_page.php">
        <input type="text" placeholder="Username" name="username">
        <input type="text" placeholder="Password" name="psw">
        <button type="submit">Login</button>
      </form>
      </div>
      </div>

      <div id="database" class="fixTableHead">
      <table id="table"> 
        <thead>
            <tr class="trup"> 
              <th>ID</th>
              <th>FirstName</th>
              <th>LastName</th>
              <th>Age</th>
              <th>Image</th>
            </tr>
            </thead>
			<?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tbody>
            <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['fname'];?></td>
              <td><?php echo $row['lname'];?></td>
              <td><?php echo $row['age'];?></td>
              <td><img  class="imgbtn" src="<?php echo $row['img'];?>"></td>
            </tr>
            <?php } ?>
         </tbody>
          </table>
    
    </div>


    <div Class="Datasets">
      <form id="addpost" action="addpostconnect.php" method="post" enctype="multipart/form-data">

   
      <img id="imgFileUpload" src="img/emimg.png" class="imgbtn" />
      <input type="file" id="FileUpload" name="FileUpload" style="display: none" accept="image/*"/>
      <br>
      <label for="fnametxt"></label>
      <input type="text" id="fnametxt" name="fnametxt" class="txtinput1" placeholder="FirstName"/>
      <br>
      <label for="lnametxt"></label>
      <input type="text" id="lnametxt" name="lnametxt" class="txtinput1" placeholder="LastName"/>
      <br>
      <label for="agetxt"></label>
      <input type="number" id="agetxt" name="agetxt" class="txtinput1" placeholder="Age">
      <br>
      
      </form>   
      <input type="submit" value="Add" class="btnaddpost" form="addpost"/>
    </div>
    

    </body>





    <script type="text/javascript">
      var table = document.getElementById('table');
         for(var i = 1; i < table.rows.length; i++)
            {
              table.rows[i].onclick = function()
            {
               document.getElementById("idtxt").value = this.cells[0].innerHTML;
               document.getElementById("nametxt").value = this.cells[1].innerHTML;
               document.getElementById("sizetxt").value = this.cells[2].innerHTML;
               document.getElementById("colortxt").value = this.cells[3].innerHTML;
               document.getElementById("pricetxt").value = this.cells[4].innerHTML;
               document.getElementById("qtytxt").value = this.cells[5].innerHTML;
               document.getElementById("finaltxt").value = this.cells[6].innerHTML;
           };
      }

      var Clearbtn = document.getElementById('clearbtn');
          Clearbtn.onclick = function () {
               document.getElementById("idtxt").value = "";
               document.getElementById("nametxt").value = "";
               document.getElementById("sizetxt").value = "";
               document.getElementById("colortxt").value = "";
               document.getElementById("pricetxt").value = "";
               document.getElementById("qtytxt").value = "";
               document.getElementById("finaltxt").value = "";
          };
    </script>
</html>