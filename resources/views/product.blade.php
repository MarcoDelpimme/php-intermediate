@extends('templates.base')





@section('title', 'Crea Prodotto')
@section('content')

    <body>
        <div class="container">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Price</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td><a href="{{ route('details', ['id' => $product]) }}"> {{ $product->name }}</a></td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->created_at }}</td>
                            <td>
                                <form method="POST" action="{{ route('delete', ['id' => $product]) }} ">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                </form>
                            </td>
                            <td> <a name="" id="" class="btn btn-warning"
                                    href="{{ route('modify', ['id' => $product]) }}">Modifica</a></td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $products->links() }}
    @endsection
