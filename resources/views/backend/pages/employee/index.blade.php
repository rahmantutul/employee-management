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
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Avatar
                          </th>
                          <th>
                            First name
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
                                {{ $employe['first_name'] }}
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
              </div>
            </div>
@endsection
@push('css')
    
@endpush
