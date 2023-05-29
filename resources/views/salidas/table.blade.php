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
