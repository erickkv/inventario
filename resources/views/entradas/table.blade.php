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
