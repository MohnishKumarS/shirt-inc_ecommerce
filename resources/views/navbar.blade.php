<!-- Elements Begin -->
<?php
$logoEle =
    '<div class="logo">
        <a href="' .
    $url .
    '">
            <img src="' .
    $url .
    'assets/images/logo.png" alt="SHIRT-INC" class="logo__image d-block">
        </a>
    </div>';

$cart_icon = asset('assets/icons/icon_cart.svg');
$cartBtn = "<button class='header-tools__item header-tools__cart js-open-aside' data-aside='cartDrawer' title='Cart'>
    <img src='{$cart_icon}' alt='cart Icon'>
        <span class='cart-amount d-block position-absolute js-cart-items-count'>3</span>
    </button>";

?>
<!-- Elements End -->

<!-- Desktop header begin -->
<header id="header" class="header header_sticky header-fullwidth">
    <!-- Topbar Begin -->
    <nav class="topbar">
        <div class="btn-wrapper d-flex align-items-center">
            <a href="{{ url('womens-collections') }}" class="tag-btn active">Women</a>
            <a href="{{ url('mens-collections') }}" class="tag-btn">Men</a>
            <a href="{{ url('unisex-collections') }}" class="tag-btn">unisex</a>
        </div>
        <div class="link-wrapper d-flex align-items-center">
            <a class="navigation__link" href="<?= $url ?>">Customize</a>
            <a class="navigation__link" href="<?= $url ?>contact">Contact Us</a>
        </div>
    </nav>
    <!-- Topbar End -->
    <div class="header-desk header-desk_type_1">

        <?= $logoEle ?>

        <nav class="navigation">
            <ul class="navigation__list list-unstyled d-flex">
                <li class="navigation__item">
                    <a href="<?= $url ?>collections" class="navigation__link">Collections</a>
                    <div class="box-menu" style="width: 600px;">
                        <div class="col pe-4">
                            <ul class="sub-menu__list list-unstyled">
                                <li class="sub-menu__item">
                                    <a href="<?= $url ?>collections/pants-womens" class="menu-link menu-link_us-s">
                                        Pants Women
                                    </a>
                                </li>
                                <li class="sub-menu__item">
                                    <a href="<?= $url ?>collections/thalapathy-leo" class="menu-link menu-link_us-s">
                                        Thalapathy Leo
                                    </a>
                                </li>
                                <li class="sub-menu__item">
                                    <a href="<?= $url ?>collections/t-shirt" class="menu-link menu-link_us-s">
                                        T-Shirt
                                    </a>
                                </li>
                                <li class="sub-menu__item">
                                    <a href="<?= $url ?>collections/sweat-shirt" class="menu-link menu-link_us-s">
                                        Swear Shirt
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col pe-4">
                            <ul class="sub-menu__list list-unstyled">
                                <li class="sub-menu__item">
                                    <a href="<?= $url ?>collections/oversized-t-shirt" class="menu-link menu-link_us-s">
                                        Oversized Shirt
                                    </a>
                                </li>
                                <li class="sub-menu__item">
                                    <a href="<?= $url ?>collections/couple-t-shirt" class="menu-link menu-link_us-s">
                                        Couple T-Shirt
                                    </a>
                                </li>
                                <li class="sub-menu__item">
                                    <a href="<?= $url ?>collections/hoodies" class="menu-link menu-link_us-s">
                                        Hoodies
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="navigation__item">
                    <a href="<?= $url ?>new-arrival" class="navigation__link">New Arrival</a>
                </li>
                @php
                    use App\Models\Category;
                    $category = Category::where('status', 1)
                        ->latest()
                        ->first();
                @endphp

                @if ($category)
                    <li class="navigation__item">
                        <a href="{{ url('category/' . $category->slug) }}"
                            class="navigation__link">{{ $category->name }}
                            <span class='align-middle'>
                                <img src="{{ asset('image/gif/gif3.gif') }}" width="30" style="object-fit: contain"
                                    alt="new-trendy" loading="lazy">
                            </span>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>

        <div class="header-tools d-flex align-items-center">

            <form action="./" method="GET" class="header-search search-field d-none d-xxl-flex mx-4">
                <input class="header-search__input w-100" type="text" name="search-keyword"
                    placeholder="Search products...">
                <button class="btn header-search__btn" type="submit" title="Search">
                    <img src="{{ asset('assets/icons/icon_search.svg') }}" alt="cart Icon">
                </button>
            </form>

            <div class="header-tools__item hover-container">
                @guest
                    <a title="Get Started" class="header-tools__item" href="{{ route('signin') }}">
                        <img src="{{ asset('assets/icons/icon_user.svg') }}" alt="User Icon">
                    </a>
                @endguest
                @auth
                    <a title="Get Profile" class="header-tools__item" href="{{ url('profile/account') }}">
                        <img src="{{ asset('assets/icons/icon_user.svg') }}" alt="User Icon">
                    </a>
                @endauth
            </div>

            <a href="<?= $url ?>wishlist" title="Wishlist" class="header-tools__item">
                <img src="{{ asset('assets/icons/icon_heart.svg') }}" alt="User Icon">
            </a>

            <?= $cartBtn ?>
        </div>
    </div>
