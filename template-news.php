<?php
/*
Template Name: News Art - All In One
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức - Little Rose Foundation</title>
    
    <!-- 1. Thư viện chuẩn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <style>
        /* --- KHAI BÁO FONT GOTHAM (Bạn cần có file font trong thư mục theme) --- */
        @font-face {
            font-family: 'Gotham';
            src: url('<?php echo get_template_directory_uri(); ?>/fonts/Gotham-Book.woff2') format('woff2');
            font-weight: 400;
            font-style: normal;
        }
        @font-face {
            font-family: 'Gotham';
            src: url('<?php echo get_template_directory_uri(); ?>/fonts/Gotham-Bold.woff2') format('woff2');
            font-weight: 700;
            font-style: normal;
        }
        @font-face {
            font-family: 'Gotham';
            src: url('<?php echo get_template_directory_uri(); ?>/fonts/Gotham-Black.woff2') format('woff2');
            font-weight: 800;
            font-style: normal;
        }

        :root { 
            --primary-green: #008D42; 
            --primary-red: #E30613; 
            --bg-warm: #FDFBFA;
            --font-gotham: 'Gotham', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }   
        
        /* --- CẬP NHẬT FONT CHỮ GOTHAM TOÀN BỘ --- */
        body { 
            font-family: var(--font-gotham) !important; 
            background-color: var(--bg-warm); 
            overflow-x: hidden; 
        }
        /* CSS bổ sung để đảm bảo hiển thị "đều" và "đẹp" ngay lập tức */
       .hero-custom {
    height: 85vh; /* Độ cao của khu vực banner */
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    position: relative;
    overflow: hidden;

    /* CÁCH THÊM ẢNH NỀN */
    /* 1. Chúng ta dùng linear-gradient để tạo một lớp phủ đen mờ (0.5) giúp chữ trắng nổi bật lên */
    
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                url('img/background.jpg') no-repeat center center;
    
    background-size: cover; /* Để ảnh luôn lấp đầy khung hình */
    background-attachment: fixed; /* Tạo hiệu ứng cuộn ảnh nhẹ (Parallax) nếu muốn sang trọng */
}
        .hero-content h1 {
            font-family: var(--font-gotham) !important;
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
        .section-padding { padding: 100px 0; }
        .stat-card {
            padding: 40px;
            border: 1px solid #eee;
            transition: all 0.4s ease;
            background: white;
            height: 100%;
        }
        /* 2. LOADING ĐỒNG BỘ */
      /* --- 1. LOADING TRÁI TIM NHÂN ÁI (THAY THẾ TOÀN BỘ CODE CŨ) --- */
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

/* Vẽ trái tim theo kỹ thuật Diamond + Circle */
.heart-pulse {
    position: relative;
    width: 60px;  /* Độ lớn trái tim */
    height: 60px;
    background-color: #B12029; /* Màu đỏ chuẩn LRF */
    transform: rotate(-45deg); /* Xoay hình vuông thành hình thoi */
    animation: heartbeatPlushing 1.2s infinite ease-in-out;
    margin-top: 30px; /* Căn chỉnh vị trí */
}

.heart-pulse::before,
.heart-pulse::after {
    content: "";
    position: absolute;
    width: 60px;
    height: 60px;
    background-color: #B12029;
    border-radius: 50%; /* Tạo thành hình tròn */
}

/* Đẩy hình tròn lên trên */
.heart-pulse::before {
    top: -30px;
    left: 0;
}

/* Đẩy hình tròn sang phải */
.heart-pulse::after {
    top: 0;
    left: 30px;
}

/* Hiệu ứng nhịp đập & Tỏa sáng (Quan trọng: phải giữ nguyên rotate(-45deg)) */
@keyframes heartbeatPlushing {
    0% { 
        transform: scale(1) rotate(-45deg); 
        filter: drop-shadow(0 0 5px rgba(177, 32, 41, 0.2)); 
    }
    14% { 
        transform: scale(1.15) rotate(-45deg); /* Nhịp 1 */
        filter: drop-shadow(0 0 20px rgba(177, 32, 41, 0.6)); 
    }
    28% { 
        transform: scale(1.05) rotate(-45deg); 
    }
    42% { 
        transform: scale(1.3) rotate(-45deg); /* Nhịp 2 mạnh hơn */
        filter: drop-shadow(0 0 40px rgba(177, 32, 41, 0.8)); 
    }
    70% { 
        transform: scale(1) rotate(-45deg); 
        filter: drop-shadow(0 0 5px rgba(177, 32, 41, 0.2));
    }
}

        /* 3. STYLE TIN TỨC & CHỐNG TRÀN ẢNH */
        .news-card { border: none; border-radius: 25px; overflow: hidden; transition: 0.4s; background: white; box-shadow: 0 10px 30px rgba(0,0,0,0.03); margin-bottom: 2.5rem; }
        .news-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.08) !important; }
        
        /* Khung chứa ảnh cố định để không bị tràn */
        .news-img-container { 
            position: relative; 
            height: 350px; /* Độ cao cố định */
            width: 100%;
            overflow: hidden; 
            background: #eee; 
        }
        .news-img-container img { 
            width: 100%; 
            height: 100%; 
            object-fit: cover; /* Quan trọng: Ảnh tự co giãn không bị méo */
            transition: 0.6s; 
        }
        .news-card:hover .news-img-container img { transform: scale(1.05); }

        /* 3. MENU & NÚT (Đúng chuẩn Art) */
        .nav-link { font-weight: 800 !important; color: #1a1a1a !important; transition: 0.3s; }
        .nav-link:hover, .nav-link.active { color: var(--primary-green) !important; }
        .btn-donate { background-color: var(--primary-red) !important; color: white !important; font-weight: 800 !important; border-radius: 50px !important; padding: 10px 30px !important; border: none !important; transition: 0.3s; }
        .btn-donate:hover { transform: scale(1.05); background-color: #b30510 !important; }

        .lang-switch { font-weight: 800 !important; cursor: pointer; color: #999; padding-bottom: 2px; transition: 0.3s; text-decoration: none; }
        .lang-switch.active { color: var(--primary-green) !important; border-bottom: 2px solid var(--primary-green); }

        /* 4. BỘ LỌC (FILTER) */
        .filter-btn { border-radius: 50px; padding: 8px 25px; font-weight: 700; border: 1px solid #ddd; background: white; transition: 0.3s; margin: 5px; }
        .filter-btn.active { background: var(--primary-green); color: white; border-color: var(--primary-green); box-shadow: 0 4px 15px rgba(0, 141, 66, 0.2); }

        /* 5. PROJECT CARDS & BADGE (Giống ảnh mẫu 100%) */
        .project-item { transition: all 0.5s ease; }
        .project-card { border: none; border-radius: 25px; overflow: hidden; transition: 0.4s; background: white; box-shadow: 0 10px 30px rgba(0,0,0,0.03); }
        .project-card:hover { transform: translateY(-12px); box-shadow: 0 20px 40px rgba(0,0,0,0.08) !important; }
        
        .project-img-container { position: relative; height: 320px; overflow: hidden; background: #eee; }
        .project-img-container img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; }
        .project-card:hover .project-img-container img { transform: scale(1.1); }
        
        .category-badge-apple {
            position: absolute; top: 20px; right: 20px; background-color: white; 
            color: var(--primary-green); padding: 6px 20px; border-radius: 50px; 
            font-size: 0.85rem; font-weight: 800; box-shadow: 0 4px 10px rgba(0,0,0,0.1); z-index: 2;
        }

        .progress { height: 8px; border-radius: 50px; background-color: #eee; }
        .progress-bar { background-color: var(--primary-red); }

        /* 6. FOOTER HIỆU ỨNG TRƯỢT SLIDE 12PX */
        .social-list { list-style: none; padding: 0; }
        .social-link-item { display: flex; align-items: center; text-decoration: none; color: #adb5bd; font-weight: 600; margin-bottom: 12px; transition: 0.4s cubic-bezier(0.165, 0.84, 0.44, 1); }
        .social-icon-box { width: 35px; text-align: center; font-size: 1.2rem; margin-right: 10px; }
        .social-link-item:hover { color: #ffffff !important; transform: translateX(12px); }
        .social-link-item:hover .fa-globe { color: var(--primary-green); }
        .social-link-item:hover .fa-facebook { color: #1877F2; }
        .social-link-item:hover .fa-tiktok { color: #ffffff; }
        .social-link-item:hover .fa-instagram { color: #E4405F; }
        /* --- STYLE TÀI LIỆU CẬP NHẬT (SANG TRỌNG HƠN) --- */
        .doc-sidebar-card {
            background: white;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.05);
        }

        .doc-unit { margin-bottom: 25px; }

        .doc-item-title {
            font-size: 1.1rem;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 10px;
            display: block;
        }

        .doc-meta-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        /* Thông tin file PDF */
        .file-info {
            font-size: 0.85rem;
            color: #888;
            font-weight: 600;
        }

        /* Nhãn số lượt tải - THIẾT KẾ MỚI */
        .download-badge {
            background-color: rgba(0, 141, 66, 0.08); /* Xanh lá siêu nhạt */
            color: var(--primary-green);
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 800;
            display: flex;
            align-items: center;
        }

        .download-badge i {
            font-size: 0.7rem;
            margin-right: 5px;
        }

        /* Nút Download viền mảnh hiện đại */
        .btn-outline-download {
            border: 1.5px solid var(--primary-green) !important;
            color: var(--primary-green) !important;
            background: transparent;
            border-radius: 12px;
            padding: 10px 0;
            font-weight: 700;
            width: 100%;
            display: block;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-outline-download:hover {
            background: var(--primary-green) !important;
            color: white !important;
            transform: translateY(-2px);
        }
        /* Tiêu đề Serif (Nếu muốn đổi H1, H2 sang Gotham luôn thì đổi Playfair Display thành var(--font-gotham)) */
        h1, h2, h3, .serif { 
            font-family: var(--font-gotham), serif !important; 
            font-weight: 900 !important; 
        }

        /* Cập nhật font cho các thẻ chữ khác */
        p, span, a, label, input, select, .stat-card h3, .stat-card p {
            font-family: 'Montserrat', sans-serif !important;
        }
        section.bg-white.border-top.border-bottom h2.display-5 {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 800 !important; /* Độ đậm chuẩn Gotham Black */
            line-height: 1.2 !important;
            letter-spacing: -1px !important;
            text-transform: none !important;
            color: #212529 !important;
        }

        /* 2. Ép font cho chữ "sự minh bạch" màu xanh */
        section.bg-white.border-top.border-bottom h2.display-5 span.text-success {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 800 !important;
            color: #008D42 !important; /* Màu xanh thương hiệu */
        }   

        /* 3. Ép font cho các con số (90%, 15.000, 100%) */
        .stat-card h3 {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 900 !important; /* Cực đậm cho con số */
            letter-spacing: -1.5px !important;
        }

        /* 4. Ép font cho các dòng chữ mô tả nhỏ */
        .stat-card p, .stat-card small, .text-muted {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 600 !important;
        }

        /* 5. LOẠI BỎ font có chân nếu nó vẫn còn dính */
        .display-5, .fw-bold {
            font-family: 'Montserrat', sans-serif !important;
        }
        .doc-card h6, 
        .doc-card .fw-bold.small {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 800 !important; /* Độ đậm cực đại chuẩn Gotham Black */
            color: #1a1a1a !important;
            font-size: 1.1rem !important;
            line-height: 1.4 !important;
            margin-bottom: 8px !important;
        }

        /* 2. ÉP FONT CHO THÔNG TIN PDF & DUNG LƯỢNG (PDF • 3.2 MB) */
        .doc-card .text-muted, 
        .doc-card small {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 600 !important;
            color: #6c757d !important;
        }

        /* 3. ÉP FONT CHO SỐ LƯỢT TẢI (2,450 tải) */
        .doc-card .download-count, 
        .doc-card .download-count span {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 700 !important;
            color: #008D42 !important; /* Màu xanh chuẩn LRF */
        }

        /* 4. ÉP FONT CHO NÚT DOWNLOAD */
        .doc-card .btn-outline-success {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 800 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
            border-width: 2px !important;
            border-radius: 12px !important; /* Bo góc nhẹ cho hiện đại */
            padding: 8px 0 !important;
        }

        /* 5. CĂN CHỈNH KHOẢNG CÁCH CHO ĐẸP */
        .doc-card div.mb-4 {
            border-bottom: 1px solid #eee !important;
            padding-bottom: 20px !important;
            margin-bottom: 20px !important;
        }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <!-- MÀN HÌNH LOADING -->
    <div id="preloader">
    <!-- Trái tim thuần CSS đã vẽ ở trên -->
    <div class="heart-pulse"></div>
</div>

    <!-- HEADER - ĐÃ SỬA LINK CHUẨN WORDPRESS -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand" href="<?php echo home_url('/'); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/img/LRF-02.png" alt="Logo" height="70">
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto fw-bold align-items-center">
                <!-- Trang chủ -->
                <li class="nav-item">
                    <a class="nav-link <?php echo is_front_page() ? 'active text-success' : 'text-dark'; ?> px-3 fw-bold" 
                       href="<?php echo home_url('/'); ?>" data-vi="Trang chủ" data-en="Home">Trang chủ</a>
                </li>
                <!-- Về chúng tôi -->
                <li class="nav-item">
                    <a class="nav-link <?php echo is_page('about') ? 'active text-success' : 'text-dark'; ?> px-3 fw-bold" 
                       href="<?php echo home_url('/about/'); ?>" data-vi="Về chúng tôi" data-en="About Us">Về chúng tôi</a>
                </li>
                <!-- Chương trình -->
                <li class="nav-item">
                    <a class="nav-link <?php echo is_page('project') ? 'active text-success' : 'text-dark'; ?> px-3 fw-bold" 
                       href="<?php echo home_url('/project/'); ?>" data-vi="Chương trình" data-en="Programs">Chương trình</a>
                </li>
                <!-- Thêm mục Báo cáo tài chính vào Menu -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_page('bao-cao') ? 'active text-success' : ''; ?> px-3 fw-bold" 
                        href="<?php echo home_url('/bao-cao/'); ?>" 
                        data-vi="Báo cáo tài chính" 
                        data-en="Reports">Báo cáo tài chính</a>
                    </li>
                <!-- Tin tức -->
                <li class="nav-item">
                    <a class="nav-link <?php echo is_page('news') ? 'active text-success' : 'text-dark'; ?> px-3 fw-bold" 
                       href="<?php echo home_url('/news/'); ?>" data-vi="Tin tức" data-en="News">Tin tức</a>
                </li>
                <!-- Nút Đóng góp -->
                <li class="nav-item">
                    <a class="btn btn-donate ms-lg-4 px-4 py-2 fw-bold shadow-sm" 
                       href="<?php echo home_url('/donate/'); ?>" data-vi="ĐÓNG GÓP" data-en="DONATE">ĐÓNG GÓP</a>
                </li>
                
                <!-- Chuyển ngôn ngữ -->
                <li class="nav-item d-flex ms-lg-4 fw-bold">
                    <span class="lang-switch active fw-bold" id="btn-vi" onclick="changeLang('vi')" style="cursor:pointer">VN</span>
                    <span class="mx-1 text-muted">|</span>
                    <span class="lang-switch fw-bold" id="btn-en" onclick="changeLang('en')" style="cursor:pointer">EN</span>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <main id="content" class="bg-light">
    <div class="container my-5 py-0">
        

        <div class="container my-5 py-0">
        <h2 class="fw-bold display-6 text-center mb-5" style="font-family: 'Montserrat', sans-serif;" data-vi="Tin tức & Tài liệu" data-en="News & Documents">Tin tức & Tài liệu</h2>

        <div class="row g-5">
            <!-- CỘT TRÁI: BÀI VIẾT (70%) -->
            <div class="col-lg-8">
                
                <!-- TIN TỨC 1: ĐÊM NHẠC (LINK 1) -->
                <div class="news-card border-0 shadow-sm">
                    <a href="https://littlerosesfoundation.org/save-the-date-22-august-2024/" target="_blank">
                        <div class="news-img-container">
                            <!-- WordPress Image Path -->
                            <img src="<?php echo get_template_directory_uri(); ?>/img/tintuc.jpg" alt="Đêm nhạc">
                            <span class="date-badge">22 Aug 2024</span>
                        </div>
                    </a>
                    <div class="card-body p-5">
                        <a href="https://littlerosesfoundation.org/save-the-date-22-august-2024/" target="_blank" class="news-title-link">
                            <h3 class="fw-bold mb-4" style="font-family: 'Montserrat', sans-serif;" data-vi="Đêm nhạc gây quỹ thiện nguyện: Mẹ Là Tình Yêu" data-en="Charity Fundraising Concert: Mother is Love">Đêm nhạc gây quỹ thiện nguyện: Mẹ Là Tình Yêu</h3>
                        </a>
                        <p class="text-secondary" data-vi="Chương trình nghệ thuật quy mô lớn nhằm hỗ trợ những mảnh đời khó khăn. Nhấn để xem chi tiết bài viết chính thức." data-en="A large-scale art program to support disadvantaged lives. Click to view the official article.">Chương trình nghệ thuật quy mô lớn nhằm hỗ trợ những mảnh đời khó khăn. Nhấn xem bài viết chính thức.</p>
                        <a href="https://littlerosesfoundation.org/save-the-date-22-august-2024/" target="_blank" class="btn btn-outline-success px-4 fw-bold mt-3" data-vi="Xem bài gốc" data-en="Read Original">Xem bài gốc</a>
                    </div>
                </div>

                <!-- TIN TỨC 2: HỌC BỔNG (LINK 2) -->
                <div class="news-card border-0 shadow-sm">
                    <a href="https://littlerosesfoundation.org/announcement-little-roses-foundations-2024-loving-scholarship/" target="_blank">
                        <div class="news-img-container">
                            <img src="http://localhost/little-rose-web/wp-content/uploads/2025/12/485897246_654237967353352_6112021819464681319_n.jpg" alt="Scholarship">
                            <span class="date-badge">27 June 2024</span>
                        </div>
                    </a>
                    <div class="card-body p-5">
                        <a href="https://littlerosesfoundation.org/announcement-little-roses-foundations-2024-loving-scholarship/" target="_blank" class="news-title-link">
                            <h3 class="fw-bold mb-4" style="font-family: 'Montserrat', sans-serif;" data-vi="Thông báo: Chương trình học bổng 'Bông Hồng Nhỏ 2024'" data-en="Announcement: 'Little Rose 2024' Scholarship Program">Thông báo: Chương trình học bổng "Bông Hồng Nhỏ 2024"</h3>
                        </a>
                        <p class="text-secondary" data-vi="LRF tiếp sức và gieo mầm hy vọng cho tương lai tươi sáng của các em học sinh nghèo. Nhấn để xem nội dung chi tiết." data-en="LRF empowers and sows seeds of hope for the bright future of poor students. Click for full details.">LRF tiếp sức và gieo mầm hy vọng cho tương lai các em. Nhấn xem nội dung chi tiết.</p>
                        <a href="https://littlerosesfoundation.org/announcement-little-roses-foundations-2024-loving-scholarship/" target="_blank" class="btn btn-outline-success px-4 fw-bold mt-3" data-vi="Xem bài gốc" data-en="Read Original">Xem bài gốc</a>
                    </div>
                </div>
            </div>

            <!-- CỘT PHẢI: TÀI LIỆU PDF -->
            <div class="col-lg-4">
                <div class="doc-sidebar-card">
                    <h5 class="fw-bold mb-4 text-success" data-vi="Tài liệu tải về" data-en="Download Library">Tài liệu tải về</h5>
                    
                    <!-- File 1: Link từ web thật LRF -->
                    <div class="doc-unit">
                        <p class="doc-item-title" data-vi="Danh sách Nhà hảo tâm 2023" data-en="2023 Donor List">Danh sách Nhà hảo tâm 2023</p>
                        <div class="doc-meta-row">
                            <span>PDF • 3.2 MB</span>
                            <span class="doc-download-count">
                                <i class="fas fa-download me-2"></i> 2,450 <span data-vi="tải" data-en="hits">tải</span>
                            </span>
                        </div>
                        <a href="http://localhost/little-rose-web/wp-content/uploads/2025/12/Danh-sach-to-chuc-ca-nhan-quyen-gop-nam-2023-1.pdf" target="_blank" class="btn-outline-download">Download</a>
                    </div>

                    <div class="doc-divider"></div>

                    <!-- File 2: Link local từ thư mục doc/ -->
                    <div class="doc-unit">
                        <p class="doc-item-title" data-vi="Thông báo Học bổng 2025" data-en="2025 Scholarship Notice">Thông báo Học bổng 2025</p>
                        <div class="doc-meta-row">
                            <span>PDF • 1.5 MB</span>
                            <span class="doc-download-count">
                                <i class="fas fa-download me-2"></i> 1,120 <span data-vi="tải" data-en="hits">tải</span>
                            </span>
                        </div>
                        <a href="http://localhost/little-rose-web/wp-content/uploads/2025/12/TB-HB-Bong-hong-nho-Phuc-vu-NK-2025-2029-so-002_2025_TB-LRF-.pdf" download class="btn-outline-download">Download</a>
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
    <script>
        function changeLang(lang) {
            document.querySelectorAll('[data-vi]').forEach(el => { el.innerText = el.getAttribute('data-' + lang); });
            document.getElementById('btn-vi').classList.toggle('active', lang === 'vi');
            document.getElementById('btn-en').classList.toggle('active', lang === 'en');
        }
        const filterBtns = document.querySelectorAll('.filter-btn');
        const projectItems = document.querySelectorAll('.project-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelector('.filter-btn.active').classList.remove('active');
                btn.classList.add('active');
                const filter = btn.getAttribute('data-filter');
                projectItems.forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.style.display = 'block';
                        setTimeout(() => { item.style.opacity = '1'; }, 10);
                    } else {
                        item.style.opacity = '0';
                        setTimeout(() => { item.style.display = 'none'; }, 400);
                    }
                });
            });
        });
        window.addEventListener('load', function() {
            setTimeout(() => {
                const preloader = document.getElementById('preloader');
                if(preloader) { preloader.style.opacity = '0'; setTimeout(() => { preloader.style.display = 'none'; }, 800); }
            }, 1200);
        });
    </script>
    <?php wp_footer(); ?>
</body>
</html>