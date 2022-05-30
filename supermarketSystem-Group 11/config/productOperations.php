<?php 

    
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class operationsss extends dbconfig
    {
        // Insert Record in the Database
        public function Store_Record()
        {
            global $db;
            if(isset($_POST['btn_save']))
            {
                $product_id = $db->check($_POST['product_id']);
                $product_name = $db->check($_POST['product_name']);
                $measurement = $db->check($_POST['measurement']);
                $quantity = $db->check($_POST['quantity']);
                $unit_price = $db->check($_POST['unit_price']);
                $expiry_date = $db->check($_POST['expiry_date']);

                if($this->insert_record($product_id,$product_name,$measurement,$quantity,$unit_price,$expiry_date))
                {
                    echo '<div class="alert alert-success"> Your Record Has Been Saved :) </div>';
                }
                else
                {
                    echo '<div class="alert alert-danger"> Failed </div>';
                }
            }
        }

        // Insert Record in the Database Using Query    
        function insert_record($a,$b,$c,$d,$e,$f)
        {
            global $db;
            $query = "insert into products (product_id,product_name, measurement,quantity,unit_price,expiry_date) values('$a','$b','$c','$d','$e','$f')";
            $result = mysqli_query($db->connection,$query);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }


        // View Database Record
        public function view_record()
        {
            global $db;
            $query = "select * from products";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }

        // Get Particular Record
        public function get_record($product_id)
        {
            global $db;
            $sql = "select * from products where product_id='$product_id'";
            $data = mysqli_query($db->connection,$sql);
            return $data;

        }

        // Update Record
        public function update()
        {
            global $db;

            if(isset($_POST['btn_update']))
            {
                $product_id = $_POST['product_id'];
                $product_name = $db->check($_POST['product_name']);
                $measurement = $db->check($_POST['measurement']);
                $quantity = $db->check($_POST['quantity']);
                $unit_price = $db->check($_POST['unit_price']);
                $expiry_date = $db->check($_POST['expiry_date']);

                if($this->update_record($product_id,$product_name,$measurement,$quantity,$unit_price,$expiry_date))
                {
                    $this->set_messsage('<div class="alert alert-success"> Your Record Has Been Updated : )</div>');
                    header("location:viewCustomer.php");
                }
                else
                {   
                    $this->set_messsage('<div class="alert alert-success"> Something Wrong : )</div>');
                }

               
            }
        }

        // Update Function 2
        public function update_record($product_id,$product_name,$measurement,$quantity,$unit_price,$expiry_date)
        {
            global $db;
            $sql = "update products set product_id='$product_id', product_name='$product_name', measurement='$measurement' , quantity='$quantity' ,unit_price='$unit_price' , expiry_date='$expiry_date' where product_id='$product_id'";
            $result = mysqli_query($db->connection,$sql);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }



        // Set Session Message
        public function set_messsage($msg)
        {
            if(!empty($msg))
            {
                $_SESSION['Message']=$msg;
            }
            else
            {
                $msg = "";
            }
        }

        // Display Session Message
        public function display_message()
        {
            if(isset($_SESSION['Message']))
            {
                echo $_SESSION['Message'];
                unset($_SESSION['Message']);
            }
        }

        // Delete Record
        public function Delete_Record($product_id)
        {
            global $db;
            $query = "delete from products where product_id='$product_id'";
            $result = mysqli_query($db->connection,$query);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

      

    }


      
 



?>






