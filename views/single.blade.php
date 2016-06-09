@extends('templates.master')

@section('content')

<div class="container main-container">
    @include('partials.breadcrumbs')

    <div class="grid">
        <div class="{{ $contentGridSize }} print-grow">
            @while(have_posts())

                @if (is_single() && is_active_sidebar('content-area-top'))
                    <div class="grid sidebar-content-area sidebar-content-area-top">
                        <?php dynamic_sidebar('content-area-top'); ?>
                    </div>
                @endif

                <div class="grid">
                    <div class="grid-sm-12">
                            {!! the_post() !!}

                            @include('partials.blog.type.post-single')
                    </div>
                </div>

                @if (is_single() && is_active_sidebar('content-area'))
                    <div class="grid sidebar-content-area sidebar-content-area-bottom">
                        <?php dynamic_sidebar('content-area'); ?>
                    </div>
                @endif

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
            @endwhile
        </div>

        @include('partials.sidebar-right')
    </div>
</div>

@stop
