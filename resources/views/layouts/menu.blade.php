<li class="side-menus {{ Request::is('*') ? 'active' : '' }} ">
    <a class="nav-link" href="/home">
        <i class=" fas fa-home"></i><span>Home</span>
    </a>
    <a class="nav-link" href="/vehiculos">
        <i class=" fas fa-car-side"></i><span>Vehiculos</span>
    </a>
@can('borrar-vehiculo', Model::class)
<a class="nav-link" href="/servicios">
    <i class="fas fa-tools"></i> <span>Mantenimiento</span>
</a>  
@endcan

@can('borrar-vehiculo', Model::class)
<a class="nav-link" href="/proveedores">
    <i class="fas fa-address-book"></i><span>Proveedores</span>
</a>  
@endcan

@can('ver-role' )
<a class="nav-link"href="/conductores">
    <i class="fas fa-user"></i><span>Conductores</span>
</a>
@endcan


 <a class="nav-link"href="/asignaciones">
    <i class="fas fa-link"></i><span>Asignaciones</span>
    </a>
    <a class="nav-link"href="/mecanico">
        <i class="fas fa-hard-hat"></i><span>Mecánicos</span>
    </a>
    @can('ver-role')
    <a class="nav-link"href="/usuarios">
        <i class="fas fa-users"></i><span>Usuarios</span>
    </a>
    <a class="nav-link"href="/roles">
        <i class="fas fa-user-tag"></i><span>Roles y Permisos</span>
    </a> 
    @endcan

</li>
