@extends('backend.app')
@push('css')
    
@endpush
@section('content')
    <div class="col-md-6 grid-margin stretch-card m-auto">
              <div class="card">
                 @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                    </div>
                @endif
                <div class="card-body">
                  <h4 class="card-title">INSERT EMPLOYEE INFO</h4>
                  <form class="forms-sample" action="{{ url('/admin/add-employee') }}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label" >First Name</label>
                      <div class="col-sm-9">
                        <input name="first_name" type="text" class="form-control" id="exampleInputUsername2" placeholder="First Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label" >Last Name</label>
                      <div class="col-sm-9">
                        <input name="last_name" type="text" class="form-control" id="exampleInputUsername2" placeholder="Last Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input name="email" type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                      <div class="col-sm-9">
                        <input name="phone" type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">City</label>
                      <div class="col-sm-9">
                        <input name="city" type="text" class="form-control" id="exampleInputPassword2" placeholder="City">
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" >Select Company</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="company_id">
                              <option>SELECT</option>
                              @foreach ($companies as $company)
                                  <option value="{{ $company['id'] }}">{{ $company['name'] }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Joining Date</label>
                        <div class="col-sm-9">
                          <input name="join_date" type="date" class="form-control" id="exampleInputPassword2" placeholder="Enter Joining Date">
                        </div>
                      </div>
                     <div class="form-group">
                        <input name="logo" type="file" class="form-control form-control-lg" title="Choose your image">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>
@endsection
