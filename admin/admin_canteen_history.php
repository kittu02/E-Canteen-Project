<?php
   session_start();
   include '../database/connect_once.php'; 
   $email = $_SESSION['email'];
   $string = $_SESSION['user_type'];
   preg_match('/\d$/', $string, $matches);
   $link = mysqli_connect("localhost", "root", "", "e_canteen");
   if($link === false){
       die("ERROR: Could not connect. " . mysqli_connect_error());
   }
   $cNo = $matches[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Admin</title>
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
                <a class="nav-link" href="./admin_canteen_menu.php">Food Menu</a>
            </li>
            <li class="nav-item">
               <a class="nav-link active" href="./admin_canteen_history.php">History</a>
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

    <div class="placed_orders">
      <?php
        $orders = "SELECT * FROM list_order A JOIN user_table B ON A.gr_no=B.gr_no JOIN food_list C ON A.food_id=C.food_id;";
        if($result = mysqli_query($link, $orders)){
          if(mysqli_num_rows($result)>0){
            echo '<br/>';
            echo '<form method="POST" action="admin_orders.php">';
            echo '<table class="table"> <thead class="thead bg-light -sm">
                <tr>
                    <th>Order ID.</th>
                    <th>Order No.</th>
                    <th>Username</th> 
                    <th>GR No</th>
                    <th>Food ID</th>
                    <th>Food Name</th>
                    <th>Quantity</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Check Time</th>
                </tr></thead>';
                $sr=1;
                while($rows = mysqli_fetch_array($result)){
                  if($rows['order_status']==1){
      ?>
                <tr>
                  <!-- <td><?php echo $sr; $sr++; ?></td> -->
                  <td> <?php echo $rows['order_id']; ?> </td>
                  <td> <?php echo $rows['order_no']; ?> </td>
                  <td> <?php echo $rows['user_name']; ?> </td>
                  <td> <?php echo $rows['gr_no']; ?> </td>
                  <td> <?php echo $rows['food_id']; ?> </td>
                  <td> <?php echo $rows['food_name']; ?> </td>
                  <td> <?php echo $rows['quan']; ?> </td>
                  <td> <?php echo $rows['order_date']." ".$rows['order_time']; ?> </td>
                  <td> <?php echo $rows['order_status']; ?> </td>
                  <td> <?php echo $rows['food_pric'] * $rows['quan']; ?> </td>
                  <td> <?php echo $rows['payment_status']; ?> </td>
                  <td> <?php echo $rows['check_time']?> </td>
                </tr>  
      <?php
                  }
                }
          }
        }   
      ?>
          </tbody>
          </table>
          </form>
    </div>

    <div class="mt-5 p-4 bg-dark text-white text-center">
        <p>Footer</p>
    </div>
</body>
</html>
