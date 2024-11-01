<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\KunciJawaban;
use App\Models\Kanji;
use App\Models\Hiragana;
use App\Models\Katakana;
use App\Models\Onyomi;
use App\Models\Kunyomi;
use App\Models\Arti;


class KanjiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kunciJawaban = KunciJawaban::with(['kanji','hiragana','katakana','kunyomi','onyomi'])->paginate(10);


        return view('kanji.kanji-index',compact('kunciJawaban'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kanji.kanji-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Mulai database transaction untuk memastikan atomicity
        DB::beginTransaction();

        try {
            // Insert ke tabel `kanji`
            $kanji = new Kanji();
            $kanji->teks_kanji = $request->kanji;
            $kanji->level = $request->level;
            $kanji->save();

            // Insert ke tabel `hiragana`
            $hiragana = new Hiragana();
            $hiragana->teks_hiragana = $request->hiragana;
            $hiragana->save();

            // Insert ke tabel `katakana`
            $katakana = new Katakana();
            $katakana->teks_katakana = $request->katakana;
            $katakana->save();

            // Insert ke tabel `onyomi`
            $onyomi = new Onyomi();
            $onyomi->teks_onyomi = $request->onyomi;
            $onyomi->save();

            // Insert ke tabel `kunyomi`
            $kunyomi = new Kunyomi();
            $kunyomi->teks_kunyomi = $request->kunyomi;
            $kunyomi->save();

            // Insert ke tabel `arti`
            $arti = new Arti();
            $arti->teks_arti = $request->arti;
            $arti->save();

            // Insert ke tabel `kunci_jawaban` dengan ID dari setiap tabel
            $kunciJawaban = new KunciJawaban();
            $kunciJawaban->id_kanji = $kanji->id;
            $kunciJawaban->id_hiragana = $hiragana->id;
            $kunciJawaban->id_katakana = $katakana->id;
            $kunciJawaban->id_onyomi = $onyomi->id;
            $kunciJawaban->id_kunyomi = $kunyomi->id;
            $kunciJawaban->id_arti = $arti->id;
            $kunciJawaban->save();

            // Commit transaction jika semua insert berhasil
            DB::commit();

            return redirect()->route('kanji.add');
        } catch (\Exception $e) {
            // Rollback transaction jika terjadi error
            DB::rollBack();

            return response()->json(['message' => 'Data gagal disimpan', 'error' => $e->getMessage()], 500);
        }
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
