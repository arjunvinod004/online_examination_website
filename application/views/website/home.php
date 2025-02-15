<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8">
    <title>IMELT</title>

    <!-- Mobile Specific Metas
================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Imelt">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <!-- Favicon
================================================== -->
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/website/images/logo.png">

    <!-- CSS
================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/website/css/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/website/css/all.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/website/css/animate.css">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/website/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/website/css/slick-theme.css">
    <!-- Colorbox -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/website/css/colorbox.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/website/css/style.css">

</head>

<body>
    <div class="body-inner">

        <div id="top-bar" class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <ul class="top-info text-center text-md-left">
                            <li><i class="fas fa-map-marker-alt"></i>
                                <p class="info-text">Companypady, Paipra P.O, Pezhakkapilly,
                                Muvattupuzha</p>
                            </li>
                        </ul>
                    </div>
                    <!--/ Top info end -->

                    <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                        <ul class="list-unstyled">
                            <li>
                                <a title="Facebook" href="#">
                                    <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                                </a>
                                <a title="Twitter" href="#">
                                    <span class="social-icon"><i class="fab fa-twitter"></i></span>
                                </a>
                                <a title="Instagram" href="#">
                                    <span class="social-icon"><i class="fab fa-instagram"></i></span>
                                </a>
                                <a title="Linkdin" href="#">
                                    <span class="social-icon"><i class="fab fa-github"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--/ Top social end -->
                </div>
                <!--/ Content row end -->
            </div>
            <!--/ Container end -->
        </div>
        <!--/ Topbar end -->
        <!-- Header start -->
        <header id="header" class="header-two" style="margin-bottom: 0px;">
            <div class="site-navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg navbar-light p-0">

                                <div class="logo">
                                    <a class="d-block" href="index-2.html">
                                        <img loading="lazy" src="<?php echo base_url() ?>assets/website/images/logo.png"
                                            alt="Constra">
                                    </a>
                                </div><!-- logo end -->

                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div id="navbar-collapse" class="collapse navbar-collapse">
                                    <ul class="nav navbar-nav ml-auto align-items-center">
                                        <!-- <li class="nav-item dropdown active">
                                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Home <i
                                                    class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="index.html">Home One</a></li>
                                                <li class="active"><a href="index-2.html">Home Two</a></li>
                                            </ul>
                                        </li> -->
                                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                                        <li class="nav-item"><a class="nav-link"  onclick="scroll_top_about()">About</a></li>
                                        <li class="nav-item"><a class="nav-link"  onclick="scroll_top_gallery()">Gallery</a></li>
                                        <li class="nav-item"><a class="nav-link"  onclick="scroll_top_contact()">Contact</a></li>

                                        <!-- <li class="header-get-a-quote">
                                            <a class="btn btn-primary" href="#">Get Free Quote</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <!--/ Col end -->
                    </div>
                    <!--/ Row end -->
                </div>
                <!--/ Container end -->

            </div>
            <!--/ Navigation end -->
        </header>
        <!--/ Header end -->

        <div class="banner-carousel banner-carousel-1 mb-0">
            <div class="banner-carousel-item"
                style="background-image:url('<?php echo base_url() ?>assets/website/images/slider1.jpg')">
                <div class="slider-content">
                    <div class="container h-100">
                        <div class="row align-items-center h-100">
                            <div class="col-md-12 text-center">
                                <h2 class="slide-title" data-animation-in="slideInLeft">We extrude</h2>
                                <h3 class="slide-sub-title" data-animation-in="slideInRight">Your dreams</h3>
                                <p data-animation-in="slideInLeft" data-duration-in="1.2">
                                    <a href="#" class="slider btn btn-primary">International Products</a>
                                    <a target="_blank" href="https://imeltextrusions.com/pdf/brochure.pdf" class="slider btn btn-primary border">Domestic Products</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="banner-carousel-item"
                style="background-image:url('<?php echo base_url() ?>assets/website/images/slider2.jpg')">
                <div class="slider-content">
                    <div class="container h-100">
                        <div class="row align-items-center h-100">
                            <div class="col-md-12 text-center">
                                <h2 class="slide-title" data-animation-in="slideInLeft">We extrude</h2>
                                <h3 class="slide-sub-title" data-animation-in="slideInRight">Your dreams</h3>
                                <p data-animation-in="slideInLeft" data-duration-in="1.2">
                                    <a href="#" class="slider btn btn-primary">International Products</a>
                                    <a target="_blank" href="https://imeltextrusions.com/pdf/brochure.pdf" class="slider btn btn-primary border">Domestic Products</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="banner-carousel-item"
                style="background-image:url('<?php echo base_url() ?>assets/website/images/slider3.jpg')">
                <div class="slider-content">
                    <div class="container h-100">
                        <div class="row align-items-center h-100">
                            <div class="col-md-12 text-center">
                                <h2 class="slide-title" data-animation-in="slideInLeft">We extrude</h2>
                                <h3 class="slide-sub-title" data-animation-in="slideInRight">Your dreams</h3>
                                <p data-animation-in="slideInLeft" data-duration-in="1.2">
                                    <a href="#" class="slider btn btn-primary">International Products</a>
                                    <a target="_blank" href="https://imeltextrusions.com/pdf/brochure.pdf" class="slider btn btn-primary border">Domestic Products</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <section class="call-to-action-box no-padding">
            <div class="container">
                <div class="action-style-box">
                    <div class="row align-items-center">
                        <div class="col-md-8 text-center text-md-left">
                            <div class="call-to-action-text">
                                <h3 class="action-title">We understand your needs on construction</h3>
                            </div>
                        </div><!-- Col end -->
                        <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                            <div class="call-to-action-btn">
                                <a class="btn btn-dark" href="#">Request Quote</a>
                            </div>
                        </div><!-- col end -->
                    </div><!-- row end -->
                </div><!-- Action style box -->
            </div><!-- Container end -->
        </section><!-- Action end -->

        <section id="ts-features" class="ts-features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="ts-intro">
                            <h2 class="into-title">Welcome To</h2>
                            <h3 class="into-sub-title">IMELT Extrusion Factory</h3>
                            <p>IMELT Extrusion Factory was established in 2017 in Kerala India where it has a renowned
                                position over these years for being one of the most dynamic and innovative aluminium
                                extrusion companies in India.The investments in technology made in recent years and our
                                employees high level of expertise have enabled us to offer a wide variety of aluminium
                                extrusions and profiles that meet our clients requirements.</p>
                        </div><!-- Intro box end -->

                        <div class="gap-20"></div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="ts-service-box">
                                    <span class="ts-service-icon">
                                        <i class="fas fa-trophy"></i>
                                    </span>
                                    <div class="ts-service-box-content">
                                        <h3 class="service-box-title">We've Repution for Excellence</h3>
                                    </div>
                                </div><!-- Service 1 end -->
                            </div><!-- col end -->

                            <div class="col-md-6">
                                <div class="ts-service-box">
                                    <span class="ts-service-icon">
                                        <i class="fas fa-sliders-h"></i>
                                    </span>
                                    <div class="ts-service-box-content">
                                        <h3 class="service-box-title">We Build Partnerships</h3>
                                    </div>
                                </div><!-- Service 2 end -->
                            </div><!-- col end -->
                        </div><!-- Content row 1 end -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="ts-service-box">
                                    <span class="ts-service-icon">
                                        <i class="fas fa-thumbs-up"></i>
                                    </span>
                                    <div class="ts-service-box-content">
                                        <h3 class="service-box-title">Guided by Commitment</h3>
                                    </div>
                                </div><!-- Service 1 end -->
                            </div><!-- col end -->

                            <div class="col-md-6">
                                <div class="ts-service-box">
                                    <span class="ts-service-icon">
                                        <i class="fas fa-users"></i>
                                    </span>
                                    <div class="ts-service-box-content">
                                        <h3 class="service-box-title">A Team of Professionals</h3>
                                    </div>
                                </div><!-- Service 2 end -->
                            </div><!-- col end -->
                        </div><!-- Content row 1 end -->
                    </div><!-- Col end -->

                    <div class="col-lg-5 mt-4 mt-lg-0">
                        <h3 class="into-sub-title">Our Values</h3>

                        <div class="accordion accordion-group" id="our-values-accordion">
                            <div class="card">
                                <div class="card-header p-0 bg-transparent" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-left" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Our Mission
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#our-values-accordion">
                                    <div class="card-body">
                                        Is total customer satisfaction by providing outstanding quality products service
                                        and value and continually improve our quality management system.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header p-0 bg-transparent" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-left collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            Our Goal
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#our-values-accordion">
                                    <div class="card-body">
                                        Our success is the progressive realization of our worthy goal
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header p-0 bg-transparent" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-left collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Our Vision
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#our-values-accordion">
                                    <div class="card-body">
                                        Is to be a leading aluminium extrusion company in Kerala and in India by
                                        nurturing a winning network of clients and building mutual loyalty.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Accordion end -->

                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </section><!-- Feature are end -->



        <section id="ts-features" class="ts-features pb-2">
  <div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-5">
          <div class="ts-service-box">
              <div class="ts-service-image-wrapper">
                <img loading="lazy" class="w-100" src="<?php echo base_url() ?>assets/website/images/client centric.jpg" alt="service-image">
              </div>
              <div class="d-flex">
                <div class="ts-service-box-img">
                    <!-- <img loading="lazy" src="images/icon-image/service-icon1.png" alt="service-icon"> -->
                </div>
                <div class="ts-service-info">
                    <h3 class="service-box-title"><a href="service-single.html">Client Centric</a></h3>
                    <p>We maintains the highest standards of quality and safety in all aspects , while ensuring that the focus is always on the client. We are proud of always thinking what is best for the client; offering the workable solutions and being responsible in leading the clients to success.</p>
                   
                </div>
              </div>
          </div><!-- Service1 end -->
        </div><!-- Col 1 end -->

        <div class="col-lg-4 col-md-6 mb-5">
          <div class="ts-service-box">
              <div class="ts-service-image-wrapper">
                <img loading="lazy" class="w-100" src="<?php echo base_url() ?>assets/website/images/commitment.webp" alt="service-image">
              </div>
              <div class="d-flex">
                <div class="ts-service-box-img">
                    <!-- <img loading="lazy" src="images/icon-image/service-icon2.png" alt="service-icon"> -->
                </div>
                <div class="ts-service-info">
                    <h3 class="service-box-title"><a href="service-single.html">Commitment & Accountability</a></h3>
                    <p>Fulfill responsibilities and achieve profitable growth. Celebrate our successes. Do the right thing, every time.</p>
                   
                </div>
              </div>
          </div><!-- Service2 end -->
        </div><!-- Col 2 end -->

        <div class="col-lg-4 col-md-6 mb-5">
          <div class="ts-service-box">
              <div class="ts-service-image-wrapper">
                <img loading="lazy" class="w-100" src="<?php echo base_url() ?>assets/website/images/proffessional.jpg" alt="service-image">
              </div>
              <div class="d-flex">
                <div class="ts-service-box-img">
                    <!-- <img loading="lazy" src="images/icon-image/service-icon3.png" alt="service-icon"> -->
                </div>
                <div class="ts-service-info">
                    <h3 class="service-box-title"><a href="service-single.html">Professional Excellence</a></h3>
                    <p>We has a highly experienced and dedicated team of engineers, supervisors and managers offering quality products based on our accumulated, extensive and profound knowledge and experience.</p>
                   
                </div>
              </div>
          </div><!-- Service3 end -->
        </div><!-- Col 3 end -->
    </div><!-- Content row end -->
  </div><!-- Container end -->
