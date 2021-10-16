@extends('frontend.app')

@push('css')
    <style type="text/css">
		.my-active span{
			background-color: #5cb85c !important;
			color: white !important;
			border-color: #5cb85c !important;
		}
	</style>
@endpush

@section('content')
    <section id="services" class="section-wrapper">
        
        <div class="container">
            <div class="row">
                <!-- Section Header -->
                <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown">
                    <h2 style="margin-top: 30px"><span class="highlight-text">{{ $title }}</span></h2>
                    
                <form action="{{url('employee_search ')}}" method="GET" role="search">
                        <div class="md-form mt-0">
                        <input name="search" class="form-control" type="text" placeholder="Search" aria-label="Search">
                        <button type="submit" hidden>Go</button>
                        </div>
                </form>
                </div>
                <!-- Section Header End -->
            </div>
        </div>    
        <div class="our-services">
		 <div class="row">
             @foreach ($employees as $employee)
                 <div class="col-md-4 col-sm-4 col-xs-12 text-xs-center wow fadeInDown">
                    <div class="service-box">
                        <div class="icon">
                            <img style="border-radius: 50%; height:80px" src="{{ asset('storage/images/admin/'.$employee['logo']) }}" alt="" srcset="">
                        </div>
                        
                        <h3 style="margin-top:8px; font-weight:600">{{ $employee['first_name'] }} {{ $employee['last_name'] }}</h3>
                        <span style="font-weight: 600">Company:{{ $employee['company']['name']  }}</span> <br>
                        <span style="font-weight: 600">Join: {{ $employee['join_date']}}</span><br> 
                        <span style="font-weight: 600">Mail Me : <a href="http://{{ $employee['email'] }}" target="_blank" rel="noopener noreferrer">{{ $employee['email'] }}</a></span><br>
                        <span style="font-weight: 600">Contact Me : +88 {{ $employee['phone'] }}</span><br>

                    </div> 
                </div>
             @endforeach
         </div> 
        </div>
        <div>
        {{ $employees->links('vendor.pagination.custom') }}</div>
@endsection
@push('script')
    
@endpush
