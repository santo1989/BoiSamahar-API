      <x-backend.layouts.master>

          <x-slot name="pageTitle">

          </x-slot>

          <x-slot name='breadCrumb'>
              {{-- <x-backend.layouts.elements.breadcrumb>
                  <x-slot name="pageHeader"> Dashboard </x-slot>
                  <li class="breadcrumb-item active">Dashboard</li>
              </x-backend.layouts.elements.breadcrumb> --}}
          </x-slot>
          <section class="content">
              <div class="container-fluid">
                  @if (is_null($books) || empty($books))
                      <div class="row">
                          <div class="col-md-12 col-lg-12 col-sm-12">
                              <h1 class="text-danger"> <strong>Currently No Information Available!</strong> </h1>
                          </div>
                      </div>
                  @else
                      @if (session('message'))
                          <div class="alert alert-success">
                              <span class="close" data-dismiss="alert">&times;</span>
                              <strong>{{ session('message') }}.</strong>
                          </div>
                      @endif

                      <div class="row pt-5">
                          <div class="col-md-3 col-lg-3 col-sm-12">
                              @php
                                  $categories = App\Models\Category::all();
                              @endphp

                              <div class="card" style="background-color: #2196F3">
                                  <div class="card-body align-items-center">
                                      <h5 class="card-title">Manage Category</h5>
                                      <span class="align-items-center"> <i class="fa fa-indent "
                                              aria-hidden="true"></i></span>
                                      <p class="card-text">Total {{ $categories->count() }} Category </p>
                                  </div>
                              </div>
                            </div>
                              <!-- /.card -->
                              <div class="col-md-3 col-lg-3 col-sm-12">
                                @php
                                  $authors = App\Models\Author::all();
                              @endphp
                              <div class="card" style="background-color: #2196F3">
                                  <div class="card-body align-items-center">
                                      <h5 class="card-title">Manage Author</h5>
                                      <span class="align-items-center"> <i class="fa fa-indent "
                                              aria-hidden="true"></i></span>
                                      <p class="card-text">Total {{ $authors->count() }} Author </p>
                                  </div>
                              </div>
                            </div>

                              <!-- /.card -->
                              <div class="col-md-3 col-lg-3 col-sm-12">
                                @php
                                  $books = App\Models\Book::all();
                                @endphp
                              <div class="card" style="background-color: #2196F3">
                                  <div class="card-body align-items-center">
                                      <h5 class="card-title">Manage Book</h5>
                                      <span class="align-items-center"> <i class="fa fa-indent "
                                              aria-hidden="true"></i></span>
                                      <p class="card-text">Total {{ $books->count() }} Book </p>
                                  </div>
                              </div>
                            </div>
                              <!-- /.card -->
                              <div class="col-md-3 col-lg-3 col-sm-12">
                              <div class="card" style="background-color: #2196F3">
                                  <div class="card-body align-items-center">
                                      <h5 class="card-title">Manage Category</h5>
                                      <span class="align-items-center"> <i class="fa fa-indent "
                                              aria-hidden="true"></i></span>
                                      <p class="card-text">Total {{ $categories->count() }} Category </p>
                                  </div>
                              </div>
                              <!-- /.card -->
                          </div>
                          <!-- /.col -->
                      </div>
                      <!-- /.row -->

                       <div class="row pt-2">
                          <div class="col-md-3 col-lg-3 col-sm-12">
                              @php
                                  $categories = App\Models\Category::all();
                              @endphp

                              <div class="card" style="background-color: #2196F3">
                                  <div class="card-body align-items-center">
                                      <h5 class="card-title">Manage Category</h5>
                                      <span class="align-items-center"> <i class="fa fa-indent "
                                              aria-hidden="true"></i></span>
                                      <p class="card-text">Total {{ $categories->count() }} Category </p>
                                  </div>
                              </div>
                            </div>
                              <!-- /.card -->
                              <div class="col-md-3 col-lg-3 col-sm-12">
                                @php
                                  $authors = App\Models\Author::all();
                              @endphp
                              <div class="card" style="background-color: #2196F3">
                                  <div class="card-body align-items-center">
                                      <h5 class="card-title">Manage Author</h5>
                                      <span class="align-items-center"> <i class="fa fa-indent "
                                              aria-hidden="true"></i></span>
                                      <p class="card-text">Total {{ $authors->count() }} Author </p>
                                  </div>
                              </div>
                            </div>

                              <!-- /.card -->
                              <div class="col-md-3 col-lg-3 col-sm-12">
                                @php
                                  $books = App\Models\Book::all();
                                @endphp
                              <div class="card" style="background-color: #2196F3">
                                  <div class="card-body align-items-center">
                                      <h5 class="card-title">Manage Book</h5>
                                      <span class="align-items-center"> <i class="fa fa-indent "
                                              aria-hidden="true"></i></span>
                                      <p class="card-text">Total {{ $books->count() }} Book </p>
                                  </div>
                              </div>
                            </div>
                              <!-- /.card -->
                              <div class="col-md-3 col-lg-3 col-sm-12">
                              <div class="card" style="background-color: #2196F3">
                                  <div class="card-body align-items-center">
                                      <h5 class="card-title">Manage Category</h5>
                                      <span class="align-items-center"> <i class="fa fa-indent "
                                              aria-hidden="true"></i></span>
                                      <p class="card-text">Total {{ $categories->count() }} Category </p>
                                  </div>
                              </div>
                              <!-- /.card -->
                          </div>
                          <!-- /.col -->
                      </div>

              </div>
              <!-- /.container-fluid -->
          </section>
          @endif
      </x-backend.layouts.master>

      <script>
          // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

          $('#reservation').daterangepicker()

          //   Date picker JS
      </script>
      {{-- @endif --}}
