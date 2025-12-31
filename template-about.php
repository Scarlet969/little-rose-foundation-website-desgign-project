<?php
/*
Template Name: About me Art - All In One
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Về chúng tôi - Little Rose Foundation</title>
    
    <!-- 1. Thư viện chuẩn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        :root { 
            --primary-green: #008D42; 
            --primary-red: #E30613; 
            --bg-warm: #FDFBFA;
        }
        
        body { 
            font-family: 'Montserrat', sans-serif !important; 
            background-color: var(--bg-warm); 
            overflow-x: hidden; 
        }
        
        /* FIX NÚT ĐÓNG GÓP - CHUẨN ẢNH 3 */
        .btn-donate { 
            background-color: var(--primary-red) !important; 
            color: white !important; 
            font-weight: 800 !important; 
            border-radius: 50px !important; 
            padding: 10px 30px !important; 
            border: none !important; 
            font-family: 'Montserrat', sans-serif !important;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        
        .btn-donate:hover {
            background-color: #c00011 !important;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(227, 6, 19, 0.3);
        }

        .lang-switch { 
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 800 !important; 
            cursor: pointer; 
            color: #999; 
            padding-bottom: 2px; 
            text-decoration: none; 
            transition: 0.3s;
            font-size: 0.9rem;
        }

        .lang-switch.active { 
            color: var(--primary-green) !important; 
            border-bottom: 3px solid var(--primary-green) !important; 
        }

        /* NAVIGATION MENU */
        .nav-link { 
            font-weight: 700 !important; 
            color: #1a1a1a !important; 
        }
        
        .nav-link.active { 
            color: var(--primary-green) !important; 
        }
        
        .mx-1.text-muted {
            font-weight: 400;
            margin: 0 5px;
        }

        /* --- LOADING TRÁI TIM CHUẨN NHÂN ÁI --- */
        #preloader {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10000;
        }

        .heart-pulse {
            position: relative;
            width: 60px;
            height: 60px;
            background-color: #B12029;
            transform: rotate(-45deg);
            animation: heartbeatPlushing 1.2s infinite ease-in-out;
            margin-top: 30px;
        }

        .heart-pulse::before,
        .heart-pulse::after {
            content: "";
            position: absolute;
            width: 60px;
            height: 60px;
            background-color: #B12029;
            border-radius: 50%;
        }

        .heart-pulse::before {
            top: -30px;
            left: 0;
        }

        .heart-pulse::after {
            top: 0;
            left: 30px;
        }

        @keyframes heartbeatPlushing {
            0% { 
                transform: scale(1) rotate(-45deg); 
                filter: drop-shadow(0 0 5px rgba(177, 32, 41, 0.2)); 
            }
            14% { 
                transform: scale(1.15) rotate(-45deg);
                filter: drop-shadow(0 0 20px rgba(177, 32, 41, 0.6)); 
            }
            28% { 
                transform: scale(1.05) rotate(-45deg); 
            }
            42% { 
                transform: scale(1.3) rotate(-45deg);
                filter: drop-shadow(0 0 40px rgba(177, 32, 41, 0.8)); 
            }
            70% { 
                transform: scale(1) rotate(-45deg); 
                filter: drop-shadow(0 0 5px rgba(177, 32, 41, 0.2));
            }
        }

        /* HERO SECTION */
        nav.navbar {
            z-index: 1050 !important;
        }

        main {
            margin-top: 20px;
        }

        .hero-custom {
            height: 85vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('img/back.jpg') no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
        }
        
        .hero-content h1 {
            font-family: 'Montserrat', sans-serif !important;
            font-size: 4.5rem;
            line-height: 1.1;
            margin-bottom: 2rem;
        }
        
        .hero-btns {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        
        .btn-outline-white {
            border: 2px solid white;
            color: white;
            padding: 12px 35px;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s;
        }
        
        .btn-outline-white:hover {
            background: white;
            color: #E30613;
        }
        
        .section-padding { 
            padding: 100px 0; 
        }
        
        /* TEAM SECTION - FIX CÂN XỨNG THEO ẢNH 2 */
        .about-sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .about-sidebar-menu > li {
            border-bottom: 1px solid #eee;
        }

        .about-sidebar-menu li a {
            text-decoration: none;
            color: #1a1a1a;
            font-weight: 700;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            transition: 0.3s;
            cursor: pointer;
            font-size: 1rem;
        }

        .about-sidebar-menu li a i {
            width: 25px;
            margin-right: 12px;
            font-size: 1rem;
            color: #444;
        }

        .submenu-list {
            list-style: none;
            padding: 0 0 10px 55px;
            margin-top: 5px;
        }

        .submenu-list li a {
            padding: 6px 0;
            font-size: 0.9rem;
            font-weight: 600;
            color: #666;
        }

        .submenu-list li a.active-red {
            color: var(--primary-red) !important;
            font-weight: 700;
        }

        /* TEAM CARD STYLING - CHUẨN ẢNH 2 */
        .team-card {
            background: #fff; 
            border-radius: 15px; 
            overflow: hidden; 
            height: 100%;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05); 
            border: 1px solid #e9ecef; 
            transition: 0.4s;
        }
        
        .team-card:hover { 
            transform: translateY(-8px); 
            box-shadow: 0 12px 30px rgba(0,0,0,0.1); 
        }
        
        .team-img-box { 
            height: 280px; 
            background-color: #f8f9fa; 
            overflow: hidden; 
            position: relative;
        }
        
        .team-img-box img { 
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            transition: transform 0.5s ease;
        }
        
        .team-card:hover .team-img-box img {
            transform: scale(1.05);
        }
        
        .team-content { 
            padding: 20px; 
            text-align: center;
        }
        
        .team-tag { 
            font-size: 0.7rem; 
            font-weight: 800; 
            color: var(--primary-green); 
            letter-spacing: 1px; 
            margin-bottom: 8px; 
            display: block; 
            text-transform: uppercase; 
        }
        
        .team-name { 
            font-size: 1.1rem; 
            font-weight: 800; 
            color: #003366; 
            margin-bottom: 5px; 
            line-height: 1.3;
        }
        
        .team-role { 
            font-size: 0.85rem; 
            color: #666; 
            font-weight: 500; 
            line-height: 1.4; 
        }

        /* SWIPER STYLING - XÓA DẤU 3 CHẤM */
        .swiper-team {
            padding-bottom: 20px !important; /* Giảm padding xuống */
            overflow: visible !important;
        }

        /* ẨN DẤU 3 CHẤM PAGINATION */
        .swiper-pagination {
            display: none !important; /* Ẩn hoàn toàn dấu 3 chấm */
        }

        .team-controls-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 25px;
        }

        .swiper-nav-wrapper {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 10px;
        }

        .swiper-btn-next-custom,
        .swiper-btn-prev-custom {
            width: 45px;
            height: 45px;
            background: #e9ecef;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #333;
            transition: all 0.3s ease;
            border: none;
        }

        .swiper-btn-next-custom:hover,
        .swiper-btn-prev-custom:hover {
            background: var(--primary-green);
            color: white;
        }

        /* RESPONSIVE FIXES */
        @media (max-width: 992px) {
            .col-lg-3 {
                max-width: 100%;
                flex: 0 0 100%;
                margin-bottom: 30px;
            }
            
            .col-lg-9 {
                max-width: 100%;
                flex: 0 0 100%;
            }
            
            .about-sidebar-menu {
                display: flex;
                flex-wrap: wrap;
                border-left: none;
            }
            
            .about-sidebar-menu > li {
                flex: 1;
                min-width: 200px;
                border: 1px solid #eee;
                margin: 2px;
            }
        }

        @media (max-width: 768px) {
            .team-img-box {
                height: 240px;
            }
            
            .hero-content h1 {
                font-size: 2.8rem;
            }
            
            .btn-donate {
                padding: 8px 20px !important;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            .team-img-box {
                height: 200px;
            }
            
            .team-name {
                font-size: 1rem;
            }
            
            .team-role {
                font-size: 0.8rem;
            }
            
            .nav-link {
                padding: 0.5rem 1rem !important;
                font-size: 0.9rem;
            }
        }

        /* FOOTER SOCIAL LINKS */
        .social-list { 
            list-style: none; 
            padding: 0; 
        }
        
        .social-link-item {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #adb5bd;
            font-size: 1rem;
            font-weight: 500;
            margin-bottom: 12px;
            transition: all 0.3s ease;
        }
        
        .social-icon-box {
            width: 35px;
            text-align: center;
            font-size: 1.2rem;
            margin-right: 10px;
            transition: all 0.3s ease;
        }
        
        .social-link-item:hover {
            color: white;
            transform: translateX(5px);
        }
        
        .social-link-item:hover .fa-globe { color: var(--primary-green); }
        .social-link-item:hover .fa-facebook { color: #1877F2; }
        .social-link-item:hover .fa-tiktok { color: #ff0050; }
        .social-link-item:hover .fa-instagram { color: #E4405F; }

    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <!-- MÀN HÌNH LOADING -->
    <div id="preloader">
        <div class="heart-pulse"></div>
    </div>

    <!-- HEADER - ĐÃ FIX NÚT ĐÓNG GÓP -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand" href="<?php echo home_url('/'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/img/LRF-02.png" alt="Logo" height="70">
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <!-- Trang chủ -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_front_page() ? 'active text-success' : ''; ?> px-3 fw-bold" 
                           href="<?php echo home_url('/'); ?>" data-vi="Trang chủ" data-en="Home">Trang chủ</a>
                    </li>
                    <!-- Về chúng tôi -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_page('about') ? 'active text-success' : ''; ?> px-3 fw-bold" 
                           href="<?php echo home_url('/about/'); ?>" data-vi="Về chúng tôi" data-en="About Us">Về chúng tôi</a>
                    </li>
                    <!-- Chương trình -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_page('project') ? 'active text-success' : ''; ?> px-3 fw-bold" 
                           href="<?php echo home_url('/project/'); ?>" data-vi="Chương trình" data-en="Programs">Chương trình</a>
                    </li>
                    <!-- Báo cáo tài chính -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_page('bao-cao') ? 'active text-success' : ''; ?> px-3 fw-bold" 
                           href="<?php echo home_url('/bao-cao/'); ?>" data-vi="Báo cáo tài chính" data-en="Reports">Báo cáo tài chính</a>
                    </li>
                    <!-- Tin tức -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_page('news') ? 'active text-success' : ''; ?> px-3 fw-bold" 
                           href="<?php echo home_url('/news/'); ?>" data-vi="Tin tức" data-en="News">Tin tức</a>
                    </li>
                    <!-- Nút Đóng góp - ĐÃ FIX -->
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-donate px-4 py-2 shadow-sm" 
                           href="<?php echo home_url('/donate/'); ?>" data-vi="ĐÓNG GÓP" data-en="DONATE">
                            ĐÓNG GÓP
                        </a>
                    </li>
                    
                    <!-- Chuyển ngôn ngữ -->
                    <li class="nav-item d-flex ms-lg-3">
                        <span class="lang-switch active" id="btn-vi" onclick="changeLang('vi')">VN</span>
                        <span class="mx-1 text-muted">|</span>
                        <span class="lang-switch" id="btn-en" onclick="changeLang('en')">EN</span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- NỘI DUNG VỀ CHÚNG TÔI -->
    <main id="content" class="bg-light">
        <div class="container my-5 py-4">
            <!-- PHẦN 1: TẦM NHÌN - SỨ MỆNH -->
            <h2 class="text-success fw-bold text-center mb-5" style="font-size: 2.8rem;" data-vi="Tầm nhìn, Sứ mệnh và Giá trị" data-en="Vision, Mission and Values">Tầm nhìn, Sứ mệnh và Giá trị</h2>
            
            <div class="row g-4 text-center">
                <!-- TẦM NHÌN -->
                <div class="col-md-4">
                    <div class="card h-100 card-about p-4 shadow-sm border-0" style="border-radius: 20px; transition: 0.3s;">
                        <div class="card-body">
                            <i class="fas fa-eye fa-3x text-success mb-3"></i>
                            <h4 class="fw-bold" data-vi="Tầm nhìn" data-en="Vision">Tầm nhìn</h4>
                            <p class="text-muted small mb-3" data-vi="Nền văn minh tình thương..." data-en="Civilization of love...">Nền văn minh tình thương...</p>
                            <button class="btn btn-outline-success btn-sm rounded-pill px-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#visionCol">
                                <span data-vi="Xem thêm" data-en="See more">Xem thêm</span>
                            </button>
                            <div class="collapse mt-3 text-start" id="visionCol">
                                <div class="small text-secondary fw-bold" data-vi="Quỹ Bông Hồng Nhỏ hướng tới một cộng đồng nơi mọi người đều được yêu thương, chăm sóc và không ai bị bỏ lại phía sau." data-en="LRF aims for a community where everyone is loved, cared for, and no one is left behind.">
                                    Quỹ Bông Hồng Nhỏ hướng tới một cộng đồng nơi mọi người đều được yêu thương, chăm sóc và không ai bị bỏ lại phía sau.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SỨ MỆNH -->
                <div class="col-md-4">
                    <div class="card h-100 card-about p-4 shadow-sm border-0" style="border-radius: 20px; transition: 0.3s;">
                        <div class="card-body">
                            <i class="fas fa-bullseye fa-3x text-danger mb-3"></i>
                            <h4 class="fw-bold" data-vi="Sứ mệnh" data-en="Mission">Sứ mệnh</h4>
                            <p class="text-muted small mb-3" data-vi="Mang đến cơ hội vượt qua nghịch cảnh..." data-en="Providing opportunities...">Mang đến cơ hội vượt qua nghịch cảnh...</p>
                            <button class="btn btn-outline-danger btn-sm rounded-pill px-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#missionCol">
                                <span data-vi="Xem thêm" data-en="See more">Xem thêm</span>
                            </button>
                            <div class="collapse mt-3 text-start" id="missionCol">
                                <div class="small text-secondary fw-bold" data-vi="LRF giúp cá nhân vượt qua khó khăn, nâng cao đời sống và góp phần phát triển cộng đồng địa phương thông qua giáo dục và y tế." data-en="LRF helps individuals overcome difficulties and contributes to community development through education and health.">
                                    LRF giúp cá nhân vượt qua khó khăn, nâng cao đời sống và góp phần phát triển cộng đồng địa phương thông qua giáo dục và y tế.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- GIÁ TRỊ CỐT LÕI TỔNG QUAN -->
                <div class="col-md-4">
                    <div class="card h-100 card-about bg-success text-white p-4 shadow-sm border-0" style="border-radius: 20px;">
                        <div class="card-body text-center">
                            <i class="fas fa-heart fa-3x mb-3"></i>
                            <h4 class="fw-bold" data-vi="Giá trị cốt lõi" data-en="Core values">Giá trị cốt lõi</h4>
                            <ul class="list-unstyled mt-3 small fw-bold text-start" style="line-height: 2.5;">
                        <li>
                            <i class="fas fa-check-circle me-2"></i> 
                            <span data-vi="Yêu thương & Chính trực" data-en="Love & Integrity">Yêu thương & Chính trực</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle me-2"></i> 
                            <span data-vi="Tôn trọng & Tận tâm" data-en="Respect & Dedication">Tôn trọng & Tận tâm</span>
                        </li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>

            <!-- PHẦN 2: CHI TIẾT 4 GIÁ TRỊ CỐT LÕI -->
            <div class="py-5 mt-5">
                <h2 class="fw-bold text-center mb-5" style="font-size: 2.5rem;" data-vi="Giá trị cốt lõi của chúng tôi" data-en="Our core values">Giá trị cốt lõi của chúng tôi</h2>
                <div class="row g-4 text-center">
                    <!-- Nhân Ái -->
                    <div class="col-md-3">
                        <div class="p-4 bg-white shadow-sm border-0 h-100 card-about" style="border-radius: 20px;">
                            <i class="far fa-heart fa-2x text-danger mb-3"></i>
                            <h5 class="fw-bold" data-vi="Nhân ái" data-en="Compassion">Nhân ái</h5>
                            <p class="text-muted small fw-bold" data-vi="Luôn đặt tình yêu làm kim chỉ nam." data-en="Love as the guiding principle.">Luôn đặt tình yêu làm kim chỉ nam.</p>
                            <button class="btn btn-light btn-sm rounded-pill mt-2 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#core1">
                                <span data-vi="Xem thêm" data-en="See more">Xem thêm</span>
                            </button>
                            <div class="collapse mt-2 small text-secondary fw-bold" id="core1" data-vi="Mọi hoạt động đều xuất phát từ sự thấu cảm và mong muốn sẻ chia gánh nặng với người yếu thế." data-en="All activities stem from empathy and the desire to share the burden with the vulnerable.">
                                Mọi hoạt động đều xuất phát từ sự thấu cảm và mong muốn sẻ chia gánh nặng với người yếu thế.
                            </div>
                        </div>
                    </div>
                    <!-- Minh Bạch -->
                    <div class="col-md-3">
                        <div class="p-4 bg-white shadow-sm border-0 h-100 card-about" style="border-radius: 20px;">
                            <i class="fas fa-shield-alt fa-2x text-primary mb-3"></i>
                            <h5 class="fw-bold" data-vi="Minh bạch" data-en="Transparency">Minh bạch</h5>
                            <p class="text-muted small fw-bold" data-vi="Công khai mọi nguồn lực." data-en="Publicizing resources.">Công khai mọi nguồn lực.</p>
                            <button class="btn btn-light btn-sm rounded-pill mt-2 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#core2">
                                <span data-vi="Xem thêm" data-en="See more">Xem thêm</span>
                            </button>
                            <div class="collapse mt-2 small text-secondary fw-bold" id="core2" data-vi="Chúng tôi cam kết báo cáo tài chính rõ ràng, đảm bảo mọi đóng góp đều đến đúng nơi cần nhất." data-en="We commit to clear financial reports, ensuring all contributions reach those in need.">
                                Chúng tôi cam kết báo cáo tài chính rõ ràng, đảm bảo mọi đóng góp đều đến đúng nơi cần nhất.
                            </div>
                        </div>
                    </div>
                    <!-- Trách Nhiệm -->
                    <div class="col-md-3">
                        <div class="p-4 bg-white shadow-sm border-0 h-100 card-about" style="border-radius: 20px;">
                            <i class="fas fa-bullseye fa-2x text-success mb-3"></i>
                            <h5 class="fw-bold" data-vi="Trách nhiệm" data-en="Responsibility">Trách nhiệm</h5>
                            <p class="text-muted small fw-bold" data-vi="Cam kết tận tâm đến cùng." data-en="Committed to the end.">Cam kết tận tâm đến cùng.</p>
                            <button class="btn btn-light btn-sm rounded-pill mt-2 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#core3">
                                <span data-vi="Xem thêm" data-en="See more">Xem thêm</span>
                            </button>
                            <div class="collapse mt-2 small text-secondary fw-bold" id="core3" data-vi="Chịu trách nhiệm hoàn toàn về hiệu quả của các dự án và sự an toàn của những đối tượng thụ hưởng." data-en="Fully responsible for project effectiveness and beneficiary safety.">
                                Chịu trách nhiệm hoàn toàn về hiệu quả của các dự án và sự an toàn của những đối tượng thụ hưởng.
                            </div>
                        </div>
                    </div>
                    <!-- Kết Nối -->
                    <div class="col-md-3">
                        <div class="p-4 bg-white shadow-sm border-0 h-100 card-about" style="border-radius: 20px;">
                            <i class="fas fa-users fa-2x text-warning mb-3"></i>
                            <h5 class="fw-bold" data-vi="Kết nối" data-en="Connection">Kết nối</h5>
                            <p class="text-muted small fw-bold" data-vi="Xây dựng mạng lưới cộng đồng." data-en="Building community.">Xây dựng mạng lưới cộng đồng.</p>
                            <button class="btn btn-light btn-sm rounded-pill mt-2 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#core4">
                                <span data-vi="Xem thêm" data-en="See more">Xem thêm</span>
                            </button>
                            <div class="collapse mt-2 small text-secondary fw-bold" id="core4" data-vi="Gắn kết nhà tài trợ, tình nguyện viên và cộng đồng để tạo nên sức mạnh tổng hợp to lớn." data-en="Connecting donors, volunteers, and the community to create a great synergy.">
                                Gắn kết nhà tài trợ, tình nguyện viên và cộng đồng để tạo nên sức mạnh tổng hợp to lớn.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PHẦN 3: ĐỘI NGŨ - SỬA CÂN XỨNG -->
            <div class="row g-4 align-items-start mt-5"> 
                
                <!-- CỘT TRÁI: SIDEBAR (Chiếm 3 phần) -->
            <div class="col-lg-3">
                <div class="bg-white rounded-4 shadow-sm border overflow-hidden sticky-top" style="top: 130px; z-index: 10;">
                    <ul class="about-sidebar-menu">
                        <li><a href="#"><i class="fas fa-users"></i> <span data-vi="Đội ngũ LRF" data-en="LRF Team">Đội ngũ LRF</span></a></li>
                        <li>
                            <a id="link-board" onclick="filterTeam('board')">
                                <i class="fas fa-user-tie"></i> <span data-vi="Hội đồng quản lý" data-en="Board of Directors">Hội đồng quản lý</span>
                            </a>
                        </li>
                        <li>
                            <a id="link-control" onclick="filterTeam('control')">
                                <i class="fas fa-shield-alt"></i> <span data-vi="Ban kiểm soát" data-en="Supervisory Board">Ban kiểm soát</span>
                            </a>
                        </li>
                        <li>
                            <a id="link-advisor" onclick="filterTeam('advisor')">
                                <i class="fas fa-handshake"></i> <span data-vi="Ban cố vấn" data-en="Advisory Board">Ban cố vấn</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

                <!-- CỘT PHẢI: TIÊU ĐỀ + SLIDER -->
                <div class="col-lg-9">
                    <!-- Tiêu đề -->
                    <div class="ps-lg-4 mb-4">
                        <h2 class="fw-bold mb-2" style="font-size: 2.2rem; color: #1a1a1a;" data-vi="Đội ngũ của chúng tôi" data-en="Our Team">
                            Đội ngũ của chúng tôi
                        </h2>
                        <p class="text-muted fw-bold" data-vi="11 nhân sự tâm huyết vì cộng đồng." data-en="11 dedicated members.">
                            11 nhân sự tâm huyết vì cộng đồng.
                        </p>
                    </div>

                    <!-- Khu vực Slider - ĐÃ XÓA DẤU 3 CHẤM -->
                    <div class="ps-lg-4 position-relative">
                        <div class="swiper swiper-team">
                            <div class="swiper-wrapper" id="team-wrapper">
                                <!-- JS RENDER TẠI ĐÂY -->
                            </div>
                        </div>
                        
                        <!-- Điều hướng - CHỈ CÒN 2 NÚT MŨI TÊN -->
                        <div class="team-controls-wrapper">
                            <div class="swiper-nav-wrapper">
                                <button class="swiper-btn-prev-custom">
                                    <i class="fas fa-arrow-left"></i>
                                </button>
                                <button class="swiper-btn-next-custom">
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-dark text-white pt-5 pb-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h5 class="text-success fw-bold mb-4"><i class="fa-solid fa-heart text-danger me-2"></i> LITTLE ROSE</h5>
                    <p class="text-secondary small" data-vi="Lan tỏa yêu thương, kết nối những tấm lòng nhân ái." data-en="Spreading love, connecting compassionate hearts.">Lan tỏa yêu thương, kết nối những tấm lòng nhân ái.</p>
                </div>
                <div class="col-md-4 border-md-start border-secondary ps-md-4">
                    <h5 class="fw-bold mb-4" data-vi="Thông tin liên hệ" data-en="Contact Info">Thông tin liên hệ</h5>
                    <p class="small text-secondary mb-2"><i class="fas fa-map-marker-alt me-2 text-danger"></i> 49 Phạm Ngọc Thạch, Quận 3, TP.HCM</p>
                    <p class="small text-secondary"><i class="fas fa-envelope me-2 text-primary"></i> info@littlerosesfoundation.org</p>
                </div>
                <div class="col-md-4 border-md-start border-secondary ps-md-4">
                    <h5 class="fw-bold mb-4" data-vi="Đường liên kết" data-en="Social Links">Đường liên kết</h5>
                    <div class="social-list">
                        <a href="https://littlerosesfoundation.org" target="_blank" rel="noopener" class="social-link-item"><span class="social-icon-box"><i class="fas fa-globe"></i></span> Website</a>
                        <a href="https://www.facebook.com/littlerosesfoundation" target="_blank" rel="noopener" class="social-link-item"><span class="social-icon-box"><i class="fab fa-facebook"></i></span> Facebook</a>
                        <a href="https://www.tiktok.com/@littlerosesfoundation" target="_blank" rel="noopener" class="social-link-item"><span class="social-icon-box"><i class="fab fa-tiktok"></i></span> TikTok</a>
                        <a href="https://www.instagram.com/little_roses_foundation" target="_blank" rel="noopener" class="social-link-item"><span class="social-icon-box"><i class="fab fa-instagram"></i></span> Instagram</a>
                    </div>
                </div>
            </div>
            <hr class="border-secondary mt-5">
            <p class="text-center small text-secondary">© <?php echo date("Y"); ?> Little Rose Foundation - Developed by Petal Three</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const teamData = [
            // HĐQL (5)
            { cat: 'board', name_vi: 'Hoàng Nguyễn Thu Thảo', name_en: 'Hoang Nguyen Thu Thao', role_vi: 'Chủ tịch, kiêm Giám đốc Quỹ', role_en: 'Chairwoman & Foundation Director', img: 'https://localhost/little-rose-web/wp-content/uploads/2025/12/hntt-2.jpg' },
            { cat: 'board', name_vi: 'Đỗ Mạnh Cường', name_en: 'Do Manh Cuong', role_vi: 'Phó Chủ tịch Quỹ', role_en: 'Vice Chairman', img: 'https://localhost/little-rose-web/wp-content/uploads/2025/12/dmc.jpg' },
            { cat: 'board', name_vi: 'Hoàng Quốc Anh Vũ', name_en: 'Hoang Quoc Anh Vu', role_vi: 'Thành viên Quỹ', role_en: 'Foundation Member', img: 'https://localhost/little-rose-web/wp-content/uploads/2025/12/hqanhvu.jpg' },
            { cat: 'board', name_vi: 'Nguyễn Đức Thạch Diễm', name_en: 'Nguyen Duc Thach Diem', role_vi: 'Phó Chủ tịch Quỹ', role_en: 'Vice Chairman', img: 'https://localhost/little-rose-web/wp-content/uploads/2025/12/ndtd-2048x1536-1.jpg' },
            { cat: 'board', name_vi: 'Đặng Thế Đức', name_en: 'Dang The Duc', role_vi: 'Thành viên Quỹ', role_en: 'Foundation Member', img: 'https://localhost/little-rose-web/wp-content/uploads/2025/12/dangtheduc.jpg' },
            
            // BKS (3)
            { cat: 'control', name_vi: 'Trần Duy Cảnh', name_en: 'Tran Duy Canh', role_vi: 'Trưởng Ban', role_en: 'Head of Board', img: 'https://localhost/little-rose-web/wp-content/uploads/2025/12/tdc-2.jpg' },
            { cat: 'control', name_vi: 'Thái Bá Cần', name_en: 'Thai Ba Can', role_vi: 'Ủy viên Ban', role_en: 'Committee Member', img: 'https://localhost/little-rose-web/wp-content/uploads/2025/12/download.jpg' },
            { cat: 'control', name_vi: 'Hoàng Thị Lệ Trinh', name_en: 'Hoang Thi Le Trinh', role_vi: 'Phó Trưởng Ban', role_en: 'Deputy Head of Board', img: 'https://localhost/little-rose-web/wp-content/uploads/2025/12/495250302_992012499685782_5495326692747878723_n.jpg' },
            
            // CỐ VẤN (3)
            { cat: 'advisor', name_vi: 'Ngô Sĩ Đình', name_en: 'Ngo Si Dinh', role_vi: 'Giám đốc Caritas Việt Nam', role_en: 'Director of Caritas Vietnam', img: 'https://localhost/little-rose-web/wp-content/uploads/2025/12/nsd.jpg' },
            { cat: 'advisor', name_vi: 'Lê Xuân Hy', name_en: 'Le Xuan Hy', role_vi: 'Giáo sư - Đại học Seattle', role_en: 'Professor - Seattle University', img: 'https://localhost/little-rose-web/wp-content/uploads/2025/12/Le-Xuan-Hy-1.jpg' },
            { cat: 'advisor', name_vi: 'Hà Thu Thanh', name_en: 'Ha Thu Thanh', role_vi: 'Chủ tịch Deloitte Việt Nam', role_en: 'Chairwoman - Deloitte Vietnam', img: 'https://localhost/little-rose-web/wp-content/uploads/2025/12/htt.jpg' }
        ];

        let currentLang = 'vi';
        let currentCat = 'board';
        let swiper;

        // HÀM CHUYỂN NGÔN NGỮ
        function changeLang(lang) {
            currentLang = lang;
            // Dịch text tĩnh
            document.querySelectorAll('[data-vi]').forEach(el => {
                el.innerText = el.getAttribute('data-' + lang);
            });
            // Cập nhật nút VN/EN
            document.getElementById('btn-vi').classList.toggle('active', lang === 'vi');
            document.getElementById('btn-en').classList.toggle('active', lang === 'en');
            
            // Re-render Slider theo ngôn ngữ mới
            renderTeam();
        }

        function initSwiper() {
            if (swiper) swiper.destroy();
            
            swiper = new Swiper('.swiper-team', {
                slidesPerView: 1.2,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: '.swiper-btn-next-custom',
                    prevEl: '.swiper-btn-prev-custom',
                },
                // XÓA PAGINATION
                pagination: false,
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2.5,
                        spaceBetween: 25,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                }
            });
        }

        function filterTeam(category) {
            currentCat = category;
            // Xử lý Active màu đỏ ở Sidebar
            document.querySelectorAll('.about-sidebar-menu a').forEach(el => el.classList.remove('active-red'));
            document.getElementById('link-' + category).classList.add('active-red');
            
            renderTeam();
        }

        function renderTeam() {
            const wrapper = document.getElementById('team-wrapper');
            const filtered = teamData.filter(m => m.cat === currentCat);
            
            wrapper.innerHTML = filtered.map(m => `
                <div class="swiper-slide">
                    <div class="team-card">
                        <div class="team-img-box">
                            <img src="${m.img}" alt="${m['name_'+currentLang]}" loading="lazy">
                        </div>
                        <div class="team-content">
                            <span class="team-tag">${currentLang === 'vi' ? 'THÀNH VIÊN' : 'MEMBER'}</span>
                            <h4 class="team-name">${m['name_'+currentLang]}</h4>
                            <p class="team-role">${m['role_'+currentLang]}</p>
                        </div>
                    </div>
                </div>
            `).join('');
            
            initSwiper();
        }

        // Khởi tạo
        window.addEventListener('load', () => {
            filterTeam('board');
            document.getElementById('preloader').style.opacity = '0';
            setTimeout(() => {
                document.getElementById('preloader').style.display = 'none';
            }, 800);
        });
    </script>
    <?php wp_footer(); ?>
</body>
</html>