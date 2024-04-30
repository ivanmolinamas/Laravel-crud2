<x-layouts.layout>
    <x-auth-session-status class="mb-4" :status="session('status')"/>
        <!-- div para centrar el formulario -->
        <div class=" flex flex-col items-center justify-center  p-4 bg-gray-100 h-full ">

            <h1 class="text-3xl">Editar alumno</h1>
            <div class="w-4/4">

                <form action="{{route('alumnos.update', $alumno->id) }}" method="POST">
                    <!-- incluimos el metodo para realizar la actualizacion -->
                    @method('PUT')
                    <!-- añadimos el token-->
                    @csrf

                    <!-- nombre -->
                    <div>
                        <x-input-label for="nombre">Nombre</x-input-label>
                        <x-text-input id="nombre" type="text" name="nombre" :value="$alumno->nombre"/>
                        <!--  <x-input-error :messages="$errors->get('name')" class="mt-2"/> -->
                        @if ($errors->get("nombre"))
                            @foreach($errors->get("nombre") as $error)
                                <div class="text-sm text-red-600">{{$error}}</div>
                            @endforeach
                        @endif
                    </div>
                    <!-- dni -->
                    <div class="mt-4">
                        <x-input-label for="dni">DNI</x-input-label>
                        <x-text-input name="dni" id="dni" :value="$alumno->dni"/>
                        @if ($errors->get("dni"))
                            @foreach($errors->get("dni") as $error)
                                <div class="text-sm text-red-600">{{$error}}</div>
                            @endforeach
                        @endif

                    </div>

                    <!-- email -->
                    <div class="mt-4">
                        <x-input-label for="email">Email</x-input-label>
                        <x-text-input name="email" id="email" :value="$alumno->email"/>
                        @if ($errors->get("email"))
                            @foreach($errors->get("email") as $error)
                                <div class="text-sm text-red-600">{{$error}}</div>
                            @endforeach
                        @endif

                    </div>
                    <!-- edad  -->
                    <div class="mt-4">
                        <x-input-label for="edad">Edad</x-input-label>
                        <x-text-input name="edad" :value="$alumno->edad"/>
                        @if ($errors->get("edad"))
                            @foreach($errors->get("edad") as $error)
                                <div class="text-sm text-red-600">{{$error}}</div>
                            @endforeach
                        @endif

                    </div>
                    <!-- botones -->
                    <div class="flex items-center justify-end mt-4">
                        <input class="btn btn-accent" type="submit" value="Guardar cambios"/>

                        <a href="{{route("alumnos.index")}}" class="btn btn-error">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
</x-layouts.layout>
