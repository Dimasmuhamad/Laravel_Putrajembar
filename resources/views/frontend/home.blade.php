@extends('layouts.frontend.app')
@section('content')
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container-fluid">
            <div class="col-lg-12 p-0">
                <div class="categories__item categories__large__item set-bg"
                    data-setbg="{{ asset('me') }}/img/landscape.jpg">
                    <div class="marquee">
                        {{-- <p class="loop-text">
                            - Nikmati Keunggulan Beras Garut -
                        </p> --}}
                        <p class="loop-text" style="color: white">
                            - Hasil Tangan Terampil Petani
                            Lokal - Produk beras kami senantiasa memberikan kualitas terbaik untuk konsumen dan
                            berkontribusi
                            meningkatkan kesejahteraan petani -
                        </p>
                        <div class="categories__text">
                            {{-- <p class="p-large font-bold text-white">Nikmati Keunggulan Beras Garut - Hasil Tangan Terampil Petani
                            Lokal!</p> --}}

                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-6">
                    <div class="row">
                        @foreach ($data['new_categories'] as $category)
                            <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                                <div class="categories__item set-bg"
                                    data-setbg="{{ asset('storage/' . $category->thumbnails) }}">
                                    <div class="categories__text">
                                        <h4>{{ $category->name }}</h4>
                                        <p>{{ $category->Products()->count() }} item</p>
                                        <a href="#">Jelajahi</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div> --}}
        </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>Semua Produk</h4>
                    </div>
                </div>
                {{-- <div class="col-lg-8 col-md-8">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">All</li>
                        @foreach ($data['new_categories'] as $new_categories)
                            <li data-filter=".{{ $new_categories->slug }}">{{ $new_categories->name }}</li>
                        @endforeach
                    </ul>
                </div> --}}
            </div>
            <div class="row property__gallery">
                @foreach ($data['new_categories'] as $new_categories2)
                    @foreach ($new_categories2->Products()->limit(4)->get() as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $new_categories2->slug }}"
                            style="margin-bottom: 30px">
                            <div class="product-card">
                                <img class="product-card__image" src="{{ asset('storage/' . $product->thumbnails) }}"
                                    alt="{{ $product->name }}">
                                <div class="product-card__text">
                                    <h4>{{ $product->name }}</h4>
                                    <p style="font-weight: semibold">Rp.
                                        {{ number_format($product->price, 0, ',', '.') }}</p>
                                    <p style="font-weight: semibold">Stok: {{ $product->stok }}</p>
                                    <a href="{{ route('product.show', ['categoriSlug' => $new_categories2->slug, 'productSlug' => $product->slug]) }}"
                                        class="custom-green-link btn btn-success">Detail Produk</a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>

    </section>
    <!-- Product Section End -->

    {{-- deskripsi --}}
    <section class="categories_deskrip_container">
        <div class="categories_deskrip_container_kotak">
            <div class="categoriesp">
                <h1>Bersama Meningkatkan Kesejahteraan Petani</h1>
                <p>Produk beras kami diambil dari petani lokal Garut. Dengan membeli produk kami berarti Anda ikut
                    berpartisipasi dalam meningkatkan perekonomian petani lokal</p>
            </div>
        </div>
    </section>
    {{-- deskripsiend --}}

    {{-- kelebhan --}}
    <section class="product-features">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="features-text">
                        <h1>Tentang <span>Putra Jembar</span></h1>
                        <ul>
                            <p style="line-height: 28px; font-size: 18px; ">Putra Jembar berkomitmen menyediakan beras
                                berkualitas tinggi dengan rasa lezat dan tekstur
                                pulen. Kami memastikan setiap butir beras melalui proses pemilihan dan pengolahan yang ketat
                                untuk memenuhi standar tertinggi. Dengan fokus pada kualitas dan harga yang bersaing, kami
                                bertujuan menjadi pilihan utama bagi kebutuhan beras Anda. Keberhasilan kami didorong oleh
                                dedikasi untuk memberikan produk berkualitas dan layanan pelanggan yang unggul.</p>
                        </ul>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="features-image">
                        <img src="{{ asset('me/img/beras-sarinah.png') }}" alt="Beras Sarinah">
                    </div>
                    <span class="svg-container">
                        <svg width="400" height="600" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"
                            class="svg">
                            <path fill="#66ff66"
                                d="M33.9,-24.1C45.9,-22,58.9,-11,63.2,4.4C67.6,19.7,63.4,39.5,51.4,56C39.5,72.5,19.7,85.8,2.9,82.8C-13.8,79.9,-27.7,60.7,-37.9,44.2C-48.1,27.7,-54.6,13.8,-50.2,4.4C-45.9,-5.1,-30.6,-10.3,-20.4,-12.4C-10.3,-14.5,-5.1,-13.7,2.9,-16.6C11,-19.5,22,-26.2,33.9,-24.1Z"
                                transform="translate(100 100) scale(1.2)" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </section>
    {{-- kelebhanend --}}

    {{-- action informasi --}}
@endsection
