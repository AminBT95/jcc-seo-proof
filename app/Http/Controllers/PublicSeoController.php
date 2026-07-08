<?php

namespace App\Http\Controllers;

use App\Models\SeoItem;

class PublicSeoController extends Controller
{
    public function home()
    {
        $item = SeoItem::where('path', '/')->firstOrFail();
        return view('seo-public', compact('item'));
    }

    public function listing($kind)
    {
        $map = [
            'blog' => 'blog',
            'offres' => 'offer',
            'realisations' => 'realization',
        ];

        $type = $map[$kind] ?? 'blog';

        $titles = [
            'blog' => 'Blog',
            'offer' => 'Offres',
            'realization' => 'Réalisations',
        ];

        $title = $titles[$type];

        $items = SeoItem::where('type', $type)->where('status', 'published')->latest()->get();

        $item = new SeoItem([
            'type' => 'page',
            'title' => $title,
            'path' => '/'.$kind,
            'seo_title' => $title.' | JCC Constructeur',
            'seo_description' => 'Liste publique SEO-ready pour '.$title.' avec rendu Laravel.',
            'focus_keyword' => $title,
            'robots' => 'index, follow',
            'og_image' => '/og.svg',
        ]);

        return view('seo-listing', compact('item', 'items'));
    }

    public function show($kind, $slug)
    {
        $map = [
            'blog' => 'blog',
            'offres' => 'offer',
            'realisations' => 'realization',
        ];

        $type = $map[$kind] ?? 'blog';

        $item = SeoItem::where('type', $type)->where('slug', $slug)->firstOrFail();
        return view('seo-public', compact('item'));
    }

    public function page($slug)
    {
        $item = SeoItem::where('type', 'page')->where('slug', $slug)->firstOrFail();
        return view('seo-public', compact('item'));
    }
}
