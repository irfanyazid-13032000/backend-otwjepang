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
    public function index(Request $request)
    {
        $query = KunciJawaban::with(['kanji', 'hiragana', 'katakana', 'kunyomi', 'onyomi', 'arti']);
    
        // Jika terdapat parameter pencarian berdasarkan level N5
        if ($request->has('level')) {
            $query->whereHas('kanji', function ($q) use ($request) {
                $q->where('level', $request->level);
            });
        }
    
        // Jika terdapat parameter pencarian berdasarkan kategori dan teks
        if ($request->has('cari_teks') && $request->has('cari_kategori')) {
            $cariKategori = $request->cari_kategori;
            $cariTeks = $request->cari_teks;
    
            // Menentukan tabel berelasi mana yang akan difilter berdasarkan kategori
            switch ($cariKategori) {
                case 'kanji':
                    $query->whereHas('kanji', function ($q) use ($cariTeks) {
                        $q->where('teks_kanji', 'like', '%' . $cariTeks . '%');
                    });
                    break;
                case 'hiragana':
                    $query->whereHas('hiragana', function ($q) use ($cariTeks) {
                        $q->where('teks_hiragana', 'like', '%' . $cariTeks . '%');
                    });
                    break;
                case 'katakana':
                    $query->whereHas('katakana', function ($q) use ($cariTeks) {
                        $q->where('teks_katakana', 'like', '%' . $cariTeks . '%');
                    });
                    break;
                case 'kunyomi':
                    $query->whereHas('kunyomi', function ($q) use ($cariTeks) {
                        $q->where('teks_kunyomi', 'like', '%' . $cariTeks . '%');
                    });
                    break;
                case 'onyomi':
                    $query->whereHas('onyomi', function ($q) use ($cariTeks) {
                        $q->where('teks_onyomi', 'like', '%' . $cariTeks . '%');
                    });
                    break;
                case 'arti':
                    $query->whereHas('arti', function ($q) use ($cariTeks) {
                        $q->where('teks_arti', 'like', '%' . $cariTeks . '%');
                    });
                    break;
            }
        }
    
        $totalJumlahKanji = $query->count();
    
        $kunciJawaban = $query->paginate(20)->appends($request->except('page'));
    
        return view('kanji.kanji-index', compact('kunciJawaban', 'totalJumlahKanji'));
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
       $kunciJawaban =  KunciJawaban::find($id);

        return view('kanji.kanji-edit',compact('kunciJawaban'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $kunciJawaban = KunciJawaban::find($id);

    // Update data pada tabel yang berelasi, jika ada input untuk masing-masing relasi
    if ($request->has('kanji')) {
        $kunciJawaban->kanji->update(['teks_kanji' => $request->kanji]);
    }

    if ($request->has('hiragana')) {
        $kunciJawaban->hiragana->update(['teks_hiragana' => $request->hiragana]);
    }

    if ($request->has('katakana')) {
        $kunciJawaban->katakana->update(['teks_katakana' => $request->katakana]);
    }

    if ($request->has('onyomi')) {
        $kunciJawaban->onyomi->update(['teks_onyomi' => $request->onyomi]);
    }

    if ($request->has('kunyomi')) {
        $kunciJawaban->kunyomi->update(['teks_kunyomi' => $request->kunyomi]);
    }

    if ($request->has('arti')) {
        $kunciJawaban->arti->update(['teks_arti' => $request->arti]);
    }


    if ($request->has('level')) {
        $kunciJawaban->kanji->update(['level' => $request->level]);
    }

    return redirect()->route('kanji.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
