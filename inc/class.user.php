<?php 
	include "config.php";
	class User{
		protected $db;
		public function __construct(){
			$this->db = new DB_con();
			$this->db = $this->db->ret_obj();
		}
		
		/*** for registration process ***/
		
		public function reg_user($username,$password){
			//echo "k";
			
			$password = md5($password);

			//checking if the username or email is available in db
			$query = "SELECT * FROM users WHERE username='$username'";
			
			$result = $this->db->query($query) or die($this->db->error);
			
			$count_row = $result->num_rows;
			
			//if the username is not in db then insert to the table
			
			if($count_row == 0){
				$query = "INSERT INTO users SET username='$username', password='$password', tanggal=SYSDATE()";
				
				$result = $this->db->query($query) or die($this->db->error);
				
				return true;
			}
			else{return false;}
			
			
			}
			
			
	/*** Cek Login ***/
		public function check_login($username, $password){
        $password = md5($password);
		
		$query = "SELECT id from users WHERE username='$username' and password='$password'";
		
		$result = $this->db->query($query) or die($this->db->error);

		
		$user_data = $result->fetch_array(MYSQLI_ASSOC);
		$count_row = $result->num_rows;
		
		if ($count_row == 1) {
	            $_SESSION['login'] = true; // this login var will use for the session thing
	            $_SESSION['id'] = $user_data['id'];
	            return true;
	        }
			
		else{return false;}
		

	}
	/*** Mengambil nama user ***/
	public function get_fullname($id){
		$query = "SELECT username FROM users WHERE id = $id";
		
		$result = $this->db->query($query) or die($this->db->error);
		
		$user_data = $result->fetch_array(MYSQLI_ASSOC);
		echo $user_data['username'];
	}
	
	/*** Mengambil session ***/
	public function get_session(){
	    return $_SESSION['login'];
	}

	/*** User Logout ***/
	public function user_logout() {
	    $_SESSION['login'] = FALSE;
		unset($_SESSION);
	    session_destroy();
	}
		
	public function get_user_data(){
		$query = "SELECT * from users";
		$result = $this->db->query($query) or die($this->db->error);
		while($row = $result->fetch_array(MYSQLI_BOTH)){
			echo '<tr>';
			echo '<td>' . $row["id"] . '</td>';
			echo '<td>' . $row["username"] . '</td>';
			echo '<td>' . $row["tanggal"] . '</td>';
			echo '</tr>';
		}
	}
}