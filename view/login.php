<div class="container bg-light d-flex justify-content-center">
  <div class="loginBox col col-md-5 col-sm-6 bg-primary shadow p-3 mb-5 bg-white rounded ">
    <form action="?a=login" method="Post">
      <div class="pd-title">
        <h1 class="text-center">Login</h1>
      </div>
      <div class="form-group  form-group-md">
        <label for="username">
          <h5>Username</h5>
        </label>
        <input type="Text" class="form-control input-lg" name='username' id="username"
          placeholder="Enter Username">
      </div>
      <div class="form-group ">
        <label for="Password">
          <h5>Password</h5>
        </label>
        <input type="password" class="form-control" name='password' id="password"
          placeholder="Enter Password">
      </div>
      <div class="pb-3">
        <button type="submit" name='submit' class="btn btn-outline-primary form-control ">Login</button>
      </div>
    </form>
    <div class="pd-myself">
      <a href="#" class=" text-primary">Forgot Your Password?</a>
    </div>
    <div class="pd-myself">
      <a href="#" class=" text-primary">Or Create A New Account ?</a>
    </div>
  </div>
</div>