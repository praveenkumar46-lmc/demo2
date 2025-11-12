                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Services Section - Horizontal Scroll</title>
                    <!-- Font Awesome for Icons -->
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
                    <style>
                        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

                        body {
                            font-family: 'Poppins', sans-serif;
                            background-color: #fdfaf7;
                            margin: 0;
                            padding: 0;
                        }

                        .services-section-wrapper {
                            width: 100%;
                            overflow: hidden; /* Hide main scrollbar if needed */
                            padding: 80px 0;
                        }

                        /* Header Content */
                        .services-text-header {
                            max-width: 1200px;
                            margin: 0 auto 50px;
                            padding: 0 40px;
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                        }
                        
                        .header-text h2 {
                            font-size: 2.8rem;
                            font-weight: 700;
                            margin: 0 0 10px 0;
                        }

                        .header-text p {
                            font-size: 1rem;
                            color: #666;
                            margin: 0;
                            max-width: 500px;
                        }
                        
                        /* Scroll Navigation */
                        .scroll-nav {
                            display: flex;
                            gap: 15px;
                        }
                        
                        .scroll-btn {
                            background-color: #fff;
                            border: 1px solid #ddd;
                            width: 45px;
                            height: 45px;
                            border-radius: 50%;
                            cursor: pointer;
                        }

                        /* Horizontal Scroll Container */
                        .horizontal-scroll-container {
                            display: flex;
                            overflow-x: auto;
                            scroll-behavior: smooth;
                            padding: 10px 40px;
                            gap: 30px;
                            /* Hide scrollbar */
                            scrollbar-width: none; /* Firefox */
                            -ms-overflow-style: none;  /* IE and Edge */
                        }
                        
                        .horizontal-scroll-container::-webkit-scrollbar {
                            display: none; /* Chrome, Safari, and Opera */
                        }

                        /* Service Card */
                        .service-card {
                            flex: 0 0 340px; /* Do not grow, do not shrink, base width */
                            height: 450px;
                            position: relative;
                            border-radius: 15px;
                            background-size: cover;
                            background-position: center;
                            overflow: hidden;
                            display: flex;
                            flex-direction: column;
                            justify-content: space-between;
                            padding: 25px;
                            color: #fff;
                        }
                        
                        .service-card::before {
                            content: '';
                            position: absolute;
                            top: 0; left: 0; right: 0; bottom: 0;
                            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0) 50%);
                            z-index: 1;
                        }

                        .card-top, .card-bottom {
                            position: relative;
                            z-index: 2;
                        }
                        
                        .card-top .service-number {
                            font-size: 1.2rem;
                            font-weight: 600;
                            opacity: 0.7;
                            align-self: flex-end;
                        }
                        
                        .card-bottom h3 {
                            margin: 0;
                            font-size: 1.6rem;
                        }

                        @media (max-width: 768px) {
                            .services-text-header {
                                flex-direction: column;
                                text-align: center;
                                gap: 30px;
                            }
                            .horizontal-scroll-container {
                                padding: 10px 20px;
                                gap: 20px;
                            }
                            .service-card {
                                flex-basis: 300px;
                            }
                        }

                    </style>
                </head>
                <body>

                    <section class="services-section-wrapper">
                        <div class="services-text-header">
                            <div class="header-text">
                                <h2>Our Services</h2>
                                <p>We provide end-to-end solutions to transform your ideas into shelf-ready products.</p>
                            </div>
                            <div class="scroll-nav">
                                <button id="scrollLeftBtn" class="scroll-btn"><i class="fa fa-arrow-left"></i></button>
                                <button id="scrollRightBtn" class="scroll-btn"><i class="fa fa-arrow-right"></i></button>
                            </div>
                        </div>

                        <div class="horizontal-scroll-container" id="scrollContainer">
                            <div class="service-card" style="background-image: url('https://images.unsplash.com/photo-1543362906-acfc16c67564?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=600');">
                                <div class="card-top">
                                    <span class="service-number">01</span>
                                </div>
                                <div class="card-bottom">
                                    <h3>Clean-Label Formulation</h3>
                                </div>
                            </div>
                            <div class="service-card" style="background-image: url('https://images.unsplash.com/photo-1581093450021-4a7360b9a296?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=600');">
                                <div class="card-top">
                                    <span class="service-number">02</span>
                                </div>
                                <div class="card-bottom">
                                    <h3>Functional Foods</h3>
                                </div>
                            </div>
                            <div class="service-card" style="background-image: url('https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=600');">
                                <div class="card-top">
                                    <span class="service-number">03</span>
                                </div>
                                <div class="card-bottom">
                                    <h3>Market-Fit & Launch</h3>
                                </div>
                            </div>
                            <div class="service-card" style="background-image: url('https://images.unsplash.com/photo-1556742053-99d3a04a8b7c?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=600');">
                                <div class="card-top">
                                    <span class="service-number">04</span>
                                </div>
                                <div class="card-bottom">
                                    <h3>Contract Manufacturing</h3>
                                </div>
                            </div>
                            <div class="service-card" style="background-image: url('https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=600');">
                                <div class="card-top">
                                    <span class="service-number">05</span>
                                </div>
                                <div class="card-bottom">
                                    <h3>Branding & Packaging</h3>
                                </div>
                            </div>
                        </div>
                    </section>

                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            const container = document.getElementById('scrollContainer');
                            const scrollLeftBtn = document.getElementById('scrollLeftBtn');
                            const scrollRightBtn = document.getElementById('scrollRightBtn');
                            const cardWidth = 340 + 30; // Card width + gap

                            scrollRightBtn.addEventListener('click', () => {
                                container.scrollLeft += cardWidth;
                            });

                            scrollLeftBtn.addEventListener('click', () => {
                                container.scrollLeft -= cardWidth;
                            });
                        });
                    </script>

                </body>
                </html>














































                        <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Elegant Testimonial</title>
                <style>
                    body {
                        font-family: 'Georgia', serif;
                        background-color: #ffffff;
                        padding: 50px 20px;
                    }
                    .testimonial-block {
                        max-width: 800px;
                        margin: auto;
                        text-align: center;
                        padding: 40px 0;
                        border-top: 1px solid #eee;
                        border-bottom: 1px solid #eee;
                    }
                    .testimonial-block-quote {
                        font-size: 28px;
                        font-weight: 500;
                        line-height: 1.5;
                        color: #222;
                        margin: 0 0 25px 0;
                    }
                    .testimonial-block-author {
                        font-size: 18px;
                        color: #666;
                        font-style: italic;
                    }
                </style>
            </head>
            <body>

                <div class="testimonial-block">
                    <h2 class="testimonial-block-quote">
                        “Their attention to detail is second to none. A truly first-class experience from the initial call to the final delivery.”
                    </h2>
                    <p class="testimonial-block-author">
                        — Michael Chen, Art Director at Visionary Studios
                    </p>
                </div>

            </body>
            </html>
            <section class="hero-section-4">
            <div class="hero-content-4">
                <h1>Turn your food idea into a market ready product.</h1>
                <p>Join our team of experts</p>
                <button class="cta-button-4">Get Started</button>
            </div>
            <div class="hero-image-4">
                </div>
            </section>

            <style>
            @import url('https://fonts.googleapis.com/css2?family=Lora:wght@700&family=Roboto&display=swap');

            .hero-section-4 {
                display: grid;
                grid-template-columns: 2fr 3fr;
                height: 100vh;
                font-family: 'Roboto', sans-serif;
            }

            .hero-content-4 {
                display: flex;
                flex-direction: column;
                justify-content: center;
                padding: 50px;
                background-color: #f5f5f5;
            }

            .hero-content-4 h1 {
                font-family: 'Lora', serif;
                font-size: 3.5rem;
                font-weight: 700;
                margin-bottom: 20px;
                color: #333;
            }

            .hero-content-4 p {
                font-size: 1.2rem;
                margin-bottom: 40px;
                color: #666;
            }

            .cta-button-4 {
                background-color: #333;
                color: white;
                border: none;
                padding: 20px 40px;
                font-size: 1rem;
                font-weight: 700;
                cursor: pointer;
                position: relative;
                overflow: hidden;
                transition: color 0.4s ease-in-out;
            }

            .cta-button-4::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background-color: #fff;
                border: 1px solid #333;
                transition: left 0.4s ease-in-out;
                z-index: -1;
            }

            .cta-button-4:hover {
                color: #333;
            }

            .cta-button-4:hover::before {
                left: 0;
            }


            .hero-image-4 {
                background-color: #ddd; /* Placeholder for an image */
                background-image: url('im10.jpeg');
                background-size: cover;
                background-position: center;
            }
            </style>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Interactive Logo Wall</title>
                <style>
                    body {
                        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
                        background-color: #fff;
                        padding: 50px 20px;
                        text-align: center;
                    }
                    .logo-wall-intro { margin-bottom: 40px; }
                    .logo-wall-intro h2 { font-size: 32px; }
                    .logo-wall-intro p { color: #555; max-width: 600px; margin: auto; }
                    
                    .logo-grid {
                        display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                        gap: 20px;
                        max-width: 1000px;
                        margin: auto;
                    }
                    .logo-item {
                        position: relative;
                        background: #f8f9fa;
                        padding: 30px;
                        border-radius: 8px;
                        border: 1px solid #e9ecef;
                        cursor: pointer;
                    }
                    .logo-item img {
                        max-width: 120px;
                        height: 40px;
                        object-fit: contain;
                        filter: grayscale(100%);
                        opacity: 0.6;
                        transition: all 0.3s ease;
                    }
                    .logo-item:hover img {
                        filter: grayscale(0%);
                        opacity: 1;
                        transform: scale(1.05);
                    }
                    .logo-quote {
                        position: absolute;
                        bottom: 110%;
                        left: 50%;
                        transform: translateX(-50%);
                        width: 280px;
                        background: #333;
                        color: #fff;
                        padding: 15px;
                        border-radius: 6px;
                        font-size: 14px;
                        line-height: 1.5;
                        text-align: center;
                        opacity: 0;
                        visibility: hidden;
                        transition: opacity 0.3s ease, bottom 0.3s ease;
                        pointer-events: none; /* Can't interact with the tooltip */
                    }
                    .logo-quote::after { /* The little triangle */
                        content: '';
                        position: absolute;
                        top: 100%;
                        left: 50%;
                        margin-left: -5px;
                        border-width: 5px;
                        border-style: solid;
                        border-color: #333 transparent transparent transparent;
                    }
                    .logo-item:hover .logo-quote {
                        opacity: 1;
                        visibility: visible;
                        bottom: 120%;
                    }
                </style>
            </head>
            <body>

                <div class="logo-wall-intro">
                    <h2>Trusted by Industry Leaders</h2>
                    <p>We are proud to partner with innovative companies of all sizes to help them achieve their goals.</p>
                </div>

                <div class="logo-grid">
                    <div class="logo-item">
                        <img src="https://logodix.com/logo/2111166.png" alt="Client Logo">
                        <div class="logo-quote">"Their platform is the backbone of our marketing stack. Indispensable."</div>
                    </div>
                    <div class="logo-item">
                        <img src="https://logodix.com/logo/2111197.png" alt="Client Logo">
                        <div class="logo-quote">"A truly dedicated partner. They feel like an extension of our own team."</div>
                    </div>
                    <div class="logo-item">
                        <img src="https://logodix.com/logo/2111202.png" alt="Client Logo">
                        <div class="logo-quote">"The results exceeded our projections by 25%. We are thrilled."</div>
                    </div>
                </div>

            </body>
            </html>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Editorial Pull-Quote</title>
                <style>
                    body {
                        font-family: 'Georgia', serif; /* A classic serif font */
                        background-color: #fdfdfd;
                        padding: 60px 20px;
                    }
                    .pull-quote-section {
                        display: flex;
                        align-items: center;
                        max-width: 900px;
                        margin: auto;
                        position: relative;
                    }
                    .pull-quote-img {
                        width: 150px;
                        height: 150px;
                        border-radius: 50%;
                        object-fit: cover;
                        margin-right: 50px;
                        flex-shrink: 0;
                    }
                    .pull-quote-content {
                        position: relative;
                    }
                    .pull-quote-text {
                        font-size: 32px;
                        font-weight: 400;
                        line-height: 1.5;
                        color: #222;
                    }
                    .pull-quote-author {
                        font-size: 18px;
                        font-style: italic;
                        color: #555;
                        margin-top: 15px;
                        text-align: right;
                    }
                    /* The giant quotation mark */
                    .pull-quote-content::before {
                        content: '“';
                        font-family: 'Times New Roman', Times, serif;
                        font-size: 150px;
                        color: #e0e0e0;
                        position: absolute;
                        left: -60px;
                        top: -60px;
                        z-index: -1;
                        line-height: 1;
                    }
                    
                    @media (max-width: 768px) {
                        .pull-quote-section { flex-direction: column; text-align: center; }
                        .pull-quote-img { margin: 0 0 30px 0; }
                        .pull-quote-text { font-size: 26px; }
                        .pull-quote-author { text-align: center; }
                        .pull-quote-content::before { left: -20px; }
                    }
                </style>
            </head>
            <body>

                <section class="pull-quote-section">
                    <img src="https://i.pravatar.cc/150?img=7" alt="Ava Chen" class="pull-quote-img">
                    <div class="pull-quote-content">
                        <p class="pull-quote-text">
                            Working with them wasn't just about finishing a project; it was about building a vision. Their creativity is unmatched.
                        </p>
                        <p class="pull-quote-author">— Ava Chen, Creative Director</p>
                    </div>
                </section>

            </body>
            </html>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Tailored Solutions - Minimalist Design</title>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap');

                    body {
                        font-family: 'Montserrat', sans-serif;
                        background-color: #f4f4f2; /* Light earthy tone */
                        margin: 0;
                        padding: 80px 20px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        min-height: 100vh;
                    }

                    .solutions-wrapper {
                        width: 100%;
                        max-width: 1400px;
                    }
                    
                    .section-header {
                        text-align: center;
                        margin-bottom: 60px;
                    }

                    .section-header h2 {
                        font-size: 2.8rem;
                        font-weight: 600;
                        color: #333;
                        margin: 0 0 10px;
                    }
                    
                    .section-header p {
                        font-size: 1.1rem;
                        color: #777;
                    }

                    .solutions-list {
                        display: flex;
                        justify-content: center;
                        flex-wrap: wrap;
                        gap: 0; /* No gap as borders will separate */
                    }

                    .solution-block {
                        background-color: #fff;
                        padding: 35px 30px;
                        text-align: center;
                        flex-grow: 1;
                        flex-basis: 250px;
                        border-left: 1px solid #e0e0e0;
                        transition: background-color 0.4s ease;
                        position: relative;
                    }
                    
                    .solution-block:first-child {
                        border-left: none;
                        border-top-left-radius: 12px;
                        border-bottom-left-radius: 12px;
                    }

                    .solution-block:last-child {
                        border-top-right-radius: 12px;
                        border-bottom-right-radius: 12px;
                    }

                    .solution-block::before {
                        content: '';
                        position: absolute;
                        bottom: 0;
                        left: 50%;
                        transform: translateX(-50%);
                        width: 0;
                        height: 4px;
                        background-color: #8f9d71; /* Olive Green */
                        transition: width 0.4s ease;
                    }

                    .solution-block:hover {
                        background-color: #fafafa;
                    }
                    
                    .solution-block:hover::before {
                        width: 100%;
                    }
                    
                    .solution-block:hover .icon {
                        transform: scale(1.1);
                    }

                    .solution-block .icon {
                        font-size: 2.8rem;
                        margin-bottom: 25px;
                        color: #8f9d71; /* Olive Green */
                        transition: transform 0.4s ease;
                    }

                    .solution-block h3 {
                        font-size: 1.1rem;
                        font-weight: 600;
                        color: #444;
                        margin: 0;
                    }

                </style>
            </head>
            <body>

                <div class="solutions-wrapper">
                    <div class="section-header">
                        <h2>Tailored Solution for Visionaries</h2>
                        <p>We empower food brands at every stage of their journey.</p>
                    </div>
                    <div class="solutions-list">
                        <div class="solution-block">
                            <div class="icon">
                                <i class="far fa-lightbulb"></i>
                            </div>
                            <h3>Aspiring food<br>entrepreneurs</h3>
                        </div>
                        <div class="solution-block">
                            <div class="icon">
                                <i class="fas fa-box-open"></i>
                            </div>
                            <h3>Emerging Food<br>Startups</h3>
                        </div>
                        <div class="solution-block">
                            <div class="icon">
                                <i class="fas fa-arrows-to-dot"></i>
                            </div>
                            <h3>Growth Stage<br>Brands</h3>
                        </div>
                        <div class="solution-block">
                            <div class="icon">
                                <i class="fas fa-building-columns"></i>
                            </div>
                            <h3>Established<br>Brands</h3>
                        </div>
                    </div>
                </div>

            </body>
            </html>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Services Section with Grid</title>
                <!-- Font Awesome for Icons -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

                    body {
                        font-family: 'Poppins', sans-serif;
                        background-color: #fdfaf7;
                        margin: 0;
                        padding: 20px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        min-height: 100vh;
                    }

                    .services-section-container {
                        width: 100%;
                        max-width: 1200px;
                        text-align: center;
                    }

                    .services-text-content .sub-heading {
                        font-weight: 600;
                        color: #333;
                        display: inline-flex;
                        align-items: center;
                        gap: 10px;
                    }

                    .services-text-content .sub-heading::after {
                        content: '';
                        height: 2px;
                        width: 40px;
                        background-color: #e87949;
                    }

                    .services-text-content h2 {
                        font-size: 2.8rem;
                        font-weight: 700;
                        margin: 10px 0 20px 0;
                        line-height: 1.2;
                    }

                    .services-text-content p {
                        font-size: 1rem;
                        color: #666;
                        line-height: 1.8;
                        max-width: 600px;
                        margin: 0 auto 40px auto;
                    }

                    /* Services Grid */
                    .services-grid {
                        display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                        gap: 25px;
                        margin-top: 40px;
                    }

                    .service-card {
                        height: 400px;
                        border-radius: 15px;
                        background-size: cover;
                        background-position: center;
                        position: relative;
                        display: flex;
                        flex-direction: column;
                        justify-content: flex-end;
                        padding: 25px;
                        color: white;
                        overflow: hidden;
                        text-align: left;
                        transition: transform 0.3s ease;
                    }
                    
                    .service-card:hover {
                        transform: translateY(-10px);
                    }

                    .service-card::before {
                        content: '';
                        position: absolute;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.1) 60%);
                        z-index: 1;
                    }

                    .card-content {
                        z-index: 2;
                    }

                    .card-number {
                        position: absolute;
                        top: 20px;
                        right: 20px;
                        font-size: 1.5rem;
                        font-weight: 700;
                        opacity: 0.5;
                        z-index: 2;
                    }

                    .card-content h3 {
                        margin: 0 0 10px 0;
                        font-size: 1.6rem;
                    }
                    
                    .card-description {
                        font-size: 0.95rem;
                        line-height: 1.6;
                        max-height: 0;
                        overflow: hidden;
                        opacity: 0;
                        transition: max-height 0.4s ease, opacity 0.4s ease;
                    }

                    .service-card:hover .card-description {
                        max-height: 100px; /* Adjust as needed */
                        opacity: 1;
                    }

                    .card-arrow {
                        display: inline-flex;
                        align-items: center;
                        gap: 8px;
                        margin-top: 15px;
                        font-weight: 600;
                        text-decoration: none;
                        color: #fff;
                        opacity: 0;
                        transform: translateY(10px);
                        transition: opacity 0.4s ease, transform 0.4s ease;
                    }

                    .service-card:hover .card-arrow {
                        opacity: 1;
                        transform: translateY(0);
                    }

                    @media (max-width: 768px) {
                        .services-text-content h2 {
                            font-size: 2.2rem;
                        }
                    }

                </style>
            </head>
            <body>

                <section class="services-section-container">
                    <div class="services-text-content">
                        <span class="sub-heading">What We Offer</span>
                        <h2>Our Services</h2>
                        <p>We provide expert food formulation and drink development solutions to startups and growing brands, transforming their innovative ideas into shelf-ready products.</p>
                    </div>
                    
                    <div class="services-grid">
                        <div class="service-card" style="background-image: url('https://images.unsplash.com/photo-1543362906-acfc16c67564?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=600');">
                            <div class="card-number">01</div>
                            <div class="card-content">
                                <h3>Clean-Label Formulation</h3>
                                <p class="card-description">Creating products with simple, natural ingredients that consumers trust.</p>
                                <a href="#" class="card-arrow">Learn More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>

                        <div class="service-card" style="background-image: url('https://images.unsplash.com/photo-1581093450021-4a7360b9a296?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=600');">
                            <div class="card-number">02</div>
                            <div class="card-content">
                                <h3>Functional Foods</h3>
                                <p class="card-description">Developing foods that offer health benefits beyond basic nutrition.</p>
                                <a href="#" class="card-arrow">Learn More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>

                        <div class="service-card" style="background-image: url('https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=600');">
                            <div class="card-number">03</div>
                            <div class="card-content">
                                <h3>Market-Fit & Launch</h3>
                                <p class="card-description">Strategizing your product's entry and positioning for market success.</p>
                                <a href="#" class="card-arrow">Learn More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>

                        <div class="service-card" style="background-image: url('https://images.unsplash.com/photo-1556742053-99d3a04a8b7c?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&w=600');">
                            <div class="card-number">04</div>
                            <div class="card-content">
                                <h3>Contract Manufacturing</h3>
                                <p class="card-description">Connecting you with the right partners to scale your production efficiently.</p>
                                <a href="#" class="card-arrow">Learn More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </section>

            </body>
            </html>









































            <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Footer Component - Food Maverik</title>
  <style>
    :root {
      --footer-bg: #212929;
      --footer-text: #f8f9fa;
      --footer-muted: #adb5bd;
      --footer-accent: #174949;
      --footer-border: #343a40;
    }

    /* Basic body reset for demonstration */
    body {
      margin: 0;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      background-color: #f8f9fa; /* Example page background */
    }
    
    /* Give page content some space to show footer is at the bottom */
    main {
      min-height: 100vh;
      padding: 2rem;
    }

    .site-footer-pro {
      background-color: var(--footer-bg);
      color: var(--footer-text);
    }

    /* Top Section: Logo & CTA */
    .footer-top {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 1.5rem;
      padding: 1.5rem 2rem;
      max-width: 1320px;
      margin: 0 auto;
      border-bottom: 1px solid var(--footer-border);
    }

    .logo-area {
      text-decoration: none;
      color: white;
    }
    .logo-text {
      font-size: 2.25rem;
      font-weight: 600;
      display: block;
    }
    .logo-subtext {
      font-size: 0.9rem;
      color: var(--footer-muted);
      letter-spacing: 0.5px;
    }
    .btn-cta {
      background-color: var(--footer-accent);
      color: white;
      padding: 0.8rem 1.75rem;
      border-radius: 50px;
      text-decoration: none;
      font-weight: 600;
      transition: background-color 0.2s;
    }
    .btn-cta:hover {
      background-color: #0b4d44;
    }

    /* Main Content Grid */
    .footer-main {
      padding: 3rem 2rem;
      max-width: 1320px;
      margin: 0 auto;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2.5rem;
    }

    .footer-heading {
      font-size: 1.1rem;
      font-weight: 600;
      margin-top: 0;
      margin-bottom: 1.25rem;
      color: white;
    }

    .about-text {
      color: var(--footer-muted);
      line-height: 1.6;
      margin: 0 0 1.5rem;
    }

    .link-list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: grid;
      gap: 0.75rem;
    }

    .link-list a {
      color: var(--footer-muted);
      text-decoration: none;
    }
    .link-list a:hover {
      color: var(--footer-text);
    }

    /* Contact & Map */
    .contact-details {
      font-style: normal;
      display: grid;
      gap: 0.75rem;
      margin-bottom: 1.5rem;
      color: var(--footer-muted); /* Set color for address text */
    }

    .contact-details p {
      margin: 0;
    }
    .contact-details a {
      color: var(--footer-muted);
      text-decoration: none;
    }
    .contact-details a:hover {
      color: var(--footer-text);
    }
    .map-container {
      border-radius: 8px;
      overflow: hidden;
    }

    /* Social Icons -- UPDATED */
    .social-icons {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      gap: 1rem;
    }
    .social-icons a {
      display: flex; /* Changed to flex */
      align-items: center; /* Vertically center the icon */
      justify-content: center; /* Horizontally center the icon */
      width: 36px; /* Slightly larger for better spacing */
      height: 36px;
      background-color: #343a40;
      border-radius: 50%;
      transition: background-color 0.2s ease;
    }
    .social-icons a:hover {
      background-color: var(--footer-accent);
    }
    /* NEW: Style for the SVG icons inside the links */
    .social-icons a svg {
      width: 18px;
      height: 18px;
      fill: var(--footer-text);
    }


    /* Utilities */
    .sr-only {
      position: absolute;
      width: 1px;
      height: 1px;
      padding: 0;
      margin: -1px;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      white-space: nowrap;
      border-width: 0;
    }
  </style>
