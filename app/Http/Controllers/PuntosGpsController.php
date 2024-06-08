<?php

namespace App\Http\Controllers;

use App\Models\PuntosGps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PuntosGpsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $latitudLongitud1 = [];
        $patronFecha = "/\b\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\b/";
        $patronLongitudLatitud = "/\bW\b|\bN\b/";
        $file = $request->file('archivo');
        $filePath = $file->storeAs('public', time() . '-' . $file->getClientOriginalName());
        $arc = fopen(storage_path('app/' . $filePath), "r");
        while (($row = fgetcsv($arc, 1000, ',')) !== FALSE) {
            $con = 0;
            $conLatitud = 0;
            $conPlaca = 0;

            foreach ($row as $placa) {

                $placa2 = explode('SYS:', $placa);

                if (count($placa2) === 1 && $placa2[0] === $placa) {
                    //echo 'la cadena '. $row[$conLatitud] .  ' RIP';
                } else {

                    $placa3 = explode(';', $placa2[1]);
                    // dd($placa3);
                }

                //$fecha2 = explode('*', $fecha1[1]);

                //$fecha3 = str_replace(array('[', ']'), '', $fecha2[0]);
            }


            //$latitudLongitud = explode(';', $row[5]);
            //print_r($latitudLongitud);
            //   preg_match_all($patronFecha, $row[$con], $coincidencias);
            foreach ($row as $field) {

                $fecha2 = preg_match_all($patronFecha, $row[$con], $coincidencias);


                if ($fecha2 == 0) {
                    $con++;
                    continue;
                } else {
                    $fecha1 = explode('#', $row[$con]);

                    $fecha2 = explode('*', $fecha1[1]);

                    $fecha3 = str_replace(array('[', ']'), '', $fecha2[0]);
                }
            }
            foreach ($row as $fieldLatitud) {
                preg_match($patronLongitudLatitud, $fieldLatitud, $coincidenciasLatitud);
                if ($coincidenciasLatitud == 0) {
                    $conLatitud++;
                    continue;
                } else {

                    $longitud = explode('N', $fieldLatitud);
                    $latitud = explode('W', $fieldLatitud);

                    if (count($longitud) === 1 && $longitud[0] === $fieldLatitud) {
                    } else {
                        $longitud2 = explode(';', $longitud[1]);
                        //  dd($longitud2);
                    }

                    if (count($latitud) === 1 && $latitud[0] === $fieldLatitud) {
                    } else {
                        $latitud2 = explode(';', $latitud[1]);
                        //  dd($latitud2);
                    }
                }
            }

            if(PuntosGps::create([
                'dispositivo' => $row[0],
                'imei' => $row[1],
                'tiempo' => $row[2],
                'placa' => $placa3[0],
                'version' => $placa3[1],
                'longitud' => $longitud2[0],
                'latitud' => $latitud2[0],
                'recepcion' => $fecha3,
            ])){
                echo 'registro guardado ';
            } else{
                echo 'registro no guardado';
            }

            
        }
        return redirect(route('puntosgps.show'));
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view("puntos/index");
    }

    /**
     * Display the specified resource.
     */
    public function buscarMarcadores()
    {
       
        $all = DB::table('puntos_gps')
            ->select('latitud', 'longitud')
            ->get()
            ->toArray();
        // Ejemplo de datos de marcadores
       
        foreach ($all as $dato) {
            $markers[] =  ['longitud'=>$dato->longitud, 'latitud' =>$dato->latitud]; 
        }

     
        return response()->json($markers);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
