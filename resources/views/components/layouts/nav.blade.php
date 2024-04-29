<nav class="h-nav bg-nav p-3 navbar">
    <a class="btn btn-ghost text-xl" href="/index">Inicio</a>
    <!-- solo visible si estas reistrado -->
    @auth
    <a class="btn btn-ghost text-xl" href="/alumnos">Alumnos</a>
    @endauth

    <a class="btn btn-ghost text-xl" href="/proyectos">Proyectos</a>
    <a class="btn btn-ghost text-xl" href="/about">About</a>
</nav>
