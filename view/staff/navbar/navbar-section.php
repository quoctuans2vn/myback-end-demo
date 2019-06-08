<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse d-flex justify-content-between"
    id="navbarTogglerDemo02 flex justify-content-end">
    <button class="btn btn-outline-dark"><a href="Home/loadForm" class="text-muted">Home</a></button>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search">
      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
    </form>
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#createForm">Create Form</button>
    <button class="btn btn-outline-dark"><a href="Home/logout" class="text-muted">Log out</a></button>
  </div>
</nav>

<!-- Modal for Create Form -->
<?php require_once 'view/staff/modal/CreateForm_modal.php';?>
