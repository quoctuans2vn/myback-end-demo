<?php
    $perms = json_decode($controller->data);
    foreach($perms as $key => $value){
?>
<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" name="<?php echo $value->perm_desc?>" id="perm<?php echo $value->perm_id?>"/>
    <label class="custom-control-label" for="perm<?php echo $value->perm_id?>"><?php echo $value->perm_desc?></label>
</div>
<?php
    }
?>