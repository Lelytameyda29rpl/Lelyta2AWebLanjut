<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Login Pengguna</title>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  
  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  <!-- Custom Style -->
  <style>
    body {
      font-family: 'Source Sans Pro', sans-serif;
      background: #f9f9f9;
      margin: 0;
      padding: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-section {
      display: flex;
      width: 100%;
      max-width: 1200px;
      min-height: 600px;
      background-color: #fff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
}

    .login-form-container {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 60px 40px;
      background-color: white;
    }

    .form-wrapper {
      width: 100%;
      max-width: 400px;
    }

    .form-title {
      font-size: 2rem;
      font-weight: 600;
      background: linear-gradient(90deg, #007cf0, #00dfd8);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 0.5rem;
    }

    .form-group {
      margin-bottom: 1.25rem;
    }

    .form-control {
      border-radius: 0.5rem;
      padding: 0.75rem;
    }

    .form-check {
      display: flex;
      align-items: center;
      margin-bottom: 1.5rem;
    }

    .form-check-input {
      margin-right: 0.5rem;
    }

    .btn-gradient {
      background: linear-gradient(to right, #21d4fd, #2152ff);
      color: #fff;
      font-weight: 600;
      border: none;
      border-radius: 0.5rem;
      padding: 0.75rem;
      width: 100%;
    }

    .btn-gradient:hover {
      background: linear-gradient(to right, #1ca1d4, #1c3fe0);
    }

    .footer-links {
      text-align: center;
      margin-top: 2rem;
      font-size: 0.875rem;
      color: #6c757d;
    }

    .footer-links a {
      color: #007bff;
      text-decoration: none;
    }

    .footer-links a:hover {
      text-decoration: underline;
    }

    .login-image {
      flex: 1;
      background: url('{{ asset('images/login-art.jpeg') }}') no-repeat center center;
      background-size: cover;
    }

    @media (max-width: 768px) {
  .login-section {
    flex-direction: column;
    border-radius: 0;
    box-shadow: none;
  }

  .login-image {
    display: none;
  }

  .login-form-container {
    padding: 40px 20px;
  }
}
  </style>
</head>
<body>

  <div class="login-section">
    <!-- ========== Login Form Section ========== -->
    <div class="login-form-container">
      <div class="form-wrapper">
        <h2 class="form-title">Welcome back</h2>
        <p class="text-muted mb-4">Enter your username and password to sign in</p>

        <form id="form-login" action="{{ url('login') }}" method="POST">
          @csrf

          <div class="form-group">
            <input type="text" name="username" id="username" class="form-control" placeholder="Email or Username">
          </div>

          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          </div>

          <div class="form-check">
            <input type="checkbox" name="remember" id="remember" class="form-check-input">
            <label class="form-check-label mb-0" for="remember">Remember me</label>
          </div>

          <button type="submit" class="btn btn-gradient">SIGN IN</button>
        </form>

        <div class="footer-links">
          Don't have an account? <a href="{{ url('register') }}">Sign up</a>
        </div>
      </div>
    </div>

    <!-- ========== Login Image Section ========== -->
    <div class="login-image d-none d-md-block"></div>
  </div>

  <!-- ========== Scripts ========== -->
  <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      error: function(xhr, status, error) {
        console.error('AJAX Error:', status, error);
        console.error(xhr.responseText);
        Swal.fire({
          icon: 'error',
          title: 'Server Error',
          text: 'An error occurred on the server. Please try again later.'
        });
      }
    });

    $(document).ready(function () {
      $("#form-login").validate({
        rules: {
          username: { required: true, minlength: 4, maxlength: 20 },
          password: { required: true, minlength: 6, maxlength: 20 }
        },
        submitHandler: function (form) {
          $.ajax({
            url: form.action,
            type: form.method,
            data: $(form).serialize(),
            success: function (response) {
              if (response.status) {
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  text: response.message,
                }).then(() => {
                  window.location = response.redirect;
                });
              } else {
                $('span.invalid-feedback').remove();
                $('.form-control').removeClass('is-invalid');

                if (response.msgField) {
                  $.each(response.msgField, function (field, messages) {
                    const input = $('#' + field);
                    input.addClass('is-invalid');
                    input.closest('.form-group').append('<span class="invalid-feedback d-block">' + messages[0] + '</span>');
                  });
                }

                Swal.fire({
                  icon: 'error',
                  title: 'Terjadi Kesalahan',
                  text: response.message
                });
              }
            }
          });
          return false;
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback d-block');
          element.closest('.form-group').append(error);
        },
        highlight: function (element) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>

</body>
</html>
