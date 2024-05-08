<?php
    session_start();
    $id ='';
    $id = '';
    $name = ''; 
    $photo = '';
    $price = '';
    $description = '';
    $ingredients = '';
    $expected_time = '';
    $quantiy = '';
    $cNo = '';
    include '../database/connect_once.php'; 
    $email = $_SESSION['email'];
    $string = $_SESSION['user_type'];
    preg_match('/\d$/', $string, $matches);
    $link = mysqli_connect("localhost", "root", "", "e_canteen");
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }


    if(isset($_POST["addNewItem"])){  
        $id ='';
        $id = '';
        $name = ''; 
        $photo = '';
        $price = '';
        $description = '';
        $ingredients = '';
        $expected_time = '';
        $quantiy = '';
        $cNo = '';
        $id = $_POST['txtID'];
        $id = strtoupper($id);
        $name = $_POST['txtName']; 
        $photo = $_POST['txtPhoto'];
        $price = $_POST['txtPrice'];
        $description = $_POST['txtDesc'];
        $ingredients = $_POST['txtIngred'];
        $expected_time = $_POST['time'];
        $quantiy = $_POST['quantity'];

        $cNo = $matches[0];
        $sqlAddItem = "INSERT INTO food_list (food_id, food_name, food_photo, food_pric, food_dec, food_ingred, expec_time, quantity, canteenNo) VALUES('$id', '$name', '$photo', '$price', '$description', '$ingredients', '$expected_time', '$quantiy', '$cNo');";
        if(mysqli_query($link, $sqlAddItem)){
            echo "Records added successfully.";
        }
        else{
            echo "Error" . mysqli_error($link);
        }
     }

     if(isset($_POST["btnEdit"])){
        $editId = $_POST['btnEdit'];
        $sqlEditRow = "SELECT * FROM food_list WHERE food_id='$editId'"; 
        $resultEdit = mysqli_query($link, $sqlEditRow);
        $rowEdit = mysqli_fetch_assoc($resultEdit);
    }
   
    if(isset($_POST["editNow"])){
      $id = $_POST['txtID'];
      $id = strtoupper($id);
      $name = $_POST['txtName']; 
      $photo = $_POST['txtPhoto'];
      $price = $_POST['txtPrice'];
      $description = $_POST['txtDesc'];
      $ingredients = $_POST['txtIngred'];
      $expected_time = $_POST['time'];
      $quantiy = $_POST['quantity'];

      $cNo = $matches[0];
      $sqlUpdate = "UPDATE food_list SET food_name = '$name', food_photo = '$photo', food_pric = '$price', food_dec= '$description', food_ingred='$ingredients' , expec_time= '$expected_time', quantity='$quantiy' WHERE food_id='$id';";
      if(mysqli_query($link, $sqlUpdate)){
          echo "Records Updated successfully.";
      }
      else{
          echo "Error" . mysqli_error($link);
      }
    }


    if(isset($_POST["deleteNow"])){
        $deleteId = $_POST['deleteNow'];
        $sqlDeleteRow = "DELETE FROM food_list WHERE food_id='$deleteId'"; 
        mysqli_query($link, $sqlDeleteRow); 
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Menu</title>
    <style>
        #floatingDiv {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        #editDiv {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        .confirmMenu{
            display: none;
        }
        .editMenu{
            display: none;
        }
    </style>
