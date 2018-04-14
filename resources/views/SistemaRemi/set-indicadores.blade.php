@extends('layouts.sistemaremi')

@section('header')

<style>
a:hover {
text-decoration: underline;
}
</style>
@endsection

@section('content')

  <div class="row bg-title">
      <!-- .page title -->
      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">LISTA DE INDICADORES</h4>
      </div>
      <!-- /.page title -->
      <!-- .breadcrumb -->
      <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
              <li><a href="{{ url('/sistemaremi/setIndicadores') }}">Indicadores</a></li>
              <li class="active">Lista de indicadores</li>
          </ol>
      </div>
      <!-- /.breadcrumb -->
  </div>
  <!-- .row -->
  <div class="row">
      <div class="col-md-12">
          <div class="panel panel-inverse ">
              <div class="panel-heading"> Filtrar Indicadores
                  <div class="pull-right">
                      <a href="#" data-perform="panel-collapse">
                        <i class="ti-minus"></i>
                      </a>
                  </div>
              </div>
              <div class="panel-wrapper collapse in" aria-expanded="true">
                  <div class="panel-body">
                    <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
                      <select name="tipo" class="form-control filter">
                          <option value="">-Tipo Indicador-</option>
                          <option value="Insumo" {{ $tipo === "Insumo" ? "selected" : "" }}>Insumo</option>
                          <option value="Impacto" {{ $tipo === "Impacto" ? "selected" : "" }}>Impacto</option>
                          <option value="Producto" {{ $tipo === "Producto" ? "selected" : "" }}>Producto</option>
                      </select>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
                      <select name="unidad" class="form-control filter">
                          <option value="">-Unidad de Medida-</option>
                          <option value="Porcentaje" {{ $unidad === "Porcentaje" ? "selected" : "" }}>Porcentaje</option>
                          <option value="Número" {{ $unidad === "Número" ? "selected" : "" }}>Número</option>
                      </select>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
                      <select name="periodicidad" class="form-control filter">
                          <option>-Periodicidad-</option>
                          <option>Opción 2</option>
                      </select>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
                      <select name="estado" class="form-control filter">
                          <option>-Estado-</option>
                          <option>Opción 2</option>
                      </select>
                    </div>


                  </div>
                  </div>
              </div>
          </div>

      </div>
  </div>


  <div class="row">
      <div class="col-lg-12">
        <div class="panel">
            <div class="panel-body">
              <div>
                <p>
                  {{ $indicadores->total() }} registros | página {{ $indicadores->currentPage() }} de {{ $indicadores->lastPage() }}
                </p>
                {!! $indicadores->render() !!}
              @foreach ($indicadores as $item)
                    <div class="row media" style="padding-right: 0px;padding-top: 0px;padding-left: 0px;">
                        <div class="col-lg-1 col-xs-12">
                          <center>
                            <a href="/sistemaremi/dataIndicador/{{ $item->id }}">
                                <img class="media-object" src="/img/icono_indicadores/IND_{{ $item->id }}.png"  style="width: 90px; height: 100px;">
                            </a>
                          </center>
                        </div>
                        <div class="col-lg-11 col-xs-12">
                          <div class="row">
                              <div class="col-lg-12 card-footer">
                                    <a href="/sistemaremi/dataIndicador/{{ $item->id }}" style="color:#000000;font-weight: bold;">{{ $item->id }}. {{ $item->nombre }}</a>
                              </div>
                              <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 text-center">
                                  <p class="text-muted">Tipo:</p>
                                  <p> {{ $item->tipo }} </p>
                              </div>
                              <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 text-center">
                                  <p class="text-muted"> Último Valor: </p>
                                  <p> 70 </p>
                              </div>
                              <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 text-center">
                                  <p class="text-muted">Unidad de Medida:</p>
                                  <p>{{ $item->unidad_medida }}</p>
                              </div>
                              <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 text-center">
                                  <p class="text-muted"> Periodicidad:</p>
                                  <p> Anual </p>
                              </div>
                              <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 text-center">
                                  <p class="text-muted">Etapa:</p>
                                  <p> Etapa 1 </p>
                              </div>
                          </div>
                        </div>
                    </div>
              @endforeach
              </div>
              {!! $indicadores->render() !!}

          </div>
       </div>





      </div>
  </div>



@endsection

@push('script-head')

  <script type="text/javascript">
    $(document).ready(function(){

      $( ".filter" ).change(function() {
            var tipo = $( "select[name*='tipo']" ).val();
            var unidad = $( "select[name*='unidad']" ).val();
            var concat = "";
            if(tipo){
              concat += "tipo="+tipo+"&";
            }
            if(unidad){
              concat += "unidad="+unidad+"&";
            }
            $(location).attr('href', '/sistemaremi/setIndicadores/?'+concat);
      });
    });
  </script>
@endpush
