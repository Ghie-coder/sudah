<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- ======= hero Section ======= -->
<section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url(<?php echo base_url('../assets/img/hero-carousel/vet.jpg');?>)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">From large to small we give quality care to all.</h2>
                <!---p class="animate__animated animate__fadeInUp">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p--->
                <a href="#" onclick="document.getElementById('id01').style.display='block'" class="btn-get-started scrollto animate__animated animate__fadeInUp">Book an appointment</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(<?php echo base_url('../assets/img/hero-carousel/petshop.jpg');?>)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Pet Supplies</h2>
                <p class="animate__animated animate__fadeInUp">Treat-Love-Care your pet, visit our one-stop shop for your pet needs!!</p>
                <a href="<?php echo base_url('catalog');?>" class="btn-get-started scrollto animate__animated animate__fadeInUp">Product Catalog</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(<?php echo base_url('../assets/img/hero-carousel/kitten.jpg');?>)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">We provide top-notch care for your furry BFFs.</h2>
                <!---p class="animate__animated animate__fadeInUp">We provide top-notch care for your furry BFFs.</p--->
                <a href="<?php echo base_url('about-us');?>#services" class="btn-get-started scrollto animate__animated animate__fadeInUp">Our Services</a>
              </div>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= Featured Services Section Section ======= -->
    <section id="featured-services">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 box">
            <i class="bi bi-house"></i>
            <h4 class="title"><a href="">Home Service</a></h4>
            <p class="description">We care for you and value your safety in this time of pandemic.
             That is why we offers HOME SERVICE vaccination and deworming for your furbabies.</p>
          </div>

          <div class="col-lg-4 box box-bg">
            <i class="bi bi-card-checklist"></i>
            <h4 class="title"><a href="">Vet Dental Care</a></h4>
            <p class="description">Dental health is a very important part of your pet's overall health,
             and dental problems can cause, or be caused by, other health problems. Your pet's teeth and gums should be checked at least once a year by your veterinarian to check for early signs of a problem and to keep your pet's mouth healthy.</p>
          </div>

          <div class="col-lg-4 box">
            <i class="bi bi-binoculars"></i>
            <h4 class="title"><a href="">Pet Boarding & Lodging</a></h4>
            <p class="description">Rather than merely housing your pet and making sure it gets the basic-food, water, and shelter-a pet boarding service ensures your pet is happy, active, and well-adjusted while you're away.</p>
          </div>

        </div>
      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>About Us</h3>
          <p>Sudah Veterinary Clinic is committed to provide wellness, primary healthcare, medical and surgical diagnosis, treatment, and your one-stop shop for your pet needs.</p>
        </header>

        <div class="row about-cols">

        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url('../');?>assets/img/amission.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="bi bi-bar-chart"></i></div>
              </div>
              <h2 class="title">Our Mission</h2>
              <p>
              “Our unwavering commitment to improving the lives of our patient’s and helping each and every one of them enjoy their healthy
               years as possible. It is this effort that enables us to give the most effective, comprehensive care available.”  
              </p>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url('../');?>assets/img/astory.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="bi bi-brightness-high"></i></div>
              </div>
              <h2 class="title">Our Story</h2>
              <p>Sudah Vet is a veterinary clinic owned by Ms. Glenda David. The first was established in June 23, 2014 and it is located in Dau, Mabalacat, Pampanga. It has seven branches in total, and its 
                main office is located in Angeles City. Back then, it was a mere grooming area and pet supplies, but as the demand of veterinary grows, licensed Veterinarians started to come by and catered to various animals and the services grew larger.
                It offers an affordable consultation fee for pet owners, and licensed veterinary doctors handle pets.
              </p>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="about-col">
              <div class="img">
                <img src="<?php echo base_url('../');?>assets/img/avision.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="bi bi-calendar4-week"></i></div>
              </div>
              <h2 class="title">Our Vision</h2>
              <p>
              “Our Branches are clean, spacious and equipped for all of your pet’s veterinary care needs.”</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action">
      <div class="container text-center" data-aos="zoom-in">
        <h3>Clinic Hours</h3>
        <p>Monday - Sunday: 8am to 7pm</p>
      </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= Services Section ======= -->
    <section id="services">
      <div class="container" data-aos="fade-up">
        <header class="section-header wow fadeInUp">
          <h3>Services</h3>
          <p>We offer various services for your pet needs.</p>
        </header>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="100">
          <img src="<?php echo base_url('../');?>assets/img/services/diagnostic.jpg" class="card-img-top" alt="..."> 
          <div class="icon"><i class="bi bi-droplet-half"></i></div>
          <h4 class="title"><a href="<?php echo base_url('about-us');?>">Diagnostic Services</a></h4>
          <p class="description">Diagnostic testing can identify problems your pet may be experiencing so that proper treatment can begin before a condition worsens.</p>
        </div>
        <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="200">
          <img src="<?php echo base_url('../');?>assets/img/services/wellness.jpg" class="card-img-top" alt="..."> 
          <div class="icon"><i class="bi bi-card-checklist"></i></div>
          <h4 class="title"><a href="<?php echo base_url('wellness');?>">General Wellness</a></h4>
          <p class="description">Annual wellness exams evaluate your pets overall health, detect problems before they become serious, and keep them on track to live a long, healthy life.</p>
        </div>
        <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="300">
          <img src="<?php echo base_url('../');?>assets/img/services/surgery.jpg" class="card-img-top" alt="..."> 
          <div class="icon"><i class="bi bi-stars"></i></div>
          <h4 class="title"><a href="<?php echo base_url('surgery');?>">Surgery and Other Services</a></h4>
          <p class="description">Surgeries are performed under anesthesia for various conditions. Our full-service hospitals offer a variety of outpatient surgeries for pets.</p>
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Team Section ======= -->
    <section id="team">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3>Team</h3>
          <p>Protecting the health of animals and society.</p>
        </div>
        <div class="row">
    <div class="col-lg-3 col-md-6">
      <div class="member" data-aos="fade-up" data-aos-delay="100">
        <img src="<?php echo base_url('../');?>assets/img/team/vetsunset.jpg" class="img-fluid" alt="">
        <div class="member-info">
          <div class="member-info-content">
            <h4>Dr. Edquiban</h4>
            <span>Veterinarian -Sunset branch</span>
            <div class="social">
              <a href="https://www.facebook.com/hooraeee"><i class="bi bi-facebook"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
      <div class="col-lg-3 col-md-6">
        <div class="member" data-aos="fade-up" data-aos-delay="200">
          <img src="<?php echo base_url('../');?>assets/img/team/vetbamban.jpg" class="img-fluid" alt="">
          <div class="member-info">
            <div class="member-info-content">
              <h4>Dr. Dollente</h4>
              <span>Veterinarian -Bamban branch</span>
              <div class="social">
                <a href="https://www.facebook.com/jirahlyn.dollente"><i class="bi bi-facebook"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="member" data-aos="fade-up" data-aos-delay="300">
          <img src="<?php echo base_url('../');?>assets/img/team/vetmagalang.jpg" class="img-fluid" alt="">
          <div class="member-info">
            <div class="member-info-content">
              <h4>Dr. Castro</h4>
              <span>Veterinarian -Magalang branch</span>
              <div class="social">
                <a href="https://www.facebook.com/ryan.castro.33483"><i class="bi bi-facebook"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="member" data-aos="fade-up" data-aos-delay="400">
          <img src="<?php echo base_url('../');?>assets/img/team/johndoe.jpg" class="img-fluid" alt="">
          <div class="member-info">
            <div class="member-info-content">
              <h4>Dr. Cuevas</h4>
              <span>Veterinarian -San Fernando branch</span>
              <div class="social">
                <a href="https://www.facebook.com/profile.php?id=100052634010683"><i class="bi bi-facebook"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div><a href="<?php echo base_url('teambranch');?>">View more </a>
  </div>
