<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Backend Home</div>


                    <a class="nav-link" href="{{ route('categories.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                         Category
                    </a>

                    <a class="nav-link" href="{{ route('authors.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                         Author
                    </a>

                    <a class="nav-link" href="{{ route('books.index') }}">
                        <div class="sb-nav-link-icon"><i class='fas fa-car'></i></div>
                        Book
                    </a>

        </div>
        </div>
       <div class="sb-sidenav-footer">
            <div class="small">Logged By:</div>
            {{ auth()->user()->name ?? '' }}
            

    </div>
    </nav> 
    
</div>
