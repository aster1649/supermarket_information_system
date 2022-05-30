<?php 
    require_once('./config/dbconfig.php'); 
    $db = new operationsss();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Supermarket product Registration</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2> Product Registration Form </h2>
                    </div>
                        <?php $db->Store_Record(); ?>
                        <div class="card-body">
                            <form method="POST">
                                Product ID:<input type="number" name="product_id" placeholder=" product_id" class="form-control mb-2" required>
                                Product Name: <input type="text" name="product_name" placeholder=" product_name" class="form-control mb-2" required >
                                Measurement: <input type="text" name="measurement" placeholder=" measurement" class="form-control mb-2" required >
                                Quantity: <input type="number" name="quantity" placeholder=" quantity" class="form-control mb-2" required >	
                                Unit Price: <input type="number" name="unit_price" placeholder=" unit_price" class="form-control mb-2" required >
				                Expiry Date: <input type="number" name="expiry_date" placeholder="expiry_date" class="form-control mb-2" required>
                        </div>
                    <div class="card-footer">
                            <button class="btn btn-success" name="btn_save"> Save </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>