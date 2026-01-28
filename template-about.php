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
        /* --- HIỆU ỨNG LƯỚT LÊN NGHỆ THUẬT --- */
        .slide-up-trigger {
            opacity: 0;
            transform: translateY(120px); /* Đẩy xuống thấp hơn để lướt lên dài hơn */
            transition: all 1.8s cubic-bezier(0.16, 1, 0.3, 1); /* Hiệu ứng mượt kiểu Apple */
        }

        .slide-up-trigger.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* --- STYLE TRANG TRÍ --- */
        .rounded-custom {
            border-radius: 30px;
        }

        .shadow-art {
            box-shadow: 0 30px 60px rgba(0,0,0,0.12);
        }

        .about-image-wrapper {
            position: relative;
            padding: 20px;
        }

        .decorative-box {
            position: absolute;
            top: -10px;
            left: -10px;
            width: 100px;
            height: 100px;
            border-top: 5px solid var(--primary-green);
            border-left: 5px solid var(--primary-green);
            z-index: -1;
            border-radius: 10px 0 0 0;
        }

        .serif-title {
            font-size: 2.8rem;
            font-weight: 800;
            color: #1a1a1a;
            line-height: 1.2;
        }

        .lead-text {
            font-size: 1.15rem;
            font-weight: 600;
            color: #333;
            line-height: 1.7;
        }

        .letter-spacing-2 {
            letter-spacing: 2px;
        }
        /* Trạng thái chuẩn bị: Đẩy xuống sâu và làm mờ */
        .reveal-img, .reveal-item {
            opacity: 0;
            transform: translateY(100px); /* Đẩy xuống 100px */
            transition: transform 2s cubic-bezier(0.19, 1, 0.22, 1), 
                        opacity 2s cubic-bezier(0.19, 1, 0.22, 1);
            will-change: transform, opacity;
        }

        /* Khi kích hoạt: Trở về vị trí 0 */
        .reveal-img.active, .reveal-item.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Hiệu ứng zoom nhẹ cho ảnh để tăng độ nghệ thuật */
        .img-overflow {
            overflow: hidden;
            border-radius: 40px 0 40px 0; /* Bo góc kiểu nghệ thuật */
            box-shadow: 0 40px 80px rgba(0,0,0,0.1);
        }

        .main-img {
            transform: scale(1.1);
            transition: transform 3s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .reveal-img.active .main-img {
            transform: scale(1); /* Ảnh hơi thu nhỏ lại khi hiện ra */
        }

        /* Serif font cho tiêu đề giống Dribbble */
        .serif-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: #1a1a1a;
            line-height: 1.1;
        }

        /* Thiết lập độ trễ (Stagger) cho từng mục để chúng lên đuổi nhau */
        .reveal-item:nth-child(1) { transition-delay: 0.2s; }
        .reveal-item:nth-child(2) { transition-delay: 0.4s; }
        .story-text .reveal-item:nth-child(1) { transition-delay: 0.6s; }
        .story-text .reveal-item:nth-child(2) { transition-delay: 0.8s; }
        .story-text .reveal-item:nth-child(3) { transition-delay: 1.0s; }

        @media (max-width: 768px) {
            .serif-title { font-size: 2.5rem; }
        }
        /* Typography & Spacing */
        .letter-spacing-1 { letter-spacing: 1px; }
        .project-card-luxury h4 { font-size: 1.5rem; letter-spacing: -0.5px; }

        /* Hiệu ứng khung ảnh dự án */
        .img-reveal-wrapper {
            overflow: hidden;
            border-radius: 20px;
            position: relative;
        }

        .img-reveal-wrapper img {
            transition: transform 1.5s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .project-card-luxury:hover img {
            transform: scale(1.1);
        }

        /* Tinh chỉnh Reveal Item để chạy mượt khi scroll */
        .reveal-item {
            opacity: 0;
            transform: translateY(50px);
            transition: transform 1.5s cubic-bezier(0.19, 1, 0.22, 1), 
                        opacity 1.5s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .reveal-item.active {
            opacity: 1;
            transform: translateY(0);
        }
        /* Achievement Squares */
        .achievement-square {
            text-align: center;
        }

        .box-inner {
            width: 120px;
            height: 120px;
            border: 1px solid #e0e0e0;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            transition: all 0.5s ease;
        }

        .achievement-square:hover .box-inner {
            border-color: var(--primary-green);
            transform: rotate(5deg); /* Hơi xoay nhẹ khi hover cho "nghệ" */
        }

        .stat-number {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--primary-green);
            margin: 0;
        }

        .plus {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--primary-green);
            margin-left: 2px;
        }

        .stat-label {
            text-transform: uppercase;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1px;
            color: #666;
        }

        /* Staggered Grid (So le) */
        @media (min-width: 768px) {
            .staggered-grid .project-col:nth-child(2) {
                transform: translateY(100px); /* Đẩy cột giữa xuống 100px */
            }
        }

        .project-card-luxury h4 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: #1a1a1a;
        }
        /* --- PHẦN 1: STYLE BẢNG SỐ LIỆU (ẢNH 1) --- */
        .lrf-stat-card {
            background: #fff;
            padding: 40px 20px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
            transition: 0.4s ease;
            border-top: 8px solid transparent; /* Chuẩn bị cho viền màu */
        }

        .lrf-stat-card.border-green { border-top-color: #008D42; }
        .lrf-stat-card.border-red { border-top-color: #E30613; }
        .lrf-stat-card.border-blue { border-top-color: #3B82F6; }

        .stat-label {
            font-size: 0.85rem;
            font-weight: 800;
            color: #666;
            margin-bottom: 15px;
            letter-spacing: 1px;
        }

        .stat-number-large {
            font-size: 2.2rem;
            font-weight: 900;
            color: #B12029; /* Màu nâu đỏ đậm chuẩn ảnh */
            margin: 0;
        }

        /* --- PHẦN DỰ ÁN TIÊU BIỂU ART GRID --- */
        .featured-projects-art {
            overflow: hidden; /* Đảm bảo không vỡ layout khi trượt */
        }

        .project-card-v3 {
            background: transparent;
            transition: 0.6s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .img-wrapper-art {
            width: 100%;
            aspect-ratio: 4/3; /* ÉP TẤT CẢ ẢNH VỀ CÙNG 1 TỶ LỆ KHUNG HÌNH */
            overflow: hidden;
            border-radius: 35px; /* Bo góc nghệ thuật */
            position: relative;
            background: #f8f9fa;
        }

        .img-wrapper-art img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Giúp ảnh không bị méo */
            transition: transform 2s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .project-card-v3:hover img {
            transform: scale(1.1);
        }

        .shadow-art {
            box-shadow: 0 25px 50px rgba(0,0,0,0.08);
        }

        .content-box-art h4 {
            font-size: 1.7rem;
            font-weight: 800;
            color: var(--primary-green); /* Màu xanh tiêu đề */
            margin-bottom: 12px;
        }

        .content-box-art p {
            line-height: 1.6;
            color: #555;
        }

        /* FIX: Trên mobile không so le để dễ nhìn */
        @media (max-width: 991px) {
            .mt-lg-5, .pt-lg-5 {
                margin-top: 0 !important;
                padding-top: 0 !important;
            }
            .content-box-art h4 {
                font-size: 1.4rem;
            }
        }
        /* IMPACT LINE STYLE */
        .impact-stat {
            font-size: 0.9rem;
            font-weight: 700;
            color: #008D42; /* Màu xanh lá truyền cảm hứng */
            display: inline-block;
            padding: 4px 12px;
            background: #f1f8f4;
            border-radius: 50px;
        }

        /* CTA BUTTONS */
        .btn-detail {
            font-size: 0.85rem;
            font-weight: 700;
            text-decoration: none;
            color: #333;
            border-bottom: 2px solid #ddd;
            transition: 0.3s;
            padding-bottom: 2px;
        }

        .btn-detail:hover {
            color: #008D42;
            border-color: #008D42;
        }

        .btn-mini-donate {
            font-size: 0.85rem;
            font-weight: 800;
            text-decoration: none;
            color: #E30613;
            transition: 0.3s;
        }

        .btn-mini-donate:hover {
            color: #b12029;
            text-decoration: underline;
        }

        /* BEFORE-AFTER BADGE */
        .before-after-badge {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background: rgba(227, 6, 19, 0.9); /* Đỏ nổi bật */
            color: #fff;
            padding: 8px 15px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 700;
            backdrop-filter: blur(5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            z-index: 5;
        }

        /* Hover effect cho toàn bộ card */
        .project-card-impact:hover .img-wrapper-art {
            transform: translateY(-5px);
        }
        /* BADGE TRẠNG THÁI */
        .status-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 6px 15px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 800;
            z-index: 10;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .status-completed { background: #e8f5e9; color: #2e7d32; } /* Xanh dương/lá nhạt */
        .status-ongoing { background: #e3f2fd; color: #1565c0; }   /* Xanh dương nhạt */

        /* CÂU URGENCY (THÔI THÚC) */
        .urgency-line {
            font-size: 0.95rem;
            font-weight: 700;
            color: #333;
            font-style: italic;
            border-left: 3px solid var(--primary-red);
            padding-left: 12px;
        }

        /* NÚT VIÊN THUỐC XANH */
        .btn-pill-green {
            background-color: var(--primary-green);
            color: white !important;
            padding: 8px 25px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            border: none;
        }
        .btn-pill-green:hover {
            background-color: #006b32;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,141,66,0.2);
        }

        /* KHỐI CHUYỂN TIẾP CUỐI TRANG */
        .next-journey-cta {
            background-color: #fdfbfa;
            border-top: 1px solid #eee;
        }

        .btn-donate-large {
            background-color: var(--primary-red);
            color: white !important;
            font-weight: 800;
            text-decoration: none;
            border-radius: 50px;
            transition: 0.3s;
            display: inline-block;
            box-shadow: 0 10px 20px rgba(227, 6, 19, 0.2);
        }
        .btn-donate-large:hover {
            background-color: #b12029;
            transform: scale(1.05);
        }
        /* BADGE THÀNH TỰU TRONG SUỐT NHẸ */
        .status-badge-final {
            position: absolute;
            top: 25px;
            left: 25px;
            background: rgba(46, 125, 50, 0.9); /* Xanh lá đậm uy tín */
            color: white;
            padding: 8px 18px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 800;
            z-index: 10;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            backdrop-filter: blur(4px);
        }

        /* CÂU URGENCY (DÒNG IN NGHIÊNG CÓ VIỀN ĐỎ) */
        .urgency-line {
            font-size: 1rem;
            font-weight: 600;
            color: #444;
            font-style: italic;
            border-left: 4px solid var(--primary-red);
            padding-left: 15px;
            line-height: 1.6;
        }

        /* NÚT VIÊN THUỐC XANH LÁ (PILL) */
        .btn-pill-green-thick {
            background-color: var(--primary-green);
            color: white !important;
            padding: 12px 35px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 800;
            text-transform: uppercase;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
            box-shadow: 0 5px 15px rgba(0,141,66,0.2);
            border: none;
        }

        .btn-pill-green-thick:hover {
            background-color: #006b32;
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 10px 25px rgba(0,141,66,0.3);
        }

        /* NÚT ĐỎ TO CUỐI TRANG */
        .btn-lrf-red-large {
            background-color: var(--primary-red);
            color: white !important;
            font-weight: 800;
            padding: 18px 45px;
            border-radius: 50px;
            text-decoration: none;
            display: inline-block;
            letter-spacing: 1px;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(227, 6, 19, 0.3);
        }

        .btn-lrf-red-large:hover {
            background-color: #b12029;
            transform: scale(1.05);
            box-shadow: 0 15px 40px rgba(227, 6, 19, 0.4);
        }

        .call-to-action-bridge {
            background: linear-gradient(to bottom, #ffffff, #fdfbfa);
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
        <section class="luxury-intro py-5 mt-5">
            <div class="container">
                <div class="row align-items-center g-5">
                    <!-- Cột Ảnh: Sẽ trượt lên đầu tiên -->
                    <div class="col-lg-6">
                        <div class="reveal-box reveal-img">
                            <div class="img-overflow">
                                <img src="https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2026/01/about-us-lrf-1-2048x1365-1.jpg" 
                                     alt="Founding LRF" class="img-fluid main-img">
                            </div>
                        </div>
                    </div>

                    <!-- Cột Chữ: Các dòng sẽ đuổi nhau lên -->
                    <div class="col-lg-6">
                        <div class="about-text-content">
                            <h6 class="reveal-item text-success fw-bold text-uppercase mb-3" 
                                style="letter-spacing: 3px;" 
                                data-vi="Câu chuyện của chúng tôi" 
                                data-en="OUR STORY">
                                Câu chuyện của chúng tôi
                            </h6>

                            <h2 class="reveal-item serif-title mb-4" 
                                data-vi="Lan tỏa yêu thương từ tâm" 
                                data-en="Spreading Love from the Heart">
                                Lan tỏa yêu thương từ tâm
                            </h2>

                            <div class="story-text">
                                <p class="reveal-item text-secondary mb-4" style="font-size: 1.1rem; line-height: 1.8;" 
                                   data-vi="Quỹ từ thiện Bông hồng nhỏ (Little Roses Foundation) là quỹ từ thiện không vì mục tiêu lợi nhuận, hướng đến các hoạt động thiện nguyện đa dạng phục vụ cộng đồng. Được thúc đẩy bởi truyền thống gia đình và tấm lòng người Mẹ, NHG là thành viên sáng lập chủ chốt của Quỹ." 
                                   data-en="Little Roses Foundation (LRF) is a non-profit charity organization dedicated to diverse humanitarian activities to serve the community. Driven by family tradition and a Mother's heart, NHG is the key founding member of the Foundation.">
                                   Quỹ từ thiện Bông hồng nhỏ (Little Roses Foundation) là quỹ từ thiện không vì mục tiêu lợi nhuận, hướng đến các hoạt động thiện nguyện đa dạng phục vụ cộng đồng. Được thúc đẩy bởi truyền thống gia đình và tấm lòng người Mẹ, NHG là thành viên sáng lập chủ chốt của Quỹ.
                                </p>

                                <p class="reveal-item text-secondary mb-4" style="font-size: 1.1rem; line-height: 1.8;" 
                                   data-vi="Quỹ chính thức được thành lập vào ngày 01/11/2021 theo quyết định số 1151/QĐ-BNV và được cấp phép hoạt động ngày 22/04/2022 theo quyết định số 316/QĐ-BNV." 
                                   data-en="The Foundation was officially established on November 1st, 2021, under Decision No. 1151/QD-BNV and was licensed to operate on April 22nd, 2022, under Decision No. 316/QD-BNV.">
                                   Quỹ chính thức được thành lập vào ngày 01/11/2021 theo quyết định số 1151/QĐ-BNV và được cấp phép hoạt động ngày 22/04/2022 theo quyết định số 316/QĐ-BNV.
                                </p>

                                <p class="reveal-item text-secondary" style="font-size: 1.1rem; line-height: 1.8;" 
                                   data-vi="Quỹ phục vụ chủ yếu trên các lĩnh vực sức khỏe – giáo dục, được cấp phép bởi Bộ Nội Vụ để hoạt động trên phạm vi toàn quốc và đón nhận sự trợ giúp của quốc tế." 
                                   data-en="Serving primarily in the fields of healthcare and education, the Foundation is licensed by the Ministry of Home Affairs to operate nationwide and receive international support.">
                                   Quỹ phục vụ chủ yếu trên các lĩnh vực sức khỏe – giáo dục, được cấp phép bởi Bộ Nội Vụ để hoạt động trên phạm vi toàn quốc và đón nhận sự trợ giúp của quốc tế.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- PHẦN 1: BẢNG SỐ LIỆU TÀI CHÍNH (GIỐNG ẢNH 1) -->
        <section class="impact-dashboard py-5 mb-5">
            <div class="container">
                <div class="row g-4">
                    <!-- Thẻ 1: Tổng thu (Viền xanh lá) -->
                    <div class="col-md-4">
                        <div class="lrf-stat-card border-green reveal-item">
                            <p class="stat-label" data-vi="TỔNG THU NIÊM YẾT" data-en="TOTAL ANNOUNCED REVENUE">TỔNG THU NIÊM YẾT</p>
                            <h3 class="stat-number-large" data-target="25056262000">0</h3>
                        </div>
                    </div>
                    <!-- Thẻ 2: Tổng chi (Viền đỏ) -->
                    <div class="col-md-4">
                        <div class="lrf-stat-card border-red reveal-item">
                            <p class="stat-label" data-vi="TỔNG CHI DỰ ÁN" data-en="TOTAL PROJECT EXPENDITURE">TỔNG CHI DỰ ÁN</p>
                            <h3 class="stat-number-large" data-target="18573016000">0</h3>
                        </div>
                    </div>
                    <!-- Thẻ 3: Số dư (Viền xanh dương) -->
                    <div class="col-md-4">
                        <div class="lrf-stat-card border-blue reveal-item">
                            <p class="stat-label" data-vi="SỐ DƯ QUỸ HIỆN TẠI" data-en="CURRENT FUND BALANCE">SỐ DƯ QUỸ HIỆN TẠI</p>
                            <h3 class="stat-number-large" data-target="6483246000">0</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- PHẦN 2: NHỮNG DẤU ẤN ĐÃ ĐẠT ĐƯỢC (TRACK RECORD) -->
        <section class="achievements-grid py-5 bg-white">
            <div class="container">
                <div class="text-center mb-5 pb-5">
                    <h6 class="reveal-item text-success fw-bold text-uppercase mb-2" style="letter-spacing: 3px;" data-vi="THÀNH TỰU THỰC TIỄN" data-en="OUR TRACK RECORD">THÀNH TỰU THỰC TIỄN</h6>
                    <h2 class="reveal-item serif-title" data-vi="Những hành trình nhân ái <br>đã hoàn thành" data-en="Completed Compassionate Journeys">Những hành trình nhân ái <br>đã hoàn thành</h2>
                </div>

                <div class="row g-5 align-items-start">
                    <!-- DỰ ÁN 1 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="reveal-item project-card-achievement">
                            <div class="img-wrapper-art shadow-art">
                                <img src="https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2026/01/442.jpg" alt="Thành tựu 1">
                                <div class="status-badge-final" data-vi="✓ ĐÃ HOÀN THÀNH" data-en="✓ COMPLETED">✓ ĐÃ HOÀN THÀNH</div>
                            </div>
                            <div class="content-box-art mt-4">
                                <h4 class="fw-bold mb-1" data-vi="Vườn Hồng Giáo Dục" data-en="Rose Garden Education">Vườn Hồng Giáo Dục</h4>
                                <div class="impact-stat mb-3" data-vi="🌱 1.200 học sinh được hỗ trợ • 15 tỉnh thành" data-en="🌱 1,200 students supported • 15 provinces">
                                    🌱 1.200 học sinh được hỗ trợ • 15 tỉnh thành
                                </div>

                                <p class="urgency-line mb-4" data-vi="1.200 học sinh đã được tiếp sức đến trường. Tuy nhiên, hàng nghìn em nhỏ khác vẫn đang mong chờ một cơ hội học tập tương đương." data-en="1,200 students helped. However, thousands of other children are still waiting for a similar educational opportunity.">
                                    1.200 học sinh đã được tiếp sức đến trường. Tuy nhiên, hàng nghìn em nhỏ khác vẫn đang mong chờ một cơ hội học tập tương đương.
                                </p>

                                <a href="<?php echo home_url('/bao-cao/da-hoan-thanh'); ?>" class="btn-pill-green-thick" data-vi="Xem chi tiết" data-en="View details">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>

                    <!-- DỰ ÁN 2: SO LE (OFFSET) -->
                    <div class="col-lg-4 col-md-6 mt-lg-5 pt-lg-5">
                        <div class="reveal-item project-card-achievement">
                            <div class="img-wrapper-art shadow-art">
                                <img src="https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2026/01/images.jpg" alt="Thành tựu 2">
                                <div class="status-badge-final" data-vi="✓ ĐÃ HOÀN THÀNH" data-en="✓ COMPLETED">✓ ĐÃ HOÀN THÀNH</div>
                            </div>
                            <div class="content-box-art mt-4">
                                <h4 class="fw-bold mb-1" data-vi="Ánh Sáng Từ Tâm" data-en="Heart-led Light">Ánh Sáng Từ Tâm</h4>
                                <div class="impact-stat mb-3" data-vi="💡 300 trẻ em được phẫu thuật • 40 điểm trường" data-en="💡 300 children operated • 40 school sites">
                                    💡 300 trẻ em được phẫu thuật • 40 điểm trường
                                </div>

                                <p class="urgency-line mb-4" data-vi="300 ca phẫu thuật đã mang lại ánh sáng. Nhưng bóng tối vẫn đang bủa vây hàng trăm trẻ em khác trong danh sách chờ hỗ trợ khẩn cấp." data-en="300 surgeries brought light. But darkness still surrounds hundreds of other children on the urgent waiting list.">
                                    300 ca phẫu thuật đã mang lại ánh sáng. Nhưng bóng tối vẫn đang bủa vây hàng trăm trẻ em khác trong danh sách chờ hỗ trợ khẩn cấp.
                                </p>

                                <a href="<?php echo home_url('/bao-cao/da-hoan-thanh'); ?>" class="btn-pill-green-thick" data-vi="Xem chi tiết" data-en="View details">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>

                    <!-- DỰ ÁN 3 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="reveal-item project-card-achievement">
                            <div class="img-wrapper-art shadow-art">
                                <img src="https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2026/01/bh20231129155621.jpg" alt="Thành tựu 3">
                                <div class="status-badge-final" data-vi="✓ ĐÃ HOÀN THÀNH" data-en="✓ COMPLETED">✓ ĐÃ HOÀN THÀNH</div>
                            </div>
                            <div class="content-box-art mt-4">
                                <h4 class="fw-bold mb-1" data-vi="Nước Sạch Bản Xa" data-en="Pure Water for Villages">Nước Sạch Bản Xa</h4>
                                <div class="impact-stat mb-3" data-vi="💧 5.000 người dân tiếp cận nước sạch" data-en="💧 5,000 people with clean water">
                                    💧 5.000 người dân tiếp cận nước sạch
                                </div>

                                <p class="urgency-line mb-4" data-vi="5.000 người dân đã có nước sạch. Song, tại các bản làng xa xôi, nước sạch vẫn là một điều xa xỉ với hàng chục nghìn người khác." data-en="5,000 people have clean water. Yet, in remote villages, clean water remains a luxury for tens of thousands of others.">
                                    5.000 người dân đã có nước sạch. Song, tại các bản làng xa xôi, nước sạch vẫn là một điều xa xỉ với hàng chục nghìn người khác.
                                </p>

                                <a href="<?php echo home_url('/bao-cao/da-hoan-thanh'); ?>" class="btn-pill-green-thick" data-vi="Xem chi tiết" data-en="View details">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- KHỐI CHUYỂN TIẾP: TỪ QUÁ KHỨ ĐẾN TƯƠNG LAI -->
        <section class="call-to-action-bridge py-5">
            <div class="container text-center">
                <div class="reveal-item">
                    <h3 class="fw-bold mb-4" style="font-size: 2.2rem; color: #1a1a1a;" data-vi="Những hành trình đã hoàn thành – Và những hy vọng mới đang chờ bạn" data-en="Completed Journeys – And New Hopes Waiting for You">
                        🌹 Những hành trình đã hoàn thành – <br>Và những hy vọng mới đang chờ bạn
                    </h3>
                    <p class="text-secondary mx-auto mb-5" style="max-width: 850px; font-size: 1.1rem; line-height: 1.8;" data-vi="Các dự án trên là minh chứng cho cách Quỹ Hoa Hồng biến sự đóng góp thành thay đổi thật. Chúng tôi vẫn đang tiếp tục triển khai các chương trình mới để giúp thêm nhiều trẻ em và cộng đồng khó khăn hơn nữa." data-en="The projects above are evidence of how Little Roses Foundation turns contributions into real change. We continue to implement new programs to help even more children and disadvantaged communities.">
                        Các dự án trên là minh chứng cho cách Quỹ Hoa Hồng biến sự đóng góp thành thay đổi thật. Chúng tôi vẫn đang tiếp tục triển khai các chương trình mới để giúp thêm nhiều trẻ em và cộng đồng khó khăn hơn nữa.
                    </p>
                    <a href="<?php echo home_url('/project'); ?>" class="btn-lrf-red-large px-5 py-3" data-vi="XEM CÁC DỰ ÁN ĐANG CẦN HỖ TRỢ" data-en="VIEW PROJECTS NEEDING SUPPORT">
                        XEM CÁC DỰ ÁN ĐANG CẦN HỖ TRỢ
                    </a>
                </div>
            </div>
        </section>
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
    
    // 3. Hàm chuyển ngôn ngữ
    function changeLang(lang) {
        currentLang = lang;
        document.querySelectorAll('[data-vi]').forEach(el => {
            el.innerText = el.getAttribute('data-' + lang);
        });
        document.getElementById('btn-vi').classList.toggle('active', lang === 'vi');
        document.getElementById('btn-en').classList.toggle('active', lang === 'en');
        renderTeam(); // Gọi hàm render
    }

    // 4. Khởi tạo hoặc cập nhật Swiper
    function initSwiper() {
        if (swiperInstance) swiperInstance.destroy(true, true);
        swiperInstance = new Swiper('.swiper-team', {
            slidesPerView: 1.2, 
            spaceBetween: 20, 
            loop: true,
            navigation: { 
                nextEl: '.swiper-btn-next-custom', 
                prevEl: '.swiper-btn-prev-custom' 
            },
            breakpoints: { 
                768: { slidesPerView: 2.5 }, 
                1024: { slidesPerView: 3 } 
            }
        });
    }

    // 3. Hàm đếm số tiền (Currency Counter)
    const animateCurrency = (el) => {
        const target = parseInt(el.getAttribute('data-target'));
        const duration = 2500; 
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            const current = Math.floor(progress * target);
            el.innerText = current.toLocaleString('vi-VN');
            if (progress < 1) window.requestAnimationFrame(step);
            else el.innerText = target.toLocaleString('vi-VN');
        };
        window.requestAnimationFrame(step);
    };

    // 4. Khởi tạo khi trang tải xong
    window.addEventListener('load', () => {
        // --- BƯỚC 1: TẮT LOADING (QUAN TRỌNG) ---
        const preloader = document.getElementById('preloader');
        if (preloader) {
            preloader.style.opacity = '0';
            setTimeout(() => { 
                preloader.style.display = 'none'; 
                
                // Sau khi loading tắt mới kích hoạt reveal cho phần đầu trang
                document.querySelectorAll('.luxury-intro .reveal-item, .luxury-intro .reveal-img').forEach(el => {
                    el.classList.add('active');
                });
            }, 600);
        }

        // --- BƯỚC 2: QUAN SÁT CUỘN TRANG (REVEAL & COUNTER) ---
        const observerOptions = { threshold: 0.15 };
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    
                    // Nếu là thẻ số liệu, bắt đầu đếm
                    const number = entry.target.querySelector('.stat-number-large');
                    if (number && number.innerText === "0") {
                        animateCurrency(number);
                    }
                }
            });
        }, observerOptions);

        // Đăng ký quan sát cho tất cả các phần tử có hiệu ứng
        document.querySelectorAll('.reveal-item, .reveal-img, .lrf-stat-card').forEach(el => {
            revealObserver.observe(el);
        });
    });
    </script>
    <?php wp_footer(); ?>
</body>
</html>