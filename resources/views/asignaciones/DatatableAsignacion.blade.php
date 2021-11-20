<title>Asignaciones</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<table id="man" class="table mt-2 table-borderless table-hover">
  <thead class="table-success">
      <th>ID</th>
      <th>Fecha</th>
      <th>Vehiculo</th>
      <th>Conductor</th>
      <th>Acciones</th>
  </thead>
  <tbody>
      @foreach($asignaciones as $asignacion)
      <tr>
          <td>{{$asignacion->id}}</td>
         <td>{{$asignacion->fecha_a}}</td>
         <td>{{$asignacion->vehiculo}}</td>
         <td>{{$asignacion->conductor}}</td>

          <td>
              <form action="{{route('servicios.destroy',$asignacion->id)}}" method="POST" class="formulario">
                @can('ver-vehiculo')
                <a class="btn btn-light" href="{{route('servicio.detallado',$asignacion->id)}}"><i class="fas fa-eye"></i></a>
                @endcan 
                  @can('editar-vehiculo')
                  {{-- <a class="btn btn-success" href="{{route('servicios.edit',$mantenimiento->id)}}"><i class="fas fa-edit"></i></a> --}}
                  @endcan
                  @csrf
                  @method('DELETE')
                  @can('borrar-vehiculo')
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  @endcan
              </form>         
          </td>
      </tr>
      @endforeach
  </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
 $(document).ready(function() {
  $('#man').DataTable({
      "lengthMenu":[[5,10,50,-1],[5,10,50,"All"]],
      "language":{
       "lengthMenu":"Mostrar _MENU_ registros",
       "info":"Mostrando pagina _PAGE_ de _PAGES_",
       "infoEmpty": "Sin resultados",
       "infoFiltered": "(filtrado desde _MAX_ registros totales)",
       "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
      },
      "search": "Buscar:",
      "zeroRecords": "No se encontraron coincidencias"

  }
});
} ); 
</script>

<!--SweetAlert---->

<script >
  $('.formulario').submit(function(e){
      e.preventDefault();
      Swal.fire({
        title: '¿Quieres eliminar este vehículo?',
        text: "No podrás deshacer esta acción",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Borrar!',
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
    }
})

});
</script>