<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

  class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function register(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data = [
          'email' => trim($_POST['email']),
          'password' => $_POST['password'],
          'confirm_password' => trim($_POST['confirm_password']),
          'First_Name' => trim($_POST['First_Name']),
          'Last_Name' => trim($_POST['Last_Name']),
          'Gender' => trim($_POST['Gender']),
          'phone-number' => trim($_POST['phone-number']),
          'cityofbirth' => trim($_POST['cityofbirth']),
          'dateofbirth' => trim($_POST['dateofbirth']),
          'address' => trim($_POST['address']),
          'token' => bin2hex(openssl_random_pseudo_bytes(64)),
          //'passportnumber' => trim($_POST['passportnumber']),
          //'passportissuedate' => trim($_POST['passportissuedate']),
          //'passportexpirydate' => trim($_POST['passportexpirydate']),
          //// 'already_studied_in_china' => trim($_POST['already_studied_in_china']),
          ////if yes
          //'City_University_Major' => trim($_POST['City_University_Major']),
          //'father_first_name' => trim($_POST['father_first_name']),
          //'father_last_name' => trim($_POST['father_last_name']),
          //'father_occupation' => trim($_POST['father_occupation']),
          //'father_phone_number' => trim($_POST['father_phone_number']),
          //'mother_first_name' => trim($_POST['mother_first_name']),
          //'mother_last_name' => trim($_POST['mother_last_name']),
          //'mother_occupation' => trim($_POST['mother_occupation']),
          //'mother_phone_number' => trim($_POST['mother_phone_number']),
          //'ep_background_file' => trim($_POST['ep_background_file']),
          //'language_certaficate' => trim($_POST['language_certaficate']),
          // 'degree' => trim($_POST['degree']),
          // 'majors' => trim($_POST['majors']),
          
          
          // 'password' => trim($_POST['password']),
          // 'confirm_password' => trim($_POST['confirm_password']),
          
          'email_err' => '',
          'password_err' => '',
          'First_Name_err' => '',
          'Last_Name_err' => '',
          'Gender_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'phone-number_err' => '',
          'cityofbirth_err' => '',
          'dateofbirth_err' => '',
          'address_err' => ''
        ];
        // var_dump($data);
        // die(var_dump($_POST));
        // Validate Email
        // die(var_dump($data));
        // die(var_dump($data['Gender']));
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email-address';
        }
        
        if((!empty($data['email'])) && !(filter_var($data['email'], FILTER_VALIDATE_EMAIL))){
          $data['email_err'] = 'Please enter a valid email-address';
        } 
        if($this->userModel->findUserByEmail($data['email'])){
          $data['email_err'] = 'Email is already taken';
        }
        

        if(empty($data['password'])){
          $data['password_err'] = 'please enter a password';
        } else if(strlen($data['password']) < 5){$data['password_err'] = 'password must have have > 4 characters';}

        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'please confirm password';
        }

        else if(($data['password']) != $data['confirm_password']){
          $data['confirm_password_err'] = 'password confirmation does not match';
        }

        if(empty($data['First_Name'])){
          $data['First_Name_err'] = 'please enter a Name';
        }

        if(empty($data['Last_Name'])){
          $data['Last_Name_err'] = 'please enter a name';
        }


        if(empty($data['Gender'])){
          $data['Gender_err'] = 'please choose your gender';
        }

        if(empty($data['phone-number'])){
          $data['phone-number_err'] = 'please enter a phone-number';
        }

        if(empty($data['cityofbirth'])){
          $data['cityofbirth_err'] = 'please enter a date';
        }

        if(empty($data['address'])){
          $data['address_err'] = 'please enter a valid address';
        }

        if(empty($data['dateofbirth'])){
          $data['dateofbirth_err'] = 'please enter a date';
        }

        // if(empty($data['passportnumber'])){
        //   $data['passportnumber_err'] = 'please enter the passport number';
        // }

        // if(empty($data['passportissuedate'])){
        //   $data['passportissuedate_err'] = 'please enter the passport issue date';
        // }

        // if(empty($data['passportexpirydate'])){
        //   $data['passportexpirydate_err'] = 'please enter the passport passport expiry date';
        // }





        // Make sure errors are empty
        if(empty($data['email_err']) 
        && empty($data['First_Name_err'])
        && empty($data['password_err'])
        && empty($data['confirm_password_err']) 
        && empty($data['Last_Name_err']) 
        && empty($data['address_err']) 
        && empty($data['phone-number_err']) 
        && empty($data['cityofbirth_err']) 
        && empty($data['dateofbirth_err'])) 
        {
        
          // && empty($data['passportnumber_err']) 
          // && empty($data['passportissuedate_err']) 
          // && empty($data['passportexpirydate_err'])
          // && empty($data['ep_background_file_err'])
          // Validated
          
          // Hash Password
          // $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
          
          // Register User
          
          //   if($this->userModel->register_parents($data)){
            
            //     die('parents infos stoed in db');
            //     flash('register_success', 'You are registered and can log in');    
            //     redirect('users/login');
            //   } else {
              //     die('Something went wrong');
              //   }
              
              // } else {
        //   // Load view with errors
        //   $this->view('users/register', $data);
        // }
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        if($this->userModel->register_candidates($data) && Send_Verification_mail($data['token'], $data['email'])){
          
          die('succes ! check your mail to activate your account');
            // flash('register_success', 'check your mail to activate your account');    
            redirect('users/login');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('users/register', $data);
        }
        
      
      } else {
        // Init data
        $data =[
          'email' => '',
          'password' => '',
          'First_name' => '',
          'Last_name' => '',
          'password' => '',
          'confirm_password' => '',
          'phone-number' => '',
          'cityofbirth' => '',
          'dateofbirth' => '',
          'address' => '',
          // 'passportnumber' => '',
          // 'passportissuedate' => '',
          // 'passportexpirydate' => '',
          // 'City_University_Major' => '',
          
          'email_err' => '',
          'password_err' => '',
          'First_name_err' => '',
          'Last_name_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'phone-number_err' => '',
          'cityofbirth_err' => '',
          'dateofbirth_err' => '',
          'address_err' => ''
          // 'passportnumber_err' => '',
          // 'passportissuedate_err' => '',
          // 'passportexpirydate_err' => '',
          // 'City_University_Major_err' => '',
          
        ];
        
        // Load view
        $this->view('users/register', $data);
      }
    }
    
    public function accountActivation(){
      if($_SERVER['REQUEST_METHOD'] == 'GET')
      {
        // die("aaaaa");
        if(isset($_GET['token']))
        {
          if($this->userModel->is_account_active($_GET['token']) == TRUE){
            // die("bbbbb");
            die('your account is aleady active, you can login now');
          } 
          else{
            if($this->userModel->activate_account($_GET['token'])){
              die('Success !your account has been activated, you can login now');
            } else {
              die('we could not activate your account , please dont in the mess URL');
            }
          }
        }
      }
    }
    
    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',      
        ];
        
        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        }
        
        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }
        
        //Check for user/email
        if($this->userModel->findUserByEmail($data['email'])){
          //User found 
        }else{
          //User not found
          $data['email_err'] = 'No user found';
        }
        
        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){
          // Validated
          //Check and set logged in user
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);
          
          if($loggedInUser){
            //create session
            $this->createUserSession($loggedInUser);
          }else{
            $data['password_err'] = 'Password incorrect';
            $this->view('users/login', $data);
          }
        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }
        
        
      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',        
        ];
        
        // Load view
        $this->view('users/login', $data);
      }

    }
    
    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_name'] = $user->name;
      
      redirect('applications/parents');
    }
    
    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('users/login');
    }



  }