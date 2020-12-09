<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // // Regsiter user
    // INSERT INTO `candidates` (`id`, `first_name`, `last_name`, `birth_date`, `city_of_birth`, `adress`, `phone_number`, `email`, `password`, `token`, `verified`, `applied`) VALUES (NULL, 'asdasd', 'asdasd', '1-2-2000', 'casablanca', 'asdasd casablanca', '0654654564', '', NULL, NULL, NULL, NULL);
    public function register_candidates($data){
      // die($data['token']);
      $this->db->query('INSERT INTO candidates (`id`, `first_name`, `last_name`, `Gender`, `birth_date`, `city_of_birth`, `address`, `phone_number`, `email`, `password`, `token`, `verified`, `applied`) VALUES(NULL, :first_name, :last_name, :Gender, :birth_date, :city_of_birth, :address, :phone_number, :email, :password, :token, NULL, NULL)');
      // Bind values
      $this->db->bind(':first_name', $data['First_Name']);
      $this->db->bind(':last_name', $data['Last_Name']);
      $this->db->bind(':Gender', $data['Gender']);
      $this->db->bind(':birth_date', $data['dateofbirth']);
      $this->db->bind(':city_of_birth', $data['cityofbirth']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':phone_number', $data['phone-number']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);
      $this->db->bind(':token', $data['token']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
      
      public function register_parents($data){
        $this->db->query('INSERT INTO parents (`id`, `father_first_name`, `father_last_name`, `father_occupation`, `father_phone_number`, `mother_first_name`, `mother_last_name`, `mother_occupation`, `mother_phone_number`) VALUES (NULL, :father_first_name, :father_last_name, 
     :father_occupation, :father_phone_number, :mother_first_name, :mother_last_name, :mother_occupation, :moher_phone_number)');
     // Bind values
     $this->db->bind(':father_first_name', $data['father_first_name']);
     $this->db->bind(':father_last_name', $data['father_last_name']);
     $this->db->bind(':father_occupation', $data['father_occupation']);
     $this->db->bind(':father_phone_number', $data['father_phone_number']);
     $this->db->bind(':mother_first_name', $data['mother_first_name']);
     $this->db->bind(':mother_first_name', $data['mother_first_name']);
     $this->db->bind(':mother_first_name', $data['mother_first_name']);
     $this->db->bind(':mother_first_name', $data['father_first_name']);
     
     //Execute
     if($this->db->execute()){
       return true;
      } else {
        return false;
      }
      
    }
    // //login user
    public function login($email, $password){
     $this->db->query('SELECT * FROM candidates WHERE email = :email');     
     $this->db->bind(':email', $email);

     $row = $this->db->single();

     $hashed_password = $row->password;
     if(password_verify($password, $hashed_password)){
      return $row;
     }else{
       return false;
     }
    }

    // Find user by email
    public function findUserByEmail($email){
      $this->db->query('SELECT * FROM candidates WHERE email = :email');
      // Bind value
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    public function is_account_active($token)
    {
      // die('***');
      $this->db->query('SELECT verified FROM candidates WHERE token = :token');
      $this->db->bind(':token', $token);
      $res = $this->db->single();
      // die(var_dump($res));
      if($res->verified == 1)
      {
        return TRUE;
      } 
      else {
        return FALSE;
      }
    }

    
    public function activate_account($token)
    {
      $this->db->query('UPDATE candidates SET verified = 1 WHERE token = :token');
      $this->db->bind(':token', $token);
      $res = $this->db->execute();
      return($this->db->rowCount());
      // die('***');
      // if(($res->verified) == 1)
      // {
        // return TRUE;
      // } else {
        // false;
    
    }


    // // Find user by Id
    // public function findUserById($id){
    //   $this->db->query('SELECT * FROM users WHERE id = :id');
    //   // Bind value
    //   $this->db->bind(':id', $id);

    //   $row = $this->db->single();

    //   // Check row
    //   if($this->db->rowCount() > 0){
    //     return true;
    //   } else {
    //     return false;
    //   }
    // }

  }