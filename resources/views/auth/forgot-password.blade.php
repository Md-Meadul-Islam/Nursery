<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password || Nursery</title>
    <link rel="apple-touch-icon" href="{{asset('backend2')}}/img/apple-touch-icon.png">
    <link rel="icon" type="image/gif" href="{{asset('backend2')}}/img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" />
</head>
<body>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-8 col-sm-10 d-flex flex-column align-items-center justify-content-center">
                <div class="d-flex justify-content-center py-4">
                  <a href="{{route('welcome')}}" class="d-flex align-items-center w-auto" style="text-decoration: none">
                    <img src="{{asset('backend2')}}/img/logo.png" width="50px" height="50px"><span class="d-lg-block" style="font-weight:800;font-size:36px;color:#81c408">Nursery</span></a>
                </div><!-- End Logo -->
                <div class="card mb-3">
                  <div class="card-body"style="position:relative">
                    <div class="pt-4 pb-2">
                      <h5 class="card-title text-center pb-0 fs-4">Recover Your Password!</h5>
                    </div>
                    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                    </div>
                    <form action="{{route('password.email')}}" method="POST" class="row g-3">
                      @csrf
                      <div class="col-12" style="position: relative">
                        <label for="email" class="form-label"><strong>Email</strong></label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-envelope"></i></span>
                          <input type="text" name="email" class="form-control" id="email" required autofocus
                            autocomplete="email" placeholder="Please Input your Email...">
                        </div>
                      </div>  
                      <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">Email Password Reset Link</button>
                      </div>
                      <div class="col-12">
                        <p class="small mb-0 float-end">Haven't Account? <a href="{{route('register')}}">Create New Account</a></p>
                      </div>
                    </form>  
                  </div>
                </div>  
                <div class="credits">
                  Designed by <a href="https://www.blooms-ai.com">Blooms-AI</a>
                </div>  
              </div>
            </div>
          </div>  
        </section>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/fontawesome.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>
    <script>
      if (document.querySelector('.alertDiv')) {
        var hideableDivs = document.querySelectorAll('.alertDiv');
        hideableDivs.forEach(function (div) {
          div.addEventListener('click', function () {
            hideDiv(this);
          });
        });
        function hideDiv(element) {
          element.style.display = 'none';
        };
        hideableDivs.forEach(function (div) {
          setTimeout(function () {
            div.style.display = 'none';
          }, 5000);
        });
      }
    </script>
</body>
</html>