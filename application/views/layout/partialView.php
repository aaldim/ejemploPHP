<title>UMG | Test</title>
<!-- CSS only -->
<?php $this->load->view('layout/header'); ?>

<!-- Image and text -->
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="<?= base_url('public/img/bootstrap-solid.svg'); ?>" width="30" height="30" class="d-inline-block align-top" alt="">
        Bootstrap
    </a>
</nav>

<h2>Mi pagina con Bootstrap 4 y Codeigniter 3</h2>

<body>
    <div style="background-color: #ecf0f5;" class="container-fluid">
        <?php $this->load->view($vista) ?>
    </div>

    <!-- Incluir SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Incluir Ionicons (opcional) -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        // Función para confirmar eliminación usando SweetAlert2
        function confirmDelete(url) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            })
        }

        // Opcional: Mostrar mensajes de éxito o error automáticamente con SweetAlert2
        <?php if ($this->session->flashdata('eok')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: '<?= $this->session->flashdata('eok') ?>',
                timer: 3000,
                showConfirmButton: false
            });
        <?php endif; ?>

        <?php if ($this->session->flashdata('eerror')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                html: '<?= $this->session->flashdata('eerror') ?>',
                timer: 5000,
                showConfirmButton: false
            });
        <?php endif; ?>
    </script>

</body>
<!-- JavaScript Bundle with Popper -->
<?php $this->load->view('layout/footer'); ?>
