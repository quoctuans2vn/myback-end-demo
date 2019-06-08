<div class="row">
    <div class="card-body row">
        <div class="col">ID</div>
        <div class="col">Name</div>
        <div class="col">Username</div>
        <div class="col">Password</div>
        <div class="col"></div>
    </div>

</div>
<?php
    $forms = json_decode($controller->data);
    foreach($forms as $key => $value){
?>
<div class="card row mr-2">
    <div class="card-body row">
        <div class="col"><?php echo $value->id?></div>
        <div class="col"><?php echo $value->name?></div>
        <div class="col"><?php echo $value->username?></div>
        <div class="col"><?php echo $value->pass?></div>
        <div class="col">
            <!-- Button trigger modal -->

            <button class="btn btn-primary show-roles" data-toggle="modal" data-target="#<?php echo $value->id?>">Edit</button>
            <button class="btn btn-danger delete" data-user_id='<?php echo $value->id?>'>Delete</button>
            <!-- Modal -->
            <div class="modal fade" id="<?php echo $value->id?>" tabindex="-1" role="dialog"
                aria-labelledby="ModalLabel<?php echo $value->id?>" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel<?php echo $value->id?>">Edit Account
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Content here ! -->
                        <div class="modal-body">
                            <form action="Admin/editUser" method="POST">
                                <input type="text" name="userid" disable style="display:none" value="<?php echo $value->id?>" />
                                <div class="form-group">
                                    <label for="change_name" class="col-form-label">Full name:</label>
                                    <input type="text" class="form-control" name="change_name" id="change_name"
                                        placeholder="<?php echo $value->name?>">
                                </div>
                                <div class="form-group">
                                    <label for="change_usrname" class="col-form-label">Username:</label>
                                    <input type="text" class="form-control" name="change_usrname" id="change_usrname"
                                        placeholder="<?php echo $value->username?>">
                                </div>
                                <div class="form-group">
                                    <label for="change_pass" class="col-form-label">Password:</label>
                                    <input type="text" class="form-control" name="change_pass" id="change_pass"
                                        placeholder="<?php echo $value->pass?>">
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="my-3">
                                        <h4>Role :</h4>
                                        <div class="my-3 text-uppercase">
                                        <?php
                                            $roles = $controller->user->getOtherRoles($value->username);
                                            foreach ($roles as $key => $value){
                                                echo $key;
                                            }
                                        ?>
                                        </div>
                                    </div>
                                    <div class="my-3">
                                        <h4>Change roles :</h4>    
                                        <div class="roles_return"></div>    
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>