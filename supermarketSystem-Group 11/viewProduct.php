<?php 
    
    require_once('./config/dbconfig.php'); 
    $db = new operationsss();
    $result=$db->view_record();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>View products</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="text-center text-dark"> Product Records</h2>
                    </div>
                    <div class="card-body">
                        <?php
                              $db->display_message(); 
                              $db->display_message();
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <td style="width: 10%"> Product Id </td>
                                <td style="width: 10%"> Product Name </td>
                                <td style="width: 20%"> Measurement </td>
                                <td style="width: 20%"> Quantity</td>
                                <td style="width: 20%"> unit Price </td>
                                <td style="width: 20%"> Expiry Date </td>
				<!--<td style="width: 20%"> No. of copy </td>
                                <td style="width: 20" colspan="2">Operations</td> -->
                            </tr>
                            <tr>
                                <?php 
                                    while($data = mysqli_fetch_assoc($result))
                                    {
                                ?>
                                    <td><?php echo $data['product_id'] ?></td>
                                    <td><?php echo $data['product_name'] ?></td>
                                    <td><?php echo $data['measurement'] ?></td>
                                    <td><?php echo $data['quantity'] ?></td>
                                    <td><?php echo $data['unit_price'] ?></td>
                                    <td><?php echo $data['expiry_date'] ?></td>
                                    <td><a href="editProduct.php?U_ID=<?php echo $data['product_id'] ?>" class="btn btn-success">Edit</a></td>
                                    <td><a href="delProduct.php?D_ID=<?php echo $data['product_id'] ?>" class="btn btn-danger">Delete</a></td>
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