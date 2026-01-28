<?php
/*
Template Name: Core Art - All In One
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
         /* Hiện menu khi hover cấp 1 */
        .lrf-dropdown:hover > .dropdown-menu {
            display: block;
            margin-top: 0;
        }

        /* Hiện menu con cấp 3 khi hover (Nested Dropdown) */
        .lrf-dropdown .dropend:hover > .dropdown-menu {
            display: block;
            position: absolute;
            left: 100%;
            top: 0;
            margin-left: 0;
        }

        /* Style cho Dropdown Item giống ảnh mẫu */
        .lrf-dropdown .dropdown-menu {
            border-radius: 10px;
            padding: 10px 0;
            min-width: 240px;
            background: #ffffff;
            animation: fadeInMenu 0.3s ease;
        }

        .lrf-dropdown .dropdown-item {
            padding: 12px 20px;
            color: #333 !important;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.95rem;
            border-bottom: 1px solid #f1f1f1; /* Đường kẻ phân cách nhẹ */
            transition: all 0.2s ease;
        }

        .lrf-dropdown .dropdown-item:last-child {
            border-bottom: none;
        }

        .lrf-dropdown .dropdown-item:hover {
            background-color: #f8f9fa;
            color: var(--maroon-dark) !important; /* Đổi màu khi hover */
            padding-left: 25px; /* Hiệu ứng nhích sang phải nhẹ */
        }

        /* Hiệu ứng xuất hiện mượt */
        @keyframes fadeInMenu {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Fix cho mobile: Vẫn cho click nếu cần */
        @media (max-width: 991px) {
            .lrf-dropdown .dropdown-menu { position: static; display: none; }
            .lrf-dropdown.show .dropdown-menu { display: block; }
        }


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
                    <li class="nav-item dropdown lrf-dropdown">
                        <a class="nav-link dropdown-toggle fw-bold px-3" href="<?php echo home_url('/about/'); ?>" id="aboutDropdown" role="button" data-vi="Về chúng tôi" data-en="About Us">
                            Về chúng tôi
                        </a>
                        <ul class="dropdown-menu shadow border-0" aria-labelledby="aboutDropdown">
                            <!-- Cấp 2: Đội ngũ nhân sự (Có menu con cấp 3) -->
                            <li class="dropend">
                                <a class="dropdown-item d-flex justify-content-between align-items-center fw-bold" href="<?php echo home_url('/nhan-su'); ?>" data-vi="Đội ngũ nhân sự" data-en="LRF’s Board and Team">
                                    Đội ngũ nhân sự <i class="fas fa-chevron-right ms-2" style="font-size: 0.7rem;"></i>
                                </a>
                                <!-- MENU CON CẤP 3 (Hiện ra khi hover vào Đội ngũ) -->
                                <ul class="dropdown-menu shadow border-0 submenu-left">
                                    <li><a class="dropdown-item" href="<?php echo home_url('/nhan-su/?cat=board'); ?>" data-vi="Hội đồng quản lý" data-en="Board of Directors">Hội đồng quản lý</a></li>
                                    <li><a class="dropdown-item" href="<?php echo home_url('/nhan-su/?cat=control'); ?>" data-vi="Ban kiểm soát" data-en="Supervisory Committee">Ban kiểm soát</a></li>
                                    <li><a class="dropdown-item" href="<?php echo home_url('/nhan-su/?cat=advisor'); ?>" data-vi="Ban cố vấn" data-en="Advisory Board">Ban cố vấn</a></li>
                                </ul>
                            </li>

                            <!-- Các mục khác của cấp 2 -->
                            <li><a class="dropdown-item fw-bold" href="<?php echo home_url('/tam-nhin-su-menh'); ?>" data-vi="Tầm nhìn, Sứ mệnh và Giá trị" data-en="Vision, Mission, Values">Tầm nhìn, Sứ mệnh và Giá trị</a></li>
                            <li><a class="dropdown-item fw-bold" href="<?php echo home_url('/gia-tri-cot-loi'); ?>" data-vi="Giá trị cốt lõi" data-en="Core Commitments">Giá trị cốt lõi</a></li>
                        </ul>
                    </li>
                    <!-- Chương trình -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_page('project') ? 'active text-success' : ''; ?> px-3 fw-bold" 
                           href="<?php echo home_url('/project/'); ?>" data-vi="Chương trình" data-en="Programs">Chương trình</a>
                    </li>
                    <!-- Báo cáo tài chính -->
                    <li class="nav-item dropdown lrf-dropdown">
                        <a class="nav-link dropdown-toggle fw-bold px-3" href="<?php echo home_url('/bao-cao/'); ?>" id="aboutDropdown" role="button" data-vi="Báo cáo tài chính" data-en="Reports">
                            Báo cáo tài chính
                        </a>
                        <ul class="dropdown-menu shadow border-0" aria-labelledby="aboutDropdown">
                            <!-- Cấp 2: Đội ngũ nhân sự (Có menu con cấp 3) -->
                            <li class="dropend">
                                <a class="dropdown-item d-flex justify-content-between align-items-center fw-bold" href="<?php echo home_url('/da-hoan-thanh'); ?>" data-vi="Dự án đã hoàn thành" data-en="Completed Projects">
                                    Dự án đã hoàn thành <i class="fas fa-chevron-right ms-2" style="font-size: 0.7rem;"></i>
                                </a>                                
                            </li>
                            <!-- Các mục khác của cấp 2 -->
                            <li><a class="dropdown-item fw-bold" href="<?php echo home_url('/dang-trien-khai'); ?>" data-vi="Dự án đang triển khai" data-en="Active Projects">Dự án đang triển khai</a></li>
                        </ul>
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
    let currentLang = 'vi';

        function changeLang(lang) {
            currentLang = lang;
            document.querySelectorAll('[data-vi]').forEach(el => {
                el.innerText = el.getAttribute('data-' + lang);
            });
            document.getElementById('btn-vi').classList.toggle('active', lang === 'vi');
            document.getElementById('btn-en').classList.toggle('active', lang === 'en');
        }

        window.addEventListener('load', () => {
            // Tắt màn hình Loading (Đã sửa lỗi để không bị kẹt)
            const preloader = document.getElementById('preloader');
            if (preloader) {
                preloader.style.opacity = '0';
                setTimeout(() => { 
                    preloader.style.display = 'none'; 
                }, 500);
            }
        });
    </script>
    <?php wp_footer(); ?>
</body>
</html>