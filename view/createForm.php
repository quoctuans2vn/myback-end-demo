<form action="index.php?c=Form&a=uploadForm" method="POST" id="main-form" enctype="multipart/form-data">
    <label for="">Subject</label>
    <input type="text" name="subject" id="subject"/>
    <label for="">To</label>
    <input type="text" name="contract" id="contract"/>
    <label for="">Expire Time</label>
    <input type="text" name="expire_time" id="expire_time" />
    <input type="file" name='file' id="file"/>
    <textarea name="description" id="description" cols="100" rows="5"></textarea>
    <button type="submit" name="submit" id="submit">Save Changes </button>
</form>
<div>Note : File with extension 'pdf','jpg','jpeg','png','doc','docx','xlsx' is allowed to submit.</div>
<div class="file-message">
    <div><?php //$data = json_decode($controller->data);
    if (isset($_GET['message'])){
        echo ($_GET['message']);
    }
     
    ?></div>
    <div id="error-type" style="display: none">Invalid File</div>
    <div id="error-size" style="display: none">File Size is too big</div>
</div>
<div class="form-message"></div>