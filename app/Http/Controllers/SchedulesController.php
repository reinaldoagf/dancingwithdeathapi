<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduledAppointment;

class SchedulesController extends Controller
{
    
    public function all(Request $request){
        try{
            return response()->json([
                'message'=> 'Elementos obtenidos satisfactoriamente',
                'data' => ScheduledAppointment::get(),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
                'error' => $e->getMessage(),
                'linea' => $e->getLine()
            ], 500);
        }
    }
    public function date(Request $request){
        try{
            return response()->json([
                'message'=> 'Elementos obtenidos satisfactoriamente',
                'data' => ScheduledAppointment::where("date",$request->get('date'))->get(),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
                'error' => $e->getMessage(),
                'linea' => $e->getLine()
            ], 500);
        }
    }
    public function appointment(Request $request){     
        try{
            $element = ScheduledAppointment::create($request->all());
            return response()->json([
                'message'=> 'Elementos obtenidos satisfactoriamente',
                'data' =>   ScheduledAppointment::find($element->id),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
                'error' => $e->getMessage(),
                'linea' => $e->getLine()
            ], 500);
        }
    }
    
    public function delete($id){
        try {
            $element = ScheduledAppointment::find($id);
            $element->delete();
            return response()->json([
                'message'=> 'Cita eliminada satisfactoriamente',
                'data' => $element,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
                'error' => $e->getMessage(),
                'linea' => $e->getLine()
            ], 500);
        }
    }
}
