@extends('backend.app')
<?php
use App\Models\Company;
?>
@push('css')
    
@endpush
@section('content')
    <div class="col-lg-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Employe Table</h4>
                  <p class="card-description">
                       <a href="{{ url('admin/add-employee') }}" style="font-weight:600">New Empoye</a>
                  </p>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="search">
                        <i class="mdi mdi-magnify"></i>     
                      </span>   
                    </div>
                    <form action="{{ url('admin/search-employee') }}" method="get">
                          <input value="" name="term" type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
                          <button type="submit" hidden></button>
                    </form>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Avatar
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Comapany
                          </th>
                          <th>
                            Join Date
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            City
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($employees as $employe)
                            <tr>
                                <td class="py-1">
                                    <img src="{{ asset('storage/images/admin/'.$employe['logo']) }}" alt="image"/>
                                </td>
                                <td>
                                {{ $employe['first_name'] }} {{ $employe['last_name'] }}
                                </td>
                                <td>
                                  @php
                                    $company= Company::where(['id'=>$employe['company_id']])->first();
                                  @endphp
                                  {{ $company['name'] }}
                                </td>
                                <td>
                                    {{ $employe['join_date'] }}
                                </td>
                                <td>
                                    {{ $employe['email'] }}
                                </td>
                                <td>
                                {{ $employe['city'] }}
                                </td>
                                <td>
                                    <a href="{{ url('admin/edit-employee', $employe['id']) }}" title="Edit"><i class="mdi mdi-credit-card-off"></i></a> | &nbsp;
                                    <a href="{{ url('admin/delete-employee',$employe['id']) }}" class="confirmDelete" name="Employee" title="Delete"><i class="mdi mdi-delete-sweep"></i></a> |  &nbsp;
                                    <a href="" title="Delete"></a> 
                                    @if ($employe['status']==1)
                                    <a href="javascript:void(0)" class="updateEmployeeStatus" id="employee-{{$employe['id']}}" employee_id="{{$employe['id']}}" title="Turn Off"><i class="mdi mdi-toggle-switch" status="Active"></i></a>
                                    @else
                                    <a href="javascript:void(0)" class="updateEmployeeStatus" id="employee-{{$employe['id']}}" employee_id="{{$employe['id']}}" title="Turn ON" ><i class="mdi mdi-toggle-switch-off" status="Disabled"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                       
                      </tbody>
                    </table>
                     
                  </div>
                </div>
                <div class="d-felx justify-content-center" style="margin:auto">
                  @if ($title=='Employees')
                      {{ $employees->links() }}
                      @else
                      {!! $employees->withQueryString()->links() !!}
                  @endif
                </div>
              </div>
            </div>
@endsection
@push('css')
    
@endpush
