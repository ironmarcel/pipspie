@extends('layouts.moduloplanificacion')

@section('header')
<link rel="stylesheet" href="/jqwidgets5.5.0/jqwidgets/styles/jqx.base.css" type="text/css" />
<link rel="stylesheet" href="/plugins/bower_components/select2/dist/css/select2.min.css" type="text/css"/>
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" /> --}}
<link href="/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

<style media="screen">
.popup-basic {
    position: relative;
    background: #FFF;
    width: auto;
    max-width: 500px;
    margin: 40px auto;
}
.icon-danger {
    color: #E63F24;
}
.icon-primary {
    color: #5BC24C;
}
.icon-warning {
    color: #F5B025;
}
##.admin-form .panel-heading{
    background-color: #fafafa;
    border-color: transparent -moz-use-text-color #ddd;
    border-radius: 0;
    border-style: solid none;
    border-width: 1px 0;
    color: #999;
    height: auto;
    overflow: hidden;
    padding: 3px 15px 2px;
    position: relative;
}

</style>

@endsection

@section('title-topbar')
<div class="row">
    <div class="topbar-left ">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="/moduloplanificacion/showPlanesInstitucion">Planes de la Institución</a>
            </li>
            <li class="crumb-icon">
                <a href="/moduloplanificacion/index">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-link">
                  <a href="/moduloplanificacion/showPlanesInstitucion">Home</a>
              </li>
            <li class="crumb-trail">Administrar Planes</li>
        </ol>
    </div>
    <div class="topbar-right ">
        <div class="ml15 ib va-m" id="toggle_sidemenu_r">
            <a href="#" class="pl5"> <i class="fa fa-sign-in fs22 text-primary"></i>
                <span class="badge badge-hero badge-danger">3</span>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="text-center">
        <h4 id="tituloCabecera"></h4>
        <h5 id="titulo2Cabecera"></h5>
    </div>
</div>

@endsection

@section('content')
    <div class="tray tray-center va-t posr sp_planes">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-visible" >
                    <div class="panel-heading text-center">
                        <span class="panel-title"> Listado de Planes de la institución</span>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div id="estructura" class="col-md-12" >
                                <button id="nuevo" type="button" class="btn btn-sm btn-default m5 btn-alt  "><i class="fa fa-edit icon-primary"></i> Agregar Plan</button>
                                <button id="editar" type="button" class="btn btn-sm btn-default m5 btn-alt"><i class="fa fa-edit icon-warning"></i> Editar</button>
                                <button id="eliminar" type="button" class="btn btn-sm btn-default m5 btn-alt"><i class="glyphicons glyphicons-bin icon-danger"></i> Eliminar</button>
                                <div id="dataTable"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Admin Form Popup -->
    <div id="frm_modal"  class="popup-basic popup-lg admin-form mfp-with-anim mfp-hide ">
        <div class="panel">
            <div class="panel-heading">
                  <span class="panel-title" id="tituloModal"><i class="fa fa-pencil"></i> <span> </span></span>
            </div>
                  <!-- end .panel-heading section -->
                  <form method="post" action="/" id="form-plan" name="form-plan">
                      <div class="panel-body of-a" id="val">
                        <input class="hidden" name="id" id="id" >
                        <div class="row">
                            <div class=" pl5 br-r mvn15">
                                <h5 class="ml5 mt20 ph10 pb5 br-b fw700">Datos del plan<small class="pull-right fw600"> <span class="text-primary">-</span> </small> </h5>
                                <div class="section">
                                    <label class="field-label" for="id_tipo_plan">Tipo de Plan</label>
                                    <label class="field select">
                                        <select id="id_tipo_plan" name="id_tipo_plan" class="required" style="width:100%;">
                                            <option value="">...</option>
                                        </select>
                                        <i class="arrow double"> </i>                    
                                    </label>
                                </div>

                                <div class="section">
                                    <label class="field-label" for="gestion_inicio">Gestión inicio</label>
                                    <label for="gestion_inicio" class="field prepend-icon">
                                        <input type="text" class="gui-input" id="gestion_inicio" name="gestion_inicio" placeholder="Gestión inicio">
                                        <label for="gestion_inicio" class="field-icon"><i class="glyphicons glyphicons-riflescope"></i>
                                        </label>
                                    </label>
                                </div>
                                <div class="section">
                                    <label class="field-label" for="gestion_fin">Gestión fin</label>
                                    <label for="gestion_fin" class="field prepend-icon">
                                        <input type="text" class="gui-input" id="gestion_fin" name="gestion_fin" placeholder="Gestión fin">
                                        <label for="gestion_fin" class="field-icon"><i class="glyphicons glyphicons-riflescope"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="panel-footer">
                        <button type="submit" id="guardar"  class="button btn-primary">Guardar</button>
                        <a href="#"  id="cancelar"  class="button btn-danger ml25">Cancelar</a>
                    </div>
                </form>

        </div>
      <!-- end: .panel -->
    </div>
      <!-- end: .admin-form -->


