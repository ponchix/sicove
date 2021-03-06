<title>Gastos</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<table id="example" class="table table-striped table-hover table-borderless mt-2">
  <thead class="table-success">
      <th>ID</th>
      <th>Fecha</th>
      <th>Concepto</th>
      <th>Monto</th>
      <th>Vehiculo</th>
      <th>Conductor</th>
      <th>Acciones</th>
  </thead>
  <tbody>
      @foreach($gastos as $gasto)
      <tr>
          <td>{{$gasto->id}}</td>
          <td>{{$gasto->fecha}}</td>
          <td>
            <ul class="list-group">
                <li class="list-group-item">{{$gasto->concepto}} </li>
                <li class="list-group-item-dark">Referencia: {{$gasto->referencia}} </li>
            </ul>
            
            </td>
          <td>$ {{$gasto->monto}}</td>
          <td>{{$gasto->VehiculosG->NombreVehiculo}}</td>
          <td>{{$gasto->conductoresG->NombreConductor}}</td>
          <td>
              <form action="{{route('gastos.destroy',$gasto->id)}}" method="POST" class="formulario">
                  <a class="btn btn-success" href="{{route('gastos.edit',$gasto->id)}}"><i class="fas fa-edit"></i></a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
  $('#example').DataTable({
      "lengthMenu":[[5,10,50,-1],[5,10,50,"All"]],
      "language":{
       "lengthMenu":"Mostrar _MENU_ registros",
       "info":"Mostrando pagina _PAGE_ de _PAGES_",
       "infoEmpty": "Sin resultados",
       "infoFiltered": "(filtrado desde _MAX_ registros totales)",
       "paginate": {
          "first": "Primero",
          "last": "??ltimo",
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
          title: '??Quieres eliminar este gasto?',
          text: "Podr??a causar errores",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'S??, Borrar!',
      }).then((result) => {
        if (result.isConfirmed) {
          this.submit();
      }
  })

  });
</script>