<x-layouts.layout>
    <div class="bg-gray-100 h-full overflow-y-auto">
        <h1 class="text-3xl text-black/50 text-center"> Listado de alumnos</h1>
        <a href="{{route("alumnos.create")}}" class="btn btn-xs btn-primary">Nuevo alumno</a>
        <div class="items-center h-full">
            <table class="table table-xs table-pin-rows table-pin-cols w-8/12">
                <thead>
                <tr>
                    <td>Nombre</td>
                    <td>dni</td>
                    <td>email</td>
                    <td>edad</td>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($alumnos as $alumno)
                    <tr>
                        <td>{{$alumno->nombre}}</td>
                        <td>{{$alumno->dni}}</td>
                        <td>{{$alumno->email}}</td>
                        <td>{{$alumno->edad}}</td>
                        <!-- editar -->
                        <td>
                            <a href="{{route("alumnos.edit", $alumno->id)}}">
                                editar
                            </a>
                        </td>

                        <!-- borrar -->
                        <td>
                            borrar
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</x-layouts.layout>
