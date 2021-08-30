<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Panelista;
use App\Models\Actividad;

class BuscaEventoController extends Controller
{
    public function index()
    {
        return view('test');
    }
 
    public function autocompleteSearch(Request $request)
    {
          $query = $request->get('query');
          $filterResult = Evento::where('titulo', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    } 
    public function autocompleteSearchPanel(Request $request)
    {
          $query = $request->get('query2');
          $filterResult = Panelista::where('nombre', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    }
    public function autocompleteSearchAc(Request $request)
    {
          $query = $request->get('query2');
          $filterResult = Actividad::where('titulo', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    }
}