</header>
<!-- Desktop header end -->

<!-- Mobile header begin -->
<div class="header-mobile header_sticky">
    <!-- Topbar Begin -->
    <nav class="topbar">
        <div class="btn-wrapper d-flex align-items-center">
            <a href="{{ url('womens-collections') }}" class="tag-btn active">Women</a>
            <a href="{{ url('mens-collections') }}" class="tag-btn">Men</a>
            <a href="{{ url('unisex-collections') }}" class="tag-btn">unisex</a>
        </div>
    </nav>
    <!-- Topbar End -->
    <div class="container d-flex align-items-center h-100">
        <a class="mobile-nav-activator d-block position-relative" href="#">
            <svg class="nav-icon" width="25" height="18" viewBox="0 0 25 18"
                xmlns="http://www.w3.org/2000/svg">
                <rect width="25" height="2" />
                <rect y="8" width="20" height="2" />
                <rect y="16" width="25" height="2" />
            </svg>
            <span class="btn-close-lg position-absolute top-0 start-0 w-100"></span>
        </a>

        <?= $logoEle ?>
        <?= $cartBtn ?>

    </div>

    <nav
        class="header-mobile__navigation navigation d-flex flex-column w-100 position-absolute top-100 bg-body overflow-auto">
        <div class="container">
            <form action="search.html" method="GET" class="search-field position-relative mt-4 mb-3">
                <div class="position-relative">
                    <input class="search-field__input w-100 border rounded-1" type="text" name="search-keyword"
                        placeholder="Search products">
                    <button class="btn-icon search-popup__submit pb-0 me-2" type="submit">
                        <img src="{{ asset('assets/icons/icon_search.svg') }}" alt="User Icon">
                    </button>
                    <button class="btn-icon btn-close-lg search-popup__reset pb-0 me-2" type="reset"></button>
                </div>

                <div class="position-absolute start-0 top-100 m-0 w-100">
                    <div class="search-result"></div>
                </div>
            </form>
        </div>

        <div class="container">
            <div class="overflow-hidden">
                <ul class="navigation__list list-unstyled position-relative">

                    <li class="navigation__item">
                        <a href="#" class="navigation__link js-nav-right d-flex align-items-center">
                            Collections &nbsp;
                            <img src="{{ asset('assets/icons/icon_right_chevron.svg') }}" alt="User Icon">

                        </a>
                        <div class="sub-menu position-absolute top-0 start-100 w-100 d-none">
                            <a href="#"
                                class="navigation__link js-nav-left d-flex align-items-center border-bottom mb-2">
                                <img src="{{ asset('assets/icons/icon_left_chevron.svg') }}" alt="User Icon">
                                &nbsp; Collections
                            </a>
                            <ul class="list-unstyled">
                                <li class="sub-menu__item">
                                    <a href="<?= $url ?>collections/pants-womens" class="menu-link menu-link_us-s">
                                        Pants Women
                                    </a>
                                </li>
                                <li class="sub-menu__item">
                                    <a href="<?= $url ?>collections/thalapathy-leo" class="menu-link menu-link_us-s">
                                        Thalapathy Leo
                                    </a>
                                </li>
                                <li class="sub-menu__item">
                                    <a href="<?= $url ?>collections/t-shirt" class="menu-link menu-link_us-s">
                                        T-Shirt
                                    </a>
                                </li>
                                <li class="sub-menu__item">
                                    <a href="<?= $url ?>collections/sweat-shirt" class="menu-link menu-link_us-s">
                                        Swear Shirt
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="navigation__item">
                        <a href="<?= $url ?>new-arrival" class="navigation__link">new arrival</a>
                    </li>

                
                    @if ($category)
                    <li class="navigation__item">
                        <a href="{{ url('category/' . $category->slug) }}"
                            class="navigation__link">{{ $category->name }}
                            <span class='align-middle'>
                                <img src="{{ asset('image/gif/gif3.gif') }}" width="30" style="object-fit: contain"
                                    alt="new-trendy" loading="lazy">
                            </span>
                        </a>
                    </li>
                @endif

                    <li class="navigation__item">
                        <a href="<?= $url ?>about-us" class="navigation__link">About</a>
                    </li>

                    <li class="navigation__item">
                        <a href="<?= $url ?>contact" class="navigation__link">Contact</a>
                    </li>
                    @auth
                        <li class="navigation__item">
                            <a href="{{ route('logout') }}" class="navigation__link"
                                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endauth
                </ul>
            </div><!-- /.overflow-hidden -->
        </div>
    </nav>
</div>
<!-- Mobile header end-->
