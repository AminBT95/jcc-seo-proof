<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SeoItem;

class SeoItemsSeeder extends Seeder
{
    public function run()
    {
        $items = [
            [
                'type' => 'page',
                'title' => 'Accueil',
                'slug' => 'accueil',
                'content' => 'Démo Laravel 8 + React dashboard avec CRUD SEO, sitemap et robots.',
                'seo_title' => 'JCC Laravel React SEO | CMS SEO Professionnel',
                'seo_description' => 'Démo Laravel React avec dashboard SEO, blog, offres, réalisations, pages, sitemap, robots et aperçu Google.',
                'focus_keyword' => 'laravel react seo',
                'robots' => 'index, follow',
                'status' => 'published',
                'og_image' => '/og.svg',
            ],
            [
                'type' => 'blog',
                'title' => 'Comment construire une villa au Maroc',
                'slug' => 'construire-villa-maroc',
                'content' => 'Guide SEO pour construire une villa au Maroc : terrain, permis, budget, matériaux, suivi chantier et livraison finale.',
                'seo_title' => 'Comment construire une villa au Maroc | Guide JCC',
                'seo_description' => 'Découvrez les étapes pour construire une villa au Maroc : terrain, budget, permis, matériaux, suivi chantier et livraison.',
                'focus_keyword' => 'construire villa maroc',
                'robots' => 'index, follow',
                'status' => 'published',
                'og_image' => '/og.svg',
            ],
            [
                'type' => 'offer',
                'title' => 'Construction villa clé en main',
                'slug' => 'construction-villa-cle-en-main',
                'content' => 'Offre SEO de construction villa clé en main : étude, budget, planning, coordination, suivi qualité et livraison finale.',
                'seo_title' => 'Construction villa clé en main | JCC Constructeur',
                'seo_description' => 'Découvrez notre offre construction villa clé en main avec étude, budget, suivi chantier et livraison complète.',
                'focus_keyword' => 'construction villa clé en main',
                'robots' => 'index, follow',
                'status' => 'published',
                'og_image' => '/og.svg',
            ],
            [
                'type' => 'realization',
                'title' => 'Réalisation villa moderne',
                'slug' => 'villa-moderne',
                'content' => 'Réalisation SEO pour villa moderne avec design contemporain, finitions haut de gamme et suivi professionnel.',
                'seo_title' => 'Réalisation villa moderne | JCC Constructeur',
                'seo_description' => 'Découvrez une réalisation de villa moderne avec design contemporain, finitions haut de gamme et suivi professionnel.',
                'focus_keyword' => 'réalisation villa moderne',
                'robots' => 'index, follow',
                'status' => 'published',
                'og_image' => '/og.svg',
            ],
        ];

        foreach ($items as $item) {
            SeoItem::updateOrCreate(['type' => $item['type'], 'slug' => $item['slug']], $item);
        }
    }
}
