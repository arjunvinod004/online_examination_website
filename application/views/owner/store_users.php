<link rel="shortcut icon" href="<?php echo base_url();?>assets/admin/images/favicon.ico">
<link href="<?php echo base_url();?>assets/admin/css/crm-responsive.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/admin/css/classic.min.css" rel="stylesheet" /> <!-- 'classic' theme -->
<link href="<?php echo base_url();?>assets/admin/fonts/css/all.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
    type="text/css" />
<link href="<?php echo base_url();?>assets/admin/css/icon.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>assets/admin/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/bootstrap.bundle.min.js"></script>

<div class="container-fluid">
    <div class="justify-content-end d-flex">
        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#adduser">Add User</button>
    </div>
    <table id="examplee" class="table table-striped mt-3" style="width:100%">
        <thead style="background: #e5e5e5;">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                       $count = 1;
                       foreach($listusers as $users){
                        ?>
            <tr>
                <td><?=$count;?></td>
                <td><?=$users['Name'];?></td>
                <td><?=$users['userName'];?></td>
                <td><?=$users['userEmail'];?></td>
                <td><?=$users['UserPhoneNumber'];?></td>
                <td> <?php
            if ($users['userroleid'] == 2) {
                echo "Shop Owner";
            } elseif ($users['userroleid'] == 3) {
                echo "Employee";
            }
            elseif ($users['userroleid'] == 4) {
                echo "Delivery Boy";
            }
            else {
                echo "Unknown Role";
            }
            ?></td>
                <td>
                    <button class="btn tblEditBtn pl-0 pr-0 edit-user" type="submit" data-bs-toggle="tooltip"
                        data-id="<?=$users['userid'];?>" data-name="<?=$users['Name'];?>"
                        data-email="<?=$users['userEmail'];?>" data-phone="<?=$users['UserPhoneNumber'];?>"
                        data-role="<?=$users['userroleid'];?>" data-bs-original-title="Edit Country"><i
                            class="fa fa-edit" data-bs-target="#edituser" data-bs-toggle="modal"></i></button>
                    <button data-id="<?=$users['userid'];?>" class="btn tblDelBtn pl-0 pr-0 delete-user" type="submit"
                        data-bs-toggle="tooltip"><i class="fa fa-trash" data-bs-target="#deleteuser"
                            data-bs-toggle="modal"></i></button>
                    <button data-id="<?=$users['userid'];?>" class="btn tblLogBtn pl-0 pr-0 password-change"
                        type="submit" data-toggle="tooltip" data-placement="bottom" title="Password Change"><i
                            class="fa-solid fa-key" data-bs-target="#passwordchange"
                            data-bs-toggle="modal"></i></button>
                </td>
            </tr>
            <?php $count++; } ?>
        </tbody>
    </table>
</div>
<!-- add user -->
<div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h1 class="modal-title fs-5" id="exampleModalLabel"> <span id="table_name"></span>Add User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="row bg-soft-light mb-3 border1 pt-2">
                    <form class="row mt-0 mb-0" id="addusers" method="post" enctype="multipart/form-data">


                        <div class="col-md-4">
                            <div class="mb-2 ">
                                <label class="form-label mx-2" for="default-input">Name</label>
                                <input type="text" class="form-control" required placeholder=" Name" name="user_name">
                                <span class="error errormsg mt-2 mx-2" id="user_name_error"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-2 focus">
                                <label class="form-label" for="default-input">Email</label>
                                <input class="form-control" value="" placeholder="Email" type="text" name="user_email">
                                <span class="error errormsg mt-2 mx-2" id="user_email_error"></span>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-4">
                                <label class="form-label" for="default-input">Address</label>
                                <input class="form-control" value="" placeholder="Address" type="text"
                                    name="user_address">
                                <span class="error errormsg mt-2 mx-2" id="user_address_error"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-4">
                                <label class="form-label" for="default-input">Phone No</label>
                                <input class="form-control" value="" placeholder="Phone No" type="text"
                                    name="user_phoneno">
                                <span class="error errormsg mt-2 mx-2" id="user_phoneno_error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <label class="form-label" for="default-input">Username</label>
                                <input class="form-control" value="" placeholder="Username" type="text"
                                    name="user_username">
                                <span class="error errormsg mt-2 mx-2" id="user_username_error"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-4">
                                <label class="form-label" for="default-input">Password</label>
                                <input class="form-control" value="" placeholder="Password" type="text"
                                    name="user_password">
                                <span class="error errormsg mt-2 mx-2" id="user_password_error"></span>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-4">
                                <label class="form-label" for="default-input">Role</label>
                                <select class="form-control" name="role">
                                    <option value="">Select role</option>
                                    <option value="2" <?= set_select('role', '2') ?>>Shop Owner</option>
                                    <option value="3" <?= set_select('role', '3') ?>>Employee</option>
                                    <option value="4" <?= set_select('role', '4') ?>>Delivery Boy</option>
                                </select>
                                <span class="error errormsg mt-2 mx-2" id="user_role_error"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-4">
                                <button class="btn btn-primary w-md" type="button" id="add_user">Save</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- edit user -->
