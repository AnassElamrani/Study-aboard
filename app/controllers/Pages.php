<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      $data = [
        'title' => 'Study-aboard',
        'description' => 'Add a description'
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'add Study-aboard Description'
      ];

      $this->view('pages/about', $data);
    }
  }