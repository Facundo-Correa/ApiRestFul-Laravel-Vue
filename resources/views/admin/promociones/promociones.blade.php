@extends('admin.admin')

@section('content')
    <section>
        <div id="index" style="background-color: #ebebeb">
            <div class="container-fluid p-0">
                <!-- BUSCADOR -->
                <div class="header_bottom">
                    <div class="container">
                        <div class="row">
                            <div style="margin-top: 5px" class="col-xs-12">
                                <h2>Ingrese método de búsqueda</h2>
                            </div>
                            <div class="col-md-12">
                                <form>
                                    <div class="row">
                                        <div class="searchImput col-md-6">
                                            <input class="codsInput mb-3 mb-md-0" type="text" name="name" placeholder="Buscar por Nombre/Apellido">
                                        </div>
                                        <div class="searchImput col-md-6">
                                            <input class="codsInput mb-3 mb-md-0" type="text" name="email" placeholder="Buscar por email">
                                        </div>
                                        <div class="searchImput col-md-4">
                                            <input class="codsInput mb-3 mb-md-0" type="number" min="1" step="1" name="id" placeholder="Buscar por ID">
                                        </div>
                                        <div class="searchImput col-md-4">
                                            <input class="codsInput mb-3 mb-md-0" type="number" min="1" step="1" name="n_plataforma" placeholder="Buscar por N° de Plataforma">
                                        </div>
                                        <div class="searchImput col-md-4">
                                            <select class="codsInput mb-3 mb-md-0" name="status_id">
                                                <option value="" selected disabled>Buscar por Status</option>
                                                <option value='1'>Habilitado</option>
                                                <option value='2'>Inhabilitado</option>
                                                <option value='4'>Moroso</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-block h-30 search">Buscar</button>
                                        <button type="reset" class="btn btn-primary btn-block h-30">Limpiar</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>

                @if(isset($clientes))
                    ACA ENTRA
                    <div class="container pb-4">
                        <div class="col-xs-12">
                            <h3>Resultados de Búsqueda</h3>
                        </div>
                        <div class="col-sm-12">
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Empresa</th>
                                    <th>Email</th>
                                    <th>N° Plataforma</th>
                                    <th>Status</th>
                                    <th colspan="2">

                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clientes as $cliente)
                                <tr>
                                    <td width="10px">{{ $cliente->id }}</td>
                                    <td width="20px"> {{ $cliente->name }}</td>
                                    <td> {{ $cliente->nombre }}</td>
                                    <td> {{ $cliente->apellido }}</td>
                                    <td> {{ $cliente->empresa }}</td>
                                    <td> {{ $cliente->email }}</td>
                                    <td> {{ $cliente->n_plataforma }}</td>
                                    @if($cliente->status_id == 1)<td> Habilitado</td>@endif
                                    @if($cliente->status_id == 2)<td> Inhabilitado</td>@endif
                                    @if($cliente->status_id == 4)<td> Moroso</td>@endif
                                    <!-- Button disabled si el cliente ya se encuentra Habilitado -->
                                    @if($cliente->status_id == 1)
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" disabled>Habilitar</button>
                                    </td>
                                    @else()
                                    <td width="10px" v-else>
                                        <a href="/admin/adminclientes/updatestatus/{{$cliente->id}}" class="btn btn-primary btn-sm">Habilitar</a>
                                    </td>
                                    @endif
                                    <td width="10px">
                                        <button type="button" class="btn btn-success btn-sm" data-id="{{$cliente->id}}" data-toggle="modal" data-target="#myModal">Editar</button>
                                    </td>
                                    <td width="10px">
                                        <button type="button" class="btn btn-danger btn-sm" disabled>Eliminar</button>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                @include('admin.components.clientes.clienteModal')
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
        </div>
    </section>
@endsection

@section('css')

    <style>

    </style>

@endsection

@section('script')
    <script type="text/javascript">

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $(".search").click(function(e){

    e.preventDefault();

    var name = $("input[name=name]").val();
    var email = $("input[name=email]").val();
    var id = $("input[name=id]").val();
    var n_plataforma = $("input[name=n_plataforma]").val();
    var status_id = $("select[name=status_id]").val();

    $.ajax({
    type:'POST',
    url: '/admin/adminclientes',
    data: {name:name, email:email, id:id, n_plataforma: n_plataforma, status_id: status_id},
    success:function(data){
        $clientes = JSON.parse(data);
        //console.log($clientes);
    }

    });



    });

    </script>

@endsection
