<?php 
    class Data{
        protected $db;
		public function __construct(){
			$this->db = new DB_con();
			$this->db = $this->db->ret_obj();
        }
        
        public function check_data_barang(){
            $query = "SELECT kodebarang from barang";
            $result = $this->db->query($query) or die($this->db->error);
            $user_data = $result->fetch_array(MYSQLI_ASSOC);
            $count_row = $result->num_rows;
            echo $count_row;
        }

        public function check_data_user(){
            $query = "SELECT id from users";
            $result = $this->db->query($query) or die($this->db->error);
            $user_data = $result->fetch_array(MYSQLI_ASSOC);
            $count_row = $result->num_rows;
            echo $count_row;
        }

        public function input_barang($namabarang,$jumlahbarang,$rak){
			$query = "INSERT INTO barang SET namabarang='$namabarang', tanggalmasuk=SYSDATE(), jumlah='$jumlahbarang', rak='$rak'";
			$result = $this->db->query($query) or die($this->db->error);
            return true;
        }
        
        public function get_data_barang(){
            $query="SELECT * from barang";
            $result=$this->db->query($query) or die($this->db->error);
            while($row = $result->fetch_array(MYSQLI_BOTH)){
                echo '<tr>';
                echo '<td>' . $row["kodebarang"] . '</td>';
                echo '<td>' . $row["namabarang"] . '</td>';
                echo '<td>' . $row["tanggalmasuk"] . '</td>';
                echo '<td>' . $row["jumlah"] . '</td>';
                echo '<td>' . $row["rak"] . '</td>';
                echo '</tr>';
            }
        }
    }