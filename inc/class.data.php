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

        public function input_barang($namabarang, $jumlahbarang, $rak){
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
                echo '<td align="center"><a href="update_barang.php?kodebarang=' .$row["kodebarang"]. '"><button type="button" class="btn btn-primary btn-sm">Update</button></a> <a href="data.php?kodebarang=' .$row["kodebarang"]. '"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">Delete</button></a></td>';
                echo '</tr>';
            }
        }

        public function get_data_barang_home(){
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

        public function cek_data_barang($kodebarang){
            $query="SELECT * from barang where kodebarang = '$kodebarang'";
            $result=$this->db->query($query) or die($this->db->error);
            $row = $result->fetch_array(MYSQLI_BOTH);
            return $row;
        }

        public function update_data_barang($kodebarang, $namabarang, $jumlahbarang, $rak){
            $query="UPDATE barang set namabarang='$namabarang', jumlah='$jumlahbarang', rak='$rak', tanggalupdate=SYSDATE() where kodebarang='$kodebarang'";
            $result = $this->db->query($query) or die($this->db->error);
            return true;
        }

        public function delete_data_barang($kodebarang){
            $query="DELETE FROM barang WHERE kodebarang='$kodebarang'";
            $result = $this->db->query($query) or die($this->db->error);
            return true;
        }
    }