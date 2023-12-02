@extends('layouts.app')

@section('title','Marcas')

@push('css-datatable')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush

@push('css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
@endpush

@section('content')

@include('layouts.partials.alert')

<div class="container-fluid px-4">
    <h1 class="mt-4 text-center">Marcas</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('panel') }}">Inicio</a></li>
        <li class="breadcrumb-item active">Marcas</li>
    </ol>

    <img src="{{ asset('assets/img/tienda_hernandez2.png') }}" class="d-block w-100">
    @can('crear-marca')
    <div class="mb-4">
        <a href="{{route('marcas.create')}}">
            <button type="button" class="btn btn-primary">Añadir Nueva Marca</button>
        </a>
    </div>
    @endcan

    <div class="card">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Listado de Marcas
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marcas as $item)
                    <tr>
                        <td>
                            {{$item->caracteristica->nombre}}
                        </td>
                        <td>
                            {{$item->caracteristica->descripcion}}
                        </td>
                        <td>
                            @if ($item->caracteristica->estado == 1)
                            <span class="badge rounded-pill text-bg-success">Activa</span>
                            @else
                            <span class="badge rounded-pill text-bg-danger">Inactiva</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-around">

                                <div>
                                    <button title="Opciones" class="btn btn-datatable btn-icon btn-transparent-dark me-2" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg class="svg-inline--fa fa-ellipsis-vertical" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis-vertical" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512" data-fa-i2svg="">
                                            <path fill="currentColor" d="M56 472a56 56 0 1 1 0-112 56 56 0 1 1 0 112zm0-160a56 56 0 1 1 0-112 56 56 0 1 1 0 112zM0 96a56 56 0 1 1 112 0A56 56 0 1 1 0 96z"></path>
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu text-bg-light" style="font-size: small;">
                                        <!-----Editar marca--->
                                        @can('editar-marca')
                                        <li><a class="dropdown-item" href="{{route('marcas.edit',['marca'=>$item])}}">Editar</a></li>
                                        @endcan
                                    </ul>
                                </div>
                                <div>
                                    <!----Separador----->
                                    <div class="vr"></div>
                                </div>
                                <div>
                                    <!------Eliminar marca---->
                                    @can('eliminar-marca')
                                    @if ($item->caracteristica->estado == 1)
                                    <button title="Activar" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$item->id}}" class="btn btn-datatable btn-icon btn-transparent-dark">
                                        <svg class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="far" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                            <path fill="currentColor" d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"></path>
                                        </svg>
                                    </button>
                                    @else
                                    <button title="Restaurar" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$item->id}}" class="btn btn-datatable btn-icon btn-transparent-dark">
                                        <i class="fa-solid fa-rotate"></i>
                                    </button>
                                    @endif
                                    @endcan
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="confirmModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje de confirmación</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{ $item->caracteristica->estado == 1 ? '¿Seguro que quieres desactivar la marca?' : '¿Seguro que quieres activar la marca?' }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <form action="{{ route('marcas.destroy',['marca'=>$item->id]) }}" method="post">
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
                            columns: [0, 1, 2]
                        },
                        text: 'EXCEL',
                        title: 'Informe de Marcas - ' + obtenerFechaYHora()
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2],
                        },
                        text: 'PDF',
                        //download: 'open',
                        title: 'Informe de Marcas - ' + obtenerFechaYHora(),
                        customize: function(doc) {
                            // Centrar y ajustar ancho de la tabla en el PDF
                            doc.defaultStyle.alignment = 'center';
                            doc.content[1].table.widths = ['*',
                                '*', '*'
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
                            columns: [0, 1, 2],
                        },
                        text: 'IMPRIMIR',
                        download: 'open',
                        title: 'Informe de Marcas - ' + obtenerFechaYHora(),
                        customize: function(doc) {
                            // Centrar y ajustar ancho de la tabla en el PDF
                            doc.defaultStyle.alignment = 'center';
                            doc.content[1].table.widths = ['*',
                                '*', '*'
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
                    "search": "Buscar Marcas:",
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