</head>
<body>
    <!-- I am admin! how can i help you -->
    
    <div class="p-5 bg-primary text-white text-center">
        <h1>E-Canteen</h1>
        <p>Get the Food Ready</p> 
    </div>
    
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
          <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="home/admin_index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./admin_orders.php">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="./admin_canteen_menu.php">Food Menu</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="./admin_canteen_history.php">History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./admin_canteen_feedbacks.php">Feedbacks</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./admin_canteen_report.php">Report</a>
            </li>   
          </ul>
        </div>
    </nav>
    <div id="canteen_menu" class="m-4">
      <?php
        $menu = "SELECT * FROM food_list";
        if($result = mysqli_query($link, $menu)){

        
        if (mysqli_num_rows($result) > 0) {
          echo '<br/>';
          echo '<form method="post" action="">';
          echo '<table class="table"> <thead class="thead -dark -sm">
              <tr>
                  <th>Sr. No.</th>
                  <th>Food ID</th>
                  <th>Food Photo</th>
                  <th>Food Name</th>
                  <th>Description</th>
                  <th>Food Price</th>
                  <th>Food Ingredients</th>
                  <th>Expected Time</th>
                  <th>Quantity </th>
              </tr></thead>
              <tbody>';

           $sr = 1;
          while ($row = mysqli_fetch_array($result)) {
      ?>
        <tr>
          <td><?php echo $sr;
                $sr++; ?></td>
          <td><?php echo $row['food_id']; ?></td>
          <td><img src="<?php echo $row['food_photo']; ?>" style="height:200px; width:200px;"></td>
          <td><?php echo $row['food_name']; ?></td>
          <td><?php echo $row['food_dec']; ?></td>
          <td><?php echo $row['food_pric']; ?></td>
          <td><?php echo $row['food_ingred']; ?></td>
          <td><?php echo $row['expec_time']; ?></td>
          <td><?php echo $row['quantity']; ?></td>
          <td>
              <button class="btn btn-warning" type="button" name="btnEdit" onclick="editDivshow()" value="<?php echo $row['food_id']; ?>">
                    <span><i class="fa fa-pencil" aria-hidden="true"></i></span>
                </button>
              <button class="btn btn-danger" type="submit" name="deleteNow" value="<?php echo $row['food_id']; ?>">
                    <span><i class="fa fa-trash" aria-hidden="true"></i></span>
                </button>
          </td>
        </tr>
          <?php
          } 
          ?>
          </tbody>
          </table>
          </form>
  <?php
        } else {
        }
        }
  ?>
    </div>



    
    <div>
        <button type="button" onclick="toggleFloatingDiv()">Add Menu</button>  
    </div>

    <div id="floatingDiv" class="confirmMenu">
        <form method="post" action="admin_canteen_menu.php" class="floatingContent">
            ID 
            <input type="text" name="txtID" placeholder="Food ID" required> <br/>
            Name 
            <input type="text" name="txtName" placeholder="" required> <br/>
            Photo Link 
            <input type="text" name="txtPhoto" placeholder="" required> <br/>
            Price 
            <input type="number" name="txtPrice" placeholder="" required> <br/>
            Description 
            <input type="text" name="txtDesc" placeholder="" required> <br/>
            Ingredients 
            <input type="text" name="txtIngred" placeholder="" required> <br/>
            Expected Time 
            <input type="number" name="time" placeholder="" required> <br/>
            Quantity 
            <input type="number" name="quantity" placeholder="" required> <br/>
            
            <button type="submit" name="addNewItem" onclick="closeFloatingDiv()"> Add to List</button>  
        </form>   
    </div>

    <div id="editDiv" class="editMenu">
    <form method="post" action="admin_canteen_menu.php" class="floatingContent">
        ID 
        <input type="text" name="txtID" value="<?php echo $rowEdit['food_id']; ?>"><br/>
        Name 
        <input type="text" name="txtName" value="<?php echo $rowEdit['food_name']; ?>"><br/>
        Photo Link 
        <input type="text" name="txtPhoto" value="<?php echo $rowEdit['food_photo']; ?>"><br/>
        Price 
        <input type="text" name="txtPrice" value="<?php echo $rowEdit['food_pric']; ?>"> <br/>
        Description 
        <input type="text" name="txtDesc"  value="<?php echo $rowEdit['food_dec']; ?>"><br/>
        Ingredients 
        <input type="text" name="txtIngred" value="<?php echo $rowEdit['food_ingred']; ?>"><br/>
        Expected Time 
        <input type="text" name="time" value="<?php echo $rowEdit['expec_time']; ?>"><br/>
        Quantity 
        <input type="text" name="quantity" value="<?php echo $rowEdit['quantity']; ?>"><br/>
        <button type="submit" name="editNow" onclick="editDivhide()">Edit to List</button>  
    </form>   
    </div>


    <script>
        function toggleFloatingDiv() {
            var insertintORDER = document.getElementById("floatingDiv");
            if (insertintORDER.style.display === "none" || insertintORDER.style.display === "") {
              insertintORDER.style.display = "block";
            } else {
              insertintORDER.style.display = "none";
            }
        }
        function closeFloatingDiv() {
            var floatingDiv = document.getElementById("floatingDiv");
            floatingDiv.style.display = "none";
         
        }

        function editDivshow(e) {
            // e.preventDefault();
            var editOrder = document.getElementById("editDiv");
            if (editOrder.style.display === "none" || editOrder.style.display === "") {
                editOrder.style.display = "block";
            }
        }
        function editDivhide() {
            var editDiv1 = document.getElementById("editDiv");
            editDiv1.style.display = "none";
        }


    </script>
    <div class="mt-5 p-4 bg-dark text-white text-center">
        <p>Footer</p>
    </div>
</body>
</html>
