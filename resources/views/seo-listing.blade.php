@extends('layouts.seo')
@section('content')
<section class="card"><h1>{{ $item->title }}</h1>@foreach($items as $row)<p><a href="{{ $row->path }}">{{ $row->title }}</a> — Score SEO {{ $row->seo_score }}/100</p>@endforeach</section>
@endsection
