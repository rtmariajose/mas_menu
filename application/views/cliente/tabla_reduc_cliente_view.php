<div class="table-responsive">
  <table class="table" id="table_cliente">
    <thead>
        <tr>
            <th>ID</th>
            <th>Rut</th>
            <th>Nombres</th>
            <th>Opci&oacute;n </th>
        </tr>
    </thead>
    <tbody>
      <?php 
      
       if(isset($data) && count($data)>0){
       foreach($data as $value){
         echo '<tr>
          <td>'.$value->CLIENTE_ID.'</td>
           <td>'.$value->RUT.'-'.$value->DV.'</td>
           <td>'.$value->NOMBRES.' '.$value->APELLIDO_PAT.' '.$value->APELLIDO_MAT.'</td>';
            if($tipo == 3){
              if($value->ACTIVO == 'S'){
                  echo ' <td>
                
                    <button type="button" class="btn btn-danger btn-xs " onclick="javascript:eliminarCliente('.$value->CLIENTE_ID.');"  data-identificador="'.$value->CLIENTE_ID.'"  >
                    <span class="glyphicon glyphicon-minus"></span></button>
                    </td>
                  </tr>';
                  }else{
                  echo ' <td>ELIMINADO</td>
                  </tr>';
              }
               
            }else{
              echo ' <td>
             
              <button type="button" class="btn btn-primary btn-xs " onclick="javascript:editarCliente('.$value->CLIENTE_ID.');"  data-identificador="'.$value->CLIENTE_ID.'"  >
              <span class="glyphicon glyphicon-pencil"></span></button>
              </td>
        </tr>';
            }
            
             
       }}?>
        
    </tbody>    
  </table>
</div>


