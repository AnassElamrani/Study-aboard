<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//  session_start();
class Applications extends Controller {
    public function __construct(){
        // die('apply');
        $this->applicationModel = $this->model('Application');
        // die(var_dump($this->applicationModel->is_parents_saved($_SESSION['user_id'])));
    }
    public function parents(){
        // die("xx");
        // $this->view('apply/parents', $data);
        if($this->applicationModel->is_parents_saved($_SESSION['user_id']) == true)
        {
            redirect('applications/educational_bg');
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        // die('noPost');
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                
                'father_first_name' => trim($_POST['father_first_name']),
                'father_last_name' => trim($_POST['father_last_name']),
                'father_occupation' => trim($_POST['father_occupation']),
                'father_phone_number' => trim($_POST['father_phone_number']),
                'mother_first_name' => trim($_POST['mother_first_name']),
                'mother_last_name' => trim($_POST['mother_last_name']),
                'mother_occupation' => trim($_POST['mother_occupation']),
                'mother_phone_number' => trim($_POST['mother_phone_number']),
                
                'father_first_name_err' => '',
                'father_last_name_err' => '',
                'father_occupation_err' => '',
                'father_phone_number_err' => '',
                'mother_first_name_err' => '',
                'mother_last_name_err' => '',
                'mother_occupation_err' => '',
                'mother_phone_number_err' => ''
                
            ];
            
            // die('ss');
            if(empty($data['father_first_name'])){
                $data['father_first_name_err'] = 'please enter a name';
            }
            if(empty($data['father_last_name'])){
                $data['father_last_name_err'] = 'please enter a name';
            }
            if(empty($data['father_occupation'])){
                $data['father_occupation_err'] = 'please enter occupation';
            }
            if(empty($data['father_phone_number'])){
                $data['father_phone_number_err'] = 'please enter a phone number';
            }
                
            
            if(empty($data['mother_first_name'])){
                $data['mother_first_name_err'] = 'please enter a name';
            }
            if(empty($data['mother_last_name'])){
                $data['mother_last_name_err'] = 'please enter a name';
            }
                if(empty($data['mother_occupation'])){
                    $data['mother_occupation_err'] = 'please enter occupation';
                }
                if(empty($data['mother_phone_number'])){
                    $data['mother_phone_number_err'] = 'please enter a phone number';
                }
                if(empty($data['father_first_name_err'])     && empty($data['father_last_name_err']) 
                && empty($data['father_occupation_err']) && empty($data['father_phone_number_err']) 
                && empty($data['mother_first_name_err']) && empty($data['mother_last_name_err'])
                && empty($data['mother_occupation_err']) && empty($data['mother_phone_number_err']))
                {
                    if($this->applicationModel->register_parents_infos($_SESSION['user_id'], $data))
                    {
                        redirect('applications/educational_bg');
                    } else {
                        die('error storing parents');
                    }
                    // $this->view('applications/parents', $data);
                } else {
                    // die('input errors');
                    $this->view('applications/parents', $data);
                } 
            } else {
                // die('noPost');
                
                // die(var_dump($_SESSION));
            $data = [
                
                'father_first_name' => '',
                'father_last_name' => '',
                'father_occupation' => '',
                'father_phone_number' => '',
                'mother_first_name' => '',
                'mother_last_name' => '',
                'mother_occupation' => '',
                'mother_phone_number' => '',

                'father_first_name_err' => '',
                'father_last_name_err' => '',
                'father_occupation_err' => '',
                'father_phone_number_err' => '',
                'mother_first_name_err' => '',
                'mother_last_name_err' => '',
                'mother_occupation_err' => '',
                'mother_phone_number_err' => ''
            
            ];

            $this->view('applications/parents', $data);
        }

    }

    public function educational_bg(){
        // if($this->applicationModel->is_educational_bg_saved($_SESSION['user_id']) == true)
        // {
        //     // redirect('applications/professional_bg');
        // }

        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            if($_GET['next'] == 'next')
            {
                if($this->applicationModel->is_educational_bg_saved($_SESSION['user_id']) == true)
                {
                    redirect('applications/professional_bg');   
                }
                else {
                    die('add your educational background first');
                }
            }
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $data = [
                'from' => $_POST['from'],
                'to' => $_POST['to'],
                'institute' => $_POST['institute'],
                'degree' => $_POST['degree'],
                'major' => $_POST['major'],

                'from_err' => '',
                'to_err' => '',
                'institute_err' => '',
                'degree_err' => '',
                'major_err' => ''
            ];

            if(empty($data['from'])){
                $data['from_err'] = 'please enter a date';
            }
            
            if(empty($data['to'])){
                $data['to_err'] = 'please enter a date';
            }

            if(empty($data['institute'])){
                $data['institute_err'] = 'please enter an institute name';
            }

            if(empty($data['degree'])){
                $data['degree_err'] = 'please enter a degree';
            }

            if(empty($data['major'])){
                $data['major_err'] = 'please enter a major';
            }

            if(empty($data['from_err'])     && empty($data['to_err']) 
            && empty($data['institute_err']) && empty($data['degree_err']) 
            && empty($data['major_err'])){
                // die('nnnn');

                if($this->applicationModel->register_educational_bg_infos($_SESSION['user_id'], $data))
                {
                    redirect('applications/educational_bg');
                } else {
                    die('error storing educational background');
                }

            } else {
                // die('input errors');
                $this->view('applications/educational_bg', $data);
            } 

        } else {
            $data = [
                
                'from' => '',
                'to' => '',
                'institute' => '',
                'degree' => '',
                'major' => '',

                'from_err' => '',
                'to_err' => '',
                'institute_err' => '',
                'degree_err' => '',
                'major_err' => ''
            
            ];

            $this->view('applications/educational_bg', $data);
        }
    }

    public function professional_bg(){

        if($_GET['next'] == 'next')
        {
                redirect('applications/passport');   
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // die(var_dump($_POST));
            $data = [
                'from' => $_POST['from'],
                'to' => $_POST['to'],
                'department' => $_POST['department'],
                'post' => $_POST['post'],

                'from_err' => '',
                'to_err' => '',
                'department_err' => '',
                'post_err' => ''
            ];

            
            if($this->applicationModel->register_professional_bg_infos($_SESSION['user_id'], $data))
            {
                die('good');
                redirect('applications/professional_bg');
            } else {
                die('error storing professional background');
            }
            
        } else {
            $data = [
                
                'from' => '',
                'to' => '',
                'department' => '',
                'post' => '',
                
                'from_err' => '',
                'to_err' => '',
                'department_err' => '',
                'post_err' => ''
                
            ];
            
            // die('xxxxxx');
            $this->view('applications/professional_bg', $data);
        }
    }

    public function passport(){

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // die(var_dump($_POST));
            $data = [
                'passport' => $_POST['passport'],
                'passport_issue_date' => $_POST['passport_issue_date'],
                'passport_expiry_date' => $_POST['expiry'],

                'passport_err' => '',
                'passport_issue_date_err' => '',
                'passport_expiry_date_err' => ''
            ];

            if(empty($data['passport'])){
                $data['passport_err'] = 'please enter a date';
            }

            if(empty($data['passport_issue_date'])){
                $data['passport_issue_date_err'] = 'please enter a date';
            }

            if(empty($data['passport_expiry_date'])){
                $data['passport_expiry_date_err'] = 'please enter a date';
            }


            if(empty($data['passport_err']) && empty($data['passport_issue_date_err']) 
            && empty($data['passport_expiry_date_err']))
            {
                   
                if($this->applicationModel->register_passport_infos($_SESSION['user_id'], $data))
                {
                    die('registration ended successfully');
                } else {
                    die('error storing passport');
                }
            }
            
        } else {
            $data = [
                
                'passport' => '',
                'passport_issue_date' => '',
                'passport_expiry_date' => '',

                'passport_err' => '',
                'passport_issue_date_err' => '',
                'passport_expiry_date_err' => ''
                
            ];
            
            // die('xxxxxx');
            $this->view('applications/passport', $data);
        }
    }

}

?>