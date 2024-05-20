@extends('templates.base')





@section('title', 'Crea Prodotto')
@section('content')


    <h1> <?php echo $products->name; ?></h1>
    <h1> <?php echo $products->price; ?></h1>
    <h1> <?php echo $products->description; ?></h1>
@endsection