</section>



        <section id="facts" class="facts-area dark-bg">
            <div class="container">
                <div class="facts-wrapper">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 ts-facts">
                            <div class="ts-facts-img">
                                <img loading="lazy"
                                    src="https://demo.themefisher.com/constra-bootstrap/images/icon-image/fact1.png"
                                    alt="facts-img">
                            </div>
                            <div class="ts-facts-content">
                                <h2 class="ts-facts-num"><span class="counterUp" data-count="1789">0</span></h2>
                                <h3 class="ts-facts-title">Total Projects</h3>
                            </div>
                        </div><!-- Col end -->

                        <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0">
                            <div class="ts-facts-img">
                                <img loading="lazy"
                                    src="https://demo.themefisher.com/constra-bootstrap/images/icon-image/fact2.png"
                                    alt="facts-img">
                            </div>
                            <div class="ts-facts-content">
                                <h2 class="ts-facts-num"><span class="counterUp" data-count="647">0</span></h2>
                                <h3 class="ts-facts-title">Staff Members</h3>
                            </div>
                        </div><!-- Col end -->

                        <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                            <div class="ts-facts-img">
                                <img loading="lazy"
                                    src="https://demo.themefisher.com/constra-bootstrap/images/icon-image/fact3.png"
                                    alt="facts-img">
                            </div>
                            <div class="ts-facts-content">
                                <h2 class="ts-facts-num"><span class="counterUp" data-count="4000">0</span></h2>
                                <h3 class="ts-facts-title">Hours of Work</h3>
                            </div>
                        </div><!-- Col end -->

                        <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                            <div class="ts-facts-img">
                                <img loading="lazy"
                                    src="https://demo.themefisher.com/constra-bootstrap/images/icon-image/fact4.png"
                                    alt="facts-img">
                            </div>
                            <div class="ts-facts-content">
                                <h2 class="ts-facts-num"><span class="counterUp" data-count="44">0</span></h2>
                                <h3 class="ts-facts-title">Countries Experience</h3>
                            </div>
                        </div><!-- Col end -->

                    </div> <!-- Facts end -->
                </div>
                <!--/ Content row end -->
            </div>
            <!--/ Container end -->
        </section><!-- Facts end -->



        <section id="project-area" class="project-area solid-bg">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <h2 class="section-title text-white">Work of Excellence</h2>
                        <h3 class="section-sub-title">Our Gallery</h3>
                    </div>
                </div>
                <!--/ Title row end -->
    
                <div class="row">
                    <div class="col-12">
                        <!-- <div class="shuffle-btn-group">
                            <label class="active" for="all">
                                <input type="radio" name="shuffle-filter" id="all" value="all" checked="checked">Show
                                All
                            </label>
                            <label for="commercial">
                                <input type="radio" name="shuffle-filter" id="commercial" value="commercial">Commercial
                            </label>
                            <label for="education">
                                <input type="radio" name="shuffle-filter" id="education" value="education">Education
                            </label>
                            <label for="government">
                                <input type="radio" name="shuffle-filter" id="government" value="government">Government
                            </label>
                            <label for="infrastructure">
                                <input type="radio" name="shuffle-filter" id="infrastructure"
                                    value="infrastructure">Infrastructure
                            </label>
                            <label for="residential">
                                <input type="radio" name="shuffle-filter" id="residential"
                                    value="residential">Residential
                            </label>
                            <label for="healthcare">
                                <input type="radio" name="shuffle-filter" id="healthcare" value="healthcare">Healthcare
                            </label>
                        </div> -->
                        <!-- project filter end -->


                        <div class="row shuffle-wrapper">
                            <div class="col-1 shuffle-sizer"></div>
                            <?php if (!empty($categories)): ?>
        <?php foreach ($categories as $category): ?>
            <div class="col-lg-3 col-sm-6 shuffle-item"
                 data-groups='["government","healthcare"]'>
                <div class="project-img-container">
                    <a class="gallery-popup"
                       href="<?php echo base_url('uploads/categories/' . $category['category_img']); ?>"
                       aria-label="project-img">
                        <img class="img-fluid"
                             src="<?php echo base_url('uploads/categories/' . $category['category_img']); ?>"
                             alt="project-img">
                        <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                    </a>
                    <div class="project-item-info">
                        <div class="project-item-info-content">
                            <h3 class="project-item-title">
                                <a href="projects-single.html"><?php echo $category['category_code']; ?></a>
                            </h3>
                            <!-- <p class="project-cat">Category</p>  -->
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No categories found.</p>
    <?php endif; ?>
 
                            <!-- <div class="col-lg-4 col-sm-6 shuffle-item"
                                data-groups="[&quot;government&quot;,&quot;healthcare&quot;]">
                                <div class="project-img-container">
                                    <a class="gallery-popup"
                                        href="https://demo.themefisher.com/constra-bootstrap/images/projects/project1.jpg"
                                        aria-label="project-img">
                                        <img class="img-fluid"
                                            src="https://demo.themefisher.com/constra-bootstrap/images/projects/project1.jpg"
                                            alt="project-img">
                                        <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                                    </a>
                                    <div class="project-item-info">
                                        <div class="project-item-info-content">
                                            <h3 class="project-item-title">
                                                <a href="projects-single.html">Capital Teltway Building</a>
                                            </h3>
                                            <p class="project-cat">Commercial, Interiors</p>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            
                            

                        </div><!-- shuffle end -->

                    </div>

                    <div class="col-12">
                        <div class="general-btn text-center">
                            <a class="btn btn-primary" href="https://imeltextrusions.com/pdf/brochure.pdf">View All Products</a>
                        </div>
                    </div>

                </div><!-- Content row end -->
            </div>
            <!--/ Container end -->
        </section>
        <!-- Project area end -->

        <!--/ News end -->

        <footer id="footer" class="footer bg-overlay">
            <div class="footer-main">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-3 col-md-6 footer-widget footer-about">
                            <h3 class="widget-title">About Us</h3>
                            <img loading="lazy" width="100px" class="footer-logo"
                                src="<?php echo base_url() ?>assets/website/images/logo.png"
                                alt="Constra">
                            <p>IMELT Extrusion Factory was established in 2017 in Kerala India where it has a renowned position over these years for being one of the most dynamic and innovative aluminium extrusion companies in India.</p>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="#" aria-label="Facebook"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" aria-label="Twitter"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                    <li><a href="#" aria-label="Instagram"><i
                                                class="fab fa-instagram"></i></a></li>
                                    <li><a href="#" aria-label="Github"><i
                                                class="fab fa-github"></i></a></li>
                                </ul>
                            </div><!-- Footer social end -->
                        </div><!-- Col end -->

                        <div class="col-lg-3 col-md-6 footer-widget mt-5 mt-md-0">
                            <h3 class="widget-title">Corporate Address</h3>
                            <ul class="list-arrow">
                                <li><a href="#">ABBA Tower,Mavinchuvadu, A.M Road,
                                    Perumbavoor - 683547.</a></li>
                                <li><a href="#">info@imeltextrusions.com</a></li>
                                <li><a href="#">+91 7994757964</a></li>
                                <!-- <li><a href="service-single.html">Design and Build</a></li>
                                <li><a href="service-single.html">Self-Perform Construction</a></li> -->
                            </ul>
                            <!-- <div class="working-hours">
                            Companypady, Paipra P.O, Pezhakkapilly,
                                 Muvattupuzha
                                <br><br> Monday - Friday: <span class="text-right">10:00 - 16:00 </span>
                                <br> Saturday: <span class="text-right">12:00 - 15:00</span>
                                <br> Sunday and holidays: <span class="text-right">09:00 - 12:00</span>
                            </div> -->
                        </div>

                        
                        
                        <!-- Col end -->

                        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
                            <h3 class="widget-title">Factory Address</h3>
                            <ul class="list-arrow">
                                <li><a href="#">Companypady, Paipra P.O, Pezhakkapilly,
                                Muvattupuzha - 686673</a></li>
                                <li><a href="#">+91 7994757970</a></li>
                                <!-- <li><a href="#">Construction Management</a></li> -->
                                <!-- <li><a href="service-single.html">Design and Build</a></li>
                                <li><a href="service-single.html">Self-Perform Construction</a></li> -->
                            </ul>
                        </div><!-- Col end -->

                        <div class="col-lg-3 col-md-6 footer-widget mt-5 mt-md-0">
                            <h3 class="widget-title">Usa Address</h3>
                            <ul class="list-arrow">
                                <li><a href="#">148 E Garry Ave Santa Ana, CA 92707-4201</a></li>
                                <li><a href="#">info@imeltextrusions.com</a></li>
                                <li><a href="#">+91 7994757964</a></li>
                                <!-- <li><a href="service-single.html">Design and Build</a></li>
                                <li><a href="service-single.html">Self-Perform Construction</a></li> -->
                            </ul>
                            <!-- <div class="working-hours">
                            Companypady, Paipra P.O, Pezhakkapilly,
                                 Muvattupuzha
                                <br><br> Monday - Friday: <span class="text-right">10:00 - 16:00 </span>
                                <br> Saturday: <span class="text-right">12:00 - 15:00</span>
                                <br> Sunday and holidays: <span class="text-right">09:00 - 12:00</span>
                            </div> -->
                        </div>
                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div><!-- Footer main end -->

            <div class="copyright">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="copyright-info text-center text-md-left">
                                <span>Copyright &copy; <script>
                                    document.write(new Date().getFullYear())
                                    </script>  Developed by <a
                                        href="https://www.coinoneglobal.com/">Coinone Global Solutions</a></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="footer-menu text-center text-md-right">
                                <ul class="list-unstyled">
                                    <li><a href="#">Home</a></li>
                                    <li><a onclick="scroll_top_about()">About</a></li>
                                    <li><a  onclick="scroll_top_gallery()">Gallery</a></li>
                                    <li><a onclick="scroll_top_contact()">Contact</a></li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div><!-- Row end -->

                    <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
                        <button class="btn btn-primary" title="Back to Top">
                            <i class="fa fa-angle-double-up"></i>
                        </button>
                    </div>

                    <div class="scroll-to-top--1">
        <a href="https://api.whatsapp.com/send/?phone=%2B917994757970&text&type=phone_number&app_absent=0"
            target="_blank"> <span class="fab fa-whatsapp"></span>
            <!-- <i class="fab fa-whatsapp-square"></i> -->
        </a>
    </div>
    <div class="scroll-to-top--2">
        <a href="tel:+917994757964"><span class="icon fa fa-phone"></span>
        </a>
    </div>

                </div><!-- Container end -->
            </div><!-- Copyright end -->
        </footer><!-- Footer end -->


        <!-- Javascript Files
  ================================================== -->

        <!-- initialize jQuery Library -->
        <script src="<?php echo base_url() ?>/assets/website/js/jquery.min.js"></script>
        <!-- Bootstrap jQuery -->
        <script src="<?php echo base_url() ?>/assets/website/js/bootstrap.min.js" defer></script>
        <!-- Slick Carousel -->
        <script src="<?php echo base_url() ?>/assets/website/js/slick.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/website/js/slick-animation.min.js"></script>
        <!-- Color box -->
        <script src="<?php echo base_url() ?>/assets/website/js/colorbox.js"></script>
        <!-- shuffle -->
        <script src="<?php echo base_url() ?>/assets/website/js/shuffle.min.js" defer></script>
        <!-- Template custom -->
        <script src="<?php echo base_url() ?>/assets/website/js/script.js"></script>
        <script src="<?php echo base_url() ?>/assets/website/js/custom.js"></script>

    </div><!-- Body inner end -->
</body>

</html>