</section><!-- End Team Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Testimonials</h3>
        </header>

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?php echo base_url('../');?>assets/img/team/jud.jpg" class="testimonial-img" alt="">
                <h3>Jud</h3>
                <h4>Pet Owner</h4>
                <p>
                  <img src="<?php echo base_url('../');?>assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                  Amazing experience! Very caring and professional.
                  <img src="<?php echo base_url('../');?>assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?php echo base_url('../');?>assets/img/team/l.jpg" class="testimonial-img" alt="">
                <h3>Lj</h3>
                <h4>Pet Owner</h4>
                <p>
                  <img src="<?php echo base_url('../');?>assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                  They are wonderful caring people who really care about the animals(and their human companions)!!!
                  <img src="<?php echo base_url('../');?>assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?php echo base_url('../');?>assets/img/team/irma.jpg" class="testimonial-img" alt="">
                <h3>Irma</h3>
                <h4>Pet Owner</h4>
                <p>
                  <img src="<?php echo base_url('../');?>assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                  Best care my pets have ever received! Staff is so friendly and helpful, Thanks Sudah!
                  <img src="<?php echo base_url('../');?>assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?php echo base_url('../');?>assets/img/team/pau.jpg" class="testimonial-img" alt="">
                <h3>Pauline</h3>
                <h4>Pet Owner</h4>
                <p>
                  <img src="<?php echo base_url('../');?>assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                  Amazing experience! Very caring and professional.
                  <img src="<?php echo base_url('../');?>assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="<?php echo base_url('../');?>assets/img/team/ghie.jpg" class="testimonial-img" alt="">
                <h3>Girlie</h3>
                <h4>Pet Owner</h4>
                <p>
                  <img src="<?php echo base_url('../');?>assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                  They are wonderful caring people who really care about the animals(and their human companions)!!!
                  <img src="<?php echo base_url('../');?>assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h3>Contact Us</h3>
          <p> For other concerns/inquiries, please do not hesitate to send us a private message or call.</p>
        </div>

        <div class="row contact-info">
          <div class="form col-md">
            <form action="" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-group col-md">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->
    
  </main><!-- End #main -->
