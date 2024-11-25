<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTambahtambahan;
use Illuminate\Support\Facades\Validator;


class TambahtambahanController extends Controller
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
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'score' => 'required|integer|min:0',
        ]);
    
        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
    
        // Cari pengguna berdasarkan email
        $user = UserTambahtambahan::where('email', $request->email)->first();
    
        if ($user) {
            // Jika email sudah ada, cek dan update highest_score jika lebih besar
            if ($request->score > $user->highest_score) {
                $user->highest_score = $request->score;
                $user->save();
                return response()->json([
                    'success' => true,
                    'message' => 'Score updated successfully',
                    'data' => $user
                ], 200); // HTTP 200 OK
            }
    
            // Jika score baru tidak lebih besar, tidak diupdate
            return response()->json([
                'success' => true,
                'message' => 'selamat main game ini lagi!!',
                'data' => $user
            ], 200); // HTTP 200 OK
        }
    
        // Jika email belum ada, buat pengguna baru dengan highest_score 0
        $newUser = UserTambahtambahan::create([
            'email' => $request->email,
            'highest_score' => 0, // Default score
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'selamat datang di game ini, baru pertama kali main ya?',
            'data' => $newUser
        ], 201); // HTTP 201 Created
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
