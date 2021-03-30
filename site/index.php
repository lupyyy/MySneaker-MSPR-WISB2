<?php
include "./src/connect_database.php";
include "./src/head.php";
include "./src/navbar.php";
?>


<body id="page-top">

    <!-- Header -->
    <header class="masthead d-flex">
        <div class="container text-center my-auto">
            <h1 class="mb-1 titre-blanc">My Sneakers</h1>
            <h3 class="mb-5 titre-blanc">
                <em>Le site de suivi n°1 sur la Sneakers</em>
            </h3>
            <a class="btn btn-primary btn-xl js-scroll-trigger btn-gradient" href="#detail">Découvrir le concept</a>
        </div>
        <div class="overlay"></div>
    </header>

    <!-- Detail du concept -->
    <section class="content-section bg-secondary text-white text-center" id="detail">
        <div class="container">
            <div class="content-section-heading">
                <h3 class="text-secondary mb-0">Le concept</h3>
                <h2 class="mb-5">Un service sur 4 points</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                    <span class="service-icon rounded-circle mx-auto mb-3">
                        <i class="icon-screen-smartphone"></i>
                    </span>
                    <h4>
                        <strong>Point 1</strong>
                    </h4>
                    <p class="text-faded mb-0">Lorem ipsum</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                    <span class="service-icon rounded-circle mx-auto mb-3">
                        <i class="icon-pencil"></i>
                    </span>
                    <h4>
                        <strong>Point 2</strong>
                    </h4>
                    <p class="text-faded mb-0">Lorem ipsum</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                    <span class="service-icon rounded-circle mx-auto mb-3">
                        <i class="icon-like"></i>
                    </span>
                    <h4>
                        <strong>Point 3</strong>
                    </h4>
                    <p class="text-faded mb-0">Lorem ipsum </p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <span class="service-icon rounded-circle mx-auto mb-3">
                        <i class="icon-mustache"></i>
                    </span>
                    <h4>
                        <strong>Point 4</strong>
                    </h4>
                    <p class="text-faded mb-0">Lorem ipsum</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio -->
    <section class="content-section" id="portfolio">
        <div class="container">
            <div class="content-section-heading text-center">
                <h3 class="text-secondary mb-0">Portfolio</h3>
                <h2 class="mb-5">Recent Projects</h2>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <a class="portfolio-item" href="#!">
                        <div class="caption">
                            <div class="caption-content">
                                <div class="h2">Stationary</div>
                                <p class="mb-0">A yellow pencil with envelopes on a clean, blue backdrop!</p>
                            </div>
                        </div>
                        <img class="img-fluid" src="assets/img/portfolio-1.jpg" alt="">
                    </a>
                </div>
                <div class="col-lg-6">
                    <a class="portfolio-item" href="#!">
                        <div class="caption">
                            <div class="caption-content">
                                <div class="h2">Ice Cream</div>
                                <p class="mb-0">A dark blue background with a colored pencil, a clip, and a tiny ice cream cone!</p>
                            </div>
                        </div>
                        <img class="img-fluid" src="assets/img/portfolio-2.jpg" alt="">
                    </a>
                </div>
                <div class="col-lg-6">
                    <a class="portfolio-item" href="#!">
                        <div class="caption">
                            <div class="caption-content">
                                <div class="h2">Strawberries</div>
                                <p class="mb-0">Strawberries are such a tasty snack, especially with a little sugar on top!</p>
                            </div>
                        </div>
                        <img class="img-fluid" src="assets/img/portfolio-3.jpg" alt="">
                    </a>
                </div>
                <div class="col-lg-6">
                    <a class="portfolio-item" href="#!">
                        <div class="caption">
                            <div class="caption-content">
                                <div class="h2">Workspace</div>
                                <p class="mb-0">A yellow workspace with some scissors, pencils, and other objects.</p>
                            </div>
                        </div>
                        <img class="img-fluid" src="assets/img/portfolio-4.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="content-section bg-primary text-white">
        <div class="container text-center">
            <h2 class="mb-4">The buttons below are impossible to resist...</h2>
            <a href="#!" class="btn btn-xl btn-light mr-4">Click Me!</a>
            <a href="#!" class="btn btn-xl btn-dark">Look at Me!</a>
        </div>
    </section>

    <!-- Map -->
    <div id="contact" class="map">
        <iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
        <br />
        <small>
            <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
        </small>
    </div>

</body>
<?php
include "./src/footer.php"
?>

</html>