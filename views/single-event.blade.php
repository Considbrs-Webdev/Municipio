<?php global $post; ?>
@extends('templates.master')

@section('content')

<div class="container main-container">
    @include('partials.breadcrumbs')
    <div class="grid event-single">
        <div class="grid-md-7">
            <img src="{{ municipio_get_thumbnail_source(null, array(750,750)) }}" alt="{{ the_title() }}" class="image gutter gutter-bottom">
        </div>
        <div class="grid-md-1">
        </div>
        <div class="grid-md-4 hidden-sm hidden-xs">
            <div class="grid info">
                @if (! empty($date))
                <div class="grid-md-12">
                    <div class="info_box">
                        <div class="icon">
                            <i class="pricon pricon-calendar"></i>
                        </div>
                        <div class="text">
                            <h3>{{ $date['date'] }} {{ $date['month'] }}</h3>
                            <span>{{ $date['time'] }}</span>
                        </div>
                    </div>
                </div>
                @endif
                @if (! empty($location))
                    <div class="grid-md-12">
                        <div class="info_box">
                            <div class="icon">
                                <i class="pricon pricon-location-pin"></i>
                            </div>
                            <div class="text">
                                <h3>{{ $location['title'] }}</h3>
                                <span>{{ $location['city'] }}</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="grid-md-12 grid-lg-12">
            @if (is_single() && is_active_sidebar('content-area-top'))
                <div class="grid sidebar-content-area sidebar-content-area-top" style="border:1px solid blue;">
                    <?php dynamic_sidebar('content-area-top'); ?>
                </div>
            @endif

            <div class="grid">
                <div class="grid-md-12">
                        {!! the_post() !!}
                        <div class="grid gutter gutter-lg gutter-bottom">
                            <div class="grid-md-8">
                                <div class="post post-single">

                                    @include('partials.blog.post-header')

                                    <article id="article">
                                        @if (isset(get_extended($post->post_content)['main']) && !empty(get_extended($post->post_content)['main']) && isset(get_extended($post->post_content)['extended']) && !empty(get_extended($post->post_content)['extended']))

                                            {!! apply_filters('the_lead', get_extended($post->post_content)['main']) !!}
                                            {!! apply_filters('the_content', get_extended($post->post_content)['extended']) !!}

                                        @else
                                            {!! apply_filters('the_content', $post->post_content) !!}
                                        @endif
                                    </article>
                                    @if (is_single() && is_active_sidebar('content-area'))
                                        <div class="grid sidebar-content-area sidebar-content-area-bottom">
                                            <?php dynamic_sidebar('content-area'); ?>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="grid-md-4 gutter gutter-md gutter-margin gutter-top">
                                {!! do_shortcode('[single_event_accordion]') !!}
                            </div>
                        </div>
                        @include('partials.blog.post-footer')
                </div>
            </div>

            @if (is_single() && comments_open())
                <div class="grid">
                    <div class="grid-sm-12">
                        @include('partials.blog.comments-form')
                    </div>
                </div>
                <div class="grid">
                    <div class="grid-sm-12">
                        @include('partials.blog.comments')
                    </div>
                </div>
            @endif
        </div>

        @include('partials.sidebar-right')
    </div>
</div>

@stop

