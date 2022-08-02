<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostalCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $filename = "../storage/app/public/cpdescarga.txt";
        $gestor = fopen($filename, "r"); # Modo r, read
        if (!$gestor) {
            exit("Error abriendo archivo");
        }

        $proceso=1;
        $linea=1;
        $listado=array();
        while (($lectura = fgets($gestor)) != false) {
            
            if($linea>3){
                $lectura_linea=$this->leer_linea_archivo($lectura,$id);
                
                if($lectura_linea["existe"]){
                    array_push($listado,$lectura_linea["codigo"]);
                }    
                
               
            }
            $linea++;
           
        }

        $datos=$this->generar_json($listado);
        

       
        if (!feof($gestor)) {
            exit("Error al leer");
        }
        
        fclose($gestor);

        $data= \Response::json($datos, 200);
        return $data;
    }

    public function leer_linea_archivo($lectura,$id){
        $array["existe"]=false;
        $array["codigo"]=$id;

        $porciones = explode("|", $lectura);
        if($porciones[0]===$id){
            $array["existe"]=true;
            $array["codigo"]=$porciones;
        }

        return $array;
    }

    public function generar_json($listado){
        $settlements=array();
        $zip_code="";
        $locality="";
        $key="";
        $name="";
        $code="";
        $key_muni="";
        $name_muni="";

        for ($i=0; $i < count($listado); $i++) {
            $zip_code=$listado[$i][0];
            $locality=strtoupper(mb_convert_encoding($listado[$i][5], 'UTF-8', 'UTF-8'));
            $key=intval($listado[$i][7]);
            $name=strtoupper(mb_convert_encoding($listado[$i][5], 'UTF-8', 'UTF-8'));
            $code=intval($listado[$i][9]);
            $key_muni=strtoupper(mb_convert_encoding($listado[$i][3], 'UTF-8', 'UTF-8'));
            $name_muni=intval($listado[$i][11]); 
           
           $array=array(
                "key" =>$listado[$i][7],
                "name" =>strtoupper(mb_convert_encoding($listado[$i][1], 'UTF-8', 'UTF-8')),
                "zone_type" =>$listado[$i][12],
                "settlement_type" =>
                    array(
                        "name"=>strtoupper(mb_convert_encoding($listado[$i][2], 'UTF-8', 'UTF-8')),
                    )
           );
           array_push($settlements, $array);
        }
        $datos["zip_code"]=$zip_code;
        $datos["locality"]= $locality;
        $datos["federal_entity"]=array(
            "key"=>$key,
            "name"=>$name,
            "code"=>$code
        );
        
        $datos["settlements"]=$settlements;
        
        $datos["municipality"]=array(
            "key"=>$key_muni,
            "name"=>$name_muni
        );

        return $datos;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
