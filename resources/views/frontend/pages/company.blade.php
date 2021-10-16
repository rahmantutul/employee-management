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
                    <form action="{{url('company_search ')}}" method="GET" role="search">
                        <div class="md-form mt-0">
                        <input name="search" class="form-control" type="text" placeholder="Search" aria-label="Search">
                        <button type="submit" hidden>Go</button>
                        </div>
                    </form>
                </div>
                <!-- Section Header End -->
                <!-- Search form -->
            </div>
        </div>    
        <div class="our-services">
		 <div class="row">
             @foreach ($companies as $company)
                 <div class="col-md-4 col-sm-4 col-xs-12 text-xs-center wow fadeInDown" data-wow-delay=".2s">
                    <div class="service-box">
                        <div class="icon">
                            <img style="border-radius: 50%; height:80px" src="{{ asset('storage/'.$company['logo']) }}" alt="" srcset="">
                        </div>
                        
                        <h3 style="margin-top:8px; font-weight:600">{{ $company['name'] }}</h3> 
                        <span style="font-weight: 600">Visit Us : <a href="http://{{ $company['website'] }}" target="_blank" rel="noopener noreferrer">{{ $company['website'] }}</a></span><br>
                        <span style="font-weight: 600">Mail Us : <a href="{{$company['email']}}" target="_blank" rel="noopener noreferrer">{{$company['email']}}</a></span><br>
                        <span style="font-weight: 600">Visit Employes : <a href="{{ url('/related',$company['id']) }}"rel="noopener noreferrer">GO...</a></span>
                    </div> 
                </div>
             @endforeach
         </div> 
         <div>{{ $companies->links('vendor.pagination.custom') }}</div>
        </div>
        
    </section>
@endsection
@push('script')
    
@endpush
