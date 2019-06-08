<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUserLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="Admin/addUser" method="POST">
          <div class="form-group">
            <label for="create_name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" name="create_name" id="create_name">
          </div>
          <div class="form-group">
            <label for="create_username" class="col-form-label">Username:</label>
            <input type="text" class="form-control" name="create_usrname" id="create_usrname">
          </div>
          <div class="form-group">
            <label for="create_pass" class="col-form-label">Password:</label>
            <input type="text" class="form-control" name="create_pass" id="create_pass">
          </div>
          <div class="my-3">
              <h4 class="mb-3">Roles</h4>
              <div class="roles_return"></div>
          </div>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>