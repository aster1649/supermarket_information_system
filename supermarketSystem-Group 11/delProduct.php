<?php 

    require_once('./config/dbconfig.php');
    $db = new operationsss();
    
    if(isset($_GET['D_ID']))
    {
        global $db;
        $ISBN = $_GET['D_ID'];

        if($db->Delete_Record($product_id))
        {
            $db->set_messsage('<div class="alert alert-danger">  Your Record Has Been Deleted </div>');
            header("location:viewProduct.php");
        }
        else
        {
            $db->set_messsage('<div class="alert alert-danger">  Something Went Wrong </div>'); 
        }
    }


?>