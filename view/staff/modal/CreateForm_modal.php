<div class="modal fade" id="createForm" tabindex="-1" role="dialog" aria-labelledby="createFormLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createFormLabel">Create Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Content here -->
                <form action="Home/uploadForm" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="subject" class="col-form-label">Subject :</label>
                        <input type="text" class="form-control" name="subject" id="subject" />
                    </div>
                    <div class="form-group">
                        <label for="contract" class="col-form-label">To :</label>
                        <input type="text" class="form-control" name="contract" id="contract" />
                    </div>
                    <div class="form-group">
                        <label for="expire_time" class="col-form-label">Expire time :</label>
                        <input type="text" class="form-control" name="expire_time" id="expire_time" />
                    </div>
                    <div class="text-muted">Note : File with extension 'pdf','jpg','jpeg','png','doc','docx','xlsx' is
                        allowed to
                        submit.</div>
                    <div class="input-group my-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file" name="file" />
                            <label class="custom-file-label" for="file">Choose file</label>
                        </div>
                    </div>
                    <div class="text-muted">You have to write all details in here.</div>
                    <div class="input-group my-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Description</span>
                        </div>
                        <textarea class="form-control" name="description" aria-label="Description"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>