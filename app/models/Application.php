<?php

Class Application {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function register_parents_infos($candidate_id, $data){
        $this->db->query('INSERT INTO parents(`id`,`candidate_id`, `father_first_name`, `father_last_name`, `mother_first_name`, `mother_last_name`, `father_occupation`, `mother_occupation`, `father_phone_number`, `mother_phone_number`) VALUE (NULL, :candidate_id, :ffn, :fln, :mfn, :mln, :fo, :mo, :fpn, :mpn)');

        $this->db->bind(':candidate_id', $candidate_id);
        $this->db->bind(':ffn', $data['father_first_name']);
        $this->db->bind(':fln', $data['father_last_name']);
        $this->db->bind(':mfn', $data['mother_first_name']);
        $this->db->bind(':mln', $data['mother_last_name']);

        $this->db->bind(':fo', $data['father_occupation']);
        $this->db->bind(':mo', $data['mother_occupation']);
        $this->db->bind(':fpn', $data['father_phone_number']);
        $this->db->bind(':mpn', $data['mother_phone_number']);

        if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }


    public function register_educational_bg_infos($candidate_id, $data){
        $this->db->query('INSERT INTO educational_bg (`id`,`candidate_id`, `from`, `to`, `institute`, `degree`, `major`) VALUE (NULL, :candidate_id, :f, :t, :i, :d, :m)');

        $this->db->bind(':candidate_id', $candidate_id);
        $this->db->bind(':f', $data['from']);
        $this->db->bind(':t', $data['to']);
        $this->db->bind(':i', $data['institute']);
        $this->db->bind(':d', $data['degree']);
        $this->db->bind(':m', $data['major']);

        if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }


    public function register_professional_bg_infos($candidate_id, $data){
        $this->db->query('INSERT INTO professional_bg (`id`,`candidate_id`, `from`, `to`, `department`, `post`) VALUE (NULL, :candidate_id, :f, :t, :d, :p)');

        $this->db->bind(':candidate_id', $candidate_id);
        $this->db->bind(':f', $data['from']);
        $this->db->bind(':t', $data['to']);
        $this->db->bind(':d', $data['department']);
        $this->db->bind(':p', $data['post']);

        if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }

    public function register_passport_infos($candidate_id, $data){
        $this->db->query('INSERT INTO passport (`id`,`candidate_id`, `passport`, `passport_issue_date`, `passport_expiry_date`) VALUE (NULL, :candidate_id, :p, :pid, :ped)');

        $this->db->bind(':candidate_id', $candidate_id);
        $this->db->bind(':p', $data['passport']);
        $this->db->bind(':pid', $data['passport_issue_date']);
        $this->db->bind(':ped', $data['passport_expiry_date']);

        if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }

    public function is_parents_saved($candidate_id){
        $this->db->query('SELECT * FROM parents WHERE candidate_id = :candidate_id');
        $this->db->bind(':candidate_id', $candidate_id);
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function is_educational_bg_saved($candidate_id){
        $this->db->query('SELECT * FROM educational_bg WHERE candidate_id = :candidate_id');
        $this->db->bind(':candidate_id', $candidate_id);
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function is_professional_bg_saved($candidate_id){
        $this->db->query('SELECT * FROM professional_bg WHERE candidate_id = :candidate_id');
        $this->db->bind(':candidate_id', $candidate_id);
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }
}

?>