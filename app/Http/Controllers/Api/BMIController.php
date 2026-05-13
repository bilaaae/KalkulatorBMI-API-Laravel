<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BmiRecord;

class BMIController extends Controller
{
    // =========================
    // HITUNG BMI
    // =========================
    public function calculate(Request $request)
    {
        $request->validate([
            'berat' => 'required|numeric',
            'tinggi' => 'required|numeric',
            'umur' => 'required|numeric',
            'gender' => 'required|string'
        ]);

        try {

            $berat = $request->berat;

            $tinggiCm = $request->tinggi;

            if ($tinggiCm == 0) {

                return response()->json([
                    "error" => "Tinggi tidak boleh 0"
                ], 400);
            }

            $tinggi = $tinggiCm / 100;

            $bmi =
                $berat /
                ($tinggi * $tinggi);

            if ($bmi < 18.5) {

                $kategori = "Kurus";

            } elseif ($bmi < 25) {

                $kategori = "Normal";

            } elseif ($bmi < 30) {

                $kategori = "Gemuk";

            } else {

                $kategori = "Obesitas";
            }

            BmiRecord::create([

                'user_id' => $request->user_id,

                'berat' => $berat,

                'tinggi' => $tinggiCm,

                'umur' => $request->umur,

                'gender' => $request->gender,

                'bmi' => $bmi,

                'kategori' => $kategori
            ]);

            return response()->json([

                "message" =>
                    "Data berhasil disimpan",

                "berat" => $berat,

                "tinggi" =>
                    $request->tinggi,

                "umur" =>
                    $request->umur,

                "gender" =>
                    $request->gender,

                "bmi" =>
                    round($bmi, 2),

                "kategori" =>
                    $kategori
            ]);

        } catch (\Exception $e) {

            return response()->json([

                "error" =>
                    $e->getMessage()

            ], 500);
        }
    }

    // =========================
    // HISTORY BMI
    // =========================
    public function history($user_id)
    {
        $history = BmiRecord::where(
            'user_id',
            $user_id
        )->latest()->get();

        return response()->json($history);
    }
}