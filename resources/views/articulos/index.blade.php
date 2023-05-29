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
                        <th scope="col">Operaciones</th>
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
                            <td>
                                <div class="mb-1">
                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-eliminar-{{$articulo->id}}" type="submit">Eliminar</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>No hay ninún artículo en inventario, por favor ingrese uno en "Entradas"</p>
            @endif
        </main>
    </div>


    <!-- Modal -->
    @foreach($articulos as $articulo)
        <div class="modal fade" id="modal-eliminar-{{$articulo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-bg-danger">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">¿Realmente desea eliminar este artículo y sus existencias?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Artículo a eliminar: {{$articulo->nombre}}
                    </div>
                    <div class="modal-footer">
                        <form action="/articulos/{{$articulo->id}}" method="post">
                            @method('delete')
                            {{csrf_field()}}
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button class="btn btn-primary bg-danger" type="submit">Eliminar</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
