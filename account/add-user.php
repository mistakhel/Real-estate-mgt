<?php 
  $pageTitle = 'Add User';
  include('account-header.php');
?>
<style>
  #users {
    color: #1b4fa1;
  }

  form label {
    font-weight: bold;
  }
</style>
<div class="container-fluid">
  <h3 class="text-primary">Add User</h3>
  <div class="text-right top-btns">
    <a href="users.php" class="btn btn-outline-info btn-sm">
      <i class="fa fa-users mr-2"></i>
      All User
    </a>
    <button class="btn btn-outline-info btn-sm">
      <i class="fa fa-refresh mr-2"></i>
      Refresh
    </button>
  </div>

  <div class="mt-3 row">
    <div class="offset-md-1 col-md-10">
      <form method="POST" action="xhr/add-user.php" id="add_user_form">
        <div class="card">
          <div class="card-header bg-white">
            <h4 class="card-title text-muted">
              <i class="fa fa-user-plus mr-2 text-primary"></i>
              Users Registration Form
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 form-group">
                <!-- first name -->
                <label>First Name</label>
                <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
              </div>

              <div class="col-md-6 form-group">
                <!-- last name -->
                <label>Last Name</label>
                <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
              </div>

              <div class="col-md-6 form-group">
                <!-- gender -->
                <label>Gender</label>
                <select class="form-control" name="gender">
                  <option value="">Choose Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>

              <div class="form-group col-md-6">
                <label label="phone">Phone</label>
                <input type="tel" name="phone" id="phone" class="form-control" placeholder="phone contact here..." required>
              </div>

              <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
              </div>

              <div class="form-group col-md-12">
                <label>Address</label>
                <textarea class="form-control" name="address" placeholder="users address here..."></textarea>
              </div>

              <div class="form-group col-6">
                <div class="custom-control custom-checkbox mr-sm-2">
                  <input type="checkbox" class="custom-control-input" name="is_admin" id="admin-check">
                  <label class="custom-control-label" for="admin-check">make an admin</label>
                </div>
              </div>

              <div class="form-group col-6">
                <div class="custom-control custom-checkbox mr-sm-2">
                  <input type="checkbox" class="custom-control-input" name="is_agent" id="agent-check">
                  <label class="custom-control-label" for="agent-check">make an agent</label>
                </div>
              </div>

            </div>
          </div>
          <div class="card-footer text-right">
            <button class="btn btn-secondary" type="reset">Reset</button>
            <button class="btn btn-primary" type="submit">Add User</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="../js/account.users.js"></script>
<?php include('account-footer.php') ?>