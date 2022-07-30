<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DescargaController extends Controller
{
    //
    function descarga_sd_estancia_f03(){
        $path=public_path('archivos/F-03_CEDULA_DE_REGISTRO_ESTANCIA.xlsx');
        return response()->download($path);
    }
    function descarga_sd_estadia_f03(){
        $path=public_path('archivos/F-03_CEDULA_DE_REGISTRO_ESTADIAS.xlsx');
        return response()->download($path);
    }

    function descarga_reporte_estadia(){
        $path=public_path('archivos/Formato Evaluacion Estadias.pdf');
        return response()->download($path);
    }
    function descarga_reporte_estancia(){
        $path=public_path('archivos/Formato Evaluacion Estancias.pdf');
        return response()->download($path);
    }
    function descarga_carta_responsiva(){
        $path=public_path('archivos/Carta de exclusión y autorización.doc');
        return response()->download($path);
    }
    function descarga_carta_presentacion(){
        $path=public_path('archivos/carta de presentacion.docx');
        return response()->download($path);
    }
    function descarga_carta_presentacion_estadia(){
        $path=public_path('archivos/carta de presentacion estadia.docx');
        return response()->download($path);
    }
    function descarga_carta_presentacion_ServicioSocial(){
        $path=public_path('archivos/carta de presentacion estadia.docx');
        return response()->download($path);
    }
    function descarga_cd_f02_Servicio(){
        $path=public_path('archivos/CARTA DE PRESENTACIÓN SERVICIO SOCIAL.docx');
        return response()->download($path);
    }
}
