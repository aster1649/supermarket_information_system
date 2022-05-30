<?php 
    require_once('./config/dbconfig.php'); 
    $db = new operations();
    $db->update();
    $customer_id = $_GET['U_ID'];
    $result = $db->get_record($customer_id);
    $data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Update cust.</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2> Update Record </h2>
                    </div>
                        <?php $db->Store_Record(); ?>
                        <div class="card-body">
                            <form method="POST">
                                <input type="hidden" name="customer_id" value="<?php echo $data['customer_id']; ?>">
                                Customer Id: <input type="text" name="customer_id" placeholder=" customer id" class="form-control mb-2" required value="<?php echo $data['customer_id']; ?>">
                                Name: <input type="text" name="Name" placeholder=" customer Name" class="form-control mb-2" required value="<?php echo $data['Name']; ?>">
                                TIN: <input type="text" name="TIN" placeholder=" TIN" class="form-control mb-2" required value="<?php echo $data['TIN']; ?>">	
                                <br>Phone:<input type="phone" name="phone" placeholder="Phone" class="form-control mb-2" required value="<?php echo $data['phone']; ?>">
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