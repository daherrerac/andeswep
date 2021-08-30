<?php

namespace App\Http\Controllers;

use App\Models\Fitness;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Beginfitness;
use Illuminate\Support\Facades\Auth;

class FitnessUserController extends Controller
{
    public function index()
    {        
        $contenidos = Fitness::all();
        return view('fitness')->with('contenidos', $contenidos);
    }
    public function show($id)
    {
        //Perfil temporal de expositor para el demo
        return view('fitness.guardar' , [
            'detalle' =>  Fitness::find($id)      
        ]);  
    }
    public function store(Request $request)
    {
        $user = Auth::user();    
        $id_user = $user->id;

        $request->validate([
            'lat_inicial' => 'required',            
            'long_inicial' => 'required',
            'evento_id' => 'required'
        ]);

        Beginfitness::create([
            'user_id'      => $id_user,   
            'event_id'     => $request['evento_id'],            
            'lat_inicial'  => $request['lat_inicial'],
            'long_inicial' => $request['long_inicial'],           
        ]);
        $contenidos = Beginfitness::latest()->first();
        return view('fitness.finalizar')->with('contenidos', $contenidos);
    }
    public function index_tabla()
    {        
        $contenidos = User::all();
        return view('detalle.tabla')->with('contenidos', $contenidos);
    }
    public function fitness_points()
    {        
        $user = Auth::user();
        $id_user = $user->id;

        /* $contenidos = DB::table('beginfitnesses')
                ->where('user_id', '=', $id_user)
                ->orderBy('created_at', 'desc')->paginate(4);                    
         */        
        $contenidos = Beginfitness::latest()->first();
        return view('fitness.finalizar')->with('contenidos', $contenidos);
    }

    public function update(Request $request, Beginfitness $evento)
    {
        $request->validate([
            'id' => 'required',
            'lat_final' => 'required',
            'long_final' => 'required',
            'distancia' => 'required',
        ]);
        $id = $request['id'];
    
        //$evento->update($request->all());
        $evento = Beginfitness::find($id);
        $evento->lat_final = $request['lat_final'];
        $evento->long_final = $request['long_final'];
        $evento->distancia = $request['distancia'];

        $evento->save();
    
        $contenidos = Fitness::all();
        return view('fitness')->with('contenidos', $contenidos)->with('success','Punto registrado correctamente');  
        //return 'Hola Mundo'. $request;                              
    }
    public function personal()
    {  
        $user = Auth::user();
        $id_user = $user->id;
        
        $distancia =
             
                DB::table('beginfitnesses')
                 ->select('event_id', DB::raw('sum(distancia) as total'))
                 ->groupBy('event_id')
                 ->get();


        //$distancia = round($distancia*1000, 3);
        //dd($distancia);
        $contenidos = Fitness::all();
        return view('detalle.fitness')->with('distancia', $distancia)->with('contenidos', $contenidos);
    }
}