</head>
<body>

  <main>
    <h1>Page Content</h1>
    <p>This is the main content area of the page. Scroll down to see the footer.</p>
  </main>

  <footer class="site-footer-pro" role="contentinfo">
    <div class="footer-top">
      <a class="logo-area" href="/" aria-label="Food Maverik Home">
        <span class="logo-text">Food Maverik.</span>
        <span class="logo-subtext">From Idea to Aisle™</span>
      </a>
      <a href="#" class="btn-cta">Request Consultant</a>
    </div>

    <div class="footer-main">
      <div class="footer-grid">
        <!-- Column 1: About & Social -->
        <section class="footer-col" aria-labelledby="footer-about-title">
          <h2 id="footer-about-title" class="sr-only">About Food Maverik</h2>
          <p class="about-text">R&D-first food tech consultants helping brands go From Idea to Aisle™. We blend chef craft, food science, and FSSAI-ready compliance to build scalable, shelf-stable products pilot to factory, paperwork to launch.</p>
          <!-- UPDATED ICONS -->
          <ul class="social-icons">
            <li>
              <a href="#" aria-label="Facebook">
                <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.494v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.323-1.325z"/></svg>
              </a>
            </li>
            <li>
              <a href="#" aria-label="Instagram">
                <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.488.96-.91 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.488-1.379-.91-.42-.419-.69-.824-.91-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.859 0-3.211.016-3.586.061-4.859.061-1.17.255-1.814.42-2.234.21-.57.479-.96.91-1.381.419-.419.81-.689 1.379-.91.42-.165 1.065-.36 2.235-.413C8.414 2.18 8.79 2.16 12 2.16zm0 3.094c-3.518 0-6.375 2.857-6.375 6.375s2.857 6.375 6.375 6.375 6.375-2.857 6.375-6.375S15.518 5.254 12 5.254zm0 10.652c-2.354 0-4.278-1.924-4.278-4.278s1.924-4.278 4.278-4.278 4.278 1.924 4.278 4.278-1.924 4.278-4.278 4.278zm4.965-10.275c-.822 0-1.487.665-1.487 1.487s.665 1.487 1.487 1.487 1.487-.665 1.487-1.487-.665-1.487-1.487-1.487z"/></svg>
              </a>
            </li>
            <li>
              <a href="#" aria-label="LinkedIn">
                <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.225 0z"/></svg>
              </a>
            </li>
            <li>
              <a href="#" aria-label="YouTube">
                <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
              </a>
            </li>
          </ul>
        </section>

        <!-- Column 2: Consultant Services -->
        <section class="footer-col" aria-labelledby="footer-services-title">
          <h2 id="footer-services-title" class="footer-heading">Food Consulting Services</h2>
          <ul class="link-list">
            <li><a href="#">Food Consultant in Chennai</a></li>
            <li><a href="#">Food Consultant in Bangalore</a></li>
            <li><a href="#">Food Consultant in Trichy</a></li>
            <li><a href="#">Food Consultant in Mumbai</a></li>
            <li><a href="#">Food Consultant in Pune</a></li>
            <li><a href="#">Food Consultant in Delhi</a></li>
            <li><a href="#">Food Consultant in Kolkata</a></li>
            <li><a href="#">Food Consultant in Hyderabad</a></li>
          </ul>
        </section>

        <!-- Column 3: Formulation -->
        <section class="footer-col" aria-labelledby="footer-formulation-title">
          <h2 id="footer-formulation-title" class="footer-heading">Formulation</h2>
          <ul class="link-list">
            <li><a href="#">Protein Bar recipe</a></li>
            <li><a href="#">Probiotic Drink recipe</a></li>
            <li><a href="#">Kombucha Drink recipe</a></li>
            <li><a href="#">Functional Chocolates recipe</a></li>
          </ul>
        </section>

        <!-- Column 4: Contact & Map -->
        <section class="footer-col" aria-labelledby="footer-contact-title">
          <h2 id="footer-contact-title" class="footer-heading">Address</h2>
          <address class="contact-details">
            <p><strong>Food Maverik Labs</strong></p>
            <p>Door no 189/2A, Vasan valley 17th cross, post, west extension, Malliampathu, Tiruchirappalli, Tamil Nadu 620102</p>
          </address>
          <div class="map-container">
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.598375496417!2d78.74106567588386!3d10.84227185800055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3baaf06173045a55%3A0xc68294a5e2f7547!2sFood%20Maverik%20Labs%20-%20Food%20Consultant!5e0!3m2!1sen!2sin!4v1701105944988!5m2!1sen!2sin"
              width="100%" 
              height="150" 
              style="border:0;" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade"
              title="Location of Food Maverik Labs in Tiruchirappalli">
            </iframe>
          </div>
        </section>
      </div>
    </div>
  </footer>

