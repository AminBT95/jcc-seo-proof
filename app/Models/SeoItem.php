<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SeoItem extends Model
{
    protected $fillable = [
        'type','title','slug','path','content','seo_title','seo_description',
        'focus_keyword','robots','status','og_image','seo_score'
    ];

    protected static function booted()
    {
        static::saving(function (SeoItem $item) {
            $item->slug = $item->slug ? Str::slug($item->slug) : Str::slug($item->title);

            if ($item->type === 'page' && in_array($item->slug, ['', 'accueil', 'home'])) {
                $item->path = '/';
            } else {
                switch ($item->type) {
                    case 'blog':
                        $item->path = '/blog/'.$item->slug;
                        break;
                    case 'offer':
                        $item->path = '/offres/'.$item->slug;
                        break;
                    case 'realization':
                        $item->path = '/realisations/'.$item->slug;
                        break;
                    default:
                        $item->path = '/'.$item->slug;
                        break;
                }
            }

            $item->seo_score = self::calculateScore($item);
        });
    }

    public static function calculateScore(SeoItem $item)
    {
        $score = 0;
        $title = $item->seo_title ?? '';
        $description = $item->seo_description ?? '';
        $keyword = mb_strtolower($item->focus_keyword ?? '');
        $content = mb_strtolower($item->content ?? '');

        if (mb_strlen($title) >= 35 && mb_strlen($title) <= 65) $score += 20;
        if (mb_strlen($description) >= 80 && mb_strlen($description) <= 160) $score += 20;
        if ($keyword !== '') $score += 10;
        if ($keyword !== '' && strpos(mb_strtolower($title), explode(' ', $keyword)[0]) !== false) $score += 10;
        if ($item->slug && strpos($item->slug, '_') === false) $score += 10;
        if (($item->robots ?? '') === 'index, follow') $score += 10;
        if (!empty($item->og_image)) $score += 10;
        if (mb_strlen($content) >= 100) $score += 10;

        return min($score, 100);
    }
}
