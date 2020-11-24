@extends('layouts.app')

@section('title', 'LARAPP - Lista de Usuarios')
    
@section('content')

    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h1>Lista de Usuarios</h1>
            <hr>
            <a href="{{ url('users/create') }}" class="btn btn-primary"> Adicionar </a>

            {{-- Importar excel --}}
            <form action="{{ url('import/excel/users') }}" method="POST" enctype="multipart/form-data" class="d-inline">
				@csrf
				<input type="file" class="d-none" id="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
				<button type="button" class="btn btn-success btn-excel mr-3">
					Importar Usuarios
				</button>
			</form>

            <a href="{{ url('generate/pdf/users') }}" class="btn btn-warning"> Exportar PDF </a>
            <a href="{{ url('generate/excel/users') }}" class="btn btn-warning"> Exportar Excel </a>
            <input type="hidden" id="tmodel" value="users">
            <input type="search" id="qsearch" name="qsearch" class="form-search" autocomplete="off" placeholder="Buscar">
            <br>
            <div class="loader d-none text-center mt-5">
                <img src="{{ asset('imgs/loader.gif')}}" width="100px">
            </div>
            <br><br>
            <div class="table-responsive">
                <table class="table table-striped table-hover mt-4">
                    <thead>
                        <tr>
                            <th>Nombre completo</th>
                            <th class="d-none d-sm-table-cell">Correo electroónico</th>
                            <th class="d-none d-sm-table-cell">Teléfono</th>
                            <th>Foto</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="content">
                            @foreach ($users as $user)
                                <tr>
                                    <td> {{ $user->fullname}} </td>
                                    <td class="d-none d-sm-table-cell"> {{ $user->email}} </td>
                                    <td class="d-none d-sm-table-cell"> {{ $user->phone}} </td>
                                    <td> 
                                        <img src="{{ asset($user->photo) }}" alt="" width="35"> 
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ url('users/'.$user->id) }}" class="btn btn-primary btn-sm">Consultar</a>
                                        <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary btn-sm ml-1 mr-1">Editar</a>
                                        <form action="{{ url('users/'.$user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-danger btn-delete btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
                <!-- Para realizar la paginación usamos links() -->
                <div class="d-flex justify-content-center">
                    {{  $users->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection