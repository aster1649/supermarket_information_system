<?php 
    
    require_once('./config/dbconfig.php'); 
    $db = new operationss();
    $result=$db->view_record();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Create Catagorys</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="text-center text-dark"> Catagory Records</h2>
                    </div>
                    <div class="card-body">
                        <?php
                              $db->display_message(); 
                              $db->display_message();
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <td style="width: 10%"> catagory id </td>
                                <td style="width: 10%"> catagory name </td>
                                <td style="width: 20%"> catagory description </td>


                                <td style="width: 20" colspan="2">catagoryOperations</td>
                            </tr>
                            <tr>
                                <?php 
                                    while($data = mysqli_fetch_assoc($result))
                                    {
                                ?>
                                    <td><?php echo $data['catagory_id'] ?></td>
                                    <td><?php echo $data['catagory_name'] ?></td>
                                    <td><?php echo $data['catagory_description'] ?></td>

				    <td><a href="createCatagory.php?U_ID=<?php echo $data['catagory_id'] ?>" class="btn btn-success">Create Catagory</a></td>
                            </tr>
                            <?php
                                    }
                                ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>