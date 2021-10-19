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
                  <h2 style="text:center"> <b> EMPLOYEES OF {{ $employeeData['name'] }} </b>({{ $employees->count() }})</h2><span><a href="{{ url('admin/export-report',$employeeData['id']) }}" title="Employee Report"> &nbsp; <i class="mdi mdi-file-send"></i>Export Pdf</a></span>
                  <div class="table-responsive">
                    </select>
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
@endsection
@push('css')
    
@endpush
