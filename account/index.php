<?php include('account-header.php'); ?>
<style>
#dashboard {color:#1b4fa1;}
</style>
<div class="container-fluid">
  <h3 class="text-primary">Dashboard</h3>
  <div class="my-2 text-right top-btns">
    <button class="btn btn-outline-info btn-sm">
      <i class="fa fa-refresh mr-1"></i>
      Refresh
    </button>
  </div>
  <div class="row mb-2">

    <div class="col-md-3 mt-3">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-3">
              <img src="../img/icons/house.png" alt="admin">
            </div>
            <div class="col-9 text-center">
              <h5>Properties</h5>
              <h4>0</h4>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3 mt-3">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-3">
              <img src="../img/icons/estate-agent.png" alt="agent-icon">
            </div>
            <div class="col-9 text-center">
              <h5>Agents</h5>
              <h4>0</h4>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3 mt-3">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-3">
              <img src="../img/icons/conversation.png" alt="client-icon">
            </div>
            <div class="col-9 text-center">
              <h5>Clients</h5>
              <h4>0</h4>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3 mt-3">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-3">
              <img src="../img/icons/admin.png">
            </div>
            <div class="col-9 text-center">
              <h5>Admins</h5>
              <h4>0</h4>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  
</div>
<?php include('account-footer.php')?>