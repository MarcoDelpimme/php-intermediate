<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

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
</body>

</html>
