@extends(('layouts.master'))

@section('title', 'Articulos')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar'))
        </div>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @if($entrada)
            <h1>Entrada</h1>
            <h2>Artículo: {{$entrada->articulo->nombre}}</h2>
            <p>Cantidad que ingresó: {{$entrada->cantidad}}</p>
            <p>Usuario que ingresó artículo: {{$entrada->user->name}}</p>
            @if($entrada->nota && $entrada->nota !== "") <p>Nota: {{$entrada->nota}}</p> @endif
            <small>Fecha de ingreso: {{$entrada->created_at}}</small>
            @else <p>No existe el registro seleccionado</p>
            @endif
        </main>
    </div>
@endsection
