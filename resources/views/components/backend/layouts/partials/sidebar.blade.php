<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion" >
        <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Backend Home</div>


                    <a class="nav-link" href="{{ route('categories.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-pie"></i></div>
                        Manage Category
                    </a>

                    <a class="nav-link" href="{{ route('authors.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-reader"></i></div>
                        Manage Author
                    </a>

                    <a class="nav-link" href="{{ route('books.index') }}">
                        <div class="sb-nav-link-icon"><i class='fas fa-book'></i></div>
                        Manage Book
                    </a>

                    <!-- Dammy Data -->
                    <a class="nav-link" href="">
                        <div class="sb-nav-link-icon"><i class="fa fa-bell"></i></div>
                        Notifications
                    </a>

                    <a class="nav-link" href="">
                        <div class="sb-nav-link-icon"><i class="fa fa-user-circle"></i></div>
                        Registered Users
                    </a>

                    <a class="nav-link" href="">
                        <div class="sb-nav-link-icon"><i class='fa fa-university'></i></div>
                        Manage Ads
                    </a>

                    <a class="nav-link" href="">
                        <div class="sb-nav-link-icon"><i class="fa fa-comments"></i></div>
                        Comments
                    </a>

                    <a class="nav-link" href="">
                        <div class="sb-nav-link-icon"><i class='fa fa-cog'></i></div>
                        Settings
                    </a>

        </div>
        </div>
       <div class="sb-sidenav-footer">
            <div class="small">Logged By:</div>
            {{ auth()->user()->name ?? '' }}
            

    </div>
    </nav> 
    
</div>
