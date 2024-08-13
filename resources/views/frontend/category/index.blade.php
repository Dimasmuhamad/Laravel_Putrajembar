

@extends('layouts.frontend.app')
@section('content')
<!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Kategori Produk</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                @foreach ($data['category'] as $category)
                    <div class="col-lg-4 col-md-4 col-sm-4 p-0">
                        <div class="categories__item set-bg" data-setbg="{{ asset('storage/' . $category->thumbnails) }}">
                            <div class="categories__text">
                                <h4 style="color:white">{{ $category->name }}</h4>
                                <p style="color:white">{{ $category->Products()->count() }} item</p>
                                <a href="{{ route('category.show', $category->slug) }}" style="color:white">Jelajahi</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    @endsection
