<header class="h-header bg-header p-3 flex justify-between ">
    <img class="h-logo max-h-full" src="{{asset('images/logo.png')}}" alt="logo de los enlaces">
    <h1 class="text-4xl text-blue-800/75 flex text-center">Proyecto de crud en laravel</h1>

    <!-- login / register o nombre y logout -->
    <div class="mt-2">

        @guest
            <a href="/login" class="btn btn-sm btn-primary">Acceso</a>
            <a href="/register" class="btn btn-sm btn-primary">Registro</a>

        @endguest

        @auth
                <h1 class="text-2xl text-gray-700">{{auth()->user()->name}}</h1>
                <form action="{{route("logout")}}" method="POST">
                @csrf
            <input class="btn btn-sm btn-error" type="submit" value="Logout">
            @endauth

    </div>
</header>
