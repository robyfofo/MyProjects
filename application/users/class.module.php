<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/users/module.class.php v.3.0.0. 04/10/2016
*/

class Module {
	private $action;
	public $error;
	public $message;
	public $messages;
	public $errorType;

	public function __construct($action,$table) 	{
		$this->action = $action;
		$this->appTable = $table;
		$this->error = 0;	
		$this->message ='';
		$this->messages = array();
		}

		
	public function getUserTemplatesArray() {		
		$arr = array();
		if ($handle = opendir('templates/')){
			while ($file = readdir($handle)) {
				if (is_dir('templates/'.$file)) {
					if ($file != "." && $file != "..") $arr[] = $file;
		  			}
				}
			}
		closedir($handle);	
		return $arr;		
		}	

		
	public function checkUsername($id){
		$this->error = 0;
		$oldUsername = '';
		$App = new stdClass;	
      $App->oldItem = new stdClass;	
		if (intval($id) > 0) {
			/* recupera i dati memorizzati */
			Sql::initQuery($this->appTable,array('username'),array($id),'id = ?');	
			$App->oldItem = Sql::getRecord();
			$oldUsername = $App->oldItem->username;			
			}
		if ($oldUsername != $_POST['username']) {
			Sql::initQuery($this->appTable,array('id'),array($_POST['username']),'username = ?');
			$count = Sql::countRecord();
			if ($count > 0) {
				$this->message = "L'username <strong>".$_POST['username']."</strong> risulta già presente nel nostro database! ";
	      	$this->error = 1;
	     	 	$_POST['username'] = '';
	   		}	
	   	}
	   return $_POST['username'];
		}
		
	public function checkEmail($id){
		$this->error = 0;
		$oldEmail = '';
		$App = new stdClass;	
      $App->oldItem = new stdClass;	
		if (intval($id) > 0) {
			/* recupera i dati memorizzati */
			Sql::initQuery($this->appTable,array('email'),array($id),'id = ?');
			$App->oldItem = Sql::getRecord();
			$oldEmail = $App->oldItem->email;			
			}
		if($oldEmail != $_POST['email']) {
			Sql::initQuery($this->appTable,array('id'),array($_POST['email']),'email = ?');
			$count = Sql::countRecord();
			if ($count > 0) {
				$this->message = "L'indirizzo email <strong>".$_POST['email']."</strong> risulta già presente nel nostro database! ";
	      	$this->error = 1;
	     	 	$_POST['email'] = '';
	   		}	
	   	}
	   return $_POST['email'];
		}

		
	public function checkPassword($id){
		$id = intval($id);
		$App = new stdClass;	
      $App->oldItem = new stdClass;
		$oldPassword = '';
		if ($id > 0) {
			/* modifica*/
			/* recupera i dati memorizzati */
			Sql::initQuery($this->appTable,array('password'),array($id),'id = ?');
			$App->oldItem = Sql::getRecord();
			$oldPassword = $App->oldItem->password;	
			if ($_POST['password'] != '') {
				if ($_POST['password'] === $_POST['passwordCF']) {						
					$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
					}	else {		   			
		   			$_POST['password'] = $oldPassword;
		   			$this->message = "Le due password non corrispondono! Sarà comunque mantenuta quella precedentemente memorizzata";
			      	$this->errorType = 2;
		   			}
				
				} else {
      			$_POST['password'] = $oldPassword;
      			}
			
			} else {
				/* inserisci */
				if ($_POST['password'] != '') {
					if ($_POST['password'] === $_POST['passwordCF']) {
		      			$_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
		      		} else {
		      			$this->message = "Le due password non corrispondono! ";
		      			$this->error = 1;		      			
		      			}
					} else {
				 		$this->message = "Devi inserire la password! ";
		      		$this->error = 1;
		      		$_POST['password'] = '';
				 	}
				}
	   return $_POST['password'];
		}
		
