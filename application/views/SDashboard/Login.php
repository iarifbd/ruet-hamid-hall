<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card" style="width: 20rem;">
      <div class="card-body">
        <h5 class="card-title text-center mb-4">Login</h5>
        <form action="<?php echo site_url('LoginCL/studentlogin'); ?>" method="post">
          <div class="mb-3">
            <label for="text" class="form-label">Student ID</label>
            <input type="text" class="form-control" name="S_Id" id="S_Id" placeholder="Studet ID" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password"  id="password" placeholder="Password" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <div class="text-center mt-3">
          <a href="#">Forgot password?</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
