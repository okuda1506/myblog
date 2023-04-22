@extends('layouts.app')

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/highlight.min.js"></script>
    <script>
        // microCMSリッチエディタのスタイル修正（現状リスト・インデントの修正は効かない）
        hljs.initHighlightingOnLoad();
    </script>
@endsection

@section('title')
    <title>記事閲覧 | {{config('app.name')}}</title>
@endsection

@section('main')
    <article>
        <h1>{{ $article->title }}</h1>
        <p class="updatedAt">{{ $update_date }}</p>
        <div id="content">
            {!! $article->content !!}
        </div>
    </article>
@endsection
