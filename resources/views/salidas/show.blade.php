@extends(('layouts.master'))

@section('title', 'Articulos')

@section('content')

    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar'))
        </div>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @if($salida)
            <h1>Salida</h1>
            <h2>Artículo: {{$salida->articulo->nombre}}</h2>
            <p>Cantidad que ingresó: {{$salida->cantidad}}</p>
            <p>Usuario que ingresó artículo: {{$salida->user->name}}</p>
            @if($salida->nota && $salida->nota !== "") <p>Nota: {{$salida->nota}}</p> @endif
            <small>Fecha de ingreso: {{$salida->created_at}}</small>
            @else <p>No existe el registro seleccionado</p>
            @endif
        </main>
    </div>


@endsection
