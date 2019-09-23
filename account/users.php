<?php 
$pageTitle = 'All Users';
include('account-header.php'); 
?>
<style>
#users {color:#1b4fa1;}
</style>
<div class="container-fluid">
  <h3 class="text-primary">Users</h3>
  <div class="text-right top-btns">
  	<a href="add-user.php" class="btn btn-outline-info btn-sm">
  		<i class="fa fa-user-plus mr-1"></i>
      Add User
  	</a>
  	<button class="btn btn-outline-info btn-sm">
  		<i class="fa fa-refresh mr-1"></i>
      Refresh
   </button>
  </div>

  <?php
    $users_sql = 'SELECT * FROM users';
    $users_query = mysqli_query($connect, $users_sql);
    $users_count = mysqli_num_rows($users_query);
  ?>

  <?php if ($users_count == 0 ): ?>
    <div class="my-5">
      <h4 class="display-4 text-center">
        No user found!
      </h4>
    </div>
  <?php else: ?>
    <div class="card mt-2">
      <div class="card-header">
        <h4 class="card-title">All Users</h4>
      </div>
      <div class="card-body">
        <table class="table table-responsive-sm table-striped" id="users_datatable">
          <thead class="thead-light">
            <th>Name</th>
            <th>Admin</th>
            <th>Agent</th>
            <th>Details</th>
          </thead>
          <tbody>
            <?php while($row = mysqli_fetch_assoc($users_query)): ?>
              <tr>
                <td>
                  <?php echo $row['first_name'];?> <?php echo $row['last_name'];?>
                </td>
                <td>
                  <?php if ($row['is_admin']):?>
                    <span class="badge badge-success">Yes</span>
                  <?php else: ?>
                    <span class="badge badge-secondary">No</span>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if ($row['is_agent']):?>
                    <span class="badge badge-success">Yes</span>
                  <?php else: ?>
                    <span class="badge badge-secondary">No</span>
                  <?php endif; ?>
                </td>
                <td>
                  <a href="users-view.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-primary btn-sm my-o py-0">View</a>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  <?php endif;?>
  
</div>
<!-- scripts -->
<script src="../js/account.users.js"></script>
<?php include('account-footer.php')?>