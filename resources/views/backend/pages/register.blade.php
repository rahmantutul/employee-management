
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Sign in</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/css/toastr.css') }}"> 
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h4>Welcome!</h4>
                
              <h6 class="font-weight-light">Sign in to continue .</h6>
                    <form class="pt-3" action="{{ ('/admin/register') }}" method="POST" enctype="multipart/form-data">@csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                    </div>
                    @endif
                    <div class="form-group">
                    <input type="name" class="form-control form-control-lg" id="exampleInputEmail1" name="name" placeholder="Name" >
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" placeholder="Email" >
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control form-control-lg" name="image" title="Choose your image">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                    </div>
                    </form>
                    <div class="text-center mt-4 font-weight-light">
                        Already have account? <a href="{{ url('/admin') }}" class="text-primary">SIGN IN</a>
                    </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('backend/vendors/base/vendor.bundle.base.js') }}"></script>
  <script src="{{asset('backend/js/toastr.js')}}"></script>
  {!! Toastr::message() !!}
</body>

</html>

