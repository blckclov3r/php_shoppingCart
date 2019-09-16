<?php
    class Database{
        public $conn;
        public function __construct(){
            $this->conn = mysqli_connect('localhost','root','','mystore');
            if($this->conn){?>
                <script>
                    console.log("Connected successfully");
                </script>
                
            <?php }else{
                echo "Not connected, msg: "+mysqli_connect_error();
            }
        }
    }

?>