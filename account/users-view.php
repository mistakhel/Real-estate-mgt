<?php
$pageTitle = 'User Profile';
include('account-header.php');
include('../functions.php');
?>

<?php
if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
  header("Location: users.php");
  die();
}

$id = filter_input(INPUT_GET, 'id');
$check_sql = "SELECT * FROM users WHERE id='$id'";
$check_query = mysqli_query($connect, $check_sql);
$id_count = mysqli_num_rows($check_query);

if ($id_count == 0) {
  header("Location: users.php");
  die();
}

$user = (object) mysqli_fetch_assoc($check_query);

?>
<style>
  #users {
    color: #1b4fa1;
  }
</style>
<div class="container-fluid">
  <h3 class="text-primary"><?php echo ucwords(strtolower($user->first_name . ' ' . $user->last_name)) ?></h3>
  <div class="text-right top-btns">
    <a href="users.php" class="btn btn-outline-info btn-sm">
      <i class="fa fa-users mr-2"></i>
      All User
    </a>
    <button class="btn btn-outline-info btn-sm" onclick="refreshPage()">
      <i class="fa fa-refresh mr-2"></i>
      Refresh
    </button>
  </div>

  <div class="row mt-3">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <div class="text-center">
            <img src="<?php echo getAvatar($id); ?>" alt="profile-img" class="img-fluid img-circle profile-user-img">
          </div>
          <div class="text-center">
            <h4 class="profile-username">
              <?php echo $user->first_name . ' ' . $user->last_name ?>
            </h4>
            <h6 class="text-muted">
              <?php if ($user->is_admin) : ?>
                admin
              <?php endif; ?>
              <?php if ($user->is_agent) : ?>
                <?php if ($user->is_admin) : ?>
                  ,
                <?php endif; ?>
                agent
              <?php endif; ?>

              <?php if (!$user->is_admin && !$user->is_agent) : ?>
                user
              <?php endif; ?>
            </h6>
          </div>
        </div>
        <div class="card-footer text-right">
          <button class="btn btn-sm btn-default update_photo_btn" title="Edit Photo">
            <i class="fa fa-pencil"></i>
          </button>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="card">
        <div class="card-header bg-white">
          <h4 class="card-title">Contact Info</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div class="i-box">
                <h6>Telephone</h6>
                <h5><?php echo $user->phone ?></h5>
              </div>
            </div>
            <div class="col-md-4">
              <div class="i-box">
                <h6>Email</h6>
                <h5><?php echo $user->email ?></h5>
              </div>
            </div>
            <div class="col-md-12">
              <div class="i-box">
                <h6>Address</h6>
                <h5><?php echo $user->address ?></h5>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer bg-white text-right">
          <button class="btn btn-sm btn-outline-info edit_user_btn">
            <i class="fa fa-edit"></i>
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- modals -->
  <?php
    include 'modals/edit-user-modal.php';
    include 'modals/update-user-photo-modal.php';
  ?>
</div>

<script src="../js/account.users.js"></script>
<?php include('account-footer.php') ?>