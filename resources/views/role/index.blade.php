@extends('layouts.app')

@section('title', 'Roles')
@push('css-datatable')
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
@endpush

@push('css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('content')

    @include('layouts.partials.alert')

    <div class="container-fluid px-4">
        <h1 class="mt-4 text-center">Roles</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('panel') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Roles</li>
        </ol>

        <img src="{{ asset('assets/img/tienda_hernandez2.png') }}" class="d-block w-100">
        @can('crear-role')
            <div class="mb-4">
                <a href="{{ route('roles.create') }}">
                    <button type="button" class="btn btn-primary">Añadir Nuevo Rol</button>
                </a>
            </div>
        @endcan

        <div class="card">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Listado de Roles
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $item)
                            <tr>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                        @can('editar-role')
                                            <form action="{{ route('roles.edit', ['role' => $item]) }}" method="get">
                                                <button type="submit" class="btn btn-warning">Editar</button>
                                            </form>
                                        @endcan

                                        @can('eliminar-role')
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#confirmModal-{{ $item->id }}">Eliminar</button>
                                        @endcan

                                    </div>
                                </td>
                            </tr>

                            <!-- Modal de confirmación-->
                            <div class="modal fade" id="confirmModal-{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje de confirmación</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Seguro que quieres eliminar el rol?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <form action="{{ route('roles.destroy', ['role' => $item->id]) }}"
                                                method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Confirmar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#datatablesSimple').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, ],
                        },
                        text: 'EXCEL',
                        titleAttr: 'Reporte en Excel',
                        title: 'Informe de Roles - ' + obtenerFechaYHora()
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, ],
                        },
                        text: 'PDF',
                        titleAttr: 'Reporte en PDF',
                        title: 'Informe de Roles - ' + obtenerFechaYHora(),
                        customize: function(doc) {
                            // Centrar y ajustar ancho de la tabla en el PDF
                            doc.defaultStyle.alignment = 'center';
                            doc.content[1].table.widths = [
                                '*',
                            ]; // Ajusta el ancho de las columnas

                            // Alinea el texto de las filas a la izquierda
                            for (var i = 0; i < doc.content[1].table.body.length; i++) {
                                for (var j = 0; j < doc.content[1].table.body[i].length; j++) {
                                    doc.content[1].table.body[i][j].alignment = 'left';
                                }
                            }
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, ],
                        },
                        text: 'IMPRIMIR',
                        download: 'open',
                        titleAttr: 'Imprimir Reporte',
                        title: 'Informe de Roles - ' + obtenerFechaYHora(),
                        customize: function(doc) {
                            // Centrar y ajustar ancho de la tabla en el PDF
                            doc.defaultStyle.alignment = 'center';
                            doc.content[1].table.widths = [
                                '*',
                            ]; // Ajusta el ancho de las columnas

                            // Alinea el texto de las filas a la izquierda
                            for (var i = 0; i < doc.content[1].table.body.length; i++) {
                                for (var j = 0; j < doc.content[1].table.body[i].length; j++) {
                                    doc.content[1].table.body[i][j].alignment = 'left';
                                }
                            }
                        }
                    }
                ],
                language: {
                    "search": "Buscar Roles:",
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente",
                        "first": "Primero",
                        "last": "Último"
                    }
                }
            });

            function obtenerFechaYHora() {
                var fecha = new Date();
                var opciones = {
                    year: 'numeric',
                    month: 'numeric',
                    day: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    second: 'numeric'
                };
                return fecha.toLocaleDateString('es-ES', opciones).replace(/[/]/g, '-');
            }
        });
    </script>
@endpush
