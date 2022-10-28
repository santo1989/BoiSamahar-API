<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Author List
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Author </x-slot>

            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('authors.index') }}">Author</a></li>
        </x-backend.layouts.elements.breadcrumb>
    </x-slot>

    <section class="content">
        <div class="container-fluid">
            @if (is_null($authors) || empty($authors))
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

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-primary" href={{ route('authors.create') }}>Create</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                {{-- author Table goes here --}}

                                <table id="datatablesSimple" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sl#</th>
                                            <th>Name</th>
                                            <th>Number of Book</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $sl=0 @endphp
                                        @foreach ($authors as $author)
                                            <tr>
                                                <td>{{ ++$sl }}</td>
                                                <td>{{ $author->name }}</td>
                                                <td>{{ $author->books->count() }}</td>
                                                <td>
                                                    <a class="btn btn-primary my-1 mx-1 btn-sm"
                                                        href={{ route('authors.edit', ['author' => $author->id]) }}>Edit</a>
                                                    <a class="btn btn-primary my-1 mx-1 btn-sm"
                                                        href={{ route('authors.show', ['author' => $author->id]) }}>Show</a>

                                                    <form
                                                        action="{{ route('authors.destroy', ['author' => $author->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')

                                                        <button
                                                            onclick="return confirm('Are you sure want to delete ?')"
                                                            class="btn btn-danger my-1 mx-1 btn-sm" type="submit">Delete</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    @endif
</x-backend.layouts.master>
