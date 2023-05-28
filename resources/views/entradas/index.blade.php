@extends(('layouts.master'))

@section('title', 'Articulos')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar'))
        </div>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Entradas</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <a href="/cuentas/create" type="button" class="btn btn-sm btn-outline-secondary">Registrar nueva entrada</a>
                    </div>
                </div>
            </div>

            @if(count($entradas) > 0)
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre Articulo</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                    <tbody>
                    @php
                        $contador = 0;
                    @endphp
                    @foreach($entradas as $entrada)
                        <tr>
                            <td>{{++$contador}}</td>
                            <td>{{$entrada->id}}</td>
                            <td><a class="btn btn-sm" href="/entradas/{{$entrada->id}}">{{$entrada->articulo->nombre}}</a></td>
                            <td>{{$entrada->cantidad}}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            @else
                <p>No hay ninguna entrada registrada en el inventario</p>
            @endif
        </main>
    </div>
@endsection
