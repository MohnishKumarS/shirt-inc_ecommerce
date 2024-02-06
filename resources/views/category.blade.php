@extends('layouts.userpage')

@section('title', 'Collections')


@section('content')

<div class="mb-4 pb-4"></div>
<section class="lookbook container">
    <h2 class="page-title">COLLECTION LOOKBOOK</h2>
    <section class="lookbook-collection">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column">
                    <a href="<?= $url ?>shop" class="lookbook-collection__item position-relative flex-grow-1 mb-4 effect border-plus">
                        <div class="lookbook-collection__item-image">
                            <img loading="lazy" src="<?= $url ?>assets/images/mocks/slider/mock1.webp" width="690" height="399" alt="">
                        </div>
                        <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                            <p class="text-uppercase mb-1 white-color">STARTING AT Rs19</p>
                            <h3 class="white-color">Pants Women</h3>
                        </div>
                    </a>
                    <a href="<?= $url ?>shop" class="lookbook-collection__item position-relative flex-grow-1 mt-1 mb-4 effect border-plus">
                        <div class="lookbook-collection__item-image">
                            <img loading="lazy" src="<?= $url ?>assets/images/mocks/slider/mock1.webp" width="690" height="399" alt="">
                        </div>
                        <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                            <p class="text-uppercase mb-1">STARTING AT Rs.21</p>
                            <h3>Thalapathy Leo</h3>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="<?= $url ?>shop" class="lookbook-collection__item size-lg position-relative mb-4 effect border-plus">
                        <div class="lookbook-collection__item-image">
                            <img loading="lazy" src="<?= $url ?>assets/images/mocks/slider/mock1.webp" width="690" height="826" alt="">
                        </div>
                        <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                            <p class="text-uppercase mb-1">STARTİNG AT Rs.39</p>
                            <h3>T-Shirt</h3>
                        </div>
                    </a>
                </div><!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <a href="<?= $url ?>shop" class="lookbook-collection__item size-lg position-relative mt-1 mb-4 effect border-plus">
                        <div class="lookbook-collection__item-image">
                            <img loading="lazy" src="<?= $url ?>assets/images/mocks/slider/mock1.webp" width="690" height="826" alt="">
                        </div>
                        <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                            <p class="text-uppercase mb-1">STARTİNG AT Rs.39</p>
                            <h3>Knee-length Cotton Shorts</h3>
                        </div>
                    </a>
                </div><!-- /.col-md-6 -->
                <div class="col-lg-6 d-flex flex-column">
                    <a href="<?= $url ?>shop" class="lookbook-collection__item position-relative flex-grow-1 mt-1 mb-4 effect border-plus">
                        <div class="lookbook-collection__item-image">
                            <img loading="lazy" src="<?= $url ?>assets/images/mocks/slider/mock1.webp" width="690" height="399" alt="">
                        </div>
                        <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                            <p class="text-uppercase mb-1">STARTING AT Rs.19</p>
                            <h3>Canvas Trainers</h3>
                        </div>
                    </a>
                    <a href="<?= $url ?>shop" class="lookbook-collection__item position-relative flex-grow-1 mt-1 mb-4 effect border-plus">
                        <div class="lookbook-collection__item-image">
                            <img loading="lazy" src="<?= $url ?>assets/images/mocks/slider/mock1.webp" width="690" height="399" alt="">
                        </div>
                        <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                            <p class="text-uppercase mb-1">STARTING AT Rs.21</p>
                            <h3>Slim Fit Cotton Shorts</h3>
                        </div>
                    </a>
                </div>
                <div class="col-lg-12 d-flex flex-column">
                    <a href="<?= $url ?>shop" class="lookbook-collection__item position-relative flex-grow-1 mt-1 mb-4 effect border-plus">
                        <div class="lookbook-collection__item-image">
                            <img loading="lazy" src="<?= $url ?>assets/images/mocks/slider/mock1.webp" width="690" height="399" alt="">
                        </div>
                        <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                            <p class="text-uppercase mb-1">STARTING AT Rs19</p>
                            <h3>Canvas Trainers</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</section>


@endsection
