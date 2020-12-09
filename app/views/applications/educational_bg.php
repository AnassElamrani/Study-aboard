<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">

    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Educational background</h2>
        <p>Please fill in infos to continue your application</p>
        <form action="<?php echo URLROOT; ?>/applications/educational_bg" method="post">
            <div id="wrapper">
            <label for="from">from :</label>
            <input type="date" id="from" name="from">
            <span class="text-danger"><?php echo $data['from_err'];?></span>
          </div>
          <div id="wrapper">
            <label for="to">to :</label>
            <input type="date" id="to" name="to">
            <span class="text-danger"><?php echo $data['to_err'];?></span>
          </div>
          <div class="form-group">
            <label for="institute">institute: <sup>*</sup></label>
            <input type="text" name="institute" class="form-control form-control-lg <?php echo (!empty($data['institute_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['institute']; ?>">
            <span class="invalid-feedback"><?php echo $data['institute_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="degree">degree <sup>*</sup></label>
            <input type="text" name="degree" class="form-control form-control-lg <?php echo (!empty($data['degree_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['degree']; ?>">
            <span class="invalid-feedback"><?php echo $data['degree_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="major">major: <sup>*</sup></label>
            <input type="text" name="major" class="form-control form-control-lg <?php echo (!empty($data['major_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['major']; ?>">
            <span class="invalid-feedback"><?php echo $data['major_err']; ?></span>
          </div>
         

          <div class="row">
            <div class="col">
              <input type="submit" value="add" class="btn btn-success btn-block">
            </div>
          </div>
        </form>
        <form action="<?php echo URLROOT; ?>/applications/educational_bg" method="get">
          <input type="hidden" name='next' value="next">
          <input name="submit" value="next" type="submit">
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>