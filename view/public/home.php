        
    <section class="row">
        <!-- Sidebar -->
        <?php 
            if ($controller->user->hasRole('admin')){
                require 'view/admin/navbaradmin-aside.php';
            }
            else if ($controller->user->hasRole('staff')){
                require 'view/staff/navbarstaff-aside.php';
            }

        ?>
        <!-- Sidebar end -->
        <!-- Main section -->
        <section class="col col-md-9">
            <!-- Top nav -->
            <?php require 'navbar-section.php'; ?>
            <!-- Top nav -->
            <div id="data-returned">
            <?php
            if ($controller->user->hasRole('staff')){
                $active = isset($_GET['active'])?$_GET['active']:'Profile';
                if ($active == 'FormSubmitted' || $active == 'Profile'){
                    require 'view/'.$active.'.php';
                }
                else require 'view/staff/'.$active.'.php';  
            }
            else if ($controller->user->hasRole('admin')){
                $active = isset($_GET['active'])?$_GET['active']:'Profile';
                if ($active == 'FormSubmitted' || $active == 'Profile' ){
                    require 'view/'.$active.'.php';
                }
                else require 'view/admin/'.$active.'.php';
            }
                
            ?>
            </div>
        </section>
        <!-- Main section end -->
    </section>

<footer></footer>