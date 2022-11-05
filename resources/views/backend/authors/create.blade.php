<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Create Author
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader">  </x-slot>
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('authors.index') }}">Author</a></li>
            <li class="breadcrumb-item active">Create Author</li>
        </x-backend.layouts.elements.breadcrumb>
    </x-slot>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('authors.store') }}" method="post" enctype="multipart/form-data">
        <div>
            @csrf

            <x-backend.form.input name="name" type="text" label="Name" />
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <select class="form-control" name="category_id" id="category_name">
                   
                    <option value="">Select Category</option>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                    @endforeach
                </select>
            </div>

            <x-backend.form.button>Save</x-backend.form.button>
        </div>
    </form>

</x-backend.layouts.master>
