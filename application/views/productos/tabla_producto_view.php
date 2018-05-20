<div class="table-responsive">
  <table class="table" id="table_productos">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripci&oacute;n</th>
            <th>C&oacute;digo</th>
            <th>Cantidad de Productos</th>
            <th>Stock Minimo</th>
            <th>Stock Maximo</th>
            <th>Tipo </th>
            <th>Categoria </th>
            <th>Fecha Vencimiento </th>
        </tr>
    </thead>
    <tbody>
      <?php  if(isset($data) && count($data)>0)
       foreach($data as $value){
         echo '<tr>
          <td>'.$value->ID.'</td>
           <td>'.$value->DESCRIPCION.'</td>
            <td>'.$value->ABREVIACION.'</td>
             <td>'.$value->CANTIDAD.'</td>
              <td>'.$value->STOCK_MINIMO.'</td>
              <td>'.$value->STOCK_MAXIMO.'</td>
              <td>'.$value->TIPO_PRODUCTO.'</td>
              <td>'.$value->CATEGORIA_PRODUCTO.'</td>
              <td>'.$value->FECHA_VENCIMIENTO.'</td>
        </tr>';
       }?>
        
    </tbody>    
  </table>
</div>
