@extends('layouts.frontend.base')
@section('pageTitle', 'Discover & Book the best restaurants at the best price')
@section('custom-style')
    <link href="{{asset('frontend/css/home.css')}}" rel="stylesheet">
    <style>
        /*the container must be positioned relative:*/
        .custom-select {
            position: relative;
            font-family: Arial;
            border-right: 1px solid #a9a4a4;
        }

        .custom-select select {
            display: none; /*hide original SELECT element:*/
        }

        .select-selected {
            background-color: #fff;
        }

        /*style the arrow inside the select element:*/
        .select-selected:after {
            position: absolute;
            content: "";
            top: 23px;
            right: 10px;
            width: 0;
            height: 0;
            border: 6px solid transparent;
            border-color: #6a6363 transparent transparent transparent;
        }

        /*point the arrow upwards when the select box is open (active):*/
        .select-selected.select-arrow-active:after {
            border-color: transparent transparent #fff transparent;
            top: 7px;
        }

        /*style the items (options), including the selected item:*/
        .select-items div, .select-selected {

            line-height: 1.5;
            color: #82797d;
            background-color: #fff;
            background-clip: padding-box;
            font-family: inherit;
            font-weight: 500;
            padding: 8px 16px;
            font-size: 0.9375rem;


            cursor: pointer;
            user-select: none;
        }

        /*style items (options):*/
        .select-items {
            position: absolute;
            background-color: white;
            top: 100%;
            height: auto;
            left: 0;
            overflow-y: scroll;
            right: 0;
            z-index: 999;
        }

        /*hide the items when the select box is closed:*/
        .select-hide {
            display: none;
        }

        .select-items div:hover, .same-as-selected {
            background-color: rgb(185 78 78);
            color: #fff;
        }


        @media (max-width: 768px) {
            .custom-select {
                border-right: none !important;
            }

            .custom-select {
                padding: 10px 44px 5px 43px !important;
            }
        }
    </style>
