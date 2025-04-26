<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi Pengguna</title>
  
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Source Sans Pro', sans-serif;
      background-color: #f2f3f8;
    }

    .header {
      background: url('{{ asset('images/register-art.jpeg') }}') no-repeat center center/cover;
      height: 380px;
      border-bottom-left-radius: 20px;
      border-bottom-right-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: #fff;
    }

    .header h1 {
      font-size: 2.5rem;
      margin-bottom: 10px;
    }

    .header p {
      font-size: 1rem;
    }

    .register-box {
      max-width: 400px;
      background-color: #fff;
      margin: -100px auto 0;
      padding: 40px 30px;
      border-radius: 16px;
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
    }

    .register-box h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .social-buttons {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .social-buttons button {
      width: 32%;
      border: none;
      padding: 10px;
      border-radius: 8px;
      background: #f0f0f0;
      cursor: pointer;
      font-size: 18px;
    }

    .or-divider {
      text-align: center;
      margin: 20px 0;
      position: relative;
    }

    .or-divider::before,
    .or-divider::after {
      content: "";
      position: absolute;
      width: 40%;
      height: 1px;
      background: #ccc;
      top: 50%;
    }

    .or-divider::before { left: 0; }
    .or-divider::after { right: 0; }

    .or-divider span {
      background: #fff;
      padding: 0 10px;
      color: #999;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group input {
      width: 100%;
      padding: 14px 20px;
      border: 2px solid #e0e0e0;
      border-radius: 12px;
      font-size: 16px;
      outline: none;
      transition: all 0.3s ease;
      background-color: white;
      color: #333;
    }

    .form-group input::placeholder {
      color: #b0b0b0;
    }

    .form-group input:focus {
      border-color: #00cfff;
      box-shadow: 0 0 0 3px rgba(0, 207, 255, 0.2);
    }

    .form-group label {
      font-size: 14px;
      display: block;
      margin-bottom: 5px;
    }

    .form-check {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .form-check input {
      margin-right: 10px;
    }

    .form-check label {
      font-size: 14px;
    }

    .btn-register {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background-color: #344767;
      color: #fff;
      font-weight: bold;
      font-size: 16px;
      cursor: pointer;
    }

    .footer-link {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }

    .footer-link a {
      color: #344767;
      font-weight: 600;
      text-decoration: none;
    }

    .footer-link a:hover {
      text-decoration: underline;
    }

    @media (max-width: 480px) {
      .register-box {
        margin: -80px 20px 0;
      }
    }
  </style>
</head>
<body>

  <div class="header">
    <div>
      <h1>Welcome!</h1>
      <p>Use this form to register for a new account</p>
    </div>
  </div>

  <div class="register-box">
    <h2>Register with</h2>
    <div class="social-buttons">
      <button><i class="fab fa-facebook-f"></i></button>
      <button><i class="fab fa-apple"></i></button>
      <button><i class="fab fa-google"></i></button>
    </div>

    <div class="or-divider"><span>or</span></div>

    <form action="{{ url('/register') }}" method="POST" id="form-register">
      @csrf
      <div class="form-group">
        <input type="text" id="nama" name="nama" placeholder="Nama">
      </div>
      <div class="form-group">
        <input type="text" id="username" name="username" placeholder="Username">
      </div>
      <div class="form-group">
        <input type="password" id="password" name="password" placeholder="Password">
      </div>

      <div class="form-check">
        <input type="checkbox" id="agree">
        <label for="agree">I agree the <strong>Terms and Conditions</strong></label>
      </div>

      <button class="btn-register" type="submit">SIGN UP</button>
    </form>

    <div class="footer-link">
      Already have an account? <a href="{{ url('/login') }}">Sign in</a>
    </div>
  </div>

  <!-- Scripts -->
  <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val()
      }
    });

    $(document).ready(function () {
      $("#form-register").validate({
        rules: {
          username: { required: true, minlength: 4, maxlength: 20 },
          nama: { required: true, minlength: 3, maxlength: 100 },
          password: { required: true, minlength: 6, maxlength: 20 },
        },
        submitHandler: function (form) {
          $.ajax({
            url: form.action,
            method: form.method,
            data: $(form).serialize(),
            success: function (response) {
              $('.error-text').text('');
              if (response.status) {
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil Registrasi',
                  text: response.message
                }).then(() => {
                  window.location.href = "{{ url('login') }}";
                });
              } else {
                if (response.msgField) {
                  $.each(response.msgField, function (prefix, val) {
                    $('#error-' + prefix).text(val[0]);
                  });
                }
                Swal.fire({
                  icon: 'error',
                  title: 'Gagal Registrasi',
                  text: response.message || 'Silakan periksa kembali data yang diisi.'
                });
              }
            },
            error: function (xhr) {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Terjadi kesalahan di server.'
              });
            }
          });
          return false;
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.input-group').append(error);
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
