<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Edit Author Information
    </x-slot>

    <x-slot name='breadCrumb'>
        <x-backend.layouts.elements.breadcrumb>
            <x-slot name="pageHeader"> Author </x-slot>
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('authors.index') }}">Author</a></li>
            <li class="breadcrumb-item active">Edit Author Information</li>
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
    <form action="{{ route('authors.update', ['author' => $author->id]) }}" method="post" enctype="multipart/form-data">
        <div>
            @csrf
            @method('put')
            <x-backend.form.input name="name" type="text" label="Name" :value="$author->name" />
            <br>

            <x-backend.form.button>Save</x-backend.form.button>
        </div>
    </form>


</x-backend.layouts.master>
