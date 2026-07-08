<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $item->seo_title }}</title>
<meta name="description" content="{{ $item->seo_description }}">
<meta name="keywords" content="{{ $item->focus_keyword }}">
<meta name="robots" content="{{ $item->robots }}">
<link rel="canonical" href="{{ url($item->path) }}">
<meta property="og:type" content="{{ $item->type === 'blog' ? 'article' : 'website' }}">
<meta property="og:title" content="{{ $item->seo_title }}">
<meta property="og:description" content="{{ $item->seo_description }}">
<meta property="og:url" content="{{ url($item->path) }}">
<meta property="og:image" content="{{ url($item->og_image ?: '/og.svg') }}">
<meta name="twitter:card" content="summary_large_image">
<script type="application/ld+json">@json([
    '@context' => 'https://schema.org',
    '@type' => $item->type === 'blog' ? 'Article' : ($item->type === 'offer' ? 'Service' : 'WebPage'),
    'name' => $item->seo_title,
    'description' => $item->seo_description,
    'url' => url($item->path),
])</script>
<style>
:root{--a:#2BB2AF;--b:#3B858F;--bg:#f4f8f8;--dark:#102e33;--line:#e2eeee}*{box-sizing:border-box}body{margin:0;font-family:Inter,Arial,sans-serif;background:var(--bg);color:var(--dark)}header{background:linear-gradient(135deg,var(--a),var(--b));color:white;padding:26px 36px}header a{color:white;margin-right:12px;font-weight:bold}.container{max-width:1200px;margin:auto;padding:28px 16px}.card{background:white;border:1px solid var(--line);border-radius:24px;padding:24px;margin:18px 0;box-shadow:0 18px 45px rgba(22,63,66,.08)}.grid{display:grid;grid-template-columns:1fr 1fr;gap:20px}@media(max-width:900px){.grid{grid-template-columns:1fr}}.chip{display:inline-flex;background:#e8fbfa;color:#19777b;border-radius:999px;padding:7px 12px;font-weight:900}.google{border:1px solid #ddd;border-radius:16px;padding:18px;background:#fff}.gurl{color:#188038}.gtitle{font-size:20px;color:#1a0dab;margin:5px 0}.gdesc{color:#4d5156}.social{height:168px;border-radius:18px;background:linear-gradient(135deg,#2BB2AF,#3B858F);color:white;padding:22px;display:flex;flex-direction:column;justify-content:end}.score{height:12px;background:#e8f0f0;border-radius:99px;overflow:hidden}.score span{display:block;height:100%;background:linear-gradient(90deg,var(--a),var(--b))}
</style>
</head>
<body>
<header>
<strong>JCC Laravel 8 + React SEO</strong>
<nav>
<a href="/">Accueil</a><a href="/admin">Dashboard</a><a href="/blog">Blog</a><a href="/offres">Offres</a><a href="/realisations">Réalisations</a><a href="/sitemap.xml">Sitemap</a><a href="/robots.txt">Robots</a>
</nav>
</header>
<main class="container">@yield('content')</main>
</body>
</html>
