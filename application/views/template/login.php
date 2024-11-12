<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f7f7f7;
      height: 100vh;
    }
    .login-container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .login-container .form-label {
      font-weight: bold;
    }
  </style>
</head>
<body>

  <div class="d-flex justify-content-center align-items-center h-100">
    <div class="login-container">
      <h2 class="text-center mb-4">Admin Login</h2>
      
      <!-- Login Form -->
      <form action="<?php echo site_url('LoginCL/adminlogin'); ?>" method="post">
        <!-- Username Input -->
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" required>
        </div>

        <!-- Password Input -->
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
        </div>

        <!-- Remember Me Checkbox -->
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="rememberMe">
          <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
      
      <div class="text-center mt-3">
        <a href="#">Forgot password?</a>
      </div>
      
    </div>
  </div>

  <!-- Bootstrap 5 JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
