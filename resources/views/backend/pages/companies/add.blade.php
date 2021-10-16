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
                  <form class="forms-sample" action="{{ url('/admin/add-company') }}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label" >Name</label>
                      <div class="col-sm-9">
                        <input name="name" type="text" class="form-control" id="exampleInputUsername2" placeholder="Company Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input name="email" type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Website</label>
                      <div class="col-sm-9">
                        <input name="website" type="text" class="form-control" id="exampleInputMobile" placeholder="Website address">
                      </div>
                    </div>
                     <div class="form-group">
                        <input name="logo" type="file" class="form-control form-control-lg" title="Choose company image">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>
@endsection
