<div class="container mw-1620 bg-white border-radius-10">
    <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
    <section class="category-carousel container">
        <h2 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">You Might Like</h2>

        <div class="position-relative">
            <div class="swiper-container js-swiper-slider" data-settings='{
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 8,
              "slidesPerGroup": 1,
              "effect": "none",
              "loop": true,
              "navigation": {
                "nextEl": ".products-carousel__next-1",
                "prevEl": ".products-carousel__prev-1"
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "slidesPerGroup": 2,
                  "spaceBetween": 15
                },
                "768": {
                  "slidesPerView": 4,
                  "slidesPerGroup": 4,
                  "spaceBetween": 30
                },
                "992": {
                  "slidesPerView": 6,
                  "slidesPerGroup": 1,
                  "spaceBetween": 45,
                  "pagination": false
                },
                "1200": {
                  "slidesPerView": 8,
                  "slidesPerGroup": 1,
                  "spaceBetween": 60,
                  "pagination": false
                }
              }
            }'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img loading="lazy" class="w-100 h-auto mb-3" src="<?= $url ?>assets/images/mocks/category.png" width="124" height="124" alt="">
                        <div class="text-center">
                            <a href="#" class="menu-link fw-medium">Women<br>Tops</a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img loading="lazy" class="w-100 h-auto mb-3" src="<?= $url ?>assets/images/mocks/category.png" width="124" height="124" alt="">
                        <div class="text-center">
                            <a href="#" class="menu-link fw-medium">Women<br>Tops</a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img loading="lazy" class="w-100 h-auto mb-3" src="<?= $url ?>assets/images/mocks/category.png" width="124" height="124" alt="">
                        <div class="text-center">
                            <a href="#" class="menu-link fw-medium">Women<br>Tops</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="products-carousel__prev products-carousel__prev-1 position-absolute top-50 d-flex align-items-center justify-content-center">
                 <img src="{{ asset("assets/icons/icon_left_chevron.svg") }}" alt="cart Icon">
            </div>
            <div class="products-carousel__next products-carousel__next-1 position-absolute top-50 d-flex align-items-center justify-content-center">
                 <img src="{{ asset("assets/icons/icon_right_chevron.svg") }}" alt="cart Icon">
            </div>
        </div>
    </section>
</div>