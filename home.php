<?php 
session_start();
include_once("db_conn.php");

if(isset($_GET['delete'])){

    global $conn;

    $id = $_GET['delete'];

    $query = "DELETE FROM users WHERE id = {$id}";

    $delete_category_query = mysqli_query($conn,$query);
    
    header("Location: home.php?Delete=$id");

}

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12"> 
                <h5>Hello, <?php echo $_SESSION['user_name']; ?> welcome to PHP CRUD</h5>
                <a class="btn btn-sm btn-warning float-right" href="logout.php">Logout</a>
            </div>
            <div class="container">
                <h2>USERS</h2>
                <a class="btn btn-md btn-success" href="add_user.php">Add Users</a>
                <?php 
                if(isset($_GET['Success'])){
                       echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                       Successfully Added a new user
                     </div>"; 
                } else if(isset($_GET['Delete'])){
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                     Deleted User " . $_GET['Delete'];
                  echo "</div>"; 
                } else if(isset($_GET['SuccessfulyUpdated'])){
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    Successfully Updated User
                    </div>"; 
                }
                ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">ID Number</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Birth Date</th>
                        <th scope="col">Language</th>
                        <th scope="col">Interests</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php 
                        $sql = "SELECT * FROM users";

                        $result = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['surname']."</td>";
                            echo "<td>".$row['sa_id_number']."</td>";
                            echo "<td>".$row['mobile_number']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo "<td>".$row['birth_date']."</td>";
                            echo "<td>".$row['language']."</td>";
                            echo "<td>".$row['interests']."</td>";
                            echo "<td><a class='btn btn-danger' href='home.php?delete={$row["id"]}'>Delete</a><a class='btn btn-info' href='add_user.php?id={$row["id"]}'>Edit</a></td>";
                            echo "</tr>";
                        }

                       ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
}else{
    header("Location: index.php");
    exit();
}
?>