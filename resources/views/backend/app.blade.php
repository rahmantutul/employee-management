
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ $title }}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('backend/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendors/base/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('backend/images/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('backend/css/toastr.css') }}"> 
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
   @stack('css')
</head>
<body>
  <div class="container-scroller">

      @include('backend/layouts/header')

      <div class="container-fluid page-body-wrapper">


      @include('backend/layouts/sidebar')

      @yield('content')
          
    </div>
  </div>
  <script src="{{ asset('backend/vendors/base/vendor.bundle.base.js') }}"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="{{ asset('backend/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('backend/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('backend/js/off-canvas.js') }}"></script>
  <script src="{{ asset('backend/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('backend/js/template.js') }}"></script>
  <script src="{{ asset('backend/js/dashboard.js') }}"></script>
  <script src="{{ asset('backend/js/data-table.js') }}"></script>
  <script src="{{ asset('backend/js/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('backend/js/dataTables.bootstrap4.js') }}"></script>
  <script src="{{asset('backend/js/toastr.js')}}"></script>
  <script src="{{asset('backend/js/admin.js')}}"></script>
  {!! Toastr::message() !!}
  @stack('script')
</body>

</html>

