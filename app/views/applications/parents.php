<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">

    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Parents infos</h2>
        <p>Please fill in infos to continue your application</p>
        <form action="<?php echo URLROOT; ?>/applications/parents" method="post">
          <div class="form-group">
            <label for="father_first_name">father_first_name: <sup>*</sup></label>
            <input type="text" name="father_first_name" class="form-control form-control-lg <?php echo (!empty($data['father_first_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['father_first_name']; ?>">
            <span class="invalid-feedback"><?php echo $data['father_first_name_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="father_last_name">father_last_name <sup>*</sup></label>
            <input type="text" name="father_last_name" class="form-control form-control-lg <?php echo (!empty($data['father_last_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['father_last_name']; ?>">
            <span class="invalid-feedback"><?php echo $data['father_last_name_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="father_occupation">father_occupation: <sup>*</sup></label>
            <input type="text" name="father_occupation" class="form-control form-control-lg <?php echo (!empty($data['father_occupation_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['father_occupation']; ?>">
            <span class="invalid-feedback"><?php echo $data['father_occupation_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="father_phone_number">father_phone_number: <sup>*</sup></label>
            <input type="text" name="father_phone_number" class="form-control form-control-lg <?php echo (!empty($data['father_phone_number_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['father_phone_number']; ?>">
            <span class="invalid-feedback"><?php echo $data['father_phone_number_err']; ?></span>
          </div>

          <div class="form-group">
            <label for="mother_first_name">mother_first_name: <sup>*</sup></label>
            <input type="text" name="mother_first_name" class="form-control form-control-lg <?php echo (!empty($data['mother_first_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['mother_first_name']; ?>">
            <span class="invalid-feedback"><?php echo $data['mother_first_name_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="mother_last_name">mother_last_name: <sup>*</sup></label>
            <input type="text" name="mother_last_name" class="form-control form-control-lg <?php echo (!empty($data['mother_last_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['mother_last_name']; ?>">
            <span class="invalid-feedback"><?php echo $data['mother_last_name_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="mother_occupation">mother_occupation: <sup>*</sup></label>
            <input type="text" name="mother_occupation" class="form-control form-control-lg <?php echo (!empty($data['mother_occupation_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['mother_occupation']; ?>">
            <span class="invalid-feedback"><?php echo $data['mother_occupation_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="mother_phone_number">mother_phone_number: <sup>*</sup></label>
            <input type="text" name="mother_phone_number" class="form-control form-control-lg <?php echo (!empty($data['mother_phone_number_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['mother_phone_number']; ?>">
            <span class="invalid-feedback"><?php echo $data['mother_phone_number_err']; ?></span>
          </div>

          <div class="row">
            <div class="col">
              <input type="submit" value="Next" class="btn btn-success btn-block">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>