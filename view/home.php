        
    <section class="row">
        <!-- Sidebar -->
        <aside class= "col col-md-3">
            <nav class="nav flex-column">
                <a id="createForm" href="index.php?active=createForm" class="btn btn-primary btn-menu"> Create Form</a>
                <a id="Inbox" href="index.php?active=Inbox" class="btn btn-primary btn-menu"> Inbox</a>
                <a id="Inbox" href="index.php?active=FormSubmitted&a=loadForm&c=Form" class="btn btn-primary btn-menu"> Inbox</a>
            </nav>
        </aside>
        <!-- Sidebar end -->
        <!-- Main section -->
        <section class="col col-md-9">
            <!-- Top nav -->
            <?php require 'navbar-section.php'; ?>
            <!-- Top nav -->
            <div id="data-returned">
            <?php
                $active = isset($_GET['active'])?$_GET['active']:'createForm';
                require 'view/'.$active.'.php';
            ?>
            </div>
        </section>
        <!-- Main section end -->
    </section>

<footer></footer>