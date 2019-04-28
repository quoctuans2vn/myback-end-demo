<nav class="navbar navbar-expand-lg navbar-light bg-info">
            <a class="navbar-brand" href="#"><?php echo $_SESSION['role']?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02 flex justify-content-end">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search">
                        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <button class="btn btn-outline-dark "><a href="index.php?a=logout" class="text-muted">Log out</a></button>
                </div>
                   
                
            </div>
        </nav>