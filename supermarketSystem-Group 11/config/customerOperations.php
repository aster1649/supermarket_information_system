<?php 

    
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class operations extends dbconfig
    {
        // Insert Record in the Database
        public function Store_Record()
        {
            global $db;
            if(isset($_POST['btn_save']))
            {
                $customer_id = $db->check($_POST['customer_id']);
                $Name = $db->check($_POST['Name']);
                $TIN = $db->check($_POST['TIN']);
                $phone = $db->check($_POST['phone']);

                if($this->insert_record($customer_id,$Name,$TIN,$phone))
                {
                    echo '<div class="alert alert-success"> Your Record Has Been successfully Saved </div>';
                }
                else
                {
                    echo '<div class="alert alert-danger"> Failed to register</div>';
                }
            }
        }

        // Insert Record in the Database Using Query    
        function insert_record($a,$b,$c,$d)
        {
            global $db;
            $query = "insert into customers (customer_id,Name, TIN,phone) values('$a','$b','$c','$d')";
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
            $query = "select * from customers";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }

        // Get Particular Record
        public function get_record($id)
        {
            global $db;
            $sql = "select * from customers where customer_id='$customer_id'";
            $data = mysqli_query($db->connection,$sql);
            return $data;

        }

        // Update Record
        public function update()
        {
            global $db;

            if(isset($_POST['btn_update']))
            {
                $customer_id = $_POST['customer_id'];
                $Name = $db->check($_POST['Name']);
                $TIN = $db->check($_POST['TIN']);
                $phone = $db->check($_POST['phone']);

                if($this->update_record($customer_id,$Name,$TIN,$phone ))
                {
                    $this->set_messsage('<div class="alert alert-success"> Your Record Has Been Updated</div>');
                    header("location:viewCustomer.php");
                }
                else
                {   
                    $this->set_messsage('<div class="alert alert-success"> Something Wrong</div>');
                }

               
            }
        }

        // Update Function 2
        public function update_record($customer_id,$Name,$TIN,$phone)
        {
            global $db;
            $sql = "update customers set customer_id='$customer_id', Name='$Name', phone='$phone' where customer_id='$customer_id'";
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
        public function Delete_Record($customer_id)
        {
            global $db;
            $query = "delete from customers where customer_id='$customer_id'";
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






