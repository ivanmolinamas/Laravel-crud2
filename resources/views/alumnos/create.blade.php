<x-layouts.layout>
    <!-- div para centrar el formulario -->
    <div class=" flex flex-row items-center justify-center  p-4 bg-gray-100 h-full ">
        <div>


            <h1 class="text-3xl">Nuevo usuario</h1>
            <div class="w-3/4">

                <form class="" method="POST" action="{{ route('alumnos.store') }}">

                    @csrf

                    <!-- nombre -->
                    <div>
                        <x-input-label for="nombre">Nombre</x-input-label>
                        <x-text-input id="nombre" type="text" name="nombre" :value="old('nombre')"
                                      required autofocus autocomplete="name" :value="old('nombre')"/>
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
                        <x-text-input name="dni" id="dni" :value="old('dni')"/>
                        @if ($errors->get("dni"))
                            @foreach($errors->get("dni") as $error)
                                <div class="text-sm text-red-600">{{$error}}</div>
                            @endforeach
                        @endif

                    </div>

                    <!-- email -->
                    <div class="mt-4">
                        <x-input-label for="email">Email</x-input-label>
                        <x-text-input name="email" id="email" :value="old('email')"/>
                        @if ($errors->get("email"))
                            @foreach($errors->get("email") as $error)
                                <div class="text-sm text-red-600">{{$error}}</div>
                            @endforeach
                        @endif

                    </div>
                    <!-- edad  -->
                    <div class="mt-4">
                        <x-input-label for="edad">Edad</x-input-label>
                        <x-text-input name="edad" :value="old('edad')"/>
                        @if ($errors->get("edad"))
                            @foreach($errors->get("edad") as $error)
                                <div class="text-sm text-red-600">{{$error}}</div>
                            @endforeach
                        @endif

                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <input class="btn btn-accent" type="submit" value="Guardar"/>
                        <a href="{{route("alumnos.index")}}" class="btn btn-error">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.layout>
