<!-- views/alumno/form.php -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?= $titulo ?></h3>
    </div>
    <?php if ($this->session->flashdata('eok') != '') : ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-check" aria-hidden="true"></i> <?= $this->session->flashdata('eok'); ?>
        </div>
    <?php endif ?>

    <?php if ($this->session->flashdata('eerror') != '') : ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-ban" aria-hidden="true"></i> <?= $this->session->flashdata('eerror'); ?>
        </div>
    <?php endif ?>
    <!-- /.box-header -->

    <form action="<?= $accion ?>" method="post">
        <div class="form-group">
            <label for="nombre"><b class="text-danger">*</b> Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?= isset($alumno) ? $alumno->nombre : set_value('nombre') ?>" required>
        </div>
        <div class="form-group">
            <label for="apellido"><b class="text-danger">*</b> Apellidos:</label>
            <input type="text" name="apellido" id="apellido" class="form-control" value="<?= isset($alumno) ? $alumno->apellido : set_value('apellido') ?>" required>
        </div>
        <div class="form-group">
            <label for="direccion"><b class="text-danger">*</b> Dirección:</label>
            <input type="text" name="direccion" id="direccion" class="form-control" value="<?= isset($alumno) ? $alumno->direccion : set_value('direccion') ?>" required>
        </div>
        <div class="form-group">
            <label for="movil"><b class="text-danger">*</b> Teléfono:</label>
            <input type="text" name="movil" id="movil" class="form-control" value="<?= isset($alumno) ? $alumno->movil : set_value('movil') ?>" required>
        </div>
        <div class="form-group">
            <label for="email"><b class="text-danger">*</b> Correo Electrónico:</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= isset($alumno) ? $alumno->email : set_value('email') ?>" required>
        </div>
        <div class="form-group">
            <label for="inactivo">Estado:</label>
            <select name="inactivo" id="inactivo" class="form-control">
                <option value="">Seleccionar una opción...</option>
                <option value="0" <?= (isset($alumno) && $alumno->inactivo == 0) ? 'selected' : '' ?>>Activo</option>
                <option value="1" <?= (isset($alumno) && $alumno->inactivo == 1) ? 'selected' : '' ?>>Inactivo</option>
            </select>
        </div>
        <br>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <ion-icon name="save-outline"></ion-icon> Guardar
            </button>
            <button type="button" class="btn btn-default" onclick="location.href='<?= site_url('AlumnosController/') ?>'">
                <ion-icon name="exit-outline"></ion-icon> Regresar
            </button>
        </div>
    </form>
</div>
