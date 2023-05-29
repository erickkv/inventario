@extends(('layouts.master'))

@section('meta')
    <meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('title', 'Articulos')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar'))
        </div>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Lista de entradas</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-nuevo-articulo">Ingresar nuevo artículo</button>
                </div>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-nueva-entrada">Registrar nueva entrada</button>
                </div>
            </div>

            @if(count($entradas) > 0)
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
                    </div>
                </div>
            @else
                <p>No hay ninguna entrada registrada en el inventario</p>
            @endif
        </main>
    </div>

    <!-- Modal nueva entrada-->
    <div class="modal fade" id="modal-nueva-entrada" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-bg-success">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        {{csrf_field()}}

                        <div class="form-floating">
                            <select id="selectArticulo" name="articulo" class="form-select">
                                @foreach($articulos as $articulo)
                                    <option value="{{$articulo->id}}">{{$articulo->nombre}}</option>
                                @endforeach
                            </select>
                            <label>Artículo</label>

                        </div>
                        <div class="form-floating">
                            <input id="inputCantidad" type="number" step="0.01" name="cantidad" class="form-control">
                            <label>Cantidad</label>
                        </div>
                        <div class="form-floating">
                            <input id="inputNota" type="text" name="nota" class="form-control">
                            <label>Nota</label>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="btnGuardar" type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal nuevo articulo-->
    <div class="modal fade" id="modal-nuevo-articulo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-bg-success">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        {{csrf_field()}}

                        <div class="form-floating">
                            <input id="inputNombreArt" type="text" name="nombre" class="form-control">
                            <label>Nombre del artículo</label>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="btnGuardarArt" type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>

        let modalNuevaEntrada = document.getElementById("modal-nueva-entrada");
        let modalNuevoArt = document.getElementById("modal-nuevo-articulo");
        let BSmodalNuevaEntrada = new bootstrap.Modal(modalNuevaEntrada);
        let BSmodalNuevoArt = new bootstrap.Modal(modalNuevoArt);

        let btnGuardar = document.getElementById("btnGuardar");

        let btnGuardarArt = document.getElementById("btnGuardarArt");

        let tableContent = document.getElementById("table-content");

        let uri;
        let data;
        let request;

        //para guardar una nueva entrada
        function obtenerValoresEntrada() {
            let selectArt = document.getElementById("selectArticulo").value;
            let inputCantidad = document.getElementById("inputCantidad").value;
            let inputNota = document.getElementById("inputNota").value;

            data = {
                idArticulo: selectArt,
                cantidad: inputCantidad,
                nota: inputNota
            }

            request = {
                headers:{
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                method: 'post',
                body: JSON.stringify(data)
            }
        }

        btnGuardar.onclick = function () {
            uri = '/entradas';
            obtenerValoresEntrada();
            for (const key in data) {
                if (data[key] === "" || !data[key]) {
                    alert(`Debe introducir un valor en el campo ${key}`);
                    return;
                }
            }
            fetch(uri, request)
                // .then(response=>response.json()) //esto era cuando se mandaba un json en el response (en web.php)
                .then(response=>response.text()) //ahora se manda texto porque recibe un view que es html
                .then(function (result) {

                    BSmodalNuevaEntrada.hide();
                    document.getElementById("selectArticulo").value = "";
                    document.getElementById("inputCantidad").value = "";

                    tableContent.innerHTML = result;
                })
                .catch(function (error) {
                    console.error(error)
                });
        }





        // para guardar un nuevo articulo

        function obtenerValoresArticulo() {
            let inputNombreArt = document.getElementById("inputNombreArt").value;

            data = {
                nombre: inputNombreArt
            }

            request = {
                headers:{
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                method: 'post',
                body: JSON.stringify(data)
            }
        }

        btnGuardarArt.onclick = function () {
            uri = '/articulos';
            obtenerValoresArticulo();
            for (const key in data) {
                if (data[key] === "" || !data[key]) {
                    alert(`Debe introducir un valor en el campo ${key}`);
                    return;
                }
            }
            fetch(uri, request)
                .then(response=>response.text())
                .then(function(result) {
                    BSmodalNuevoArt.hide();
                    document.getElementById("inputNombreArt").value = "";
                    location.reload();

                })
                .catch(function (error) {
                    console.error(error)
                });
        }


    </script>

@endsection
