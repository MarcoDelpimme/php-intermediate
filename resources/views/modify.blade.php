@extends('templates.base')





@section('title', 'Crea Prodotto')
@section('content')

    <body>

        <div class="container">
            <h1>Crea Prodotto</h1>
            <form method="POST" action="{{ route('update', ['id' => $product->id]) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">NAME</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                        value="{{ $product->name }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Password</label>
                    <input type="text" class="form-control" id="description" name="description"
                        value="{{ $product->description }}">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Password</label>
                    <input type="number" class="form-control" id="price" name="price"
                        value="{{ $product->price }}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

    @endsection
