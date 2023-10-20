<?php
// Conexion base de datos
include_once('app/database/conection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Calculadora de Envios Zonas</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="robots" content="noindex,nofollow">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <?php include_once('app/parts/header.php'); ?>

    <?php include_once('app/parts/sidebar.php'); ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Calculo de Zonas</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Calculo de Zonas</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-6 d-print-none">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Calculo de Zonas</h5>

                            <!-- Vertical Form -->
                            <form class="row g-3" id="formCalculo">
                                <div class="col-12">
                                    <!-- Tipo de Vehiculo -->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="carro" value="carro" required name="tipo_vehiculo">
                                        <label class="form-check-label" for="carro">Carro</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="moto" value="moto" required name="tipo_vehiculo">
                                        <label class="form-check-label" for="moto">Moto</label>
                                    </div>
                                </div>
                                <div class="col-12 zonesSelect">
                                    <!-- Aquí se agregarán los select al hacer clic en el botón -->
                                </div>
                                <!-- Add New button -->
                                <div class="col-12">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-success addZone"><i class="bi bi-plus-square"></i> Nueva Zona</button>
                                    </div>
                                </div>
                            </form><!-- Vertical Form -->

                        </div>
                    </div>


                </div>
                <div class="col-lg-6 totalMontoZona">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Zona</th>
                                            <th scope="col">Monto</th>
                                        </tr>
                                    </thead>
                                    <tbody class="resumenMontoZona">

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">Total</th>
                                            <th scope="col" class="totalMonto"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <!-- boton imprimir -->
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary d-print-none" onclick="window.print();"><i class="bi bi-printer"></i> Imprimir</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <?php include_once('app/parts/footer.php'); ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Cuando haces clic en el botón de "Add New"
            $('.addZone').click(function(e) {
                // Evita que el botón recargue la página
                e.preventDefault();

                // Crea un contenedor principal para el nuevo select y el botón de eliminar
                var mainContainer = $('<div class="row zoneContainer mb-3"></div>');

                // Crea un contenedor para el select
                var selectContainer = $('<div class="col-11"></div>');
                var newSelect = $('<select class="form-select js-example-basic-single" aria-label="Default select example" required name="zona[]"></select>');
                newSelect.append('<option selected>Escoge una zona</option>');

                var checkboxContainer = $('<div class="col-12"></div>');
                var newCheckbox = $('<label><input type="checkbox" class="form-check-input applyIncrease" title="Aplicar aumento del 66%" /> Lluvia</label>');
                checkboxContainer.append(newCheckbox);

                var transportCheckboxContainer = $('<div class="col-12"></div>');
                var transportCheckbox = $('<label><input type="checkbox" class="form-check-input transportCheck" title="Aplicar texto Transporte" /> Transporte</label>');
                transportCheckboxContainer.append(transportCheckbox);

                <?php
                $query = "SELECT * FROM tbl_zones ORDER BY zona ASC";
                $result_tasks = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result_tasks)) {
                    echo 'newSelect.append(\'<option value="' . $row['id'] . '">' . $row['zona'] . '</option>\');';
                }
                ?>
                selectContainer.append(newSelect);
                selectContainer.append(checkboxContainer);
                selectContainer.append(transportCheckboxContainer);

                // Crea un contenedor para el botón de eliminar
                var buttonContainer = $('<div class="col-1"></div>');
                var deleteButton = $('<button class="btn btn-danger deleteZone"><i class="bi bi-trash"></i></button>');
                buttonContainer.append(deleteButton);

                // Añade los contenedores al contenedor principal
                mainContainer.append(selectContainer);
                mainContainer.append(buttonContainer);

                // Agrega el contenedor principal a .zonesSelect
                $('.zonesSelect').append(mainContainer);

                // Inicializa el select2 en el nuevo select
                newSelect.select2();
            });

            // Cuando haces clic en el botón de "Eliminar Zona"
            $(document).on('click', '.deleteZone', function(e) {
                // Evita que el botón realice su acción predeterminada
                e.preventDefault();

                // Elimina el contenedor principal del select y del botón
                $(this).closest('.zoneContainer').remove();

                // Actualiza la tabla de resumen
                updateTotalMontoZona();
            });

            // Escucha el evento change en los select de zonas
            $(document).on('change', 'select[name="zona[]"]', function() {
                updateTotalMontoZona();
            });
        });

        function formatCurrency(amount) {
            // Formatea el número con 2 decimales y añade el signo '$'
            return '$' + parseFloat(amount).toFixed(2);
        }

        function updateTotalMontoZona() {
            var totalMonto = 0;

            // Vacía el tbody de la tabla
            $('.resumenMontoZona').empty();

            // Recorre todos los select para obtener las zonas seleccionadas
            $('select[name="zona[]"]').each(function() {
                var selectedValue = $(this).val();
                if (selectedValue) {
                    var zoneText = $('select[name="zona[]"] option[value="' + selectedValue + '"]').first().text();
                    var monto = getMontoForZone(selectedValue);

                    // Si el checkbox asociado está marcado, aumenta el monto en un 66%
                    var isChecked = $(this).closest('.zoneContainer').find('.applyIncrease').is(':checked');
                    if (isChecked) {
                        monto *= 1.66;
                    }

                    var montoText = formatCurrency(monto);

                    // Si el checkbox "Transporte" asociado está marcado, añade el texto " Transporte" junto al monto
                    var isTransportChecked = $(this).closest('.zoneContainer').find('.transportCheck').is(':checked');
                    if (isTransportChecked) {
                        montoText += " Transporte";
                    }

                    totalMonto += parseFloat(monto); // Asegúrate de sumar como número flotante

                    // Añade una fila a la tabla para cada zona seleccionada con el monto formateado
                    $('.resumenMontoZona').append('<tr><td>' + zoneText + '</td><td>' + montoText + '</td></tr>');
                }
            });

            // Actualiza el total en el tfoot con el monto formateado
            $('.totalMonto').text(formatCurrency(totalMonto));
        }

        $(document).on('change', '.applyIncrease', function() {
            updateTotalMontoZona();
        });

        $(document).on('change', '.transportCheck', function() {
            updateTotalMontoZona();
        });

        // Escucha el evento change en los botones de opción de tipo de vehículo
        $(document).on('change', 'input[name="tipo_vehiculo"]', function() {
            updateTotalMontoZona();
        });


        function getMontoForZone(zoneId) {
            var tipoVehiculo = $('input[name="tipo_vehiculo"]:checked').val();

            console.log("zoneId:", zoneId);
            console.log("tipoVehiculo:", tipoVehiculo);
            console.log("monto:", zoneData[zoneId][tipoVehiculo]);

            return zoneData[zoneId][tipoVehiculo];
        }

        // Aquí puedes obtener el monto de la zona basado en el ID.
        // Como un ejemplo, usaré un objeto ficticio para obtener el monto. Deberías ajustar esto según tu base de datos.
        var zoneData = {
            <?php
            $query = "SELECT * FROM tbl_zones ORDER BY zona ASC";
            $result_tasks = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result_tasks)) {
                echo json_encode($row['id']) . ': { "zona": ' . json_encode($row['zona']) . ', "carro": ' . json_encode($row['carro']) . ', "moto": ' . json_encode($row['moto']) . ' },';
            }
            ?>
        };
    </script>
</body>

</html>