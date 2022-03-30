<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Exception;

class etapas_del_proyecto extends Model
{
    use HasFactory;
    protected $table = 'etapas_del_proyecto';

    public static function requestInsertEtapas($data,$data1,$data2,$data3,$data4,$data5,$data6,$data7,$data8,$data9,$data10,$data11,$data12,$data13,$data14) {

        try{

            $response = self::insertEtapas($data,$data1,$data2,$data3,$data4,$data5,$data6,$data7,$data8,$data9,$data10,$data11,$data12,$data13,$data14);
            if (isset($response["code"]) && $response["code"] == 200) {
                return $response;
            }else{
                return $response;
            }
        }catch(Exception $e) {
            return array(
                "code" => 500,
                "success" => false,
                "message" => $e->getMessage()
              );
        }
    }

    /**
     * Agrega una marca nueva
    */

    public static function insertEtapas($data,$data1,$data2,$data3,$data4,$data5,$data6,$data7,$data8,$data9,$data10,$data11,$data12,$data13,$data14) {

        $arrayResponse = array();

        try{
            $id = DB::table('etapas_del_proyecto')->insertGetId($data);
            $id1 = DB::table('etapas_del_proyecto')->insertGetId($data1);
            $id2 = DB::table('etapas_del_proyecto')->insertGetId($data2);
            $id3 = DB::table('etapas_del_proyecto')->insertGetId($data3);
            $id4 = DB::table('etapas_del_proyecto')->insertGetId($data4);
            $id5 = DB::table('etapas_del_proyecto')->insertGetId($data5);
            $id6 = DB::table('etapas_del_proyecto')->insertGetId($data6);
            $id7 = DB::table('etapas_del_proyecto')->insertGetId($data7);
            $id8 = DB::table('etapas_del_proyecto')->insertGetId($data8);
            $id9 = DB::table('etapas_del_proyecto')->insertGetId($data9);
            $id10 = DB::table('etapas_del_proyecto')->insertGetId($data10);
            $id11 = DB::table('etapas_del_proyecto')->insertGetId($data11);
            $id12 = DB::table('etapas_del_proyecto')->insertGetId($data12);
            $id13 = DB::table('etapas_del_proyecto')->insertGetId($data13);
            $id14 = DB::table('etapas_del_proyecto')->insertGetId($data14);
            $arrayResponse = array(
                "code"      => 200,
                "message"   => "Se ha agragado el registro",
                "id1e" => $id,
                "id2e" => $id1,
                "id3e" => $id2,
                "id4e" => $id3,
                "id5e" => $id4,
                "id6e" => $id5,
                "id7e" => $id6,
                "id8e" => $id7,
                "id9e" => $id8,
                "id10e" => $id9,
                "id11e" => $id10,
                "id12e" => $id11,
                "id13e" => $id12,
                "id14e" => $id13,
                "id15e" => $id14,
            );
        }catch (Exception $e) {
            $arrayResponse = array(
                "code"      => 500,
                "message"   => "Ocurrio un error al intentar agregar el registro. Error" . $e->getMessage()
            );
        }

        return $arrayResponse;
    }

}
