<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">

    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Passportd</h2>
        <p>Please fill in infos to continue your application</p>
        <form action="<?php echo URLROOT; ?>/applications/educational_bg" method="post">
            <div id="wrapper">
            <label for="passport_number">Passport number :</label>
            <input type="text" id="passport_number" name="passport_number">
            <span class="text-danger"><?php echo $data['passport_number_err'];?></span>
          </div>
          <div id="wrapper">
            <label for="to">passport issue date :</label>
            <input type="passport_issue_date" id="to" name="passport_issue_date">
            <span class="text-danger"><?php echo $data['passport_issue_date_err'];?></span>
          </div>
          <div id="wrapper">
            <label for="to">passport expiry date :</label>
            <input type="passport_expiry_date" id="to" name="passport_expiry_date">
            <span class="text-danger"><?php echo $data['passport_expiry_date_err'];?></span>
          </div>
          
          <div class="row">
            <div class="col">
              <input type="submit" value="add" class="btn btn-success btn-block">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>