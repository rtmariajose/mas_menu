<div class="table-responsive">
  <table class="table" id="table_cliente">
    <thead>
        <tr>
            <th>ID</th>
            <th>Rut</th>
            <th>Nombre</th>
            <th>Puntos</th>
           <th>Estado</th>
        </tr>
    </thead>
    <tbody>
      <?php  if(isset($data) && count($data)>0)
       foreach($data as $value){
         echo '<tr>
          <td>'.$value->CLIENTE_ID.'</td>
           <td>'.$value->RUT.'-'.$value->DV.'</td>
            <td>'.$value->NOMBRES.' '.$value->APELLIDO_PAT.' '.$value->APELLIDO_MAT.'</td>
             <td>'.$value->PUNTOS.'</td>
             <td>'.($value->ACTIVO == "S" ? "ACTIVO" : "INACTIVO").'</td>
        </tr>';
       }?>
        
    </tbody>    
  </table>
</div>
