<!-- views/alumno/index.php -->
<title><?= $titulo ?></title>
<br>
<div class="container-fluid">
    <div id="demo" class="">
        <div class="">
            <h3 class=""><?= $titulo ?> 
                <a href="<?= site_url('AlumnosController/form') ?>">
                    <button title="Nuevo" class="btn btn-primary">
                        <i class="fa fa-plus-square-o"></i> <ion-icon name="person-add-outline"></ion-icon> Nuevo
                    </button>
                </a>
            </h3>
        </div>
        <!-- /.box-header -->
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Fecha Creación</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($resultados as $row): ?>
                <tr>
                    <td><?= $row->alumno; ?></td>
                    <td><?= $row->nombre . ' ' . $row->apellido; ?></td>
                    <td><?= $row->direccion; ?></td>
                    <td><?= $row->movil; ?></td>
                    <td><?= $row->email; ?></td>
                    <td><?= $row->fecha_creacion; ?></td>
                    <td><?= $row->user; ?></td>
                    <td><?= ($row->inactivo == 0) ? "Activo" : "Inactivo"; ?></td>
                    <td class="text-center">
                        <a href="<?= site_url('AlumnosController/form/' . $row->alumno) ?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Editar
                        </a>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete('<?= site_url('AlumnosController/delete/' . $row->alumno) ?>')">
                            <i class="fa fa-trash"></i> Eliminar
                        </button>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Fecha Creación</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<!-- /.box -->
