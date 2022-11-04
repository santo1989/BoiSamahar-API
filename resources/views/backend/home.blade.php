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
                                  <div class="card-body">
                                    <a href="{{ route('categories.index') }}" style="color: white; text-decoration: none;">
                                      <h5 class="card-title d-flex justify-content-center">Manage Category</h5>
                                      <div class="d-flex justify-content-center"> <i class="fa fa-indent "
                                              aria-hidden="true"></i></div>
                                      <p class="card-text d-flex justify-content-center">Total {{ $categories->count() }} Category </p>
                                    </a>
                                  </div>
                              </div>
                            </div>
                              <!-- /.card -->
                              <div class="col-md-3 col-lg-3 col-sm-12">
                                @php
                                  $authors = App\Models\Author::all();
                              @endphp
                              <div class="card" style="background-color: #2196F3">
                                  <div class="card-body">
                                    <a href="{{ route('authors.index') }}" style="color: white; text-decoration: none;">
                                      <h5 class="card-title d-flex justify-content-center">Manage Author</h5>
                                      <div class="d-flex justify-content-center"> <i class="fa fa-user" aria-hidden="true"></i></div>
                                      <p class="card-text d-flex justify-content-center">Total {{ $authors->count() }} Author </p>
                                    </a>
                                  </div>
                              </div>
                            </div>

                              <!-- /.card -->
                              <div class="col-md-3 col-lg-3 col-sm-12">
                                @php
                                  $books = App\Models\Book::all();
                                @endphp
                              <div class="card" style="background-color: #2196F3">
                                  <div class="card-body">
                                    <a href="{{ route('books.index') }}" style="color: white; text-decoration: none;">
                                      <h5 class="card-title d-flex justify-content-center">Manage Book</h5>
                                      <div class="d-flex justify-content-center"> <i class="fa fa-book" aria-hidden="true"></i></i></div>
                                      <p class="card-text d-flex justify-content-center">Total {{ $books->count() }} Book </p>
                                    </a>
                                  </div>
                              </div>
                            </div>
                              <!-- /.card -->
                              <div class="col-md-3 col-lg-3 col-sm-12">
                              <div class="card" style="background-color: #2196F3">
                                  <div class="card-body">
                                    <a href="#" style="color: white; text-decoration: none;">
                                      <h5 class="card-title d-flex justify-content-center">Notification</h5>
                                      <div class="d-flex justify-content-center"> <i class="fa fa-bell" aria-hidden="true"></i></div>
                                      <p class="card-text d-flex justify-content-center">Total 10 Notification </p>
                                    </a>
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
                                  $users = App\Models\User::all();
                              @endphp

                              <div class="card" style="background-color: #2196F3">
                                  <div class="card-body">
                                    <a href="#" style="color: white; text-decoration: none;">
                                      <h5 class="card-title d-flex justify-content-center">Registered Users</h5>
                                      <div class="d-flex justify-content-center"> <i class="fa fa-user-circle" aria-hidden="true"></i></i></div>
                                      <p class="card-text d-flex justify-content-center">Total {{ $users->count() }} Users </p>
                                    </a>
                                  </div>
                              </div>
                            </div>
                              <!-- /.card -->
                              <div class="col-md-3 col-lg-3 col-sm-12">
                               
                              <div class="card" style="background-color: #2196F3">
                                  <div class="card-body">
                                    <a href="#" style="color: white; text-decoration: none;">
                                      <h5 class="card-title d-flex justify-content-center">Manage ADDS</h5>
                                      <div class="d-flex justify-content-center"> <i class="fa fa-university" aria-hidden="true"></i></div>
                                      <p class="card-text d-flex justify-content-center">App Monitaization </p>
                                    </a>
                                  </div>
                              </div>
                            </div>

                              <!-- /.card -->
                              <div class="col-md-3 col-lg-3 col-sm-12">
                              <div class="card" style="background-color: #2196F3">
                                  <div class="card-body">
                                    <a href="#" style="color: white; text-decoration: none;">
                                      <h5 class="card-title d-flex justify-content-center">Comments</h5>
                                      <div class="d-flex justify-content-center"> <i class="fa fa-comments" aria-hidden="true"></i></div>
                                      <p class="card-text d-flex justify-content-center">Users Comments </p>
                                    </a>
                                  </div>
                              </div>
                            </div>
                              <!-- /.card -->
                              <div class="col-md-3 col-lg-3 col-sm-12">
                              <div class="card" style="background-color: #2196F3">
                                  <div class="card-body">
                                    <a href="#" style="color: white; text-decoration: none;">
                                      <h5 class="card-title d-flex justify-content-center">Settings</h5>
                                      <div class="d-flex justify-content-center"> <i class="fa fa-cog" aria-hidden="true"></i></div>
                                      <p class="card-text d-flex justify-content-center">Key and Privacy Settings </p>
                                    </a>
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
