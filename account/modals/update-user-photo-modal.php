<!-- update user phot modal -->
<div class="modal fade" id="update_photo_modal">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <form method="POST" action="xhr/update-user-photo.php" enctype="multipart/form-data" id="user_photo_form">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="fa fa-image mr-2 text-primary"></i>
                        Update Photo
                    </h4>
                    <button class="close" type="button" data-dismiss="modal">
                        <span >&times;</span>
                    </button>
                </div>
                <div class="modal-body image-draft">
                    <div class="image-board">
                        <img src="<?php echo getAvatar($id) ?>" class="img-fluid">
                        <h6 class="mt-2 file_name"></h6>
                    </div>
                    <div class="mt-2 text-right">
                        <button class="btn btn-info btn-sm file-btn" type="button" title="Upload Image" data-old-url="">
                            Upload
                            <i class="fa fa-upload ml-1"></i>
                            <input type="file" accept="image/*" name="img" class="file_input" onchange="uploadImage(this)">
                        </button>
                        <button type="button" onclick="dropImage(this)" class="btn btn-danger btn-sm d-none drop-file-btn" title="Drop Image">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id?>">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>