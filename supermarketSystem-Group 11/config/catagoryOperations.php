<?php 

    
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class operationss extends dbconfig
    {
        // Insert Record in the Database
        public function Store_Record()
        {
            global $db;
            if(isset($_POST['btn_save']))
            {
                $catagory_id = $db->check($_POST['catagory_id']);
                $catagory_name = $db->check($_POST['catagory_name']);
                $catagory_description = $db->check($_POST['catagory_description']);


                if($this->insert_record($catagory_id,$catagory_name,$catagory_description))
                {
                    echo '<div class="alert alert-success"> Your Record Has Been Saved  </div>';
                }
                else
                {
                    echo '<div class="alert alert-danger"> Failed </div>';
                }
            }
        }

        // Insert Record in the Database Using Query    
        function insert_record($a,$b,$c)
        {
            global $db;
            $query = "insert into catagories (catagory_id,catagory_name, catagory_description) values('$a','$b','$c')";
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
            $query = "select * from catagories";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }

        // Get Particular Record
        public function get_record($catagory_id)
        {
            global $db;
            $sql = "select * from catagories where catagory_id='$catagory_id'";
            $data = mysqli_query($db->connection,$sql);
            return $data;

        }

        // Update Record
        public function update()
        {
            global $db;

            if(isset($_POST['btn_update']))
            {
                $catagory_id = $db->check($_POST['catagory_id']);
                $catagory_name = $db->check($_POST['catagory_name']);
                $catagory_description = $db->check($_POST['catagory_description']);

                if($this->update_record($catagory_id,$catagory_name,$catagory_description))
                {
                    $this->set_messsage('<div class="alert alert-success"> Your Record Has Been Updated </div>');
                    header("location:viewCatagory.php");
                }
                else
                {   
                    $this->set_messsage('<div class="alert alert-success"> Something Went Wrong </div>');
                }

               
            }
        }

        // Update Function 2
        public function update_record($catagory_id,$catagory_name,$catagory_description)
        {
            global $db;
            $sql = "update catagories set catagory_id='$catagory_id', catagory_name='$catagory_name', catagory_description='$catagory_description' where catagory_id='$catagory_id'";
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
        public function Delete_Record($catagory_id)
        {
            global $db;
            $query = "delete from catagories where catagory_id='$catagory_id'";
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

