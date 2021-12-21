<?php
require_once("koneksi.php");
require_once("modular/header.php");
?>
<style>
body {
    width:100vw;
    height:100vh;
    display: flex !important;
    justify-content: center;
    flex-direction: row;
  align-items: center;
}
@media only screen and (max-width: 600px) {
  .sulfikar {
  max-height:500px !important;
}

}
.sulfikar {
    width: 90%;
  height: 90%;
  max-width:600px;
  max-height:400px;

  background-color: #ffffff;
  /* Center vertically and horizontally */
  display: inline-flex;
  margin: auto; 
}


.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.leftinfo {
    background : #0d0d8a;
    
}
</style>
<div class="row sulfikar shadow-lg p-2 bg-body rounded" >
<div class="col-12 col-md-6 ps-0 pe-0 d-none d-sm-block rounded">
<div class="leftinfo h-100 text-center text-white  me-2 rounded">

<img class="mb-3 p-3" src="foto/logo8.png" alt="" width="100%">

<h3>PT<h3><h3>HOME PROPERTI</h3>
</div>

</div>
<div class="col-12 col-md-6  p-1">

<form action="handle_login.php" method="POST">
    <?php 
    if (isset($_GET['alert'])) {
        ?> 
        <div class="alert alert-danger" role="alert">
<?= $_GET['alert'] ?>
</div>
        <?php
    }
    ?>
<div class="	d-block d-sm-none">
    <img class="mb-4" src="foto/logo7.png" alt="" width="100" height="57">
    </div>
    <h1 class="h3 mb-3 fw-normal ">Login </h1>

    <div class="form-floating">
      <input type="email" class="form-control" name="email" placeholder="name@example.com">
      <label  for="floatingInput">Email address</label>
    </div>
    <br>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" placeholder="Password">
      <label  for="floatingPassword">Password</label>
    </div>
<br>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-1 mb-3 text-muted">© 2021 - PT HOME PROPERTI</p>
  </form>
</div>

</div> 
<?php
require_once("modular/footer.php");
?>