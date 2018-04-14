@extends('layouts.sistemaremi')

@section('header')
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<style>
.box {
  position: relative;
  display: inline-block;
  width: 80%;
  height: 90%;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
  border-radius: 5px;
  -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
  transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.box::after {
  content: "";
  border-radius: 5px;
  position: absolute;
  z-index: -1;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  opacity: 0;
  -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
  transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.box:hover {
  -webkit-transform: scale(1.25, 1.25);
  transform: scale(1.25, 1.25);
  cursor: pointer;
}

.box:hover::after {
    opacity: 1;
}


#chartdivMetas {
	width		: 100%;
	height	: 400px;
	font-size	: 11px;
}
#chartdivTipo {
	width		: 100%;
	height	: 400px;
	font-size	: 11px;
}
#chartdivActui {
	width		: 100%;
	height	: 300px;
	font-size	: 11px;
}
.amcharts-export-menu-top-right {
  top: 10px;
  right: 0;
}
.amcharts-chart-div a {display:none !important;}
</style>
@endsection

@section('content')

  <div class="row bg-title">
      <!-- .page title -->
      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Bienvenido...!!!</h4>
      </div>
      <!-- /.page title -->
      <!-- .breadcrumb -->
      <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
              <li><a href="{{ url('/sistemaremi/index') }}">Inicio</a></li>
              <li class="active">Pagina Principal</li>
          </ol>
      </div>
      <!-- /.breadcrumb -->
  </div>
  <!-- .row -->
  <div class="row">
      <div class="col-md-12">
          <div class="white-box">
            <h4 class="font-bold m-t-0">¿Qué es REMI? </h4>
            <hr>
            <div class="media m-b-30 p-t-20">
                  <div class="media-body"> <span class="media-meta pull-right">-</span>
                    <h4 class="text-danger m-0">Registro, Evaluación y Monitoreo de Indicadores</h4>
                    <p class="text-muted">
                      El Registro, Evaluación y Monitoreo de Indicadores (REMI), es una herramienta que nos permite realizar el seguimiento y monitoreo
                      para el logro de los resultados y metas del PDES relacionados a los ODS, coherente con las políticas de cada sector involucrado.
                    </p>
                  </div>
            </div>

          </div>
      </div>
  </div>


  <div class="row">
      <div class="col-md-12">
          <div class="white-box">
            <h4 class="font-bold m-t-0"></h4>
            <hr>
            <div class="row" >
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 m-b-10 text-center">
                    <h4 class="font-bold m-t-0">Cumplimientos de metas</h4>
                    <div id="chartdivMetas"></div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 m-b-10 text-center">
                    <h4 class="font-bold m-t-0">Indicadores por tipo</h4>
                    <div id="chartdivTipo"></div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 m-b-10 text-center">
                  <h4 class="font-bold m-t-0">Últimos indicadores actualizados</h4>
                  <div id="chartdivActui"></div>
                  <h5 class="font-bold m-t-0">Indicadores actualizados en los ùltimos 30 días</h5>
                </div>
            </div>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-md-12">
          <div class="white-box">
            <h4 class="font-bold m-t-0">Indicadores por Pilar</h4>
            <hr>
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/PILAR_1.jpg" height="150" alt="-"  class="box" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/PILAR_2.jpg" height="150" alt="-"  class="box" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/PILAR_3.jpg" height="150" alt="-" class="box"  />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/PILAR_4.jpg" height="150" alt="-"  class="box" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/PILAR_5.jpg" height="150" alt="-"  class="box" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/PILAR_6.jpg" height="150" alt="-"  class="box" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/PILAR_7.jpg" height="150" alt="-"  class="box" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/PILAR_8.jpg" height="150" alt="-" class="box"  />
                </div>

                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/PILAR_9.jpg" height="150" alt="-"  class="box" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/PILAR_10.jpg" height="150" alt="-"  class="box" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/PILAR_11.jpg" height="150" alt="-"  class="box" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/PILAR_12.jpg" height="150" alt="-"  class="box" />
                </div>
            </div>
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-12">
          <div class="white-box">
            <h4 class="font-bold m-t-0">Indicadores por ODS</h4>
            <hr>
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/ODS_1.png" height="150" alt="-"  class="box"/>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/ODS_2.png" height="150" alt="-"  class="box"/>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/ODS_3.png" height="150" alt="-"  class="box"/>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/ODS_4.png" height="150" alt="-"  class="box"/>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/ODS_5.png" height="150" alt="-"  class="box"/>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/ODS_6.png" height="150" alt="-" class="box" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/ODS_7.png" height="150" alt="-"  class="box"/>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/ODS_8.png" height="150" alt="-"  class="box"/>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/ODS_9.png" height="150" alt="-"  class="box"/>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/ODS_10.png" height="150" alt="-"  class="box"/>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/ODS_11.png" height="150" alt="-"  class="box"/>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/ODS_12.png" height="150" alt="-"  class="box"/>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/ODS_13.png" height="150" alt="-" class="box"/>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/ODS_14.png" height="150" alt="-"  class="box"/>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/ODS_15.png" height="150" alt="-"  class="box"/>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/ODS_16.png" height="150" alt="-"  class="box"/>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 m-b-10">
                  <img src="/img/ODS_17.png" height="150" alt="-"  class="box"/>
                </div>
            </div>
          </div>
      </div>
  </div>


