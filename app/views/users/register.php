<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Create An Account</h2>
        <p>Please fill out this form to register with us</p>
        <form action="<?php echo URLROOT; ?>/users/register" method="post">
        
          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="password">Password: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="confirm_password">confirm_password: <sup>*</sup></label>
            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="First_Name">First_name: <sup>*</sup></label>
            <input type="text" name="First_Name" class="form-control form-control-lg <?php echo (!empty($data['First_Name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['First_Name']; ?>">
            <span class="invalid-feedback"><?php echo $data['First_Name_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="Last_Name">Last Name: <sup>*</sup></label>
            <input type="text" name="Last_Name" class="form-control form-control-lg <?php echo (!empty($data['Last_Name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['Last_Name']; ?>">
            <span class="invalid-feedback"><?php echo $data['Last_Name_err']; ?></span>
          </div>

          <div id="wrapper">
            <label for="Gender">Gender</label>
            <p><input type="radio" <?php echo ($data['Gender'] == 'male') ? "checked" : '' ?> value="male" id="male" name="Gender">male</input></p>
            <p><input type="radio" <?php echo ($data['Gender'] == 'female') ? "checked" : '' ?> value="female" id="female" name="Gender">female</input></p>
            <span class="text-danger"> <?php echo $data['Gender_err']?></span>
          </div>




          <div class="form-group">
            <label for="phone-number">phone-number: <sup>*</sup></label>
            <input type="text" name="phone-number" class="form-control form-control-lg <?php echo (!empty($data['phone-number_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['phone-number']; ?>">
            <span class="invalid-feedback"><?php echo $data['phone-number_err']; ?></span>
          </div>

          <div class="form-group">
            <label for="cityofbirth">city of birth: <sup>*</sup></label>
            <input type="text" name="cityofbirth" class="form-control form-control-lg <?php echo (!empty($data['cityofbirth_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['cityofbirth']; ?>">
            <span class="invalid-feedback"><?php echo $data['cityofbirth_err']; ?></span>
          </div>

          
          <div id="wrapper">
            <label for="dateofbirth">date of birth :</label>
            <input type="date" id="dateofbirth" name="dateofbirth">
            <span class="text-danger"><?php echo $data['dateofbirth_err'];?></span>
          </div>

          <div class="form-group">
            <label for="address">address: <sup>*</sup></label>
            <input type="text" name="address" class="form-control form-control-lg <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['address']; ?>">
            <span class="invalid-feedback"><?php echo $data['address_err']; ?></span>
          </div>
          
          
          </div>
          <div class="row">
            <div class="col">
              <input type="submit" value="Register" class="btn btn-success btn-block">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>