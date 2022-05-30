<?php 
    require_once('./config/dbconfig.php'); 
    $db = new operationss();
    $db->update();
    $id = $_GET['U_ID'];
    $result = $db->get_record($id);
    $data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Create Catagory</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2> Create Catagory</h2>
                    </div>
                        <?php $db->Store_record(); ?>
                        <div class="card-body">
                            <form method="POST">
                                catagory_id:<input type="text" name="catagory_id" placeholder=" catagory_id" class="form-control mb-2" ?>">
                                catagory_name: <input type="text" name="catagory_name" placeholder=" catagory_name" class="form-control mb-2" ?>">
                                catagory_description: <input type="text" name="catagory_description" placeholder=" catagory_description" class="form-control mb-2"   ?>">
                                
                        </div>
                    <div class="card-footer">
                            <button class="btn btn-success" name="btn_update"> Create Catagory </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>