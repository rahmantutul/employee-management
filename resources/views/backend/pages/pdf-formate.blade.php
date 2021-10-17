<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
</head>
<body>
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Employees Table</h4>
                  <h2 style="justify-content:center"> <b> EMPLOYEES OF {{ $employeeData['name'] }} </b>({{ $employees->count() }})</h2>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Name
                          </th>
                          <th>
                            Company
                          </th>
                          <th>
                            City
                          </th>
                          <th>
                            Joining Date
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>
                                {{ $employee['first_name'] }} {{ $employee['last_name'] }}
                                </td>
                                <td>
                                {{ $employeeData['name'] }}
                                </td>
                                <td>
                                {{ $employee['city'] }}
                                </td>
                                <td>
                                {{ $employee['join_date'] }}
                                </td>
                            </tr>
                        @endforeach
                  </tbody>
              </table>
            </div>
         </div>
        </div>
    </div>
</body>
</html>