@endsection

@push('script-head')
<script src="/plugins/bower_components/select2/dist/js/select2.min.js"></script>
<script type="text/javascript" src="/jqwidgets5.5.0/jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="/jqwidgets5.5.0/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="/jqwidgets5.5.0/jqwidgets/jqxscrollbar.js"></script>
<script type="text/javascript" src="/jqwidgets5.5.0/jqwidgets/jqxdata.js"></script>
<script type="text/javascript" src="/jqwidgets5.5.0/jqwidgets/jqxdatatable.js"></script>
<script type="text/javascript" src="/jqwidgets5.5.0/jqwidgets/jqxdraw.js"></script>
<script type="text/javascript" src="/jqwidgets5.5.0/jqwidgets/jqxtreegrid.js "></script>

<script src="/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
<script src="/js/jqwidgets-localization.js"></script>
<script type="text/javascript">
$(function(){
    var planes = {
        dataTable : $("#dataTable"),
        source : {},

        fillPlanes : function() {
            $.get(globalSP.urlApi + 'listEntidadPlan', function(resp)
            {
                planes.source =
                {
                    dataType: "json",
                    localdata: resp.data,
                    dataFields: [
                        { name: 'id', type: 'number' },
                        { name: 'gestion_inicio', type: 'number' },
                        { name: 'gestion_fin', type: 'number' },
                        { name: 'nombre_entidad', type: 'string' },
                        { name: 'sigla_entidad', type: 'string' },
                        { name: 'cod_tipo_plan', type: 'string' },
                        { name: 'id_tipo_plan', type: 'number' },
                        { name: 'etapas_completadas', type: 'string' }
                    ],
                    id: 'id',
                    // url: globalSP.urlApi + 'listEntidadPlan' 
                };
                //Configuracion de la tabla
                var dataAdapter = new $.jqx.dataAdapter(planes.source);

                var cargarRenderer = function (row, datafield, value) {
                    var html = '<button class="sel_cargar_plan btn btn-xs btn-primary btn-rounded  "><i class="glyphicons glyphicons-eye_open icon-success"></i> cargar</button>';
                    return html;
                };
                var editDelRenderer = function (row, columnfield, value, defaulthtml, columnproperties) {
                    html = '<a href="#" id="edit-' + value + '" class="m-l-10 m-r-10 m-t-10 sel_edit" title="Editar Plan" ><i class="fa fa-edit icon-warning fa-lg"></i></a> <a href="#" id="del-' + value + '" class="m-l-10 m-r-10 m-t-10 sel_delete" title="Eliminar Plan" ><i class="glyphicons glyphicons-bin icon-danger "></i></a> ' 
                    return html;
                };

                planes.dataTable.jqxDataTable({
                    source: dataAdapter,
                    altRows: false,
                    sortable: true,
                    width: "100%",
                    filterable: true,
                    filterMode: 'simple',
                    selectionMode: 'singleRow',
                    localization: getLocalization('es'),
                    columns: [
                        { text: '*', cellsRenderer: cargarRenderer, width: 75 },
                        { text: '-', width: 90, cellsRenderer: function (row, column, value, rowData) {
                              var image = "<div style='margin: 5px; margin-bottom: 3px;'>";
                              var imgurl = '/img/ico_' + rowData.cod_tipo_plan + '.png';
                              var img = '<img width="60" height="80" style="display: block;" src="' + imgurl + '"/>';
                              image += img;
                              image += "</div>";
                              return image;
                              }
                        },
                        { text: 'Descripcion', dataField: 'nombre', align: 'center',
                            cellsRenderer: function (row, column, value, rowData) {
                                var container = '<div style="width: 100%; height: 100%;">'
                                var leftcolumn = '<div style="float: left; width: 100%;">';

                                var nombre = "<div style='margin: 10px;'><b>Nombre Entidad:</b> " + rowData.nombre_entidad + "</div>";
                                var sigla = "<div style='margin: 10px;'><b>Sigla:</b> " + rowData.sigla_entidad + "</div>";
                                var periodo = "<div style='margin: 10px;'><b>Periodo Plan:</b> " + rowData.gestion_inicio + " - " + rowData.gestion_fin + "</div>";
                                var tipoPlan = "<div style='margin: 10px;'><b>Documento Planificación:</b> " + rowData.cod_tipo_plan + "</div>";

                                leftcolumn += nombre;
                                leftcolumn += sigla;
                                leftcolumn += periodo;
                                leftcolumn += tipoPlan;
                                leftcolumn += "</div>";

                                container += leftcolumn;
                                container += "</div>";
                                return container;
                            }
                        },
                        { text: 'Sigla', dataField: 'sigla_entidad', hidden: true },
                        { text: 'Inicio', dataField: 'gestion_inicio', hidden: true },
                        { text: 'Fin', dataField: 'gestion_fin', hidden: true },
                        { text: 'Plan', dataField: 'cod_tipo_plan', hidden: true },
                        { text: ' ', dataField: 'id', cellsrenderer: editDelRenderer},
                    ]
                });
            });
        },
        refresh: function(){
            $.get(globalSP.urlApi + 'listEntidadPlan', function(resp) {
                planes.source.localdata = resp.data;
                planes.dataTable.jqxDataTable("updateBoundData");
            })   
        },
        nuevo: function(){
            $("#tituloModal span").html("Crear Plan");
            $('#form-plan select, #form-plan input:text').val('');
            ctxForm.showModal();
        },
        editar: function(){
            var rowSelected = planes.dataTable.jqxDataTable('getSelection');
            if(rowSelected.length > 0)
            {
                var rowSel = rowSelected[0]; 
                ctxForm.setDataForm(rowSel);
                $("#tituloModal span").html("Modificar Plan");
                ctxForm.showModal();
            }
            else{
                swal("Seleccione el registro para modificar.");
            }
        },
        eliminar: function(){
            var rowSelected = planes.dataTable.jqxDataTable('getSelection');
            if(rowSelected.length > 0)
            {
                var rowSel = rowSelected[0];
                ctxForm.deletePlan(rowSel.id);             
            }
            else{
                swal("Seleccione el registro que desea eliminar.");
            }
        },
        cargar: function(){
            var rowsel = planes.dataTable.jqxDataTable('getSelection')[0];
            globalSP.setGlobalPlanActivo(rowsel); 
            globalSP.configuraMenu(rowsel);  

            $('#menuSP .sp_menu').each(function(index, elem){
                var ref = $(elem).attr('href');
                ref = ref.split('=')[0] + '=' + globalSP.planActivo.id;
                $(elem).attr('href', ref);
                // console.log(ref);
            });    
            globalSP.setTitulo2();
        },
    }

    var ctxForm = {
        showModal : function(){
            $(".state-error").removeClass("state-error")
            $("#form-plan em").remove();
                    // Inline Admin-Form example
            $.magnificPopup.open({
                removalDelay: 500, //delay removal by X to allow out-animation,
                focus: '#focus-blur-loop-select',
                items: {
                    src: "#frm_modal"
                },
                // overflowY: 'hidden', //
                callbacks: {
                    beforeOpen: function(e) {
                        var Animation = "mfp-zoomIn";
                        this.st.mainClass = Animation;
                    }
                },
                midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
            });
        }, 
        cargarCombos : function(){
            $.get(globalSP.urlApi + "getparametros/tipo_plan/valor/SECTORIAL", function(res){
                opts = res.data;
                opts.forEach(function(op){
                    $("#id_tipo_plan").append('<option value="' + op.id + '">' + op.nombre + '</option>');
                })
            })
        },
        getDataForm: function(){
            var objPlan = {
                            id: $("#id").val(),
                            id_tipo_plan:$("#id_tipo_plan").val(),
                            gestion_inicio: $("#gestion_inicio").val(),
                            gestion_fin: $("#gestion_fin").val(),
                            _token : $('input[name=_token]').val()
                        }
            return objPlan;
        },   
        setDataForm: function(objPlan){
            $("#id").val(objPlan.id);
            $("#id_tipo_plan").val(objPlan.id_tipo_plan);
            $("#gestion_inicio").val(objPlan.gestion_inicio);
            $("#gestion_fin").val(objPlan.gestion_fin);
        },

        validateRules: function(){
            var reglasVal = {
                    errorClass: "state-error",
                    validClass: "state-success",
                    errorElement: "em",

                    rules: {
                        tipoPlan: { required: true },
                        gestion_inicio:  { required: true },
                        gestion_fin: { required: true }
                    },

                    messages:{
                        tipoPlan: { required: 'Seleccione el tipo de plan' },
                        gestion_inicio:  { required: 'Ingresar la gestion de inicio' },
                        gestion_fin:  { required: 'Ingresar la gestion de inicio' }
                    },

                    highlight: function(element, errorClass, validClass) {
                            $(element).closest('.field').addClass(errorClass).removeClass(validClass);
                    },
                    unhighlight: function(element, errorClass, validClass) {
                            $(element).closest('.field').removeClass(errorClass).addClass(validClass);
                    },
                    errorPlacement: function(error, element) {
                        if (element.is(":radio") || element.is(":checkbox")) {
                                element.closest('.option-group').after(error);
                        } else {
                                error.insertAfter(element.parent());
                        }
                    },
                    submitHandler: function(form) {
                        ctxForm.saveData();
                    }
            }
            return reglasVal; 
        }, 
        saveData: function(){    
            var objPlan = this.getDataForm();
            $.post(globalSP.urlApi + 'saveEntidadPlan', objPlan, function(res){
                new PNotify({
                            title: !res.error ? (res.accion=='insert' ? 'Plan Creado' : 'Modificado') : 'Error!!',
                            text: res.msg,
                            shadow: true,
                            opacity: 1,
                            addclass: noteStack,
                            type: !res.error ? "success" : "danger",
                            stack: Stacks[noteStack],
                            width: findWidth(),
                            delay: 1500
                        });
                planes.refresh();
                $.magnificPopup.close();
            });  
        },
        deletePlan: function(id){
            swal({
                  title: "Está seguro de eliminar el Plan?",
                  text: "No podrá recuperar este registro!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Si, eliminar!",
                  closeOnConfirm: true
                }, function(){
                    $.get(globalSP.urlApi + 'deleteEntidadPlan', {'id': id}, function(res){
                        new PNotify({
                                  title: !res.error ? 'Eliminado' : 'Error!!' ,
                                  text: res.msg,
                                  shadow: true,
                                  opacity: 1,
                                  addclass: noteStack,
                                  type: !res.error ? "success" : 'danger',
                                  stack: Stacks[noteStack],
                                  width: findWidth(),
                                  delay: 1400
                              });
                        planes.refresh();
                    });
                });
        },

    }


    globalSP.activarMenu(globalSP.menu.AdminPlanes);
    globalSP.cargarGlobales();
    planes.fillPlanes();


    $('#nuevo').click(function(){
        planes.nuevo();
    });

    $(".sp_planes").on('click', '.sel_edit, #editar', function(){
        planes.editar();
    });

    $(".sp_planes").on('click', '.sel_delete, #eliminar', function(){
        planes.eliminar();
    });
    $(".sp_planes").on('click', '.sel_cargar_plan', function(){
        planes.cargar();
    });

    $("#cancelar").click(function(){
        $.magnificPopup.close();
    })

    $("#form-plan").validate(ctxForm.validateRules());

    ctxForm.cargarCombos();

});
</script>
@endpush
