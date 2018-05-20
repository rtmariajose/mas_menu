<div class="table-responsive">
  <table class="table" id="table_productos">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripci&oacute;n</th>
            <th>Estado</th>
            <th>Opci&oacute;n </th>
        </tr>
    </thead>
    <tbody>
      <?php  if(isset($data) && count($data)>0){
       foreach($data as $value){
         echo '<tr>
          <td>'.$value->ID.'</td>
           <td>'.$value->DESCRIPCION.'</td>
           <td>'.($value->ACTIVO == 'S' ? 'ACTIVO' : 'INACTIVO').'</td>';
            if($tipo == 3){
              if($value->ACTIVO == 'S'){
                  echo ' <td>
                
                    <button type="button" class="btn btn-danger btn-xs " onclick="javascript:eliminarProductoMM('.$value->ID.');"  data-identificador="'.$value->ID.'"  >
                    <span class="glyphicon glyphicon-minus"></span></button>
                    </td>
                  </tr>';
                  }else{
                  echo ' <td> </td>
                  </tr>';
              }
               
            }else{
              echo ' <td>
             
              <button type="button" class="btn btn-primary btn-xs " onclick="javascript:editarProductoMM('.$value->ID.');"  data-identificador="'.$value->ID.'"  >
              <span class="glyphicon glyphicon-pencil"></span></button>
              </td>
        </tr>';
            }
            
             
       }}?>
        
    </tbody>    
  </table>
</div>