	public function checkUsernameAjax($id,$username){
		$App = new stdClass;	
      $App->oldItem = new stdClass;
		$oldUsername = '';
		$count = 0;
		if (intval($id) > 0) {
			/* recupera i dati memorizzati */		
			Sql::initQuery($this->appTable,array('username'),array($id),'id = ?');	
			$App->oldItem = Sql::getRecord();
			$oldUsername = $App->oldItem->username;			
			}
		if($oldUsername != $username) {
			Sql::initQuery($this->appTable,array('id'),array($_POST['username']),'username = ?');
			$count = Sql::countRecord();
			}
		return $count;
		}

	public function checkEmailAjax($id,$email){
		$App = new stdClass;      
		$App->oldItem = new stdClass;
		$oldEmail = '';
		$count = 0;
		if (intval($id) > 0) {
			/* recupera i dati memorizzati */
			$this->itemData = new stdClass;		
			Sql::initQuery($this->appTable,array('email'),array($id),'id = ?');	
			$this->itemData = Sql::getRecord();
			$oldEmail = $this->itemData->email;			
			}
		if($oldEmail != $email) {
			Sql::initQuery($this->appTable,array('id'),array($email),'email = ?');
			$count = Sql::countRecord();
			}
		return $count;
		}

	public function getAvatarData($id) {
		$this->error = 0;
		$avatar = '';
		$avatar_info = '';
		if (isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name']) && $_FILES['avatar']['size'] > 0) {			
         if ($_FILES['avatar']['error'] == 0 ) {
            $array_avatarInfo = array();
            $max_size = 80000;
            $result = @is_uploaded_file($_FILES['avatar']['tmp_name']);
            if (!$result) {
               $this->message = "Impossibile eseguire l'upload! Se è presente è stato mantenuto il file precedente! ";
               $this->error = 0;
               $this->errorType = 2;
               } else {
                  $size = $_FILES['avatar']['size'];
                  if ($size > $max_size) {
                    	$this->message = 'Il file indicato è troppo grande! Se è presente è stato mantenuto il file precedente! ';
           				$this->error = 0;
           				$this->errorType = 2;
           				$App = new stdClass;
			         	$App->oldItem = new stdClass;		
							Sql::initQuery($this->appTable,array('avatar','avatar_info'),array($id),'id = ?');	
							$App->oldItem = Sql::getRecord();
							$avatar = $App->oldItem->avatar;
							$avatar_info = $App->oldItem->avatar_info;
                     } else {
                     	$array_avatarInfo['type'] = $_FILES['avatar']['type'];
                  		$array_avatarInfo['nome'] = $_FILES['avatar']['name'];
                  		$array_avatarInfo['size'] = $_FILES['avatar']['size'];
                  		$avatar = @file_get_contents($_FILES['avatar']['tmp_name']);
                 			$avatar_info = serialize($array_avatarInfo);
                 			}                  
                  }
             }	else {
             	$this->message = "Impossibile eseguire l'upload: problemi accesso immagine! Se è presente è stato mantenuto il file precedente! ";
               $this->error = 1;
             	}	            
         } else {
         	if ($id > 0) {
	         	//$this->message = "Impossibile eseguire l'upload: problemi accesso immagine! Se è presente è stato mantenuto il file precedente! ";
	            //$this->error = 0;
	            //$this->errorType = 2;
	         	$App = new stdClass;	
	         	$App->oldItem = new stdClass;		
					Sql::initQuery($this->appTable,array('avatar','avatar_info'),array($id),'id = ?');	
					$App->oldItem = Sql::getRecord();
					$avatar = $App->oldItem->avatar;
					$avatar_info = $App->oldItem->avatar_info;
					}
				}
		return array($avatar,$avatar_info);
		}
		
	public function renderAvatarData($id) {
		$avatar = '';
		$info = '';
		if (intval($id) > 0) {
			/* recupera i dati memorizzati */
			$this->itemData = new stdClass;		
			Sql::initQuery($this->appTable,array('avatar','avatar_info'),array($id),'id = ?');	
			$this->itemData = Sql::getRecord();
			$avatar = $this->itemData->avatar;
			$info = $this->itemData->avatar_info;
			}	
		return array($avatar,$info);
		}
	}
?>