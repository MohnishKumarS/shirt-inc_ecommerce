<section class="products-carousel container">
    <h2 class="h3 text-uppercase mb-4 pb-xl-2 mb-xl-4">Related <strong>Products</strong></h2>

    <div id="related_products" class="position-relative">
        <div class="swiper-container js-swiper-slider" data-settings='{
            "autoplay": false,
            "slidesPerView": 4,
            "slidesPerGroup": 4,
            "effect": "none",
            "loop": true,
            "pagination": {
              "el": "#related_products .products-pagination",
              "type": "bullets",
              "clickable": true
            },
            "navigation": {
              "nextEl": "#related_products .products-carousel__next",
              "prevEl": "#related_products .products-carousel__prev"
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 2,
                "slidesPerGroup": 2,
                "spaceBetween": 14
              },
              "768": {
                "slidesPerView": 3,
                "slidesPerGroup": 3,
                "spaceBetween": 24
              },
              "992": {
                "slidesPerView": 4,
                "slidesPerGroup": 4,
                "spaceBetween": 30
              }
            }
          }'>
            <div class="swiper-wrapper">
                <?php
                    for ($i=0; $i < 10; $i++) { 
                        echo '<div class="swiper-slide product-card">
                            <div class="pc__img-wrapper">
                                <a href="'.$url.'product">
                                    <img loading="lazy" src="'.$url.'assets/images/mocks/slider/mock1.webp" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                                    <img loading="lazy" src="'.$url.'assets/images/mocks/slider/mock1.webp" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                                </a>
                                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                            </div>
        
                            <div class="pc__info position-relative">
                                <p class="pc__category">Dresses</p>
                                <h6 class="pc__title"><a href="'.$url.'product">Kirby T-Shirt</a></h6>
                                <div class="product-card__price d-flex">
                                    <span class="money price">Rs.17</span>
                                </div>
        
                                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                                    '.$icon_heart.'
                                </button>
                            </div>
                        </div>';
                    }
                ?>
            </div>
        </div>

        <div class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
            <?= $icon_left_chevron ?>
        </div>
        <div class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
            <?= $icon_right_chevron ?>
        </div>

        <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div>
    </div>

</section>