@extends('backend.app')

@push('css')
    
@endpush
@section('content')
    <div class="col-lg-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Company Table</h4> 
                  <p class="card-description">
                       <a href="{{ url('admin/add-company') }}" style="font-weight:600">New Company</a>
                  </p>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="search">
                        <i class="mdi mdi-magnify"></i>     
                      </span>   
                    </div>
                    <form action="{{ url('admin/search-company') }}" method="get">
                          <input value="" name="term" type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
                          <button type="submit" hidden></button>
                    </form>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Logo
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Website
                          </th>
                          <th>
                            Actions
                          </th>
                          <th>
                            Empyee Report
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($companies as $company)
                            <tr>
                                <td class="py-1">
                                    <img src="{{ asset('storage/'.$company['logo']) }}" alt="image"/>
                                </td>
                                <td>
                                {{ $company['name'] }}
                                </td>
                                <td>
                                    {{ $company['email'] }}
                                </td>
                                <td>
                                {{ $company['website'] }}
                                </td>
                                <td>
                                    <a href="{{ url('admin/edit-company', $company['id']) }}" title="Edit"><i class="mdi mdi-credit-card-off"></i></a> | &nbsp;
                                    <a href="{{ url('admin/delete-company',$company['id']) }}" class="confirmDelete" name="Companye" title="Delete"><i class="mdi mdi-delete-sweep"></i></a> |  &nbsp;
                                    <a href="" title="Delete"></a> 
                                    @if ($company['status']==1)
                                    <a href="javascript:void(0)" class="updateCompanyStatus" id="company-{{$company['id']}}" company_id="{{$company['id']}}" title="Turn off"><i class="mdi mdi-toggle-switch" status="Active"></i></a>
                                    <a href="" title="Status Off"></a>
                                        
                                    @else
                                    <a href="javascript:void(0)" class="updateCompanyStatus" id="company-{{$company['id']}}" company_id="{{$company['id']}}" title="Turn on"><i class="mdi mdi-toggle-switch-off" status="Disabled"></i></a>
                                    @endif
                                </td>
                                 <td>
                                   <a href="{{ url('admin/employee-report', $company['id']) }}" title="Employee Report"> &nbsp; <i class="mdi mdi-file-pdf"></i>Report</a> 
                                 </td>
                            </tr>
                        @endforeach
                       
                      </tbody>
                    </table>
                    
                  </div>
                </div>
                <div class="d-felx justify-content-center" style="margin:auto">
                  @if ($title=='COMPANIES')
                      {{ $companies->links() }}
                      @else
                      {!! $companies->withQueryString()->links() !!}
                  @endif
                  
                </div>
              </div>
            </div>
@endsection
@push('css')
    
@endpush