</body>
</html>




















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Row Partners Carousel</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Manrope', sans-serif;
            background-color: #633304;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem 0;
        }

        .partners-section {
            max-width: 100%;
            text-align: center;
            overflow: hidden;
        }

        .partners-title {
            font-size: 2rem;
            color: #084c4c;
            font-weight: 700;
            margin-bottom: 3rem;
        }

        .logo-carousel {
            position: relative;
            width: 100%;
            padding: 1rem 0;
            -webkit-mask-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,1) 10%, rgba(0,0,0,1) 90%, rgba(0,0,0,0));
            mask-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,1) 10%, rgba(0,0,0,1) 90%, rgba(0,0,0,0));
        }

        .logo-track {
            display: flex;
            width: fit-content;
            margin-bottom: 1.5rem; /* Space between the two rows */
        }
        
        .logo-track:last-child {
            margin-bottom: 0;
        }

        .logo-track.scroll-left {
            animation: scroll-left 80s linear infinite;
        }
        
        .logo-track.scroll-right {
            animation: scroll-right 80s linear infinite;
        }
        
        .logo-carousel:hover .logo-track {  
            animation-play-state: paused;
        }

        .logo-card {
            background-color: #fff;
            border-radius: 12px;
            padding: 1.5rem;
            margin: 0 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            width: 180px;
            flex-shrink: 0;
        }

        .logo-card img {
            max-width: 50%;
            height: auto;
        }

        /* Animation for scrolling left */
        @keyframes scroll-left {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }
        
        /* Animation for scrolling right */
        @keyframes scroll-right {
            0% {
                transform: translateX(-50%);
            }
            100% {
                transform: translateX(0);
            }
        }
        
    </style>
