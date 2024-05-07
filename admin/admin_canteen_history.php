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


    <div class="mt-5 p-4 bg-dark text-white text-center">
        <p>Footer</p>
    </div>
</body>
</html>