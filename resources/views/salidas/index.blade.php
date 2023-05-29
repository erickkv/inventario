@extends(('layouts.master'))

@section('title', 'Articulos')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar'))
        </div>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Lista de salidas</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-nuevo">Registrar nueva salida</button>
                </div>
            </div>

            @if(count($salidas) > 0)
                <div id="table-content">
                    <div class="table-responsive">
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
                            @foreach($salidas as $salida)
                                <tr>
                                    <td>{{++$contador}}</td>
                                    <td>{{$salida->id}}</td>
                                    <td><a class="btn btn-sm" href="/salidas/{{$salida->id}}">{{$salida->articulo->nombre}}</a></td>
                                    <td>{{$salida->cantidad}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <p>No hay ninguna salida registrada en el inventario</p>
            @endif
        </main>
    </div>
@endsection