</head>
<body>

    <section class="partners-section">
        <h2 class="partners-title">Our Partners & Members</h2>
        <div class="logo-carousel">
            <!-- Top Row -->
            <div class="logo-track scroll-left">
                <!-- Duplicate logos for seamless loop -->
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
            </div>
            <!-- Bottom Row -->
            <div class="logo-track scroll-right">
                <!-- Duplicate logos for seamless loop -->
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
                <div class="logo-card"><img src="Food_M.png" alt="Partner Logo"></div>
            </div>
        </div>
    </section>

</body>
</html>






<!DOCTYPE html><html lang="en"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Scrolling Logos</title> <style> @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
text

    body {
        margin: 0;
        font-family: 'Montserrat', sans-serif;
        background-color: #F8F5F2;
    }

    .partner-logos-section {
        display: flex;
        align-items: center;
        padding: 2rem 3rem;
        background-color: #F8F5F2;
        border-top: 1px solid #e0e0e0;
        border-bottom: 1px solid #e0e0e0;
    }

    .partner-logos-section .title {
        color: #5a5a5a;
        font-weight: 500;
        font-size: 1.1rem;
        margin-right: 3rem;
        white-space: nowrap;
    }

    .logos-scroller {
        flex-grow: 1;
        overflow: hidden;
        position: relative;
        -webkit-mask-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,1) 15%, rgba(0,0,0,1) 85%, rgba(0,0,0,0));
        mask-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,1) 15%, rgba(0,0,0,1) 85%, rgba(0,0,0,0));
    }

    .logos-track {
        display: flex;
        width: fit-content;
        animation: scroll 30s linear infinite;
    }

    .logo-item {
        display: flex;
        align-items: center;
        padding: 0 2.5rem; /* Increased padding for more space between logos */
        white-space: nowrap;
    }

    .logo-item img {
        height: 40px; /* Adjust height as needed */
        width: auto;
        transition: all 0.3s ease;
    }

    /* Different visual styles for the logos */
    .logo-item.style-1 img {
        opacity: 1;
        filter: grayscale(0%);
    }
    .logo-item.style-2 img {
        opacity: 0.7;
        filter: grayscale(100%);
    }
    .logo-item.style-3 img {
        opacity: 0.4;
        filter: grayscale(100%);
    }


    @keyframes scroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }

