<div class="product-single-container product-single-default product-quick-view">
    <div class="row row-sparse">
        <div class="col-lg-6 product-single-gallery">
            <div class="product-slider-container">
                <div class="product-single-carousel owl-carousel owl-theme">
                    <div class="product-item">
                        <img class="product-single-image" src="assets/images/products/zoom/product-1.jpg" data-zoom-image="assets/images/products/zoom/product-1-big.jpg"/>
                    </div>
                    <div class="product-item">
                        <img class="product-single-image" src="assets/images/products/zoom/product-2.jpg" data-zoom-image="assets/images/products/zoom/product-2-big.jpg"/>
                    </div>
                    <div class="product-item">
                        <img class="product-single-image" src="assets/images/products/zoom/product-3.jpg" data-zoom-image="assets/images/products/zoom/product-3-big.jpg"/>
                    </div>
                    <div class="product-item">
                        <img class="product-single-image" src="assets/images/products/zoom/product-4.jpg" data-zoom-image="assets/images/products/zoom/product-4-big.jpg"/>
                    </div>
                </div>
                <!-- End .product-single-carousel -->
            </div>
            <div class="prod-thumbnail owl-dots" id='carousel-custom-dots'>
                <div class="owl-dot">
                    <img src="assets/images/products/zoom/product-1.jpg"/>
                </div>
                <div class="owl-dot">
                    <img src="assets/images/products/zoom/product-2.jpg"/>
                </div>
                <div class="owl-dot">
                    <img src="assets/images/products/zoom/product-3.jpg"/>
                </div>
                <div class="owl-dot">
                    <img src="assets/images/products/zoom/product-4.jpg"/>
                </div>
            </div>
        </div><!-- End .product-single-gallery -->

        <div class="col-lg-6 product-single-details">
            <h1 class="product-title"><?php echo $product[0]->nombre; ?></h1>

            <div class="ratings-container">
                <div class="product-ratings">
                    <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                </div><!-- End .product-ratings -->

                <a href="#" class="rating-link">( 6 Reviews )</a>
            </div><!-- End .product-container -->

            <div class="price-box">
                <span class="product-price">$ <?php echo number_format($product[0]->precio) ?></span>
            </div><!-- End .price-box -->

            <div class="product-desc">
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.</p>
            </div><!-- End .product-desc -->

            <div class="product-filters-container">
                <div class="product-single-filter">
                    <label>Colors:</label>
                    <ul class="config-swatch-list">
                        <li class="active">
                            <a href="#" style="background-color: #0188cc;"></a>
                        </li>
                        <li>
                            <a href="#" style="background-color: #ab6e6e;"></a>
                        </li>
                        <li>
                            <a href="#" style="background-color: #ddb577;"></a>
                        </li>
                        <li>
                            <a href="#" style="background-color: #6085a5;"></a>
                        </li>
                    </ul>
                </div><!-- End .product-single-filter -->
            </div><!-- End .product-filters-container -->

            <hr class="divider">

            <div class="product-action">
                <div class="product-single-qty">
                    <input class="horizontal-quantity form-control" type="text">
                </div><!-- End .product-single-qty -->

                <a href="cart.html" class="btn btn-dark add-cart" title="Add to Cart">Add to Cart</a>
            </div><!-- End .product-action -->

            <hr class="divider">

            <div class="product-single-share">
                <label class="sr-only">Share:</label>

                <!-- www.addthis.com share plugin-->
                <div class="addthis_inline_share_toolbox"></div>

                <a href="#" class="add-wishlist" title="Add to Wishlist">Add to Wishlist</a>
            </div><!-- End .product single-share -->
        </div><!-- End .product-single-details -->
    </div><!-- End .row -->
</div><!-- End .product-single-container -->