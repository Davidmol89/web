<?php
  $page_title = 'Lista de categorías';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  
  $all_categories = find_all('categories')
?>
<?php
 if(isset($_POST['add_cat'])){
   $req_field = array('categorie-name');
   validate_fields($req_field);
   $cat_name = remove_junk($db->escape($_POST['categorie-name']));
   if(empty($errors)){
      $sql  = "INSERT INTO categories (name)";
      $sql .= " VALUES ('{$cat_name}')";
      if($db->query($sql)){
        $session->msg("s", "Categoría agregada exitosamente.");
        redirect('marca.php',false);
      } else {
        $session->msg("d", "Lo siento, registro falló");
        redirect('marca.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('marca.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>

  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
   <div class="row">
    <div class="col-md-5">
      <div class="panel panel-default"style='border-radius: 20px'>
        <div class="panel-heading" style='background-color: #7ACBEE; border-radius: 20px; text-align: center'>
          <strong>
            <span>Agregar Marca</span>
         </strong>
        </div>
        <div class="panel-body">
          <form method="post" action="marca.php">
            <div class="form-group">
                <input style='background-color:#f1ccbe; border-radius: 20px'type="text" class="form-control" name="categorie-name" placeholder="Nombre de la categoría" required>
            </div>
            <div class="form-group clearfix"  style='text-align: center'>
            <button style='width: 150px; border-radius: 20px' type="submit" name="add_cat" class="btn btn-primary">Agregar Marca</button>

            </div>
        </form>
        </div>
      </div>
    </div>
    <div class="col-md-7">
    <div class="panel panel-default" style='border-radius: 20px'>
      <div class="panel-heading" style='background-color: #7ACBEE; border-radius: 20px; text-align: center'>
        <strong>
          <span>Lista de Marcas</span>
       </strong>
      </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width: 40px;">#</th>
                    <th>Marcas</th>
                    <th class="text-center" style="width: 150px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($all_categories as $cat):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td><?php echo remove_junk(ucfirst($cat['name'])); ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="editar_marca.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Editar"style='margin-right:10px; border-radius: 20px'>
                        Editar                        </a>
                        <a href="eliminar_marca.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar"style='margin-right:10px; border-radius: 20px'>
                        Eliminar                        </a>
                      </div>
                    </td>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
       </div>
    </div>
    </div>
   </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>