@endsection

@push('script-head')
  <script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
  <script type="text/javascript" src="https://www.amcharts.com/lib/3/pie.js"></script>
  <script type="text/javascript" src="http://cdn.amcharts.com/lib/3/serial.js"></script>
  <script type="text/javascript" src="https://www.amcharts.com/lib/3/gauge.js"></script>
  <script type="text/javascript" src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
  <script type="text/javascript" src="https://www.amcharts.com/lib/3/themes/light.js"></script>
  <!-- EASY PIE CHART JS -->
  <script src="{{ asset('plugins/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>
  <script src="{{ asset('plugins/bower_components/jquery.easy-pie-chart/easy-pie-chart.init.js') }}"></script>
  <!-- Custom Theme JavaScript -->
  <script type="text/javascript">
      var chartActui;

    $(document).ready(function(){

      var chart = AmCharts.makeChart( "chartdivMetas", {
        "type": "pie",
        "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
        "radius": "26%",
        "innerRadius": "60%",
        "titleField": "title",
        "valueField": "value",
        "labelRadius": 5,
        "allLabels": [],
        "balloon": {},
        "legend": {
          "enabled": true,
          "align": "center",
          "markerType": "circle"
        },
        "titles": [],
        "colors": [
            "#7E7979",
            "#EF5A28",
            "#F9AE40",
            "#009245"
          ],
          "dataProvider": [
          {
            "title": "Menos 60%",
            "value": 80
          },{
            "title": "del 60%\nal 79% ",
            "value": 15
          },{
            "title": "del 80%\nal 99%",
            "value": 5
          },{
            "title": "100%\no mas",
            "value": 2
          }]
      });


      var chartTipo = AmCharts.makeChart("chartdivTipo", {
            "theme": "light",
            "type": "serial",
            "dataProvider": [{
                "tipo": "Impacto",
                "valor": 80
            }, {
                "tipo": "Producto",
                "valor": 130
            }, {
                "tipo": "Proceso",
                "valor": 25
            }, {
                "tipo": "Insumo",
                "valor": 80
            }],
            "valueAxes": [{
                "title": ""
            }],
            "graphs": [{
                "balloonText": "[[category]]:[[value]]",
                "fillAlphas": 1,
                "lineAlpha": 0.2,
                "title": "",
                "type": "column",
                "valueField": "valor"
            }],
            "rotate": true,
            "categoryField": "tipo",
            "categoryAxis": {
                "gridPosition": "start",
                "fillAlpha": 0.05,
                "position": "left"
            },
            "export": {
            	"enabled": false
             }
        });


        chartActui = AmCharts.makeChart("chartdivActui", {
          "theme": "light",
          "type": "gauge",
          "axes": [{
            "topText": 0,
            "topTextFontSize": 50,
            "topTextYOffset": 70,
            "axisColor": "#31d6ea",
            "axisThickness": 1,
            "endValue": 100,
            "gridInside": true,
            "inside": true,
            "radius": "80%",
            "valueInterval": -1,
            "tickColor": false,
            "startAngle": -90,
            "endAngle": 90,
            "unit": "",
            "bandOutlineAlpha": 0,
            "bands": [{
              "color": "#0080ff",
              "endValue": 100,
              "innerRadius": "100%",
              "radius": "130%",
              "gradientRatio": [0.5, 0, -0.5],
              "startValue": 0
            }, {
              "color": "#3cd3a3",
              "endValue": 0,
              "innerRadius": "100%",
              "radius": "130%",
              "gradientRatio": [0.5, 0, -0.5],
              "startValue": 0
            }]
          }],
          "arrows": [{
            "alpha": 1,
            "innerRadius": "35%",
            "nailRadius": 0,
            "radius": "120%",
            "value": 0
          }]
        });


      setInterval(updatedValue, 2000);
      //updatedValue();
    });



    // set random value
    function updatedValue() {
      var value = Math.round(Math.random() * 100);
      chartActui.arrows[0].setValue(value);
      chartActui.axes[0].setTopText(value);
      // adjust darker band to new value
      chartActui.axes[0].bands[1].setEndValue(value);
    }
  </script>
@endpush
