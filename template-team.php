<?php
/*
Template Name: Team - All In One
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
        
        /* --- TEAM CIRCLE STYLE (KHÔNG SIDEBAR) --- */
        .team-filter-tabs {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 50px;
            flex-wrap: wrap;
        }

        .btn-tab-pill {
            background: #fff;
            border: none;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 700;
            color: #666;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .btn-tab-pill.active {
            background: var(--primary-green);
            color: #fff;
            box-shadow: 0 8px 20px rgba(0, 141, 66, 0.2);
        }

        .team-card-circle {
            text-align: center;
            padding: 20px;
            transition: 0.4s;
        }

        .img-circle-frame {
            width: 240px; /* Độ lớn ảnh tròn */
            height: 240px;
            margin: 0 auto 25px;
            border-radius: 50%;
            overflow: hidden;
            border: 6px solid #fff;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            transition: 0.5s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .img-circle-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .team-card-circle:hover .img-circle-frame {
            transform: translateY(-10px);
            border-color: var(--primary-green);
        }

        .team-info h4 {
            font-size: 1.4rem;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 5px;
        }

        .team-info p {
            font-size: 0.9rem;
            color: #666;
            font-weight: 600;
            line-height: 1.4;
            max-width: 280px;
            margin: 0 auto;
        }

        .swiper-team-circle {
            padding-bottom: 60px !important;
        }

        /* --- TEAM CIRCLE GRID STYLE --- */
        .team-card-circle {
            text-align: center;
            padding: 10px;
            transition: 0.4s ease;
            height: 100%;
        }

        .img-circle-frame {
            width: 240px; 
            height: 240px;
            margin: 0 auto 25px;
            border-radius: 50%;
            overflow: hidden;
            border: 8px solid #fff;
            box-shadow: 0 15px 45px rgba(0,0,0,0.1);
            transition: 0.5s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .img-circle-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .team-card-circle:hover .img-circle-frame {
            transform: translateY(-10px);
            border-color: var(--primary-green);
            box-shadow: 0 20px 50px rgba(0, 141, 66, 0.2);
        }

        .team-name {
            font-size: 1.4rem;
            font-weight: 800;
            color: #003366;
            margin-bottom: 8px;
        }

        .team-role {
            font-size: 0.95rem;
            color: #555;
            font-weight: 600;
            line-height: 1.4;
        }

        .team-tag-small {
            font-size: 0.75rem;
            font-weight: 800;
            color: var(--primary-green);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
            display: block;
        }

        /* Responsive: 1 cột trên mobile, 2 cột trên tablet, 3 cột trên desktop */
        @media (max-width: 768px) {
            .img-circle-frame { width: 180px; height: 180px; }
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
                <!-- KHU VỰC HIỂN THỊ DẠNG LƯỚI (GRID) -->
                    <div class="row g-5 justify-content-center" id="team-wrapper">
                        <!-- JS RENDER NHÂN SỰ VÀO ĐÂY -->
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
    // 1. Dữ liệu nhân sự
    const teamData = [
        { cat: 'board', name_vi: 'Hoàng Nguyễn Thu Thảo', name_en: 'Hoang Nguyen Thu Thao', role_vi: 'Chủ tịch, kiêm Giám đốc Quỹ', role_en: 'Chairwoman & Foundation Director', img: 'https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2025/12/hntt-2.jpg' },
        { cat: 'board', name_vi: 'Đỗ Mạnh Cường', name_en: 'Do Manh Cuong', role_vi: 'Phó Chủ tịch Quỹ', role_en: 'Vice Chairman', img: 'https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2025/12/dmc.jpg' },
        { cat: 'board', name_vi: 'Hoàng Quốc Anh Vũ', name_en: 'Hoang Quoc Anh Vu', role_vi: 'Thành viên Quỹ', role_en: 'Foundation Member', img: 'https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2025/12/hqanhvu.jpg' },
        { cat: 'board', name_vi: 'Nguyễn Đức Thạch Diễm', name_en: 'Nguyen Duc Thach Diem', role_vi: 'Phó Chủ tịch Quỹ', role_en: 'Vice Chairman', img: 'https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2025/12/ndtd-2048x1536-1.jpg' },
        { cat: 'board', name_vi: 'Đặng Thế Đức', name_en: 'Dang The Duc', role_vi: 'Thành viên Quỹ', role_en: 'Foundation Member', img: 'https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2025/12/dangtheduc.jpg' },
        { cat: 'control', name_vi: 'Trần Duy Cảnh', name_en: 'Tran Duy Canh', role_vi: 'Trưởng Ban', role_en: 'Head of Board', img: 'https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2025/12/tdc-2.jpg' },
        { cat: 'control', name_vi: 'Thái Bá Cần', name_en: 'Thai Ba Can', role_vi: 'Ủy viên Ban', role_en: 'Committee Member', img: 'https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2025/12/download.jpg' },
        { cat: 'control', name_vi: 'Hoàng Thị Lệ Trinh', name_en: 'Hoang Thi Le Trinh', role_vi: 'Phó Trưởng Ban', role_en: 'Deputy Head of Board', img: 'https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2025/12/495250302_992012499685782_5495326692747878723_n.jpg' },
        { cat: 'advisor', name_vi: 'Ngô Sĩ Đình', name_en: 'Ngo Si Dinh', role_vi: 'Giám đốc Caritas Việt Nam', role_en: 'Director of Caritas Vietnam', img: 'https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2025/12/nsd.jpg' },
        { cat: 'advisor', name_vi: 'Lê Xuân Hy', name_en: 'Le Xuan Hy', role_vi: 'Giáo sư - Đại học Seattle', role_en: 'Professor - Seattle University', img: 'https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2025/12/Le-Xuan-Hy-1.jpg' },
        { cat: 'advisor', name_vi: 'Hà Thu Thanh', name_en: 'Ha Thu Thanh', role_vi: 'Chủ tịch Deloitte Việt Nam', role_en: 'Chairwoman - Deloitte Vietnam', img: 'https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2025/12/htt.jpg' }
    ];

    // 2. Biến trạng thái
    let currentLang = 'vi';
        let currentCat = 'board';
        let swiperInstance;

        function filterTeam(category) {
            currentCat = category;
            document.querySelectorAll('.btn-tab-pill').forEach(btn => btn.classList.remove('active'));
            const targetBtn = document.getElementById('tab-' + category);
            if(targetBtn) targetBtn.classList.add('active');
            renderTeam();
        }

        function renderTeam() {
        const wrapper = document.getElementById('team-wrapper');
        if (!wrapper) return;

        const filtered = teamData.filter(m => m.cat === currentCat);

        // Sử dụng col-lg-4 để chia 12/4 = 3 ảnh mỗi hàng
        wrapper.innerHTML = filtered.map(m => `
            <div class="col-lg-4 col-md-6 col-sm-12 reveal-item">
                <div class="team-card-circle">
                    <div class="img-circle-frame">
                        <img src="${m.img}" alt="${m['name_' + currentLang]}">
                    </div>
                    <div class="team-info">
                        <span class="team-tag-small">${currentLang === 'vi' ? 'Thành viên' : 'Member'}</span>
                        <h4 class="team-name">${m['name_' + currentLang]}</h4>
                        <p class="team-role">${m['role_' + currentLang]}</p>
                    </div>
                </div>
            </div>
        `).join('');

        // Kích hoạt lại hiệu ứng lướt lên cho các phần tử mới render
        if (typeof revealObserver !== "undefined") {
            document.querySelectorAll('.reveal-item').forEach(el => revealObserver.observe(el));
        }
    }
        function changeLang(lang) {
            currentLang = lang;
            document.querySelectorAll('[data-vi]').forEach(el => {
                el.innerText = el.getAttribute('data-' + lang);
            });
            renderTeam();
        }

        window.addEventListener('load', () => {
            const urlParams = new URLSearchParams(window.location.search);
            const cat = urlParams.get('cat') || 'board';
            filterTeam(cat);

            const preloader = document.getElementById('preloader');
            if (preloader) {
                preloader.style.opacity = '0';
                setTimeout(() => { preloader.style.display = 'none'; }, 500);
            }
        });
    </script>
    <?php wp_footer(); ?>
</body>
</html>