</style>
</head> <body><div class="partner-logos-section"> <p class="title">Powering the best teams</p> <div class="logos-scroller"> <div class="logos-track"> <!-- Replace "#" with the path to your logo image --> <div class="logo-item style-3"><img src="your-logo-file.png" alt="Partner Logo"></div> <div class="logo-item style-2"><img src="your-logo-file.png" alt="Partner Logo"></div> <div class="logo-item style-1"><img src="your-logo-file.png" alt="Partner Logo"></div> <div class="logo-item style-1"><img src="your-logo-file.png" alt="Partner Logo"></div> <div class="logo-item style-1"><img src="your-logo-file.png" alt="Partner Logo"></div> <div class="logo-item style-2"><img src="your-logo-file.png" alt="Partner Logo"></div> <div class="logo-item style-3"><img src="your-logo-file.png" alt="Partner Logo"></div>
text

        <!-- Logos are duplicated for a seamless scrolling effect -->
        <div class="logo-item style-3"><img src="your-logo-file.png" alt="Partner Logo"></div>
        <div class="logo-item style-2"><img src="your-logo-file.png" alt="Partner Logo"></div>
        <div class="logo-item style-1"><img src="your-logo-file.png" alt="Partner Logo"></div>
        <div class="logo-item style-1"><img src="your-logo-file.png" alt="Partner Logo"></div>
        <div class="logo-item style-1"><img src="your-logo-file.png" alt="Partner Logo"></div>
        <div class="logo-item style-2"><img src="your-logo-file.png" alt="Partner Logo"></div>
        <div class="logo-item style-3"><img src="your-logo-file.png" alt="Partner Logo"></div>
    </div>
</div>
</div></body> </html> add this section