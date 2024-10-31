<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kanji;
use App\Models\Hiragana;
use App\Models\Katakana;
use App\Models\Onyomi;
use App\Models\Kunyomi;
use App\Models\Arti;

class KunciJawaban extends Model
{
    protected $guarded = ['id'];

    protected $table = 'kunci_jawaban';

    public $timestamps = false;




    public function kanji()
    {
        return $this->belongsTo(Kanji::class, 'id_kanji');
    }


    public function hiragana()
    {
        return $this->belongsTo(Hiragana::class, 'id_hiragana');
    }
     

    public function katakana()
    {
        return $this->belongsTo(Katakana::class, 'id_katakana');
    }


    public function onyomi()
    {
        return $this->belongsTo(Onyomi::class, 'id_onyomi');
    }

    public function kunyomi()
    {
        return $this->belongsTo(Kunyomi::class, 'id_kunyomi');
    }


    public function arti()
    {
        return $this->belongsTo(Arti::class, 'id_arti');
    }
     

}
