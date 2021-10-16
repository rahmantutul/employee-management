 <div class="preloader">
        <div class="status"></div>
    </div>
 
    <header>
        <!-- Navigation Menu start-->
		
	<nav id="topNav" class="navbar navbar-default main-menu">
        <div class="container">
            <button class="navbar-toggler hidden-md-up pull-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                ☰
            </button> 
            <a class="navbar-brand page-scroll" href="{{ url('/') }}"><h1 class="highlight-texts  p-t-1">EM &nabla; MANAGEMENT</h1></a>
            <div class="collapse navbar-toggleable-sm" id="collapsingNavbar">
                <ul class="nav navbar-nav">
                    <li class="{{ request()->is('/') ? 'active' : '' }}">
                        <a href={{ url('/') }}>COMPANY</a>
                    </li>
                    <li class="{{ request()->is('employees') ? 'active' : '' }}">
                        <a href="{{ url('/employees') }}">EMPLOYEE</a>
                    </li>
                    <li class="{{ request()->is('employees') ? 'active' : '' }}">
                    </li>
                </ul> 
            </div>
        </div>
    </nav>

        
    </header>
    <!-- Header End -->


  