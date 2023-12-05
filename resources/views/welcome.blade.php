<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ __('Admin panel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    >
    <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    >

    </script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"
    >
    </script>
    <style>
        .form-check-input:hover {
            cursor: pointer;
        }
    </style>
</head>
<body style="background: black; color: aliceblue">

<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        {{ __('Create Product') }}
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">{{ __('Create Product') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form
                    action="{{ url('api/v1/admin/product') }}"
                    method="post"
                    enctype="multipart/form-data"
                >
                    <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="title">{{ __('Title') }}:</label>
                                <input
                                    type="text"
                                    name="title"
                                    class="form-control"
                                    id="title"
                                    placeholder="Enter title"
                                >
                                @if($errors->has('title'))
                                    <ul class="alert alert-danger" style="list-style: none">
                                        <li class="">
                                            {{ $errors->first() }}
                                        </li>
                                    </ul>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">{{ __('Image') }}:</label>
                                <input
                                    type="file"
                                    name="image"
                                    class="form-control"
                                    id="image"
                                    placeholder="Enter image"
                                >
                                @if($errors->has('image'))
                                    <ul class="alert alert-danger" style="list-style: none">
                                        <li class="">
                                            {{ $errors->first() }}
                                        </li>
                                    </ul>
                                @endif
                            </div>
                    </div>

                    <div class="modal-footer pb-2">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h2 class="fa fa-list">Products List</h2>
    <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
    <table class="table">
        <thead>
        <tr>
            <th>{{ __('seleted') }}</th>
            <th>{{ __('order') }}</th>
            <th>{{ __('title') }}</th>
            <th>{{ __('image') }}</th>
            <td>{{ __('likes') }}</td>
            <th>{{ __('created at') }}</th>
            <th>{{ __('operation') }}</th>
        </tr>
        </thead>
        <tbody>
            <tr aria-colspan="6">
                <button type="submit" class="btn btn-danger">{{ __('Remove selected record') }}</button>
            </tr>
            @php $i = 1; @endphp
            @if(isset($products) && $products)
                @foreach($products as $product)
                    <tr>
                        <td>
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    value=""
                                    id="flexCheckChecked"
                                >
                            </div>
                        </td>
                        <td>{{ $i }}</td>
                        <td>{{ $product->title }}</td>
                        <td>
                            <img
                                src='{{ asset($product->image) }}'
                                width="50" height="50" alt="image"
                            >
                        </td>
                        <td>{{ $product->likes }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>
                            <button class="btn btn-warning">edit</button>
                            <button type="button"
                                    class="btn btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $i }}"
                            >
                                {{ __('Remove') }}
                            </button>
                        </td>
                    </tr>
                    <div
                        class="modal fade" id="exampleModal{{ $i }}"
                        tabindex="-1"
                        aria-labelledby="exampleModalLabel{{ $i }}"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1
                                        class="modal-title fs-5 text-dark"
                                        id="exampleModalLabel"
                                    >
                                        {{ __('Remove Product') }}
                                    </h1>
                                    <button
                                        type="button" class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    >
                                    </button>
                                </div>
                                <form
                                    action="{{ url('api/v1/admin/product') }}"
                                    method="delete"
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    <p
                                        class="text text-info text-dark text-center"
                                    >
                                        Are you want to emove this record?
                                    </p>

                                    <div class="modal-foter pb-2">
                                        <button
                                            type="button"
                                            class="btn btn-default"
                                            data-bs-dismiss="modal"
                                        >
                                            {{ __('Close') }}
                                        </button>
                                        <button type="submit" class="btn btn-danger">{{ __('Continue') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @php $i++; @endphp
                 @endforeach
                <tr>
                    <td colspan="7">
                        {{ $products->links() }}
                    </td>
                </tr>
            @else
                <tr>
                    <td class="text-center">
                        <p class="text-center text-danger">{{ __('Result not found') }}</p>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

<script>
    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    })

    function myFunction() {
        var element = document.getElementById("myDIV");
        element.classList.toggle("mystyle");
    }
</script>
</body>
</html>
