<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">

    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>professional background</h2>
        <p>Please fill in infos to continue your application</p>
        <form action="<?php echo URLROOT; ?>/applications/professional_bg" method="post">
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
            <label for="department">department: <sup>*</sup></label>
            <input type="text" name="department" class="form-control form-control-lg <?php echo (!empty($data['department_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['department']; ?>">
            <span class="invalid-feedback"><?php echo $data['department_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="post">post: <sup>*</sup></label>
            <input type="text" name="post" class="form-control form-control-lg <?php echo (!empty($data['post_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['post']; ?>">
            <span class="invalid-feedback"><?php echo $data['post_err']; ?></span>
          </div>
          <div class="row">
            <div class="col">
              <input type="submit" value="add" class="btn btn-success btn-block">
            </div>
          </div>
          <form action="<?php echo URLROOT; ?>/applications/professional_bg" method="get">
          <input type="hidden" name='next' value="next">
          <input name="submit" value="next" type="submit">
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>