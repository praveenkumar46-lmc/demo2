<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Maveriks - From Idea to Isle</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            /* Main Site Colors */
            --nav-bg: #fdfdfd;
            --nav-green: #183D3D;
            --logo-teal: #48A9A6;
            --text-dark: #2C2C2C;
            --hero-green: #2d594e;
            --text-color: #4B4B4B;
            --card-border: #edf3f0;
            --light-peach: #FADAB4;
            --icon-brown: #594A38;
            --global-bg-color: #eaf2f0;
            
            /* Footer Colors */
            --footer-bg: #212929;
            --footer-text: #f8f9fa;
            --footer-muted: #adb5bd;
            --footer-accent: #174949;
            --footer-border: #343a40;
            
            /* Testimonial Colors (from the added section) */
            --primary-green: #9CCC65;
            --dark-green: #38761d;
            --star-gold: #FFB300;
            /* --text-dark: #37474F; */ /* This was conflicting with main site text-dark, using main one */
            --text-light: #78909C;
            --bg-light-gray: #f8f9fa;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            padding-top: 120px;
            background-color: var(--global-bg-color);
            overflow-x: hidden;
        }
        
        /* --- Floating Header --- */
        .floating-header {
            position: fixed;
            top: 20px;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 0 2rem;
            opacity: 0;
        }
        
        .navbar-container {
            max-width: 1280px; margin: 0 auto; background-color: var(--nav-bg); border-radius: 999px;
            padding: 12px 20px; display: flex; align-items: center; justify-content: space-between;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .nav-logo a { text-decoration: none; font-weight: 700; font-size: 1.1rem; display: flex; align-items: center; }
        .logo { width: 100px; height: auto; }
        .main-nav { display: flex; align-items: center; gap: 2rem; }
        .main-nav a { text-decoration: none; color: var(--text-dark); font-weight: 500; font-size: 1rem; transition: color 0.3s; position: relative; padding-bottom: 5px; }
        .main-nav a.active { font-weight: 600; }
        .main-nav a.active::after { content: ''; position: absolute; bottom: 0; left: 0; width: 100%; height: 2px; background-color: var(--text-dark); }
        .main-nav a:hover { color: #000; }
        .dropdown-toggle { display: flex; align-items: center; gap: 0.25rem; cursor: pointer; }
        .nav-actions { display: flex; align-items: center; gap: 1rem; }

        .user-icon-btn { display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; border: 1px solid #ddd; border-radius: 50%; color: var(--text-dark); transition: background-color 0.3s, border-color 0.3s, color 0.3s; }
        .user-icon-btn:hover { background-color: var(--hero-green); color: white; border-color: var(--hero-green); }

        .contact-btn { background-color: var(--nav-green); color: #FFFFFF; border: none; border-radius: 50px; padding: 8px 10px 8px 24px; font-size: 1rem; font-weight: 600; cursor: pointer; text-decoration: none; display: inline-flex; align-items: center; gap: 12px; transition: background-color 0.3s; }
        .contact-btn:hover { background-color: #112a2a; }
        .contact-arrow-circle { background-color: #FFFFFF; border-radius: 50%; width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; }
        .contact-arrow-circle svg { color: var(--nav-green); }
        
        /* --- General Section & Container Styling --- */
        .container { max-width: 1100px; margin: 0 auto; padding: 0 2rem; }
        .section-header { margin-bottom: 40px; }
        .eyebrow-text { color: var(--hero-green); font-weight: 600; font-size: 1rem; margin: 0; }
        .section-header h2 { color: var(--hero-green); font-size: 2.75rem; font-weight: 600; margin: 5px 0 0 0; }

        /* --- Hero Section --- */
        .hero-section { display: flex; align-items: center; padding: 40px 40px 60px 40px; max-width: 1300px; margin: 0 auto; gap: 40px; margin-bottom: 0; }
        .text-content { flex: 1; max-width: 550px; }
        .text-content h1, .text-content p, .text-content .shop-btn, .hero-checklist li { opacity: 0; }
        .text-content h1 { font-size: 64px; font-weight: 600; color: var(--hero-green); line-height: 1.1; margin: 0 0 25px 0; }
        .text-content p { font-size: 18px; line-height: 1.6; margin-bottom: 40px; max-width: 450px; }
        .shop-btn { background-color: var(--hero-green); color: #FFFFFF; border: none; border-radius: 50px; padding: 16px 40px; font-size: 18px; font-weight: 500; cursor: pointer; transition: background-color 0.3s; }
        .shop-btn:hover { background-color: #1b4e41; }
        
        .hero-checklist { list-style: none; padding: 0; margin: 40px 0 0 0; display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px 24px; }
        .hero-checklist li { display: flex; align-items: center; gap: 12px; font-size: 1rem; font-weight: 500; color: var(--hero-green); }
        .hero-checklist i { font-size: 1.25rem; color: var(--hero-green); width: 24px; text-align: center; }
        
        .image-content { flex: 1.2; display: flex; justify-content: center; align-items: center; position: relative; min-height: 450px; opacity: 0; }
        #animated-image { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; will-change: transform, width, height, border-radius; }

        /* --- "What We Do" Section --- */
        .what-we-do-section { padding: 40px 0 0 0; background: linear-gradient(rgb(241, 248, 248),rgb(244, 252, 251)); }
        .what-we-do-content { display: flex; align-items: center; gap: 3rem; }
        #image-target-container { flex: 1; width: 100%; aspect-ratio: 1 / 1; border-radius: 24px; }
        .what-we-do-text { flex: 1; }
        .what-we-do-text h1 { font-size: 2.75rem; font-weight: 600; color: var(--hero-green); margin-bottom: 20px;}
        .what-we-do-text p { font-size: 1.1rem; line-height: 1.7; color: var(--text-color); margin: 0 0 30px 0; }
        .schedule-btn { display: inline-flex; align-items: center; gap: 10px; background-color: var(--nav-green); color: #FFFFFF; padding: 14px 24px; border-radius: 999px; text-decoration: none; font-weight: 600; transition: background-color 0.3s ease; }
        .schedule-btn:hover { background-color: #112a2a; }
        .schedule-btn svg { width: 20px; height: 20px; }

        /* --- Visionaries Section --- */
        .visionaries-section {
            padding: 80px 0 80px; 
        }
        .visionaries-title { text-align: center; font-size: 2.75rem; font-weight: 600; margin-bottom: 12px; color: var(--hero-green); }
        .visionaries-subtitle { text-align: center; font-size: 1.2rem; color: var(--text-color); margin-bottom: 50px; }
        .card-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 0px; background: #fff; border-radius: 16px; box-shadow: 0 2px 28px 0 rgba(40, 76, 73, 0.06); overflow: hidden; margin: auto; }
        .card { text-align: center; padding: 44px 18px 28px 18px; display: flex; flex-direction: column; align-items: center; justify-content: center; border-right: 1px solid var(--card-border); opacity: 0; transform: scale(0.85); will-change: opacity, transform; }
        .card.in-view { animation: popIn 0.7s cubic-bezier(.24,1.54,.68,.98) forwards; animation-delay: var(--card-delay, 0s); }
        .card:nth-child(1) { --card-delay: 0.15s; } .card:nth-child(2) { --card-delay: 0.35s; } .card:nth-child(3) { --card-delay: 0.55s; } .card:nth-child(4) { --card-delay: 0.75s; }
        .card:last-child { border-right: none; }
        @keyframes popIn { 0% { opacity: 0; transform: scale(0.85); } 60% { opacity: 1; transform: scale(1.1); } 100% { opacity: 1; transform: scale(1); } }
        .card-icon { font-size: 2.8rem; color: var(--hero-green); margin-bottom: 12px; }
        .card-title { font-size: 1.1rem; font-weight: 600; color: var(--hero-green); line-height: 1.4; }
        
        /* --- SERVICES SECTION STYLES --- */
        .services-section {
            width: 100%;
            padding: 80px 0 20px;
            display: flex;
            align-items: stretch;
            box-sizing: border-box;
            overflow: hidden;
            background: linear-gradient(rgb(241, 248, 248),rgb(244, 252, 251));

        }

        .services-left {
            flex: 0 0 420px;
            min-width: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-end;
            padding: 2.5rem 2vw 2.5rem 6vw;
            box-sizing: border-box;
        }

        .services-left .text-block {
            width: 100%;
            max-width: 320px;
            text-align: left;
        }

        .services-left .text-block h2 {
            font-size: 2.75rem; 
            font-weight: 600;
            color: var(--hero-green);
            margin: 0 0 0.8rem 0;
            line-height: 1.2;
        }

        .services-left .text-block p {
            font-size: 1.1rem;
            color: var(--text-color);
            margin: 0 0 2rem 0;
            line-height: 1.7;
            font-weight: 400;
        }

        .scroll-nav { display: flex; gap: 1rem; margin-top: 0.7rem; }

        .scroll-btn {
            background: var(--nav-green);
            border: none;
            border-radius: 50%;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .scroll-btn:hover { background: #112a2a; }

        .services-right {
            flex: 1 1 0;
            display: flex;
            align-items: center;
            padding: 2rem 0 2rem 2vw;
            box-sizing: border-box;
            min-width: 0;
        }

        .horizontal-scroll-container {
            display: flex;
            overflow-x: auto;
            gap: 32px;
            scroll-behavior: auto;
            padding: 15px 4vw 20px 0;
            min-width: 100%;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .horizontal-scroll-container::-webkit-scrollbar { display: none; }

        .service-card {
            flex: 0 0 300px;
            height: 380px;
            background-color: #fff;
            background-size: cover;
            background-position: center;
            border-radius: 1.5rem;
            box-shadow: 0 4px 24px rgba(40, 76, 73, 0.05);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            transition: transform 0.25s, box-shadow 0.25s;
            cursor: pointer;
            overflow: hidden;
        }
        
        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 30px rgba(40, 76, 73, 0.1);
        }

        .service-card .card-top { padding: 1.25rem 1.7rem 0.5rem; }

        .service-card .service-number {
            background: var(--global-bg-color);
            border-radius: 0.62rem;
            padding: 0.32rem 0.85rem;
            font-size: 1rem;
            font-weight: 600;
            color: var(--hero-green);
            letter-spacing: 1px;
            display: inline-block;
        }

        .service-card .card-bottom {
            background: #fff;
            padding: 1.17rem 1.7rem 1.4rem;
            text-align: left;
        }

        .service-card .card-bottom h3 {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--hero-green);
            line-height: 1.4;
        }

        /* --- Animation for Services Section --- */
        .services-section .animated-item {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .services-section.is-visible .animated-item {
            opacity: 1;
            transform: translateY(0);
        }
        .services-section.is-visible .service-card:nth-child(1) { transition-delay: 0.1s; }
        .services-section.is-visible .service-card:nth-child(2) { transition-delay: 0.2s; }
        .services-section.is-visible .service-card:nth-child(3) { transition-delay: 0.3s; }
        .services-section.is-visible .service-card:nth-child(4) { transition-delay: 0.4s; }
        .services-section.is-visible .service-card:nth-child(5) { transition-delay: 0.5s; }

        /* --- VIDEO GALLERY STYLES --- */
        .our-world-section {
            padding: 80px 0;
            background: linear-gradient(rgb(241, 248, 248),rgb(244, 252, 251));
        }

        .our-world-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .our-world-container h2 {
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--hero-green);
            margin-bottom: 40px;
        }

        .gallery-container {
            position: relative;
        }

        .gallery {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding-bottom: 20px;
            gap: 16px;
            -ms-overflow-style: none;
            scrollbar-width: none;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .gallery::-webkit-scrollbar {
            display: none;
        }

        .gallery-item {
            flex: 0 0 280px;
            height: 400px;
            border-radius: 16px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
        }

        .gallery-item video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: var(--nav-green);
            color: white;
            border: none;
            border-radius: 50%;
            width: 44px;
            height: 44px;
            font-size: 24px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            transition: background-color 0.3s;
        }

        .arrow:hover { 
            background-color: #112a2a; 
        }
        .arrow.prev-arrow { 
            left: -20px; 
        }
        .arrow.next-arrow { 
            right: -20px; 
        }

        /* --- MEMBER LOGO CAROUSEL STYLES --- */
        .member-logos-carousel {
          background: transparent; /* MODIFIED: Matched to site background */
          padding: 48px 0;
          text-align: center;
          overflow: hidden;
        }

        .member-title {
          font-size: 2rem;
          margin-bottom: 32px;
          color: var(--hero-green); /* MODIFIED: Matched to site titles */
          font-weight: bold;
          letter-spacing: 1px;
        }

        .carousel-outer {
          width: 100%;
          max-width: 1100px;
          margin: 0 auto;
          overflow: hidden;
          position: relative;
          padding: 10px 0;
        }

        .carousel-inner {
          display: flex;
          gap: 36px;
          animation: carousel-loop 25s linear infinite; /* Adjusted speed slightly */
          width: max-content;
        }

        .carousel-logo {
          flex: 0 0 auto;
          width: 120px;
          height: 72px;
          background: #fff;
          border-radius: 10px;
          box-shadow: 0 2px 10px rgba(44, 108, 61, 0.07);
          display: flex;
          align-items: center;
          justify-content: center;
          transition: box-shadow 0.18s, transform 0.18s;
        }

        .carousel-logo img {
          max-width: 92px;
          max-height: 44px;
          object-fit: contain;
          opacity: 0.88;
          transition: opacity 0.2s, filter 0.18s;
        }

        .carousel-logo:hover {
          transform: scale(1.08);
          box-shadow: 0 6px 18px rgba(44, 108, 61, 0.14);
        }

        .carousel-logo:hover img {
          opacity: 1;
          filter: none;
        }

        @keyframes carousel-loop {
          0% { transform: translateX(0); }
          100% { transform: translateX(-50%); }
        }

        /* --- Scrolling Logos Section (Academic Partners) --- */
        .partner-logos-section {
            display: flex;
            align-items: center;
            padding: 2rem 0;
            background-color: transparent;
            border-top: 1px solid #e0e0e0;
            border-bottom: 1px solid #e0e0e0;
        }

        .partner-logos-section .title {
            color: #5a5a5a;
            font-weight: 500;
            font-size: 1.1rem;
            margin-left: 3rem;
            margin-right: 3rem;
            white-space: nowrap;
        }

        .logos-scroller {
            flex-grow: 1;
            overflow: hidden;
            position: relative;
            -webkit-mask-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,1) 10%, rgba(0,0,0,1) 90%, rgba(0,0,0,0));
            mask-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,1) 10%, rgba(0,0,0,1) 90%, rgba(0,0,0,0));
        }

        .logos-track {
            display: flex;
            width: fit-content;
            animation: scroll 12s linear infinite;
        }

        .logo-item {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
            width: 180px;
            height: 90px;
            margin: 0 1rem;
            box-sizing: border-box;
        }

        .logo-item img {
            max-height: 40px;
            max-width: 110px;
            width: auto;
        }

        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        
        /* --- START: TESTIMONIAL STYLES --- */
        .testimonial-section {
            position: relative;
            width: 100%;
            max-width: 1200px;
            padding: 80px 2rem 4rem; /* Adjusted padding to match other sections */
            box-sizing: border-box;
            overflow: hidden;
            margin: 0 auto;
        }

        .testimonial-slider {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }
        
        /* === MODIFIED RULE HERE === */
        .slider-eyebrow {
            font-size: 2rem;
            margin-bottom: 32px;
            color: var(--hero-green);
            font-weight: bold;
            letter-spacing: 1px;
        }
        
        .testimonial-content {
            position: relative;
            transition: opacity 0.4s ease-in-out;
            min-height: 250px;
        }

        .star-rating {
            color: var(--star-gold);
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }

        .testimonial-text {
            font-size: 1.75rem;
            font-weight: 400;
            line-height: 1.5;
            color: var(--text-dark);
            max-width: 750px;
            margin: 0 auto;
            quotes: """ """;
            padding-bottom: 60px;
        }
        
        .testimonial-text::before { content: open-quote; }
        .testimonial-text::after { content: close-quote; }

        .testimonial-author-info {
            position: absolute;
            bottom: 0;
            right: 0;
            text-align: right;
        }

        .author-name {
            font-size: 0.9rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #222;
            margin: 0;
        }

        .author-title {
            font-size: 0.8rem;
            color: #666;
            margin: 2px 0 0 0;
        }
        
        .slider-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: var(--bg-light-gray);
            border: 1px solid #E9ECEF;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--dark-green);
            font-size: 1.5rem;
            transition: background-color 0.3s, box-shadow 0.3s;
            z-index: 10;
        }

        .slider-arrow:hover { 
            background-color: #f1f3f5; 
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); 
        }

        .arrow-left { left: 0; }
        .arrow-right { right: 0; }
        /* --- END: TESTIMONIAL STYLES --- */


        /* --- ADDED BANNER SECTION STYLES --- */
        .banner {
            position: relative;
            width: 100%;
            padding: 80px 0; 
            background: 
                linear-gradient(135deg, rgba(44, 70, 67, 0.85), rgba(39, 71, 56, 0.85)),
                url('im10.jpeg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .banner-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            max-width: 800px;
            padding: 20px;
        }

        .banner-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 15px;
            letter-spacing: 1px;
            line-height: 1.2;
        }

        .banner-subtitle {
            font-size: 1.3rem;
            font-weight: 400;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        .banner-buttons { display: flex; justify-content: center; }
        .btn { display: inline-block; padding: 12px 35px; font-size: 1rem; font-weight: 600; text-decoration: none; border-radius: 50px; transition: all 0.3s ease; cursor: pointer; }
        .btn-primary { background: white; color: var(--nav-green); border: 2px solid white; }
        .btn-primary:hover { background: transparent; color: white; }
        
        /* --- Floating Action Button --- */
        .chat-fab { position: fixed; bottom: 30px; right: 30px; background-color: var(--light-peach); border: none; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); transition: transform 0.2s; z-index: 999; }
        .chat-fab:hover { transform: scale(1.1); }
        .chat-fab svg { width: 28px; height: 28px; color: var(--icon-brown); }
        
        /* --- Footer Styles --- */
        .site-footer-pro {
            background-color: var(--footer-bg);
            color: var(--footer-text);
        }
        .footer-top {
            display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1.5rem;
            padding: 1.5rem 2rem; max-width: 1320px; margin: 0 auto; border-bottom: 1px solid var(--footer-border);
        }
        .logo-area { text-decoration: none; color: white; }
        .logo-text { font-size: 2.25rem; font-weight: 600; display: block; }
        .logo-subtext { font-size: 0.9rem; color: var(--footer-muted); letter-spacing: 0.5px; }
        .btn-cta { background-color: var(--footer-accent); color: white; padding: 0.8rem 1.75rem; border-radius: 50px; text-decoration: none; font-weight: 600; transition: background-color 0.2s; }
        .btn-cta:hover { background-color: #0b4d44; }
        .footer-main { padding: 3rem 2rem; max-width: 1320px; margin: 0 auto; }
        .footer-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2.5rem; }
        .footer-heading { font-size: 1.1rem; font-weight: 600; margin-top: 0; margin-bottom: 1.25rem; color: white; }
        .about-text { color: var(--footer-muted); line-height: 1.6; margin: 0 0 1.5rem; }
        .link-list { list-style: none; padding: 0; margin: 0; display: grid; gap: 0.75rem; }
        .link-list a { color: var(--footer-muted); text-decoration: none; }
        .link-list a:hover { color: var(--footer-text); }
        .contact-details { font-style: normal; display: grid; gap: 0.75rem; margin-bottom: 1.5rem; color: var(--footer-muted); }
        .contact-details p { margin: 0; }
        .contact-details a { color: var(--footer-muted); text-decoration: none; }
        .contact-details a:hover { color: var(--footer-text); }
        .map-container { border-radius: 8px; overflow: hidden; }
        .social-icons { list-style: none; padding: 0; margin: 0; display: flex; gap: 1rem; }
        .social-icons a { display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; background-color: #343a40; border-radius: 50%; transition: background-color 0.2s ease; }
        .social-icons a:hover { background-color: var(--footer-accent); }
        .social-icons a svg { width: 18px; height: 18px; fill: var(--footer-text); }
        .sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border-width: 0; }

        /* --- NEW: POPUP FORM STYLES --- */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(45, 89, 78, 0.7);
            backdrop-filter: blur(5px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .popup-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .popup-form-container {
            background-color: #fff;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            max-width: 550px;
            width: 90%;
            position: relative;
            transform: scale(0.95);
            transition: transform 0.3s ease;
            max-height: 90vh;
            overflow-y: auto;
        }

        .popup-overlay.active .popup-form-container {
            transform: scale(1);
        }

        .close-popup-btn {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 2.5rem;
            color: #999;
            cursor: pointer;
            line-height: 1;
            transition: color 0.2s;
        }

        .close-popup-btn:hover {
            color: #333;
        }

        .popup-form-container h3 {
            color: var(--hero-green);
            font-size: 2rem;
            margin: 0 0 8px 0;
            text-align: center;
        }

        .popup-form-container p {
            color: var(--text-color);
            text-align: center;
            margin: 0 0 2rem 0;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: var(--text-dark);
            font-size: 0.9rem;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--hero-green);
            box-shadow: 0 0 0 3px rgba(45, 89, 78, 0.2);
        }

        .form-submit-btn {
            width: 100%;
            background-color: var(--hero-green);
            color: #FFFFFF;
            border: none;
            border-radius: 8px;
            padding: 14px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 1rem;
        }

        .form-submit-btn:hover {
            background-color: #1b4e41;
        }
        
        body.popup-active {
            overflow: hidden;
        }

        /* --- Responsive Adjustments --- */
        @media (max-width: 1100px) { 
            .hero-checklist { justify-content: center; margin-left: auto; margin-right: auto; } 
            .slider-arrow { display: none; } /* From Testimonials */
        }
        @media (max-width: 992px) { .main-nav { display: none; } .floating-header { padding: 0 1rem; } }
        @media (max-width: 900px) {
            .card-grid { grid-template-columns: repeat(2, 1fr); }
            .card:nth-child(2) { border-right: none; }
            .card:nth-child(1), .card:nth-child(2) { border-bottom: 1px solid var(--card-border); }
            .services-section { flex-direction: column; padding-top: 40px; padding-bottom: 40px; }
            .services-left { align-items: flex-start; padding: 0 6vw 1.5rem; max-width: 100%; }
            .services-left .text-block { max-width: none; }
            .services-right { width: 100%; max-width: 100vw; padding: 0 0 1.3rem 6vw; }
            .scroll-nav { display: none; }
            .horizontal-scroll-container { scroll-snap-type: x mandatory; }
            .service-card { scroll-snap-align: start; }
        }
        @media (max-width: 768px) {
            body { padding-top: 100px; }
            .hero-section { flex-direction: column; text-align: center; padding: 40px 20px; margin-bottom: 30px; }
            .text-content { order: 2; max-width: 100%; }
            .text-content p { margin-left: auto; margin-right: auto; }
            .image-content { order: 1; margin-bottom: 2rem; min-height: 300px; width: 100%; }
            .what-we-do-content { flex-direction: column; }
            
            /* === MODIFIED RULE HERE: Added .slider-eyebrow to the group === */
            .section-header h2, .visionaries-title, .services-left .text-block h2, .what-we-do-text h1, .member-title, .slider-eyebrow { font-size: 2.25rem; }
            
            .hero-checklist { grid-template-columns: 1fr; display: inline-grid; text-align: left; }

            .arrow.prev-arrow { left: 10px; }
            .arrow.next-arrow { right: 10px; }
            .gallery-item {
                flex: 0 0 240px;
                height: 350px;
            }
            .partner-logos-section {
                flex-direction: column;
                padding: 1.5rem 0;
            }
            .partner-logos-section .title {
                margin: 0 0 1.5rem 0;
                white-space: normal;
                text-align: center;
            }
            .logos-scroller { width: 100%; }
            
            /* Testimonial Responsive */
            .testimonial-content { min-height: 320px; }
            .testimonial-text { font-size: 1.25rem; }
            .testimonial-author-info {
                position: static;
                margin-top: 2rem;
                text-align: center;
            }
            /* Popup Form Responsive */
            .popup-form-container {
                padding: 2rem 1.5rem;
            }
            .popup-form-container h3 {
                font-size: 1.7rem;
            }
        }
        @media (max-width: 600px) {
            .card-grid { grid-template-columns: 1fr; }
            .card { border-right: none !important; border-bottom: 1px solid var(--card-border); }
            .card:last-child { border-bottom: none; }
            .service-card { flex-basis: 75vw; height: 350px; }
            .services-left { padding: 0 5vw 1.5rem; }
            .services-right { padding: 0 0 2rem 5vw; }

            /* === MODIFIED RULE HERE: Added .slider-eyebrow === */
            .member-title, .slider-eyebrow { font-size: 1.5rem; }

            /* Logo Carousel Responsive */
            .carousel-logo { width: 80px; height: 50px; }
            .carousel-inner { gap: 18px; }
        }
    </style>
</head>
<body>

    <body>

    <?php
        // PHP code to display modern SweetAlert2 modals based on the 'status' URL parameter
        if (isset($_GET['status'])) {
            // We'll echo the <script> tag once and build the SweetAlert inside it.
            echo "<script>";

            // --- SUCCESS CASE ---
            if ($_GET['status'] == 'success') {
                echo "
                    Swal.fire({
                        icon: 'success',
                        title: 'Submitted Successfully!',
                        text: 'Thank you! We will get in touch with you shortly.',
                        confirmButtonColor: '#2d594e' // Matches your site's --hero-green color
                    });
                ";
            } 
            // --- ERROR CASE ---
            elseif ($_GET['status'] == 'error') {
                // Get the error message and sanitize it to prevent security issues (XSS)
                $errorMessage = htmlspecialchars(isset($_GET['msg']) ? $_GET['msg'] : 'An unknown error occurred. Please try again.');
                
                echo "
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops... Something Went Wrong!',
                        text: '{$errorMessage}',
                        confirmButtonColor: '#2d594e'
                    });
                ";
            }
            
            echo "</script>";
        }
    ?>
    
    
    <header class="floating-header">
        <nav class="navbar-container">
            <div class="nav-logo">
                <a href="#">
                    <img src="Food-M.png" alt="Food Maveriks Logo" class="logo">
                </a>
            </div>
            <div class="nav-actions">
                <a href="login.php" class="user-icon-btn" aria-label="User account"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 21V19C20 16.7909 18.2091 15 16 15H8C5.79086 15 4 16.7909 4 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                <a href="#" class="contact-btn">Get start <span class="contact-arrow-circle"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 17L17 7M17 7H10M17 7V14" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span></a>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero-section">
            <div class="text-content">
                <h1>From Idea to Aisle</h1>
                <p>Build successful food & beverage brand with our R&D first food tech consulting</p>
                <button class="shop-btn">Book a Free Consultation</button>
                <ul class="hero-checklist">
                    <li><i class="fas fa-flask-vial"></i><span>Formulation</span></li>
                    <li><i class="fas fa-clipboard-check"></i><span>FSSAI & Claims</span></li>
                    <li><i class="fas fa-chart-line"></i><span>Pilot & Scale Up</span></li>
                    <li><i class="fas fa-hourglass-half"></i><span>Shelf-Life</span></li>
                    <li><i class="fas fa-industry"></i><span>Factory Setup</span></li>
                    <li><i class="fas fa-handshake-simple"></i><span>Contract Manufacturing</span></li>
                </ul>
            </div>
            <div class="image-content">
                <img src="image1.png" alt="Bottles of fresh juice with ingredients" id="animated-image">
            </div>
        </section>

        <section class="what-we-do-section">
            <div class="container">
                <div class="section-header"><h2>About us</h2></div>
                <div class="what-we-do-content">
                    <div id="image-target-container"></div>
                    <div class="what-we-do-text">
                        <h1>What We Do</h1>
                        <p>R&D first food tech consultants helping brands go From Idea to Aisle. We blend chef craft, food science, and FSSAI-ready compliance to build scalable, shelf-stable products—pilot to factory, paperwork to launch. Let’s build something people love.<br><strong>Food Maveriks:</strong> Where food vision becomes market reality</p>
                        <a href="#" class="schedule-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"></path></svg><span>Schedule Meeting</span></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="visionaries-section">
            <div class="container">
                <h2 class="visionaries-title">Tailored Solution for Visionaries</h2>
                <p class="visionaries-subtitle">We empower food brands at every stage of their journey.</p>
                <div class="card-grid">
                    <div class="card"><span class="card-icon"><i class="fas fa-lightbulb"></i></span><div class="card-title">Aspiring food<br>entrepreneurs</div></div>
                    <div class="card"><span class="card-icon"><i class="fas fa-box-open"></i></span><div class="card-title">Emerging Food<br>Startups</div></div>
                    <div class="card"><span class="card-icon"><i class="fas fa-seedling"></i></span><div class="card-title">Growth Stage<br>Brands</div></div>
                    <div class="card"><span class="card-icon"><i class="fas fa-university"></i></span><div class="card-title">Established<br>Brands</div></div>
                </div>
            </div>
        </section>
        
        <!-- Member Logo Carousel Section -->
        <section class="member-logos-carousel">
            <h2 class="member-title">Our Academic Partners</h2>
            <div class="carousel-outer">
              <div class="carousel-inner">
                <!-- Using placeholders, replace with your actual logo files -->
                <div class="carousel-logo"><img src="Screenshot 2025-11-12 124216.png" alt="Member 1" /></div>
                <div class="carousel-logo"><img src="Screenshot 2025-11-12 124248.png" alt="Member 2" /></div>
                <div class="carousel-logo"><img src="Screenshot 2025-11-12 124316.png" alt="Member 3" /></div>
                <div class="carousel-logo"><img src="Screenshot 2025-11-12 124340.png" alt="Member 4" /></div>
                <div class="carousel-logo"><img src="sblogo.png" alt="Member 4" /></div>
                <!-- Repeat logos for seamless infinite loop -->
                <div class="carousel-logo"><img src="Screenshot 2025-11-12 124216.png" alt="Member 1" /></div>
                <div class="carousel-logo"><img src="Screenshot 2025-11-12 124248.png" alt="Member 2" /></div>
                <div class="carousel-logo"><img src="Screenshot 2025-11-12 124316.png" alt="Member 3" /></div>
                <div class="carousel-logo"><img src="Screenshot 2025-11-12 124340.png" alt="Member 4" /></div>
                <div class="carousel-logo"><img src="sblogo.png" alt="Member 4" /></div>
            </div>
        </section>

        <section class="services-section">
            <div class="services-left">
                <div class="text-block animated-item">
                    <h2>Our Services</h2>
                    <p>Your R&D partner for clean-label, functional, and market-fit products complete with documentation, claims, and tech transfer.</p>
                    <div class="scroll-nav">
                        <button id="scrollLeftBtn" class="scroll-btn"><i class="fa fa-arrow-left"></i></button>
                        <button id="scrollRightBtn" class="scroll-btn"><i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="services-right">
                <div class="horizontal-scroll-container" id="scrollContainer">
                    <div class="service-card animated-item" style="background-image: url('image21.png');">
                        <div class="card-top"><span class="service-number">01</span></div>
                        <div class="card-bottom"><h3>Food & Beverages Formulation</h3></div>
                    </div>
                    <div class="service-card animated-item" style="background-image: url('image22.png');">
                        <div class="card-top"><span class="service-number">02</span></div>
                        <div class="card-bottom"><h3>Product Strategy & Concept Feasibility</h3></div>
                    </div>
                    <div class="service-card animated-item" style="background-image: url('image23.png');">
                        <div class="card-top"><span class="service-number">03</span></div>
                        <div class="card-bottom"><h3>Pilot, Packaging & Shelf-Life</h3></div>
                    </div>
                    <div class="service-card animated-item" style="background-image: url('image24.png');">
                        <div class="card-top"><span class="service-number">04</span></div>
                        <div class="card-bottom"><h3>Factory Setup & Scale - Up </h3></div>
                    </div>
                    <div class="service-card animated-item" style="background-image: url('image25.png');">
                        <div class="card-top"><span class="service-number">05</span></div>
                        <div class="card-bottom"><h3>Contract Manufacturing</h3></div>
                    </div>
                    <div class="service-card animated-item" style="background-image: url('image26.png');">
                        <div class="card-top"><span class="service-number">06</span></div>
                        <div class="card-bottom"><h3>Packaging & Branding Consultation</h3></div>
                    </div>
                    <div class="service-card animated-item" style="background-image: url('image27.png');">
                        <div class="card-top"><span class="service-number">07</span></div>
                        <div class="card-bottom"><h3>Market Research & Feasibility Study </h3></div>
                    </div>
                </div>
            </div>
        </section>
    

        <!-- CUSTOMER TESTIMONIALS SECTION -->
        <section class="testimonial-section">
            <button class="slider-arrow arrow-left"><i class="fa-solid fa-chevron-left"></i></button>
            <div class="testimonial-slider">
                <p class="slider-eyebrow">WHAT OUR CUSTOMER SAY!</p>
                <div class="testimonial-content">
                    <div class="star-rating"></div>
                    <blockquote class="testimonial-text"></blockquote>
                    <div class="testimonial-author-info"></div>
                </div>
            </div>
            <button class="slider-arrow arrow-right"><i class="fa-solid fa-chevron-right"></i></button>
        </section>
        
        <!-- Member Logo Carousel Section -->
        <section class="member-logos-carousel">
            <h2 class="member-title">Our Members</h2>
            <div class="carousel-outer">
              <div class="carousel-inner">
                <!-- Using placeholders, replace with your actual logo files -->
                <div class="carousel-logo"><img src="WhatsApp Image 2025-11-12 at 12.09.12 PM (1).jpeg" alt="Member 1" /></div>
                <div class="carousel-logo"><img src="WhatsApp Image 2025-11-12 at 12.09.12 PM.jpeg" alt="Member 2" /></div>
                <div class="carousel-logo"><img src="WhatsApp Image 2025-11-12 at 12.09.13 PM.jpeg  " alt="Member 3" /></div>
                <div class="carousel-logo"><img src="WhatsApp Image 2025-11-12 at 12.09.11 PM.jpeg" alt="Member 4" /></div>
                <!-- Repeat logos for seamless infinite loop -->
                <div class="carousel-logo"><img src="WhatsApp Image 2025-11-12 at 12.09.12 PM (1).jpeg" alt="Member 1" /></div>
                <div class="carousel-logo"><img src="WhatsApp Image 2025-11-12 at 12.09.12 PM.jpeg" alt="Member 2" /></div>
                <div class="carousel-logo"><img src="WhatsApp Image 2025-11-12 at 12.09.13 PM.jpeg  " alt="Member 3" /></div>
                <div class="carousel-logo"><img src="WhatsApp Image 2025-11-12 at 12.09.11 PM.jpeg" alt="Member 4" /></div>
              </div>
            </div>
        </section>

        <!-- FULL-WIDTH BANNER SECTION -->
        <section class="banner">
            <div class="banner-content">
                <h1 class="banner-title">Turn your food idea into a market ready product.</h1>
                <p class="banner-subtitle">Join our team of experts</p>
                <div class="banner-buttons">
                    <a href="#" class="btn btn-primary shop-btn">Get Started</a>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer-pro" role="contentinfo">
        <div class="footer-top"><a class="logo-area" href="/" aria-label="Food Maverik Home"><span class="logo-text">Food Maverik.</span><span class="logo-subtext">From Idea to Aisle™</span></a><a href="#" class="btn-cta">Request Consultant</a></div>
        <div class="footer-main">
          <div class="footer-grid">
            <section class="footer-col" aria-labelledby="footer-about-title">
              <h2 id="footer-about-title" class="sr-only">About Food Maverik</h2>
              <p class="about-text">R&D-first food tech consultants helping brands go From Idea to Aisle™. We blend chef craft, food science, and FSSAI-ready compliance to build scalable, shelf-stable products pilot to factory, paperwork to launch.</p>
              <ul class="social-icons">
                <li><a href="#" aria-label="Facebook"><svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.494v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.323-1.325z"/></svg></a></li>
                <li><a href="#" aria-label="Instagram"><svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.488.96-.91 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.488-1.379-.91-.42-.419-.69-.824-.91-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.859 0-3.211.016-3.586.061-4.859.061-1.17.255-1.814.42-2.234.21-.57.479-.96.91-1.381.419-.419.81-.689 1.379-.91.42-.165 1.065-.36 2.235-.413C8.414 2.18 8.79 2.16 12 2.16zm0 3.094c-3.518 0-6.375 2.857-6.375 6.375s2.857 6.375 6.375 6.375 6.375-2.857 6.375-6.375S15.518 5.254 12 5.254zm0 10.652c-2.354 0-4.278-1.924-4.278-4.278s1.924-4.278 4.278-4.278 4.278 1.924 4.278 4.278-1.924 4.278-4.278 4.278zm4.965-10.275c-.822 0-1.487.665-1.487 1.487s.665 1.487 1.487 1.487 1.487-.665 1.487-1.487-.665-1.487-1.487-1.487z"/></svg></a></li>
                <li><a href="#" aria-label="LinkedIn"><svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.225 0z"/></svg></a></li>
                <li><a href="#" aria-label="YouTube"><svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg></a></li>
              </ul>
            </section>
            <section class="footer-col" aria-labelledby="footer-services-title">
              <h2 id="footer-services-title" class="footer-heading">Food Consulting Services</h2>
              <ul class="link-list"><li><a href="#">Food Consultant in Chennai</a></li><li><a href="#">Food Consultant in Bangalore</a></li><li><a href="#">Food Consultant in Trichy</a></li><li><a href="#">Food Consultant in Mumbai</a></li><li><a href="#">Food Consultant in Pune</a></li><li><a href="#">Food Consultant in Delhi</a></li><li><a href="#">Food Consultant in Kolkata</a></li><li><a href="#">Food Consultant in Hyderabad</a></li></ul>
            </section>
            <section class="footer-col" aria-labelledby="footer-formulation-title">
              <h2 id="footer-formulation-title" class="footer-heading">Formulation</h2>
              <ul class="link-list"><li><a href="#">Protein Bar recipe</a></li><li><a href="#">Probiotic Drink recipe</a></li><li><a href="#">Kombucha Drink recipe</a></li><li><a href="#">Functional Chocolates recipe</a></li></ul>
            </section>
            <section class="footer-col" aria-labelledby="footer-contact-title">
              <h2 id="footer-contact-title" class="footer-heading">Address</h2>
              <address class="contact-details"><p><strong>Food Maverik Labs</strong></p><p>Door no 189/2A, Vasan valley 17th cross, post, west extension, Malliampathu, Tiruchirappalli, Tamil Nadu 620102</p></address>
              <div class="map-container"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.598375496417!2d78.74106567588386!3d10.84227185800055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3baaf06173045a55%3A0xc68294a5e2f7547!2sFood%20Maverik%20Labs%20-%20Food%20Consultant!5e0!3m2!1sen!2sin!4v1701105944988!5m2!1sen!2sin" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Location of Food Maverik Labs in Tiruchirappalli"></iframe></div>
            </section>
          </div>
        </div>
    </footer>


    <button class="chat-fab" aria-label="Open chat">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
    </button>
    
    <!-- NEW: POPUP FORM HTML -->
    <div class="popup-overlay" id="consultation-popup">
        <div class="popup-form-container">
            <span class="close-popup-btn" id="close-popup">&times;</span>
            <h3>Book a Free Consultation</h3>
            <p>Fill out the form below, and one of our experts will get in touch with you shortly.</p>
            <form action="handle_form.php" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="company-name">Company Name:</label>
                    <input type="text" id="company-name" name="company-name">
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile:</label>
                    <input type="tel" id="mobile" name="mobile" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="project-nature">Nature of Project:</label>
                    <select id="project-nature" name="project-nature" required>
                        <option value="" disabled selected>-- Select an option --</option>
                        <option value="food-formulation">Food Product formulation</option>
                        <option value="beverage-formulation">Beverage Formulation</option>
                        <option value="shelf-life">Shelf Life Extension</option>
                        <option value="novel-formulation">Novel Formulation</option>
                        <option value="nutraceutical-formulation">Nutraceutical Formulation</option>
                        <option value="recipe-optimisation">Product Recipe Optimisation</option>
                        <option value="others">Others</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="project-description">Description of the Project:</label>
                    <textarea id="project-description" name="project-description" rows="4" placeholder="Please provide a brief overview of your project..."></textarea>
                </div>
                <button type="submit" class="form-submit-btn">Submit Request</button>
            </form>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            gsap.registerPlugin(ScrollTrigger);
            const tl = gsap.timeline({ defaults: { ease: "power3.out" } });
            tl.to('.floating-header', { yPercent: 0, autoAlpha: 1, duration: 1 });
            tl.to(['.text-content h1', '.text-content p', '.text-content .shop-btn'], { y: 0, autoAlpha: 1, duration: 0.8, stagger: 0.2 }, "-=0.6");
            tl.to('.image-content', { autoAlpha: 1, scale: 1, duration: 1.2 }, "<");
            tl.to('.hero-checklist li', { y: 0, autoAlpha: 1, duration: 0.5, stagger: 0.1 }, "-=0.8");
            
            const animatedImage = document.getElementById("animated-image");
            const imageTarget = document.getElementById("image-target-container");
            
            if (animatedImage && imageTarget) {
                gsap.matchMedia().add({ isDesktop: "(min-width: 769px)", isMobile: "(max-width: 768px)" }, (context) => {
                    let { isDesktop } = context.conditions;
                    gsap.to(animatedImage, {
                        width: () => imageTarget.offsetWidth, height: () => imageTarget.offsetHeight,
                        x: () => imageTarget.getBoundingClientRect().left - animatedImage.getBoundingClientRect().left,
                        y: () => imageTarget.getBoundingClientRect().top - animatedImage.getBoundingClientRect().top,
                        borderRadius: "24px", ease: "none",
                        scrollTrigger: {
                            trigger: ".what-we-do-section", start: "top bottom",
                            end: isDesktop ? "top top+=100" : "top center",
                            scrub: true, invalidateOnRefresh: true, 
                        }
                    });
                });
            }
        });
    </script>
    <script>
        const observers = [];
        const sectionsToAnimate = [
            { selector: '.card', class: 'in-view' },
            { selector: '.services-section', class: 'is-visible' }
        ];

        sectionsToAnimate.forEach(config => {
            const elements = document.querySelectorAll(config.selector);
            if(elements.length > 0) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add(config.class);
                        }
                    });
                }, { threshold: 0.1 });

                if(config.selector === '.services-section') {
                    observer.observe(document.querySelector('.services-section'));
                } else {
                    elements.forEach(el => observer.observe(el));
                }
                observers.push(observer);
            }
        });
    </script>
    <script>
        const scrollContainer = document.getElementById('scrollContainer');
        const scrollLeftBtn = document.getElementById('scrollLeftBtn');
        const scrollRightBtn = document.getElementById('scrollRightBtn');
        
        if (scrollLeftBtn && scrollRightBtn) {
            scrollContainer.style.scrollBehavior = 'smooth';

            function getScrollAmount() {
                const firstCard = scrollContainer.querySelector('.service-card');
                if (!firstCard) return 300; 
                const containerStyle = window.getComputedStyle(scrollContainer);
                const gap = parseFloat(containerStyle.gap) || 32;
                return firstCard.offsetWidth + gap;
            }
            scrollLeftBtn.addEventListener('click', () => { scrollContainer.scrollBy({ left: -getScrollAmount() }); });
            scrollRightBtn.addEventListener('click', () => { scrollContainer.scrollBy({ left: getScrollAmount() }); });
        }
    </script>
    <script>
      // --- Video Gallery Arrow Navigation ---
      document.addEventListener('DOMContentLoaded', function() {
          const gallery = document.querySelector('.gallery');
          const prevArrow = document.querySelector('.prev-arrow');
          const nextArrow = document.querySelector('.next-arrow');
          
          if (gallery && prevArrow && nextArrow) {
              const scrollAmount = 296; // 280px item width + 16px gap
              
              nextArrow.addEventListener('click', () => {
                  gallery.scrollBy({ left: scrollAmount, behavior: 'smooth' });
              });
              
              prevArrow.addEventListener('click', () => {
                  gallery.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
              });
              
              const checkArrows = () => {
                const maxScroll = gallery.scrollWidth - gallery.clientWidth;
                prevArrow.style.opacity = gallery.scrollLeft <= 0 ? '0.3' : '1';
                prevArrow.style.cursor = gallery.scrollLeft <= 0 ? 'not-allowed' : 'pointer';
                nextArrow.style.opacity = gallery.scrollLeft >= maxScroll - 1 ? '0.3' : '1';
                nextArrow.style.cursor = gallery.scrollLeft >= maxScroll - 1 ? 'not-allowed' : 'pointer';
              };
              
              gallery.addEventListener('scroll', checkArrows);
              window.addEventListener('resize', checkArrows); // Check on resize too
              checkArrows(); // Initial check
          }
      });
    </script>
    
    <!-- SCRIPT FOR TESTIMONIAL SLIDER -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const testimonials = [
                {
                    quote: "This is a truly amazing product. I've seen a huge improvement in my daily routine and can't imagine my life without it now. Highly recommended!",
                    name: "Jevan Nagarajah",
                    title: "Founder and CEO",
                    rating: 5
                },
                {
                    quote: "Good value for the price. It does exactly what it promises. The customer service was also very helpful when I had a question.",
                    name: "Wendy Rose",
                    title: "Marketing Director",
                    rating: 4
                },
                {
                    quote: "A perfect place to visit on a rainy autumn Sunday. The place is clean and new which is great, and they have comfortable couches to sit at. Reasonably priced too. We'll definitely be coming back!",
                    name: "Linda Reid",
                    title: "Product Manager",
                    rating: 5
                },
                {
                    quote: "An exceptional experience from start to finish. The design is beautiful and the functionality is flawless. Worth every penny.",
                    name: "Eleonora L.",
                    title: "Lead Designer",
                    rating: 5
                }
            ];

            let currentIndex = 0;

            const testimonialTextEl = document.querySelector('.testimonial-text');
            const starRatingEl = document.querySelector('.star-rating');
            const authorInfoEl = document.querySelector('.testimonial-author-info');
            const testimonialContentEl = document.querySelector('.testimonial-content');
            const prevButton = document.querySelector('.arrow-left');
            const nextButton = document.querySelector('.arrow-right');
            
            if (testimonialTextEl && prevButton && nextButton) {
                function generateStars(rating) {
                    let starsHTML = '';
                    for (let i = 0; i < 5; i++) {
                        starsHTML += `<i class="fa-${i < rating ? 'solid' : 'regular'} fa-star"></i>`;
                    }
                    return starsHTML;
                }

                function showTestimonial(index) {
                    const testimonial = testimonials[index];
                    testimonialContentEl.style.opacity = 0;

                    setTimeout(() => {
                        testimonialTextEl.textContent = testimonial.quote;
                        starRatingEl.innerHTML = generateStars(testimonial.rating);
                        authorInfoEl.innerHTML = `
                            <p class="author-name">${testimonial.name}</p>
                            <p class="author-title">${testimonial.title}</p>
                        `;
                        testimonialContentEl.style.opacity = 1;
                    }, 400);
                }
                
                prevButton.addEventListener('click', () => {
                    currentIndex = (currentIndex > 0) ? currentIndex - 1 : testimonials.length - 1;
                    showTestimonial(currentIndex);
                });

                nextButton.addEventListener('click', () => {
                    currentIndex = (currentIndex < testimonials.length - 1) ? currentIndex + 1 : 0;
                    showTestimonial(currentIndex);
                });
                
                showTestimonial(currentIndex);
            }
        });
    </script>
    
    <!-- NEW: SCRIPT FOR CONSULTATION POPUP FORM -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Elements
            const popupOverlay = document.getElementById('consultation-popup');
            const closeBtn = document.getElementById('close-popup');
            // All buttons that can open the popup
            const openBtns = document.querySelectorAll('.shop-btn, .contact-btn, .btn-cta, .schedule-btn');

            // Function to open the popup
            const openPopup = () => {
                if (popupOverlay) {
                    popupOverlay.classList.add('active');
                    document.body.classList.add('popup-active');
                }
            };

            // Function to close the popup
            const closePopup = () => {
                if (popupOverlay) {
                    popupOverlay.classList.remove('active');
                    document.body.classList.remove('popup-active');
                }
            };

            // Event Listeners for opening
            openBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault(); // Prevent default link behavior
                    openPopup();
                });
            });

            // Event Listeners for closing
            if (closeBtn) {
                closeBtn.addEventListener('click', closePopup);
            }

            if (popupOverlay) {
                // Close when clicking on the overlay background
                popupOverlay.addEventListener('click', (e) => {
                    if (e.target === popupOverlay) {
                        closePopup();
                    }
                });
            }

            // Close with the 'Escape' key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && popupOverlay.classList.contains('active')) {
                    closePopup();
                }
            });
        });
    </script>
    
</body>
</html>