<div class="modal fade" id="edituser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">

                <h1 class="modal-title fs-5" id="exampleModalLabel"> <span id="table_name"></span>edit user</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form-control" id="user_id" value="">
                <!-- if response within jquery -->
                <div class="message d-none" role="alert"></div>
                <!-- if response within jquery -->



                <div class="container">
                    <div class="row mb-5">
                        <div class="row bg-soft-light mb-3 border1 pt-2">
                            <form class="row mt-0 mb-0" id="editusers" method="post" enctype="multipart/form-data">


                                <div class="col-md-4">
                                    <div class="mb-2 ">
                                        <label class="form-label mx-2" for="default-input">Name</label>
                                        <input type="text" class="form-control" required placeholder=" Name"
                                            id="user_name" name="edit_user_name">
                                        <span class="error errormsg mt-2 mx-2" id="edit_user_name_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-2 focus">
                                        <label class="form-label" for="default-input">Email</label>
                                        <input class="form-control" value="" placeholder="Email" type="text"
                                            id="user_email" name="edit_user_email">
                                        <span class="error errormsg mt-2 mx-2" id="edit_user_email_error"></span>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="default-input">Phone No</label>
                                        <input class="form-control" value="" placeholder="Phone No" id="user_phoneno"
                                            type="text" name="edit_user_phoneno">
                                        <span class="error errormsg mt-2 mx-2" id="edit_user_phoneno_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="default-input">Role</label>
                                        <select class="form-control" name="edit_user_role" id="edit_user_role">
                                            <option value="">Select role</option>
                                            <option value="2" <?= set_select('role', '2') ?>>Shop Owner</option>
                                            <option value="3" <?= set_select('role', '3') ?>>Employee</option>
                                            <option value="4" <?= set_select('role', '4') ?>>Delivery Boy</option>
                                        </select>
                                        <span class="error errormsg mt-2 mx-2" id="user_role_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mt-4">
                                        <button class="btn btn-primary w-md" type="button"
                                            id="edit_user">UPDATE</button>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                </form>

            </div>

        </div>
    </div>
</div>


<div class="modal fade " id="Passwordchange" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Change Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- if response within jquery -->
                <div class="message d-none" role="alert"></div>
                <form action="" method="post" id="passwordchange">
                    <input type="text" name="user_id_change" id="user_id_change" value="" />
                    <input type="text" class="form-control" id="password" name="password_changes"
                        placeholder="Change Password">
                    <span class="error errormsg mt-2 mx-2" id="password_change_error"></span>
                </form>

            </div>
            <div class=" text-center mb-3">
                <button class="btn btn-primary" type="button" id="change_password">UPDATE</button>
            </div>

            </form>
        </div>
    </div>
</div>
</div>



