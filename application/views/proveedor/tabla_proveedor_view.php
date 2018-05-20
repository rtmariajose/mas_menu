<div class="table-responsive">
  <table class="table" id="table_proveedor">
    <thead>
        <tr>
            <th>ID</th>
            <th>Rut</th>
            <th>Nombre</th>
            <th>Email</th>
           <th>Estado</th>
        </tr>
    </thead>
    <tbody>
      <?php  if(isset($data) && count($data)>0)
       foreach($data as $value){
         echo '<tr>
          <td>'.$value->PROVEEDOR_ID.'</td>
           <td>'.$value->RUT.'-'.$value->DV.'</td>
            <td>'.$value->NOMBRES.'</td>
             <td>'.$value->EMAIL.'</td>
             <td>'.($value->ACTIVO == "S" ? "ACTIVO" : "INACTIVO").'</td>
        </tr>';
       }?>
        
    </tbody>    
  </table>
</div>
