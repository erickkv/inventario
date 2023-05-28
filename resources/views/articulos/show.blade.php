@extends(('layouts.master'))

@section('title', 'Articulos')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar'))
        </div>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @if($articulo)
            <h1>{{$articulo->nombre}}</h1>
            <p>Existencias en inventario: {{$articulo->cantidad}}</p>
            <small>Fecha última actualización: {{$articulo->updated_at}}</small>
            @else <p>No existe el registro seleccionado</p>
            @endif
        </main>
    </div>
@endsection
