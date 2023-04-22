@extends('layouts.app')

@section('scripts')
    <script>
        // カテゴリ操作
        $(function() {
            $('.CODE_li .category_name').on('click', function() {
                $('.CODE_li .category_name #caret').css("transform", "rotate(90deg)");
                if ($('.CODE_li .category_name #caret').hasClass("rotated")) {
                    $('.CODE_li .category_name #caret').removeClass("rotated").css("transform", "rotate(0deg)");
                } else {
                    $('.CODE_li .category_name #caret').addClass("rotated");
                }
                $(this).next('.CODE_li .tag_ul').slideToggle(300);
                $('.CODE_li .tag_ul').css('display', 'flex');
            });
            $('.TECH_li .category_name').on('click', function() {
                $('.TECH_li .category_name #caret').css("transform", "rotate(90deg)");
                if ($('.TECH_li .category_name #caret').hasClass("rotated")) {
                    $('.TECH_li .category_name #caret').removeClass("rotated").css("transform", "rotate(0deg)");
                } else {
                    $('.TECH_li .category_name #caret').addClass("rotated");
                }
                $(this).next('.TECH_li .tag_ul').slideToggle(300);
                $('.TECH_li .tag_ul').css('display', 'flex');
            });
            $('.LIFE_li .category_name').on('click', function() {
                $('.LIFE_li .category_name #caret').css("transform", "rotate(90deg)");
                if ($('.LIFE_li .category_name #caret').hasClass("rotated")) {
                    $('.LIFE_li .category_name #caret').removeClass("rotated").css("transform", "rotate(0deg)");
                } else {
                    $('.LIFE_li .category_name #caret').addClass("rotated");
                }
                $(this).next('.LIFE_li .tag_ul').slideToggle(300);
                $('.LIFE_li .tag_ul').css('display', 'flex');
            });
            $('.CAFE_li .category_name').on('click', function() {
                $('.CAFE_li .category_name #caret').css("transform", "rotate(90deg)");
                if ($('.CAFE_li .category_name #caret').hasClass("rotated")) {
                    $('.CAFE_li .category_name #caret').removeClass("rotated").css("transform", "rotate(0deg)");
                } else {
                    $('.CAFE_li .category_name #caret').addClass("rotated");
                }
                $(this).next('.CAFE_li .tag_ul').slideToggle(300);
                $('.CAFE_li .tag_ul').css('display', 'flex');
            });
        });
        // read more操作
        var moreNum = 11;
        @foreach ($categories as $category)
            $('#{{ $category->name }} .article_list:nth-child(n + ' + (moreNum + 1) + ')').addClass('is_hidden');
            $('#{{ $category->name }} .read_more').on('click', function() {
                $('#{{ $category->name }} .article_list.is_hidden').slice(0).removeClass('is_hidden');
                if ($('#{{ $category->name }} .article_list.is_hidden').length == 0) {
                    $('#{{ $category->name }} .read_more').fadeOut();
                }
            });
            $(function() {
                var listCnt = $("#{{ $category->name }} .article_list").length;
                if (listCnt < moreNum) {
                    $('#{{ $category->name }} .read_more').addClass('is_hidden');
                }
            });
        @endforeach
    </script>
@endsection

@section('title')
    <title>記事一覧 | {{config('app.name')}}</title>
@endsection

@section('main')
    <div class="list_container">
        <h1>Blog</h1>
        <ul class="category_ul">
            @foreach ($categories as $category)
                <li class="{{ $category->name }}_li">
                    <div class="category_name">
                        <span id="caret"></span>
                        <p>{{ $category->name }}</p>
                    </div>
                    <ul class="tag_ul">
                        <li><a href="{{ route('articles.list_category', ['category_name' => $category->name, 'tag' => 'all']) }}">ALL</a></li>
                        @foreach ($category->tags as $tag)
                            <li><a href="{{ route('articles.list_category', ['category_name' => $category->name, 'tag' => $tag->name]) }}">{{ $tag->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
        <div class="category_container">
            @foreach ($categories as $category)
                <div class="category_list" id="{{ $category->name }}">
                    <h1>{{ $category->name }}</h1>
                    @foreach ($articles as $article)
                        @if( $article->category->name == $category->name )
                            <div class="article_list">
                                <div class="date">
                                    <p class="updatedAt">{{ date('Y/m/d', strtotime($article->updatedAt)) }}</p>
                                </div>
                                @foreach ($article->tags as $tag)
                                    <div class="tag">
                                        <span>{{ $tag->name }}</span>
                                    </div>
                                @endforeach
                                <div class="article_title">
                                    <a href="{{ route('articles.detail', ['id'=>$article->id]) }}">
                                        <p>{{ $article->title }}</p>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="read_more">
                        <button>» Read more</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
