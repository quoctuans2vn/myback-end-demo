<div class="row">
    <div class="card-body row">
        <div class="col">ID</div>
        <div class="col">Subject</div>
        <div class="col">To</div>
        <?php if ($controller->user->hasRole('admin')){
            echo "<div class='col'>Submitter</div>";
        }
        ?>
        <div class="col">State</div>
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
        <div class="col"><?php echo $value->subject?></div>

        <div class="col">
            <?php echo $value->contract?>
        </div>

        <?php
            if ($controller->user->hasRole('admin')){
            ?>
        <div class='col'><?php echo $value->submitter?></div>
        <?php
            }
            ?>

        <div class="col">
            <?php
                if($value->state){
                    echo "<button type='button' class='btn btn-success ' disabled >Accepted</button>";
                }
                else echo "<button type='button' class='btn btn-danger ' disabled data-form_state='0' data-form_id='".$value->id."'>Not Accepted</button>";
                ?>
        </div>
        <div class="col">
            <!-- Button trigger modal -->

            <button class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $value->id?>">Detail</button>
            <?php if ($controller->user->hasRole('admin')){
                        echo "<button class='btn btn-primary action' data-form_state='$value->state' data-form_id='$value->id'>Pend</button>";
                    }
                    ?>
            <!-- Modal -->
            <div class="modal fade" id="<?php echo $value->id?>" tabindex="-1" role="dialog"
                aria-labelledby="ModalLabel<?php echo $value->id?>" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel<?php echo $value->id?>"><?php echo $value->subject?>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Content here ! -->
                        <div class="modal-body">
                            <img src="<?php echo "uploads/".$value->filename?>" alt="Sorry!Something Wrong"
                                class="img-thumbnail float-left" style="max-width: 60%" />
                            <div>Expiretime : <?php echo $value->expiretime?></div>
                            <div>Time : <?php echo $value->timesubmit?></div>
                            <div>Submitter : <?php echo $value->submitter?></div>
                            <div>Description : <?php echo $value->description?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>