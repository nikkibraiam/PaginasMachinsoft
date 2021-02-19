<?php

namespace App\Http\Controllers;

use App\Models\Licence;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LicenceController extends Controller
{
    public function generateLicence(Request $request){
        //La licencia contiene el {sistema}UltraFEC;{plan}Free;{si es membresía}true;{periodo}Month;{fecha registro}2020-12-03;{cantidades permitidas de comprobantes, si es 0 es porque esta deshabilitado}10;{Version del sistema}1.1.0
        // Esta cifrado con RSA con llave private
        $request->validate([
            'system' => 'required|string',
            'plan' => 'required|string',
            'subscription' => 'required|bool',
            'period' => 'required|string',
            'amountDays' => 'required|int',
            'version' => 'required|string',
        ]);
        $date = time();
        $uniqueId = uniqid();
        $strLicence = "$request->system;$request->plan;$request->subscription;$request->period;$date;$request->amountDays;$uniqueId";
        $crypted = '';
        openssl_private_encrypt($strLicence, $crypted, file_get_contents(dirname($_SERVER['DOCUMENT_ROOT']) . "/SecurityApi/RSASecurityKey/machinsoftLicence.private"));
        $licence = bin2hex($crypted);
        Licence::create([
            'licence_key' => $licence,
            'system'=> $request->system,
            'plan'=> $request->plan,
            'period' => $request->period,
            'amount_days' => $request->amountDays,
            'state' => 'CRE'
        ]);

        return response()->json([
            'licence' => $licence
        ], 201);
    }

    public function activateLicence(Request $request){
        //Recibe el token para validar el usuario ya que debe estar registrado para ingresar acá y 
        //la licencia.
        //registra en la base de datos la licencia asociandola al client_id, de ese modo queda activada.
        if(isset($request->licence)){
            $licence = Licence::where('licence_key', $request->licence)->first();
            if(isset($licence->state) && $licence->state == 'CRE'){
                $licence->started_at = Carbon::now();
                $licence->client_id = $request->user()['id'];
                if(strtolower($licence->period) == 'monthly'){
                    $licence->finally_at = Carbon::now()->addMonth(1);
                }
                if(strtolower($licence->period) == 'yearly'){
                    $licence->finally_at = Carbon::now()->addYear(1);
                }
                $licence->state = "ACT";
                $licence->save();
                return response()->json(['message' => 'Licence Activated!']);
            }
        }
        return response()->json(['message'=> 'Invalid Request'], 400);
    }

    public function validateLicence(Request $request){
        //Debe devolver true o false y el motivo en un estado o alerta, si lee la licencia usando el public key,
        //valida el periodo, el plan, el sistema, si las fechas estan dentro del plan.
        //Si es membresía debe validar si se debe renovar la licencia o no.
        $licence = Licence::where('licence_key', $request->licence)->first();
        if(isset($licence->state) && $licence->state == 'ACT'){
           if($licence->finally_at < Carbon::now()){
            $licence->state = "FIN";
            $licence->save();
            return response()->json(['state' => 'Finally']);
           }
           return response()->json(['state' => 'Active']);
        }
        return response()->json(['state' => 'Error', 'message'=> 'Invalid Request'], 400);
    }

    private function decrypteLicence($licence){
        $encryptext = base64_decode (hex2bin ($licence));
        $decrypted = '';
        openssl_public_decrypt ($encryptext, $decrypted, file_get_contents(dirname($_SERVER['DOCUMENT_ROOT']) . "/SecurityApi/RSASecurityKey/machinsoftLicence.public"));
        return $decrypted;
    }
}
