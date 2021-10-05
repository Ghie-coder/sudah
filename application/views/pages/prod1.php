<div class="hero-image" style="background-image: url(<?php echo base_url('../assets/img/mainbanner.jpg');?>);">
  <div class="hero-text">
    <h3 style="font-size:40px">Pet Shop</h3>
    <p  style="font-size:20px">Treat-Love-Care your pet, visit our one-stop shop for your pet needs!!</p>
  </div>
</div>

<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="<?php echo base_url('../');?>assets/img/products/jerhighred1.jpg" alt="Card image cap" id="product-detail">
                </div>
                <div class="row">
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-dark bi-chevron-left"></i>
                            <span class="sr-only"></span>
                        </a>
                    </div>
                    <!--End Controls-->
                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                        <div class="carousel-inner product-links-wap" role="listbox">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="<?php echo base_url('../');?>assets/img/products/jerhighred1.jpg" alt="Product Image 1">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="<?php echo base_url('../');?>assets/img/products/jerhighred2.jpg" alt="Product Image 2">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="<?php echo base_url('../');?>assets/img/products/jerhighred3.jpg" alt="Product Image 3">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Carousel Wrapper-->
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-dark bi-chevron-right"></i>
                            <span class="sr-only"></span>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2">JERHIGH STRAWBERRY 70g.</h1>
                        <p class="h3 py-2">90php</p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Dog Treats</h6>
                            </li>
                        </ul>

                        <h6>Description:</h6>
                        <p>JerHigh Strawberry Stick is a premium snack filled with nutrients and vitamins to make your dog healthy and strong, 
                        with a delicious strawberry flavor that your dog will not be able to resist. Comes in stick form, 
                        it is convenient for you to feed and carry while easy and fun for them to eat.
                        <br/><br/>JerHigh Strawberry Stick is made from real chicken meat and has been meticulously prepared by our highly experienced expert team. 
                        It has been researched and tested in the laboratory to ensure that the treat is hygienic, safe, 
                        and filled with all of the nutrients man’s best friend needs to stay healthy and happy. 
                        You can rest assured that JerHigh Strawberry Stick is the perfect reward that your favorite canine deserves.</p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Avaliable Flavor :</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>Starwberry/ Banana/ Blueberry</strong></p>
                            </li>
                        </ul>

                        <h6>Guaranteed Analysis:</h6>
                        <ul class="list-unstyled pb-3">
                            <li>Protein	20%min</li>
                            <li>Crude fat	9%min</li>
                            <li>Crude fiber	6%max</li>
                            <li>Moisture	20%max</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Close Content -->


<!-- Start Script -->
<script src="<?php echo base_url('../');?>assets/js/jquery-1.11.0.min.js"></script>
<script src="<?php echo base_url('../');?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url('../');?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('../');?>assets/js/templatemo.js"></script>
<script src="<?php echo base_url('../');?>assets/js/custom.js"></script>
<!-- End Script -->

<!-- Start Slider Script -->
<script src="<?php echo base_url('../');?>assets/js/slick.min.js"></script>
<script>
    $('#carousel-related-product').slick({
        infinite: true,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 3,
        dots: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            }
        ]
    });
</script>
<!-- End Slider Script -->
