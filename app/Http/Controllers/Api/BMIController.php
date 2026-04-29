<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BMIController extends Controller
{
    // 🔹 POST (untuk Android & Postman)
    public function calculate(Request $request)
    {
        $request->validate([
            'berat' => 'required|numeric',
            'tinggi' => 'required|numeric'
        ]);

        $berat = $request->berat;
        $tinggi = $request->tinggi / 100;

        $bmi = $berat / ($tinggi * $tinggi);

        return response()->json([
            "berat" => $berat,
            "tinggi" => $request->tinggi,
            "bmi" => round($bmi, 2),
            "kategori" => $this->kategori($bmi)
        ]);
    }

    // 🔹 GET (untuk browser)
    public function calculateGet(Request $request)
    {
        $berat = $request->berat;
        $tinggi = $request->tinggi;

        if (!$berat || !$tinggi) {
            return response()->json([
                "message" => "Gunakan: ?berat=50&tinggi=160"
            ]);
        }

        $tinggiMeter = $tinggi / 100;
        $bmi = $berat / ($tinggiMeter * $tinggiMeter);

        return response()->json([
            "berat" => $berat,
            "tinggi" => $tinggi,
            "bmi" => round($bmi, 2),
            "kategori" => $this->kategori($bmi)
        ]);
    }

    // 🔹 Fungsi kategori (dipakai dua-duanya)
    private function kategori($bmi)
    {
        if ($bmi < 18.5) return "Kurus";
        if ($bmi < 25) return "Normal";
        if ($bmi < 30) return "Gemuk";
        return "Obesitas";
    }
}