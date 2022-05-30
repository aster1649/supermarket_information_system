<?php 
    require_once('./config/dbconfig.php'); 
    $db = new operationsss();
    $db->update();
    $ISBN = $_GET['U_ID'];
    $result = $db->get_record($product_id);
    $data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Update product</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2> Update Record </h2>
                    </div>
                        <?php $db->Store_record(); ?>
                        <div class="card-body">
                            <form method="POST">
                                Product Id:<input type="text" name="product_id" placeholder=" product id" class="form-control mb-2" required  ?>
                                Product Name: <input type="text" name="product_name" placeholder=" product name" class="form-control mb-2" required  ?>
                                Measurement: <input type="text" name="measurement" placeholder=" measurement" class="form-control mb-2" required  ?>
                                Quantity: <input type="number" name="quantity" placeholder=" quantity" class="form-control mb-2" required v ?>
                                Unit Price: <input type="text" name="unit_price" placeholder=" unit price" class="form-control mb-2" required ?>
				               Expiry Date: <input type="date" name="expiry_date" placeholder="expiry date" class="form-control mb-2" required  ?>
                        </div>
                    <div class="card-footer">
                            <button class="btn btn-success" name="btn_update"> Update </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>