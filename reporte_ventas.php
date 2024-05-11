<?php
$page_title = 'Reporte de ventas';
  require_once('includes/load.php');
   page_require_level(3);
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>

<div class="row">
  <div class="panel panel-default" style='border-radius: 20px'>
    <div class="panel-heading" style='background-color: #7ACBEE; border-radius: 20px'>
      <strong>
        <span>Reporte por fecha</span>
      </strong>
    </div>
    <div class="panel-body">
      <div class="col-md-6">
        <form class="clearfix" method="post" action="formato_reporte_ventas.php">
          <div class="form-group">
            <label class="form-label">Rango de fechas:</label>
            <div class="input-group">
              <input style='background-color:#f1ccbe; border-radius: 20px 0px 0px 20px'type="text" class="datepicker form-control" name="start-date" placeholder="From">
              <span class="input-group-addon"><i class="glyphicon glyphicon-menu-right"></i></span>
              <input style='background-color:#f1ccbe; border-radius: 0px 20px 20px 0px'type="text" class="datepicker form-control" name="end-date" placeholder="To">
            </div>
          </div>
          <div class="form-group">
            <button style='width: 150px; border-radius: 20px'type="submit" name="submit" class="btn btn-primary">Generar Reporte</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>
