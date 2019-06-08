<select name="change_role" class="form-control">
<?php
    $roles = json_decode($controller->data);
    foreach($roles as $key => $value){
?>

  <option value="<?php echo $value->role_id?>"><?php echo $value->role_name?></option>

<?php
    }
?>
</select>