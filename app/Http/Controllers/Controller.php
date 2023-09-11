<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Http;
use Session;
use Redirect;


use App\Models\TablaPrueba;

class Controller extends BaseController
{

public function PruebaTecnica(Request $request){

    

    $response = Http::get('https://rickandmortyapi.com/api/character');

    // Verificar si la solicitud fue exitosa
    if ($response->successful()) {
        // Obtener los datos JSON de la respuesta
        $data = $response->json();

        // Hacer algo con los datos (por ejemplo, mostrarlos en una vista)

    
    } else {
        // Manejar el caso de una solicitud fallida
        dd("error");
    }

    foreach ($data['results'] as $vista){
        
        $datavista[] = [$vista['id'],$vista['name'],$vista['status'],$vista['species']];
        $datadetalle[] = [$vista['id'],$vista['type'],$vista['gender'],$vista['image']];


    }


    return view('welcome',compact('datavista','datadetalle'));

   

}

public function GuardarDatos(Request $request){


    $datosDelFormulario = $request->all();

    
    for ($i = 1; $i <= 20; $i++) {
        $saved = New TablaPrueba();
        $camposid = 'id_'.$i;
        $camposname = 'name_'.$i;
        $camposstatus = 'status_'.$i;
        $campospecies = 'species_'.$i;
        $campotype = 'type_'.$i;
        $campogender = 'gender_'.$i;
        $campoimage = 'image_'.$i;

        $saved->id = $request->$camposid; 
        $saved->name = $request->$camposname; 
        $saved->status = $request->$camposstatus;  
        $saved->species = $request->$campospecies; 
        $saved->type = $request->$campotype; 
        $saved->gender = $request->$campogender;
        $saved->image = $request->$campoimage;
        $saved->save();
    }
    Session::flash('message', "Guardados todos");

    $registrosBD = TablaPrueba::all();
    return view('verregistros',compact('registrosBD'));
}
public function EditarRegistros(Request $request){
   
    $id = $request->id;
    $saved = TablaPrueba::find($id);
    $saved->id = $id; 
    $saved->name = $request->name; 
    $saved->status = $request->status;  
    $saved->species = $request->species; 
    $saved->type = $request->type; 
    $saved->gender = $request->gender;
    $saved->image = $request->image;
    $saved->save();
    

    return response("Guardado");
}


public function VerDatos(){

    $registrosBD = TablaPrueba::all();



    return view('verregistros',compact('registrosBD'));





}
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
