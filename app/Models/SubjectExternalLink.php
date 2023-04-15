<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectExternalLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'youtube',
        'soundcloud',
        'spotify'
    ];

    protected $appends = ['youtube_adjusted', 'soundcloud_adjusted'];
    
    
    public function getSoundcloudAdjustedAttribute()
    {
        $url = $this->attributes['soundcloud'];
    
        // Verifica se a URL é uma faixa ou lista de reprodução do SoundCloud
        if (preg_match('/^https:\/\/soundcloud\.com\/(.*?)\/(.*?)(\?.*)?$/', $url, $matches)) {
            $username = $matches[1]; // Nome de usuário ou ID do artista
            $track_id = $matches[2]; // ID da faixa ou lista de reprodução
    
            // Constrói a URL do player com as opções desejadas
            $player_url = 'https://w.soundcloud.com/player/?url='.$this->attributes['soundcloud'].'&color=%23a400ff&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true';
    
            return $player_url;
        }
    
        // Retorna false se a URL não for válida
        return false;
    }
    public function getYoutubeAdjustedAttribute()
    {
    
    $url = $this->attributes['youtube'];
    // extrai o código do vídeo da URL
    if (preg_match('/^https:\/\/www\.youtube\.com\/watch\?v=([^\&]+)/', $url, $matches)) {
        $video_code = $matches[1];

        // retorna a URL completa com o código do vídeo
        return 'https://www.youtube.com/embed/' . $video_code;
    }
    // retorna a URL original caso não seja uma URL do YouTube válida
    return false;
    }
}
