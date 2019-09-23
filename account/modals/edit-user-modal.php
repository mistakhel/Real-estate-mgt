<!-- update user profile -->
<div class="modal fade" id="edit_user_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="xhr/update-user.php" id="edit_user_form">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="fa fa-edit mr-2 text-primary"></i>
                        Edit User
                    </h4>
                    <button class="close" type="button" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" value="<?php echo $user->first_name ?>">
                    </div>
                    <div class="form-group">
                        <label for="first_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="<?php echo $user->last_name ?>">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="">Choose Gender</option>
                            <option <?php echo ($user->gender == 'male') ? 'selected' : null; ?> value="male">Male</option>
                            <option <?php echo ($user->gender == 'female') ? 'selected' : null; ?> value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user->phone ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $user->email ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="address" placeholder="Address here..."><?php echo $user->address ?></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" value="1" class="custom-control-input" name="is_admin" id="admin-check" <?php echo ($user->is_admin) ? 'checked' : null; ?>>
                            <label class="custom-control-label" for="admin-check">make an admin</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" value="1" class="custom-control-input" name="is_agent" id="agent-check" <?php echo ($user->is_agent) ? 'checked' : null; ?>>
                            <label class="custom-control-label" for="agent-check">make an agent</label>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $user->id ?>">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button">Cancel</button>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>