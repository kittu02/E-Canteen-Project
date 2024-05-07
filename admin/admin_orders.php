
<?php
    include '../database/connect_once.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Admin</title>
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
        .confirmMenu{
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
              <a class="nav-link active" href="./admin_orders.php">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./admin_canteen_menu.php">Food Menu</a>
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

    <div>
        <button type="button" onclick="toggleFloatingDiv()">Add Menu</button>  
    </div>
    <div id="floatingDiv" class="confirmMenu">
        <form method="post" action="" class="floatingContent">
            <label> Name <label>
            <input type="text" name="" placeholder="" required> <br/>
            <button type="button"  onclick="closeFloatingDiv()"> Add to List</button>  
        </form>   
    </div>

    <div class="mt-5 p-4 bg-dark text-white text-center">
        <p>Footer</p>
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

    </script>

</body>
</html>
