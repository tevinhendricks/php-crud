<?php 

include_once("db_conn.php");

if(isset($_POST['create_user'])){
    // echo $_POST['title'];\
    echo '<pre>'.print_r($_POST,true).'</pre>';
    global $conn;

    $username = strtolower($_POST['name']);;
    $password ="password123";
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $id_number = $_POST['id_number'];
    $mobile_number = $_POST['mobile_number'];
    $email = $_POST['email'];
    $birth_date = $_POST['birth_date'];
    $language = $_POST['language'];
    if($_POST['interests']){
        $_POST['interests'] = implode(', ', $_POST['interests']);
    }

    $interests = $_POST['interests'];

    $query = "INSERT INTO users(`user_name`, `password`, `name`, `surname`, `sa_id_number`, `mobile_number`, `email`, `birth_date`, `language`, `interests`) ";
    $query .= "VALUES('{$username}','{$password}','{$name}','{$surname}','{$id_number}','{$mobile_number}','{$email}','{$birth_date}','{$language}','{$interests}' ) ";
    
    // echo $query;
    // die();

    $create_post_query = mysqli_query($conn,$query);

    if(!$create_post_query){
        die("QUERY FAILED " . mysqli_error($conn));

    }else{
        
        header("Location: home.php?Success");
    }


    // confirm($create_post_query);
}
if(isset($_POST['update_user'])){
    // echo $_POST['title'];\
    global $conn;

    $id = $_GET['id'];
    $username = strtolower($_POST['name']);
    $password ="password123";
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $id_number = $_POST['id_number'];
    $mobile_number = $_POST['mobile_number'];
    $email = $_POST['email'];
    $birth_date = $_POST['birth_date'];
    $language = $_POST['language'];
    
    if($_POST['interests']){
        $_POST['interests'] = implode(', ', $_POST['interests']);
    }

    $interests = $_POST['interests'];


    $query = "UPDATE users SET `name` ='{$name}', `surname`='{$surname}', `sa_id_number`='{$id_number}', `mobile_number`='{$mobile_number}', `email`='{$email}', `birth_date`='{$birth_date}', `language`='{$language}', `interests`='{$interests}'";
    $query .= "WHERE id = $id ";
    
    // echo $query;
    // die();

    $update_post_query = mysqli_query($conn,$query);

    if(!$update_post_query){
        die("QUERY FAILED " . mysqli_error($conn));

    }else{
        
        header("Location: home.php?SuccessfulyUpdated");
    }


    // confirm($create_post_query);
}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body  class="h-100">
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-6 col-sm-12 col-lg-6">
            <div style='border:2px solid #eeeeee; padding:35px;'>
                 <a class="btn btn-primary float-right" href="home.php">Home</a>
                <h2>Add User</h2>
                <?php 
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $query = "SELECT * FROM users WHERE id = $id ";
                    $user_info = mysqli_query($conn,$query);

                   

                    while($row = mysqli_fetch_assoc($user_info)){ ?>
                        
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="name">
                            </div>
                            <div class="form-group">
                                <label for="surname">Last Name</label>
                                <input type="text" class="form-control"  value="<?php echo $row['surname'];?>" name="surname">
                            </div>
                            <div class="form-group">
                                <label for="id_number">SA ID Number</label>
                                <input type="text" class="form-control"  value="<?php echo $row['sa_id_number']; ?>" name="id_number">
                            </div>
                            <div class="form-group">
                                <label for="mobile_number">Mobile Number</label>
                                <input type="text" class="form-control"  value="<?php echo $row['mobile_number']; ?>" name="mobile_number">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control"  value="<?php echo $row['email']; ?>" name="email">
                            </div>
                            <div class="form-group">
                                <label for="birth_date">Birth Date</label>
                                <input type="date" class="form-control"  value="<?php echo $row['birth_date']; ?>" name="birth_date">
                            </div>
                            <!-- <div class="form-group">
                                <label for="language">Language</label>
                                <input type="text" class="form-control"  value="<?php echo $row['language']; ?>" name="language">
                            </div> -->
                            <div class="form-group">
                                <label for="language">Language</label>
                                <select class="form-control" name="language" value="<?php echo $row['language']; ?>">
                                <option value="English">English</option>
                                <option value="Afrikaans">Afrikaans</option>
                                <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="interests">Interests</label>
                                <select multiple class="form-control" name="interests[]" value="<?php echo $row['interests']; ?>">
                                <option value="Soccer">Soccer</option>
                                <option value="Movies">Movies</option>
                                <option value="Tennis">Tennis</option>
                                <option value="Music">Music</option>
                                <option value="Art">Art</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" type="submit" name="update_user" value="Update User">
                            </div>
                        </form>
                   <?php }
                }else{
                ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="surname">Last Name</label>
                        <input type="text" class="form-control" name="surname">
                    </div>
                    <div class="form-group">
                        <label for="id_number">SA ID Number</label>
                        <input type="text" class="form-control" name="id_number">
                    </div>
                    <div class="form-group">
                        <label for="mobile_number">Mobile Number</label>
                        <input type="text" class="form-control" name="mobile_number">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Birth Date</label>
                        <input type="date" class="form-control" name="birth_date">
                    </div>
                    <div class="form-group">
                        <label for="language">Language</label>
                        <select class="form-control" name="language">
                        <option value="English">English</option>
                        <option value="Afrikaans">Afrikaans</option>
                        <option value="Other">Other</option>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label for="interests">Interests</label>
                        <input type="text" class="form-control" name="interests">
                    </div> -->
                    <div class="form-group">
                        <label for="interests">Interests</label>
                        <select multiple class="form-control" name="interests[]">
                        <option value="Soccer">Soccer</option>
                        <option value="Movies">Movies</option>
                        <option value="Tennis">Tennis</option>
                        <option value="Music">Music</option>
                        <option value="Art">Art</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" type="submit" name="create_user" value="Submit">
                    </div>
                </form>

                <?php } ?>
            </div> 
        </div> 
    </div> 
</div>
</body>
</html>