@endsection
@section('content')
    <!-- main -->
    <main>

        <div class="header-video">
            <div id="hero_video">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                    <div class="container">
                        <div class="row justify-content-center text-center">
                            <div class="col-xl-8 col-lg-10 col-md-8">
                                <h1>Discover &amp; Book</h1>
                                <p>The best restaurants at the best price</p>
                                <form method="post" action="grid-listing-filterscol.html">
                                    <div class="row no-gutters custom-search-input">

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <i class="fas fa-map-marker-alt"
                                                   style="padding-right:0;color: #a10101b5!important;"></i>
                                                <div class="custom-select "
                                                     style="background: #fff; text-align: left;   font-family: inherit;width:100%;padding: 6px 0px 5px 29px ; ">
                                                    <select class="form-control no_border_r">
                                                        <option style="display: none;">Bussiness Bay, Dubai, UAE
                                                        </option>
                                                        <option value="1">Bussiness Bay, Dubai, UAE</option>


                                                    </select>
                                                </div>
                                                <!-- <input class="form-control no_border_r" type="text" placeholder="Address, neighborhood..."> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <i class="icon_search"></i>
                                                <input class="form-control" type="text"
                                                       placeholder="Search for restaurant, cuisin or a dish">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="submit" value="Search">
                                        </div>
                                    </div>
                                    <!-- /row -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{asset('frontend/img/video_fix.png')}}" alt="" class="header-video--media"
                 data-video-src="{{asset('frontend/video/intro')}}"
                 data-teaser-source="{{asset('frontend/video/intro')}}"
                 data-provider="" data-video-width="1920" data-video-height="960">
        </div>
        <!-- /header-video -->

        <div class="bg_gray">
            <div class="container margin_60_40">
                <div class="main_title center">
                    <span><em></em></span>
                    <h2>Popular Categories</h2>
                    <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
                </div>
                <!-- /main_title -->
                <div class="owl-carousel owl-theme categories_carousel">
                    <div class="item">
                        <a href="grid-listing-filterscol.html">
                            <span>98</span>
                            <i class="icon-food_icon_pizza"></i>
                            <h3>Pizza - Italian</h3>
                            <small>Avg price $40</small>
                        </a>
                    </div>
                    <div class="item">
                        <a href="grid-listing-filterscol.html">
                            <span>87</span>
                            <i class="icon-food_icon_sushi"></i>
                            <h3>Japanese - Sushi</h3>
                            <small>Avg price $50</small>
                        </a>
                    </div>
                    <div class="item">
                        <a href="grid-listing-filterscol.html">
                            <span>96</span>
                            <i class="icon-food_icon_burgher"></i>
                            <h3>Burghers</h3>
                            <small>Avg price $55</small>
                        </a>
                    </div>
                    <div class="item">
                        <a href="grid-listing-filterscol.html">
                            <span>78</span>
                            <i class="icon-food_icon_vegetarian"></i>
                            <h3>Vegetarian</h3>
                            <small>Avg price $40</small>
                        </a>
                    </div>
                    <div class="item">
                        <a href="grid-listing-filterscol.html">
                            <span>65</span>
                            <i class="icon-food_icon_cake_2"></i>
                            <h3>Bakery</h3>
                            <small>Avg price $60</small>
                        </a>
                    </div>
                    <div class="item">
                        <a href="grid-listing-filterscol.html">
                            <span>65</span>
                            <i class="icon-food_icon_chinese"></i>
                            <h3>Chinese</h3>
                            <small>Avg price $40</small>
                        </a>
                    </div>
                    <div class="item">
                        <a href="grid-listing-filterscol.html">
                            <span>65</span>
                            <i class="icon-food_icon_burrito"></i>
                            <h3>Mexican</h3>
                            <small>Avg price $35</small>
                        </a>
                    </div>
                </div>
                <!-- /carousel -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_gray -->

        <div class="container margin_60_40">
            <div class="main_title">
                <span><em></em></span>
                <h2>Popular Restaurants</h2>
                <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
                <a href="#0">View All</a>
            </div>
            <!-- /main_title -->
            <div class="owl-carousel owl-theme carousel_4">
                <div class="item">
                    <div class="strip">
                        <figure>
                            <span class="ribbon off">-30%</span>
                            <img src="{{asset('frontend/img/lazy-placeholder.png')}}"
                                 data-src="{{asset('frontend/img/location_1.jpg')}}" class="owl-lazy" alt="">
                            <a href="detail-restaurant.html" class="strip_info">
                                <small>Pizza</small>
                                <div class="item_title">
                                    <h3>Da Alfredo</h3>
                                    <small>27 Old Gloucester St</small>
                                </div>
                            </a>
                        </figure>
                        <ul>
                            <li><span class="loc_open">Now Open</span></li>
                            <li>
                                <div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="item">
                    <div class="strip">
                        <figure>
                            <span class="ribbon off">-40%</span>
                            <img src="{{asset('frontend/img/lazy-placeholder.png')}}"
                                 data-src="{{asset('frontend/img/location_2.jpg')}}" class="owl-lazy" alt="">
                            <a href="detail-restaurant.html" class="strip_info">
                                <small>Burghers</small>
                                <div class="item_title">
                                    <h3>Best Burghers</h3>
                                    <small>27 Old Gloucester St</small>
                                </div>
                            </a>
                        </figure>
                        <ul>
                            <li><span class="loc_open">Now Open</span></li>
                            <li>
                                <div class="score"><span>Superb<em>350 Reviews</em></span><strong>9.5</strong></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="item">
                    <div class="strip">
                        <figure>
                            <span class="ribbon off">-30%</span>
                            <img src="{{asset('frontend/img/lazy-placeholder.png')}}"
                                 data-src="{{asset('frontend/img/location_3.jpg')}}" class="owl-lazy" alt="">
                            <a href="detail-restaurant.html" class="strip_info">
                                <small>Vegetarian</small>
                                <div class="item_title">
                                    <h3>Vego Life</h3>
                                    <small>27 Old Gloucester St</small>
                                </div>
                            </a>
                        </figure>
                        <ul>
                            <li><span class="loc_open">Now Open</span></li>
                            <li>
                                <div class="score"><span>Superb<em>350 Reviews</em></span><strong>7.5</strong></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="item">
                    <div class="strip">
                        <figure>
                            <span class="ribbon off">-25%</span>
                            <img src="{{asset('frontend/img/lazy-placeholder.png')}}"
                                 data-src="{{asset('frontend/img/location_4.jpg')}}" class="owl-lazy" alt="">
                            <a href="detail-restaurant.html" class="strip_info">
                                <small>Japanese</small>
                                <div class="item_title">
                                    <h3>Sushi Temple</h3>
                                    <small>27 Old Gloucester St</small>
                                </div>
                            </a>
                        </figure>
                        <ul>
                            <li><span class="loc_open">Now Open</span></li>
                            <li>
                                <div class="score"><span>Superb<em>350 Reviews</em></span><strong>9.5</strong></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="item">
                    <div class="strip">
                        <figure>
                            <span class="ribbon off">-30%</span>
                            <img src="{{asset('frontend/img/lazy-placeholder.png')}}"
                                 data-src="{{asset('frontend/img/location_5.jpg')}}" class="owl-lazy" alt="">
                            <a href="detail-restaurant.html" class="strip_info">
                                <small>Pizza</small>
                                <div class="item_title">
                                    <h3>Auto Pizza</h3>
                                    <small>27 Old Gloucester St</small>
                                </div>
                            </a>
                        </figure>
                        <ul>
                            <li><span class="loc_open">Now Open</span></li>
                            <li>
                                <div class="score"><span>Superb<em>350 Reviews</em></span><strong>7.0</strong></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="item">
                    <div class="strip">
                        <figure>
                            <span class="ribbon off">-15%</span>
                            <img src="{{asset('frontend/img/lazy-placeholder.png')}}"
                                 data-src="{{asset('frontend/img/location_6.jpg')}}" class="owl-lazy" alt="">
                            <a href="detail-restaurant.html" class="strip_info">
                                <small>Burghers</small>
                                <div class="item_title">
                                    <h3>Alliance</h3>
                                    <small>27 Old Gloucester St</small>
                                </div>
                            </a>
                        </figure>
                        <ul>
                            <li><span class="loc_open">Now Open</span></li>
                            <li>
                                <div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="item">
                    <div class="strip">
                        <figure>
                            <span class="ribbon off">-30%</span>
                            <img src="{{asset('frontend/img/lazy-placeholder.png')}}"
                                 data-src="{{asset('frontend/img/location_7.jpg')}}" class="owl-lazy" alt="">
                            <a href="detail-restaurant.html" class="strip_info">
                                <small>Chinese</small>
                                <div class="item_title">
                                    <h3>Alliance</h3>
                                    <small>27 Old Gloucester St</small>
                                </div>
                            </a>
                        </figure>
                        <ul>
                            <li><span class="loc_closed">Now Closed</span></li>
                            <li>
                                <div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /carousel -->

            <div class="banner lazy" data-bg="url(../../../../frontend/img/banner_bg_desktop.jpg)">
                <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.2)">
                    <div>
                        <small>foogra</small>
                        <h3>More than 3000 Restaurants</h3>
                        <p>Book a table easly at the best price</p>
                        <a href="grid-listing-filterscol.html" class="btn_1">View All</a>
                    </div>
                </div>
                <!-- /wrapper -->
            </div>
            <!-- /banner -->

            <div class="row">
                <div class="col-12">
                    <div class="main_title version_2">
                        <span><em></em></span>
                        <h2>Our Very Best Deals</h2>
                        <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
                        <a href="#0">View All</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="list_home">
                        <ul>
                            <li>
                                <a href="detail-restaurant.html">
                                    <figure>
                                        <img src="{{asset('frontend/img/location_list_placeholder.png')}}"
                                             data-src="{{asset('frontend/img/location_list_1.jpg')}}" alt=""
                                             class="lazy">
                                    </figure>
                                    <div class="score"><strong>9.5</strong></div>
                                    <em>Italian</em>
                                    <h3>La Monnalisa</h3>
                                    <small>8 Patriot Square E2 9NF</small>
                                    <ul>
                                        <li><span class="ribbon off">-30%</span></li>
                                        <li>Average price $35</li>
                                    </ul>
                                </a>
                            </li>
                            <li>
                                <a href="detail-restaurant.html">
                                    <figure>
                                        <img src="{{asset('frontend/img/location_list_placeholder.png')}}"
                                             data-src="{{asset('frontend/img/location_list_2.jpg')}}" alt=""
                                             class="lazy">
                                    </figure>
                                    <div class="score"><strong>8.0</strong></div>
                                    <em>Mexican</em>
                                    <h3>Alliance</h3>
                                    <small>27 Old Gloucester St, 4563</small>
                                    <ul>
                                        <li><span class="ribbon off">-40%</span></li>
                                        <li>Average price $30</li>
                                    </ul>
                                </a>
                            </li>
                            <li>
                                <a href="detail-restaurant.html">
                                    <figure>
                                        <img src="{{asset('frontend/img/location_list_placeholder.png')}}"
                                             data-src="{{asset('frontend/img/location_list_3.jpg')}}" alt=""
                                             class="lazy">
                                    </figure>
                                    <div class="score"><strong>9.0</strong></div>
                                    <em>Sushi - Japanese</em>
                                    <h3>Sushi Gold</h3>
                                    <small>Old Shire Ln EN9 3RX</small>
                                    <ul>
                                        <li><span class="ribbon off">-25%</span></li>
                                        <li>Average price $20</li>
                                    </ul>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="list_home">
                        <ul>
                            <li>
                                <a href="detail-restaurant.html">
                                    <figure>
                                        <img src="{{asset('frontend/img/location_list_placeholder.png')}}"
                                             data-src="{{asset('frontend/img/location_list_4.jpg')}}" alt=""
                                             class="lazy">
                                    </figure>
                                    <div class="score"><strong>9.5</strong></div>
                                    <em>Vegetarian</em>
                                    <h3>Mr. Pepper</h3>
                                    <small>27 Old Gloucester St, 4563</small>
                                    <ul>
                                        <li><span class="ribbon off">-30%</span></li>
                                        <li>Average price $20</li>
                                    </ul>
                                </a>
                            </li>
                            <li>
                                <a href="detail-restaurant.html">
                                    <figure>
                                        <img src="{{asset('frontend/img/location_list_placeholder.png')}}"
                                             data-src="{{asset('frontend/img/location_list_5.jpg')}}" alt=""
                                             class="lazy">
                                    </figure>
                                    <div class="score"><strong>8.0</strong></div>
                                    <em>Chinese</em>
                                    <h3>Dragon Tower</h3>
                                    <small>22 Hertsmere Rd E14 4ED</small>
                                    <ul>
                                        <li><span class="ribbon off">-50%</span></li>
                                        <li>Average price $35</li>
                                    </ul>
                                </a>
                            </li>
                            <li>
                                <a href="detail-restaurant.html">
                                    <figure>
                                        <img src="{{asset('frontend/img/location_list_placeholder.png')}}"
                                             data-src="{{asset('frontend/img/location_list_6.jpg')}}" alt=""
                                             class="lazy">
                                    </figure>
                                    <div class="score"><strong>8.5</strong></div>
                                    <em>Pizza - Italian</em>
                                    <h3>Bella Napoli</h3>
                                    <small>135 Newtownards Road BT4</small>
                                    <ul>
                                        <li><span class="ribbon off">-45%</span></li>
                                        <li>Average price $25</li>
                                    </ul>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
            <p class="text-center d-block d-md-block d-lg-none"><a href="grid-listing-filterscol.html" class="btn_1">View
                    All</a></p>
            <!-- /button visibile on tablet/mobile only -->

            <div class="owl-carousel owl-theme carousel_1 testimonials add_top_30">
                <div class="item">
                    <blockquote>"Quaerendum liberavisse no cum, at copiosae pericula maluisset per. Eos eros etiam ei,
                        nibh
                        elit mel ad. Quo mnesarchum disputando ne, id per delectus disputationi".
                    </blockquote>
                    <figure><img src="{{asset('frontend/img/avatar-placeholder.jpg')}}"
                                 data-src="{{asset('frontend/img/avatar_1.svg')}}" alt="" class="lazy"></figure>
                    <cite>
                        <strong>James Powell</strong>
                        <span>3 October 2019</span>
                    </cite>
                </div>
                <div class="item">
                    <blockquote>"Quaerendum liberavisse no cum, at copiosae pericula maluisset per. Eos eros etiam ei,
                        nibh
                        elit mel ad. Quo mnesarchum disputando ne, id per delectus disputationi".
                    </blockquote>
                    <figure><img src="{{asset('frontend/img/avatar-placeholder.jpg')}}"
                                 data-src="{{asset('frontend/img/avatar_2.svg')}}" alt="" class="lazy"></figure>
                    <cite>
                        <strong>Frederick Smith</strong>
                        <span>25 November 2019</span>
                    </cite>
                </div>
                <div class="item">
                    <blockquote>"Quaerendum liberavisse no cum, at copiosae pericula maluisset per. Eos eros etiam ei,
                        nibh
                        elit mel ad. Quo mnesarchum disputando ne, id per delectus disputationi".
                    </blockquote>
                    <figure><img src="{{asset('frontend/img/avatar-placeholder.jpg')}}"
                                 data-src="{{asset('frontend/img/avatar_3.svg')}}" alt="" class="lazy"></figure>
                    <cite>
                        <strong>Jhon Rabbit</strong>
                        <span>31 November 2019</span>
                    </cite>
                </div>
            </div>
            <!-- /carousel testimonials-->

        </div>
        <!-- /container -->

        <div class="call_section lazy" data-bg="url(../../../../frontend/img/bg_call_section.jpg)">
            <div class="container clearfix">
                <div class="col-lg-5 col-md-6 float-right wow">
                    <div class="box_1">
                        <h3>Are you a Restaurant Owner?</h3>
                        <p>Join Us to increase your online visibility. You'll have access to even more customers who are
                            looking to enjoy your tasty dishes at home.</p>
                        <a href="submit-restaurant.blade.php" class="btn_1">Read more</a>
                    </div>
                </div>
            </div>
        </div>
        <!--/call_section-->

    </main>
    <!-- /main -->

