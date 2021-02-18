@extends('layout/main')
<!-- ambil dari template main.blade.php harus pakai blade di file name dan tanpa blade di page -->

@section('container')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <img src="logo.png" class="img-fluid" alt="my logo">
        <h1>Welcome to <span>My Website</span>
        </h1>
        <!-- <h2>We are team of talanted designers making websites with Bootstrap</h2>
            <div class="d-flex">
                <a href="#about" class="btn-get-started scrollto">Get Started</a>
                <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"> Watch Video <i class="icofont-play-alt-2"></i></a>
            </div> -->
    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4 class="title"><a href="">Website Development</a></h4>
                        <p class="description">Create a website using PHP Laravel, JQuery & Ajax, CSS Bootstrap</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-chalkboard"></i></div>
                        <h4 class="title"><a href="">Desktop Development</a></h4>
                        <p class="description">Create a Desktop Application Using Visual Basic & Visual .Net</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="bx bx-data"></i></div>
                        <h4 class="title"><a href="">Database Administrator</a></h4>
                        <p class="description">Using DBMS including MSSQL, MySQL and MS Access</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="bx bxl-adobe"></i></div>
                        <h4 class="title"><a href="">Graphic Design</a></h4>
                        <p class="description">Using Adobe System including Photoshop, Premiere and After Effect</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>About Me</h2>
                <!-- <h3>More About Me in the <span>Portfolio</span></h3> -->
                <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
            </div>

            <div class="row">

                <div class="col-lg-12 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="mb-4">Fauzi Dika Fandra | 04 Desember 1986 | IT Development Manager</h3>
                    <p class="font-italic">
                        Over the last eleven years, I worked in the Information Technology (IT) field at several
                        company. My last position was as IT Assistant Manager at PT. STAR MAJU SENTOSA,
                        a retail company selling fashion products and household appliances, for 5 years.
                        Previously I worked at PT. Berca Sportindo which is also a retail company
                        manufacture and sell shoes.
                    </p>
                    <p class="font-italic">
                        During my work as an IT part of several companies, I was used to working in teams, either
                        as a member or team leader. When I lead a team, my principles are
                        ensure all work is well communicated and ready to discuss and receive feedback
                        from team members. This is necessary so that the work atmosphere remains conducive and the work can
                        completed on time effectively and efficiently. Objectively, I have language skills
                        good programming, database and data analysis.
                    </p>
                    <p class="font-italic">
                        Where I last worked, I led the developer, data analyst, and infrastructure divisions
                        company. This team is in charge of 6 IT staff in the head office and 9 IT personnel in retail stores with
                        the specific needs of each department. The work I have handled includes
                        needs for internal applications, data, reporting to computer and network equipment requirements. Every
                        work I can do well.
                    </p>
                    <p class="font-italic">
                        I really enjoy my job as IT support because it gives me the opportunity to
                        developing following the advancement of technology and information related to my field of work. Working in
                        This field also provides an opportunity for me to improve in myself
                        to keep learning new things. Personally, I have the ability to do well
                        adapt and socialize quickly especially in adjusting the organizational culture.
                    </p>
                    <ul>
                        <li>
                            <i class="bx bx-world"></i>
                            <div class="mr-2">
                                <h5>Website Created</h5>
                                <p>Company Profile, Dashboard, Reporting etc.</p>
                            </div>
                            <i class="bx bx-chalkboard"></i>
                            <div class="mr-2">
                                <h5>Desktop Created</h5>
                                <p>POS System, HR System, Inventory System etc.</p>
                            </div>
                            <i class="bx bx-data"></i>
                            <div class="mr-2">
                                <h5>Database Administrator</h5>
                                <p>Query Builder, Reporting Service</p>
                            </div>
                        </li>
                    </ul>
                    <p class="font-italic font-weight-bold">
                        Able to be a Leadership who guides and supervises the team
                        in completing a job well, and are able
                        empowering all the functions and roles of the organization, with a purpose
                        produce maximum quality of work and performance, and
                        make good use of ones skills & experience
                        owned.
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
        <div class="section-title">
            <h2>Skills</h2>
            <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
        </div>
        <div class="container" data-aos="fade-up">

            <div class="row skills-content">

                <div class="col-lg-6">

                    <div class="progress">
                        <span class="skill">Leadership<i class="val">80%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">PHP <i class="val">80%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">CSS <i class="val">80%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">JQuery <i class="val">75%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Laravel <i class="val">85%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Codeigniter <i class="val">70%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="progress">
                        <span class="skill">Managing Crisis Situations <i class="val">90%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">VB.NET <i class="val">90%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">ASP.NET <i class="val">80%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">SQL Query <i class="val">90%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Office <i class="val">90%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Photoshop <i class="val">70%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section><!-- End Skills Section -->


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="zoom-in">

            <div class="owl-carousel testimonials-carousel">

                <div class="testimonial-item">
                    <img src="photo.png" class="testimonial-img" alt="">
                    <h3>Fauzi Dika Fandra</h3>
                    <h4>Development</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Never stop learning and keep working.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>


            </div>

        </div>
    </section><!-- End Testimonials Section -->

    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Portfolio</h2>
                <h3>Check My <span>Portfolio</span></h3>
                <p>My completed and <a id="ongoing" href="#" class="font-weight-bold font-italic">ongoing projects.</a> </p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <!-- <li data-filter=".filter-card">Card</li> -->
                        <li data-filter=".filter-web">Web</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="assets/img/portfolio/pos rfid.png" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>RFID POS System</h4>
                        <p>Order Form</p>
                        <a href="assets/img/portfolio/pos rfid.png" data-gall="portfolioGallery" class="venobox preview-link" title="View"><i class="bx bx-plus"></i></a>
                        <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="assets/img/portfolio/pos rfid2.png" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>RFID POS System</h4>
                        <p>Sales Form</p>
                        <a href="assets/img/portfolio/pos rfid2.png" data-gall="portfolioGallery" class="venobox preview-link" title="View"><i class="bx bx-plus"></i></a>
                        <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="assets/img/portfolio/backoffice.png" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>POS Backoffice</h4>
                        <p>Example Form</p>
                        <a href="assets/img/portfolio/backoffice.png" data-gall="portfolioGallery" class="venobox preview-link" title="View"><i class="bx bx-plus"></i></a>
                        <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <img src="assets/img/portfolio/lakon.png" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Sales Entry</h4>
                        <p>With PHP Native</p>
                        <a href="assets/img/portfolio/lakon.png" data-gall="portfolioGallery" class="venobox preview-link" title="View"><i class="bx bx-plus"></i></a>
                        <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <img src="assets/img/portfolio/star.png" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Dashboard</h4>
                        <p>Reporting Inventory & Sales</p>
                        <a href="assets/img/portfolio/star.png" data-gall="portfolioGallery" class="venobox preview-link" title="View"><i class="bx bx-plus"></i></a>
                        <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <img src="assets/img/portfolio/agent.png" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Goods Process</h4>
                        <p>PO, GR, Retur & Inventory Transfer Process</p>
                        <a href="assets/img/portfolio/agent.png" data-gall="portfolioGallery" class="venobox preview-link" title="View"><i class="bx bx-plus"></i></a>
                        <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Experience Section ======= -->
    <section id="experience" class="experience">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Experience</h2>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="d-flex w-100 justify-content-between">
                        <h4 class="text-primary">Assistant Manager IT</h4>
                        <span class="text-primary">April 2015 - September 2020</span>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div>
                        <div class="subheading mb-3">PT. STAR MAJU SENTOSA | STAR DEPARTMENT STORE | 2015 TO 2020</div>
                        <div class="ul">
                            <div class="li mb-3">
                                Leading the Team in developing and creating Applications & Systems to support the company's computerized performance more optimally, including :
                                <div class="ul mt-3 ml-4">
                                    <div class="li">
                                        <h6>POS System RFID using Vb6 & Visual Studio with integrated payment system with ECR BCA. </h6>
                                    </div>
                                    <div class="li">
                                        <h6>Internal Aplikasi : HR App, Inventory App, Incoming & Outgoing Financial App,
                                            Membership App dan SAP Interface using Visual Studio</h6>
                                    </div>
                                    <div class="li">
                                        <h6>Setup Ecommerce & Corporate Website : stardeptstore.co.id, lakonstore.com,
                                            stardeptstore.com, lakonindonesia.com</h6>
                                    </div>
                                    <div class="li">
                                        <h6>Inventory and Sales Reports : vendor.lakonstore.com,
                                            vendor.lakonstore.com/star, vendor.lakonstore.com/report using angular JS.</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="li mb-3">
                                Build report & data using SSRS MSSQL 2005/2008 for each company reports
                            </div>
                            <div class="li mb-3">
                                Make work plans and oversee IT budgets (budget) and expenditures
                            </div>
                            <div class="li mb-3">
                                Maintain company data processes and management on the SAP Business One ERP Software
                            </div>
                            <div class="li mb-3">
                                Ensuring all data processing of goods starting from article creation, price up to the sales process in each shop went well
                            </div>
                            <div class="li mb-3">
                                Responsible for the needs of IT equipment in companies ranging from computer needs, POS cashiers, printers, CCTV and other IT devices
                            </div>
                            <div class="li">
                                Providing technology solutions for each department to achieve goals and strategies company business.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="d-flex w-100 justify-content-between">
                        <h4 class="text-primary">Senior Developer</h4>
                        <span class="text-primary">Desember 2012 - Maret 2015</span>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div>
                        <div class="subheading mb-3">PT. BERCA RETAIL GROUP | LEAGUE STORE | 2012 To 2015</div>
                        <div class="ul">
                            <div class="li mb-3">
                                Creating a POS application that is used for all League stores in Indonesia, and for Jakarta Fair Event using Vb.Net 2010 and MSSQL 2008 with automatic data transfer via the Internet
                            </div>
                            <div class="li mb-3">
                                Create several internal company applications such as: Lan Chat app, Barcode Scanning and SMS Gateway
                            </div>
                            <div class="li">
                                Software and Hardware Troubleshoot
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="d-flex w-100 justify-content-between">
                        <h4 class="text-primary">IT Programmer</h4>
                        <span class="text-primary">Agustus 2011 - November 2012</span>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div>
                        <div class="subheading mb-3">PT. PRATAMA CIPTA LESTARINDO | IT SOLUTION | 2011 To 2012</div>
                        <div class="ul">
                            <div class="li mb-3">
                                Creating Finger Print Software (TaSoft) and Restaurant POS (DreamPOS) software using Vb.Net 2008 and MSSQL 2005
                            </div>
                            <div class="li">
                                Make several additional applications such as: Item Inventory, PO Application and Print Marketing Invoice
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="d-flex w-100 justify-content-between">
                        <h4 class="text-primary">IT Programmer</h4>
                        <span class="text-primary">Agustus 2009 - Juli 2011</span>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div>
                        <div class="subheading mb-3">PT. SARANAKREASI TEKNOLOGI INFORMASI | IT SOLUTION | 2009 To 2011</div>
                        <div class="ul">
                            <div class="li mb-3">
                                Build Corporate Website using Expression Web : http://www.skati.info
                            </div>
                            <div class="li">
                                Build Any Website using ASP.NET
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
    </section><!-- End Experience Section -->

    <!-- ======= Education Section ======= -->
    <section id="education" class="education">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Education</h2>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="d-flex w-100 justify-content-between">
                        <h4 class="text-primary">GUNADARMA UNIVERSITY</h4>
                        <span class="text-primary">S1 - Information Systems</span>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div>
                        <div class="subheading mb-3">FACULTY OF COMPUTER SCIENCE | 2012 To 2014</div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="d-flex w-100 justify-content-between">
                        <h4 class="text-primary">GUNADARMA UNIVERSITY</h4>
                        <span class="text-primary">D3 - Informatics Management</span>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div>
                        <div class="subheading mb-3">FACULTY OF COMPUTER SCIENCE | 2006 To 2009</div>
                    </div>
                </div>
            </div>
            <hr>
    </section><!-- End Education Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact</h2>
                <h3><span>Contact Me</span></h3>
                <p>Please contact me via the address below.</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-map"></i>
                        <h3>Our Address</h3>
                        <p>Cileungsi, Bogor, Jawa Barat</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-envelope"></i>
                        <h3>Email Us</h3>
                        <p>fauzi.dika@gmail.com</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-phone-call"></i>
                        <h3>Call Us</h3>
                        <p>+62 818 xxxx xxxx</p>
                    </div>
                </div>

            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-6 ">
                    <iframe class="mb-4 mb-lg-0" src="https://maps.google.com/maps?q=cileungsi&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                </div>

                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="form-row">
                            <div class="col form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validate"></div>
                            </div>
                            <div class="col form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="mb-3">
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
    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
</main><!-- End #main -->

<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

@endsection