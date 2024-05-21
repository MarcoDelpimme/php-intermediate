@extends('templates.base')





@section('title', 'Crea Prodotto')
@section('content')
    {{-- @dd(Auth::user()) --}}

    <body>
        <div class="container">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        @session('operation_success')
                            <div class="alert alert-danger" role="alert">
                                The product "{{ session('operation_success')->name }}" has been deleted"
                            </div>
                        @endsession
                        @session('operation_created')
                            <div class="alert alert-success" role="alert">
                                The product "{{ session('operation_created')->name }}" has been created
                            </div>
                        @endsession
                        @session('operation_updated')
                            <div class="alert alert-warning" role="alert">
                                The product "<a
                                    href="{{ route('details', ['id' => session('operation_updated')->id]) }}">{{ session('operation_updated')->name }}</a>"
                                has been update
                            </div>
                        @endsession
                        <th>Nome</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Date</th>
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
                                @auth
                                    @if (Auth::user()->id === $product->user_id)
                                        <form method="POST" action="{{ route('delete', ['id' => $product]) }} ">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Elimina</button>
                                        </form>
                                    @endif

                                @endauth

                            </td>@auth<td>
                                    @if (Auth::user()->id === $product->user_id)
                                        <a name="" id="" class="btn btn-warning"
                                            href="{{ route('modify', ['id' => $product]) }}">Modifica</a>
                                    @endif
                                </td>
                            @endauth



                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $products->links() }}
    @endsection