<!-- delete user -->
<div class="modal fade " id="deleteuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- if response within jquery -->
                <div class="message d-none" role="alert"></div>
                <input type="hidden" name="id" id="delete_id" value="" />
                <?php echo are_you_sure; ?>
            </div>
            <div class="modal-footer"><button class="btn btn-primary" type="button" data-bs-dismiss="modal">No</button>
                <button class="btn btn-secondary" id="yes_del_user" type="button" data-bs-dismiss="modal">Yes</button>
            </div>

            </form>
        </div>
    </div>
</div>
</div>
<script>
$(document).ready(function() {
    $(document).on('click', '.edit-user', function() {
        var id = $(this).data('id');
        $('#user_id').val(id);
        $('#user_name').val($(this).data('name'));
        $('#user_email').val($(this).data('email'));
        $('#user_phoneno').val($(this).data('phone'));
        $('#edit_user_role').val($(this).data('role'));
    });
    $(document).on('click', '.delete-user', function() {
        var id = $(this).data('id');
        $('#delete_id').val(id);
    });
    $('#edit_user').click(function() {
        let formData = new FormData($('#editusers')[0]);
        formData.append('user_id', $('#user_id').val());
        $.ajax({
            url: "<?= base_url("owner/Settings/UpdateEditUser") ?>",
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                if (response.success) {
                    $('#edituser').modal('hide');
                    location.reload();
                } else {
                    if (response.errors.edit_user_email) {
                        $('#edit_user_email_error').html(response.errors.edit_user_email);
                    }

                    if (response.errors.edit_user_phoneno) {
                        $('#edit_user_phoneno_error').html(response.errors
                            .edit_user_phoneno);
                    }
                }

            }
        })

    });

    // delete user
    $('#yes_del_user').click(function() {
        $.ajax({
            method: "POST",
            url: '<?= base_url("owner/Settings/DeleteUser") ?>',
            data: {
                'id': $('#delete_id').val()
            },
            success: function(data) {
                window.location.href = '';
            }
        });
    });
    $('#add_user').click(function(e) {
        let formData = new FormData($('#addusers')[0]);
        $.ajax({
            url: '<?= base_url("owner/Settings/addUserValidation") ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    console.log(response);
                    $('#user_name_error').html('');
                    $('#user_email_error').html('');
                    $('#user_phoneno_error').html('');
                    $('#user_address_error').html('');
                    $('#user_username_error').html('');
                    $('#user_password_error').html('');
                    $('#user_role_error').html('');
                    $('#adduser').modal('hide');
                    location.reload();
                } else {
                    if (response.errors.user_name) {
                        $('#user_name_error').html(response.errors.user_name);
                    } else {
                        $('#user_name_error').html('');
                    }

                    if (response.errors.user_email) {
                        $('#user_email_error').html(response.errors.user_email);
                    } else {
                        $('#user_email_error').html('');
                    }

                    if (response.errors.user_phoneno) {
                        $('#user_phoneno_error').html(response.errors.user_phoneno);

                    } else {
                        $('#user_phoneno_error').html('');
                    }

                    if (response.errors.user_address) {
                        $('#user_address_error').html(response.errors.user_address);
                    } else {
                        $('#user_address_error').html('');
                    }
                    if (response.errors.user_username) {
                        $('#user_username_error').html(response.errors.user_username);
                    } else {
                        $('#user_username_error').html('');
                    }
                    if (response.errors.user_password) {
                        $('#user_password_error').html(response.errors.user_password);

                    } else {
                        $('#user_password_error').html('');
                    }

                    if (response.errors.role) {
                        $('#user_role_error').html(response.errors.role);
                    } else {
                        $('#user_role_error').html('');
                    }
                }
            },
        });
    })

    $(document).on('click', '.password-change', function() {
        var id = $(this).data('id');
        $('#user_id_change').val(id);
    });

    $('#change_password').click(function() {
        let formData = new FormData($('#passwordchange')[0]);
        $.ajax({
            url: '<?= base_url("owner/Settings/ChangePassword") ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    console.log(response);
                    location.reload();
                } else {
                    if (response.errors && response.errors.password_changes) {
                        $('#password_change_error').html(response.errors.password_changes);
                    }
                }
            },
        })
    })
});
</script>