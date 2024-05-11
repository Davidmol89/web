<?php
  $page_title = 'Agregar usuarios';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  $groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_user'])){

   $req_fields = array('full-name','username','password' );
   validate_fields($req_fields);

   if(empty($errors)){
           $name   = remove_junk($db->escape($_POST['full-name']));
       $username   = remove_junk($db->escape($_POST['username']));
       $password   = remove_junk($db->escape($_POST['password']));
       $password = sha1($password);
        $query = "INSERT INTO users (";
        $query .="name,username,password,user_level,status";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$username}', '{$password}', '3','1'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s'," Cuenta de usuario ha sido creada");
          redirect('agregar_usuario.php', false);
        } else {
          //failed
          $session->msg('d',' No se pudo crear la cuenta.');
          redirect('agregar_usuario.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('agregar_usuario.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
  <?php echo display_msg($msg); ?>
  <div class="row">
    <div class="panel panel-default" style=' width: 70%;border-radius: 20px'>
      <div class="panel-heading" style='text-align: center;background-color: #7ACBEE; border-radius: 20px'>
        <strong>
          <span>Registrarse</span>
       </strong>
      </div>
      <div class="panel-body" >
          <form method="post" action="agregar_usuario.php">
            <div class="form-group">
                <label for="name">correo</label>
                <input style='background-color:#f1ccbe; border-radius: 20px' type="text" class="form-control" name="full-name" placeholder="ejemplo@gmail.com" required>
            </div>
            <div class="form-group">
                <label for="username">Usuario</label>
                <input style='background-color:#f1ccbe; border-radius: 20px' type="text" class="form-control" name="username" placeholder="Nombre de usuario">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input style='background-color:#f1ccbe; border-radius: 20px' type="password" class="form-control" name ="password"  placeholder="Contraseña">
            </div>
            <div class="form-group clearfix"  style='text-align: center'>
              <button type="submit" name="add_user" class="btn btn-primary" style='margin-right:10px; width: 150px; border-radius: 20px' >Guardar</button>
            </div>
        </form>
        <div style='text-align: center'>
          <a class="btn btn-xs btn-info" href="index.php" style='text-align: center; width: 150px; border-radius: 20px'>Inicio</a>
        </div>
      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