@section('custom-script')
    <script>
        // Video Header
        HeaderVideo.init({
            container: $('.header-video'),
            header: $('.header-video--media'),
            videoTrigger: $("#video-trigger"),
            autoPlayVideo: true
        });
    </script>
    <script>
        var x, i, j, l, ll, selElmnt, a, b, c;
        /*look for any elements with the class "custom-select":*/
        x = document.getElementsByClassName("custom-select");
        l = x.length;
        for (i = 0; i < l; i++) {
            selElmnt = x[i].getElementsByTagName("select")[0];
            ll = selElmnt.length;
            /*for each element, create a new DIV that will act as the selected item:*/
            a = document.createElement("DIV");
            a.setAttribute("class", "select-selected");
            a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
            x[i].appendChild(a);
            /*for each element, create a new DIV that will contain the option list:*/
            b = document.createElement("DIV");
            b.setAttribute("class", "select-items select-hide");
            for (j = 1; j < ll; j++) {
                /*for each option in the original select element,
                create a new DIV that will act as an option item:*/
                c = document.createElement("DIV");
                c.innerHTML = selElmnt.options[j].innerHTML;
                c.addEventListener("click", function (e) {
                    /*when an item is clicked, update the original select box,
                    and the selected item:*/
                    var y, i, k, s, h, sl, yl;
                    s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                    sl = s.length;
                    h = this.parentNode.previousSibling;
                    for (i = 0; i < sl; i++) {
                        if (s.options[i].innerHTML == this.innerHTML) {
                            s.selectedIndex = i;
                            h.innerHTML = this.innerHTML;
                            y = this.parentNode.getElementsByClassName("same-as-selected");
                            yl = y.length;
                            for (k = 0; k < yl; k++) {
                                y[k].removeAttribute("class");
                            }
                            this.setAttribute("class", "same-as-selected");
                            break;
                        }
                    }
                    h.click();
                });
                b.appendChild(c);
            }
            x[i].appendChild(b);
            a.addEventListener("click", function (e) {
                /*when the select box is clicked, close any other select boxes,
                and open/close the current select box:*/
                e.stopPropagation();
                closeAllSelect(this);
                this.nextSibling.classList.toggle("select-hide");
                this.classList.toggle("select-arrow-active");
            });
        }

        function closeAllSelect(elmnt) {
            /*a function that will close all select boxes in the document,
            except the current select box:*/
            var x, y, i, xl, yl, arrNo = [];
            x = document.getElementsByClassName("select-items");
            y = document.getElementsByClassName("select-selected");
            xl = x.length;
            yl = y.length;
            for (i = 0; i < yl; i++) {
                if (elmnt == y[i]) {
                    arrNo.push(i)
                } else {
                    y[i].classList.remove("select-arrow-active");
                }
            }
            for (i = 0; i < xl; i++) {
                if (arrNo.indexOf(i)) {
                    x[i].classList.add("select-hide");
                }
            }
        }

        /*if the user clicks anywhere outside the select box,
        then close all select boxes:*/
        document.addEventListener("click", closeAllSelect);
    </script>
@endsection
@endsection

