<x-layouts.layout>
    <div class="bg-gray-100 h-full overflow-y-auto flex flex-col items-center justify-center">
        <h1 class="text-3xl text-black/50"> Listado de alumnos</h1>
        <!-- variable temporal de aviso de usuario creado -->
        @if (session()->get("status"))
            <div role="alert" class="alert alert-success w-4/12 ">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>{{session()->get("status")}}</span>
            </div> <!-- se podria hacer por JS que solo se visualize 10segundos -->
        @endif


        <a href="{{route("alumnos.create")}}" class="btn btn-xs btn-primary m-2">Nuevo alumno</a>
        <div class="w-full flex justify-center">
            <table class="table table-xs table-pin-rows table-pin-cols w-8/12">
                <thead>
                <tr>
                    <td>Nombre</td>
                    <td>dni</td>
                    <td>email</td>
                    <td>edad</td>
                    <th colspan="2">Acciones</th>

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
                            <a href="{{route("alumnos.edit", $alumno->id)}}"
                               class="text-blue-900">
                                Editar
                            </a>
                        </td>

                        <!-- borrar -->
                        <td>
                            <form action="{{route("alumnos.destroy", $alumno->id)}}" method="POST" id="borrar"
                                  onsubmit="return confirmSubmit()">
                                <!-- añadimos token-->
                                @csrf
                                <!--añadimos metodo-->
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex-col">
            {{$alumnos->links()}}
        </div>

    </div>
    <script>
        function confirmSubmit() {
            var confirmacion = confirm("¿Quieres borrar este alumno? \nEsta operacion es irreversible")
            return confirmacion;
        }
    </script>
</x-layouts.layout>
