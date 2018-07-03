<?php

namespace App\Http\Controllers\ModuloPlanificacion;

use App\Http\Controllers\Controller;
use App\Models\ModuloPlanificacion\Entidades;
use App\Models\ModuloPlanificacion\Planes;
use App\Models\ModuloPlanificacion\TiposEntidades;
use Illuminate\Http\Request;

class PlanesController extends PlanificacionBaseController
{     

    public function showPlanesInstitucion(Request $request)
    {
        return view('ModuloPlanificacion.show-planes-institucion');
    }

    public function listEntidadPlan(Request $request)
    {
        $idEntidadFoco = $this->getIdEntidadFoco($request);
        $entidadPlanes = \DB::select("SELECT ep.id, ep.id_tipo_plan, per.valor as gestion_inicio, per.valor2 as gestion_fin, ep.etapas_completadas, e.nombre as nombre_entidad, e.sigla as sigla_entidad, tp.codigo as cod_tipo_plan
                                        FROM sp_planes ep, sp_entidades e, sp_parametros tp, sp_parametros per
                                        WHERE ep.activo = true AND ep.id_entidad = e.id 
                                        AND  ep.id_tipo_plan = tp.id AND tp.categoria = 'tipo_plan' 
                                        AND per.categoria = 'periodo_plan' AND per.activo AND per.codigo = ep.cod_periodo_plan 
                                        AND e.institucion = {$idEntidadFoco} 
                                        ORDER BY ep.id_tipo_plan"); 
        return \Response::json([
            'data' => $entidadPlanes,         
        ]);
    }

    public function saveEntidadPlan(Request $request)
    {   
        $accion  = $request->id == null ? 'insert' : 'update';
        $entidadPlan = new \stdClass();
        $entidadPlan->id_entidad = $this->user->id_institucion;
        $entidadPlan->id_tipo_plan = $request->id_tipo_plan;
        $entidadPlan->gestion_inicio = $request->gestion_inicio;
        $entidadPlan->gestion_fin = $request->gestion_fin;

        try
        {
            if($accion == 'insert')
            {
                $entidadPlan->id_user = $this->user->id;
                $entidadPlan->activo = true;
                $entidadPlan->etapas_completadas = '';
                $entidadPlan->created_at = \Carbon\Carbon::now(-4);
                $entidadPlan->id             = \DB::table('sp_planes')->insertGetId(get_object_vars($entidadPlan));
            }
            if($accion == 'update')
            {
                $entidadPlan->updated_at = \Carbon\Carbon::now(-4);
                $entidadPlan->id_user_updated = $this->user->id;
                \DB::table('sp_planes')->where('id', $request->id)->update(get_object_vars($entidadPlan));
            }

            return \Response::json([
                'error' => false,
                'accion'=> $accion,
                'estado' => "Success",
                'msg'   => "Se guardó con exito.",
                'data'  => $entidadPlan,
            ]);
        }
        catch (Exception $e) 
        {
            return \Response::json(array(
              'error' => true,
              'estado' => "Error!",
              'msg' => $e->getMessage())
            );
        }
    }

    public function deleteEntidadPlan(Request $request)
    {
        try{

            $entidadPlan = Planes::find($request->id);
            $entidadPlan->activo = false;
            $entidadPlan->save()    ;
            return \Response::json([ 
                'error' => false,
                'estado' => "Success",
                'msg' => "Se eliminó el plan."
            ]);
        }
        catch (Exception $e) {
            return \Response::json([
                'error' => true,
                'estado' => "Error",
                'msg' => $e->getMessage()
            ]);
        }
    }

    /*
    |------------------------------------------------------------------
    | Actualiza el vector de la columna estapas_completadas en la tabla sp_planes
    |                   req = { p: id_plan, id_menu: id_menu, agregar: true }  
    | remove por defecto es false; si se manda true entonces quitara el elemento si es que existe
     */    
    public function actualizaEtapas(Request $req)
    {

        $plan = \DB::table('sp_planes')->where('id', $req->p)->get()->first();
        $etapasComp = collect(array_where(explode('|', $plan->etapas_completadas), function ($idm) {
                                                        return $idm != '';
                                                    }));
        if($req->agregar == '1'){
            $etapasComp[] = $req->id_menu;
            $etapasComp = $etapasComp->unique();
        }
        else{
            $etapasComp = $etapasComp->filter(
                function($val,$key) use ($req){
                    return $val != $req->id_menu;
                });
        }

        $etapasCompletadas = $etapasComp->reduce(
            function($carry, $elem){
                return $carry . $elem . '|';
            }, '|');
        
        \DB::table('sp_planes')->where('id', $req->p)->update(['etapas_completadas' => $etapasCompletadas]);
        return response()->json([
            'r'=>$etapasCompletadas]);
    }




}
