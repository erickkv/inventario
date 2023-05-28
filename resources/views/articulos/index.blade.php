@extends(('layouts.master'))

@section('title', 'Articulos')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar'))
        </div>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Inventario</h1>
            </div>

            <h2>Existencias en inventario</h2>
            @if(count($articulos) > 0)
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Existencias</th>
                    </tr>
                    <tbody>
                    @php
                        $contador = 0;
                    @endphp
                    @foreach($articulos as $articulo)
                        <tr>
                            <td>{{++$contador}}</td>
                            <td>{{$articulo->id}}</td>
                            <td><a class="btn btn-sm" href="/articulos/{{$articulo->id}}">{{$articulo->nombre}}</a></td>
                            <td>{{$articulo->cantidad}}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            @else
                <p>No hay ninún artículo en inventario, por favor ingrese uno en "Entradas"</p>
            @endif
        </main>
    </div>
@endsection
