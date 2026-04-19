<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BMIController extends Controller
{
    public function calculate(Request $request)
    {
        // validasi input
        $request->validate([
            'berat' => 'required|numeric',
            'tinggi' => 'required|numeric'
        ]);

        $berat = $request->berat;
        $tinggi = $request->tinggi / 100; // cm → meter

        // hitung BMI
        $bmi = $berat / ($tinggi * $tinggi);

        // kategori
        if ($bmi < 18.5) {
            $kategori = "Kurus";
        } elseif ($bmi < 25) {
            $kategori = "Normal";
        } elseif ($bmi < 30) {
            $kategori = "Gemuk";
        } else {
            $kategori = "Obesitas";
        }

        return response()->json([
            "berat" => $berat,
            "tinggi" => $request->tinggi,
            "bmi" => round($bmi, 2),
            "kategori" => $kategori
        ]);
    }
}