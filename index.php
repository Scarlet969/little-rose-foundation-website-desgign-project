<?php
/*
Template Name: Trang Chu Art - All In One
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- 1. Thư viện & Font chữ chuẩn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">

    <style>
        :root { 
            --primary-green: #008D42; 
            --primary-red: #E30613; 
            --bg-warm: #FDFBFA;
        }   
        
        body { 
            font-family: 'Montserrat', 'Helvetica Neue', Helvetica, Arial, sans-serif !important; 
            background-color: var(--bg-warm); 
            overflow-x: hidden; 
        }
        
        /* Nút Đóng góp */
        .btn-donate { 
            background-color: var(--primary-red) !important; 
            color: white !important; 
            font-weight: 800 !important; 
            border-radius: 50px !important; 
            padding: 10px 30px !important; 
            border: none !important; 
        }

        /* Gạch chân ngôn ngữ */
        .lang-switch { 
            font-weight: 800 !important; 
            cursor: pointer; 
            color: #999; 
            padding-bottom: 2px; 
            text-decoration: none; 
        }
        .lang-switch.active { 
            color: var(--primary-green) !important; 
            border-bottom: 3px solid var(--primary-green) !important; 
        }

        /* Loading trái tim */
        #preloader {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10000;
            transition: opacity 0.8s ease;
        }

        .heart-pulse {
            position: relative;
            width: 60px;
            height: 60px;
            background-color: #B12029;
            transform: rotate(-45deg);
            animation: heartbeatPlushing 1.2s infinite ease-in-out;
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

        /* Hero section */
        .hero-custom {
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('<?php echo get_template_directory_uri(); ?>/img/background.jpg') no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
        }

        /* Cánh hoa rơi */
        .petal {
            position: absolute;
            background-color: #ffdde1; 
            border-radius: 150% 0 150% 0; 
            opacity: 0.4;
            z-index: 1;
            pointer-events: none;
            animation: fall linear infinite;
        }

        .petal:nth-child(2n) { background-color: #ffafbd; }
        .petal:nth-child(3n) { width: 15px; height: 20px; border-radius: 50% 50% 50% 0; }

        @keyframes fall {
            0% { top: -10%; transform: translateX(0) rotate(0deg); }
            100% { top: 110%; transform: translateX(100px) rotate(360deg); }
        }

        /* Tiêu đề chính */
        h1, h2, h3, .serif { 
            font-family: 'Montserrat', sans-serif !important; 
            font-weight: 900 !important; 
        }

        /* Section Impact Dashboard */
        section.bg-white.border-top.border-bottom h2.display-5 {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 800 !important;
            line-height: 1.2 !important;
            letter-spacing: -1px !important;
            text-transform: none !important;
            color: #212529 !important;
        }

        section.bg-white.border-top.border-bottom h2.display-5 span.text-success {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 800 !important;
            color: #008D42 !important;
        }   

        .stat-card h3 {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 900 !important;
            letter-spacing: -1.5px !important;
        }

        .stat-card p, .stat-card small, .text-muted {
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 600 !important;
        }

        /* Footer trượt */
        .social-list { list-style: none; padding: 0; }
        .social-link-item {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #adb5bd;
            font-size: 1.1rem;
            font-weight: 500;
            margin-bottom: 15px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        .social-icon-box {
            width: 40px;
            text-align: center;
            font-size: 1.3rem;
            margin-right: 15px;
            transition: all 0.4s ease;
        }
        .social-link-item:hover {
            color: #ffffff;
            transform: translateX(12px);
        }
        .social-link-item:hover .fa-globe { color: var(--primary-green); }
        .social-link-item:hover .fa-facebook { color: #1877F2; }
        .social-link-item:hover .fa-tiktok { color: #ff0050; }
        .social-link-item:hover .fa-instagram { color: #E4405F; }

        .stat-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.05); }
        .img-premium {
            width: 100%;
            height: 350px;
            object-fit: cover;
            transition: all 0.5s;
        }
        .project-card:hover .img-premium { transform: scale(1.05); }

        /* Style cho phần đối tác */
        .divider-rose {
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-green), var(--primary-red));
            border-radius: 2px;
            margin: 15px auto 30px;
        }

        .partner-wrapper {
            overflow: hidden;
            padding: 20px 0;
        }

        .partner-card-v2 {
            background: white;
            border-radius: 12px;
            padding: 25px 15px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #f0f0f0;
            transition: all 0.3s ease;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }

        .partner-card-v2:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,141,66,0.1);
            border-color: var(--primary-green);
        }

        .partner-card-v2 img {
            max-width: 100%;
            max-height: 60px;
            object-fit: contain;
            filter: grayscale(100%);
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .partner-card-v2:hover img {
            filter: grayscale(0%);
            opacity: 1;
        }

        .partner-box-link {
            text-decoration: none !important;
            color: inherit !important;
            display: block;
        }

        @media (max-width: 768px) {
            .partner-card-v2 {
                height: 100px;
                padding: 15px 10px;
            }
            
            .partner-card-v2 img {
                max-height: 50px;
            }
            
            .hero-custom h1 {
                font-size: 2.5rem !important;
            }
        }

        /* Cookie Banner */
        #cookie-banner {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: white;
            padding: 20px;
            box-shadow: 0 -5px 15px rgba(0,0,0,0.1);
            z-index: 10001;
            transition: all 0.3s ease;
        }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <!-- MÀN HÌNH LOADING -->
    <div id="preloader">
        <div class="heart-pulse"></div>
    </div>

    <!-- HEADER -->
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
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_front_page() ? 'active text-success' : 'text-dark'; ?> px-3 fw-bold" 
                           href="<?php echo home_url('/'); ?>" data-vi="Trang chủ" data-en="Home">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_page('about') ? 'active text-success' : 'text-dark'; ?> px-3 fw-bold" 
                           href="<?php echo home_url('/about/'); ?>" data-vi="Về chúng tôi" data-en="About Us">Về chúng tôi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_page('project') ? 'active text-success' : 'text-dark'; ?> px-3 fw-bold" 
                           href="<?php echo home_url('/project/'); ?>" data-vi="Chương trình" data-en="Programs">Chương trình</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_page('bao-cao') ? 'active text-success' : ''; ?> px-3 fw-bold" 
                        href="<?php echo home_url('/bao-cao/'); ?>" 
                        data-vi="Báo cáo tài chính" 
                        data-en="Reports">Báo cáo tài chính</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_page('news') ? 'active text-success' : 'text-dark'; ?> px-3 fw-bold" 
                           href="<?php echo home_url('/news/'); ?>" data-vi="Tin tức" data-en="News">Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-donate ms-lg-4 px-4 py-2 fw-bold shadow-sm" 
                           href="<?php echo home_url('/donate/'); ?>" data-vi="ĐÓNG GÓP" data-en="DONATE">ĐÓNG GÓP</a>
                    </li>
                    <li class="nav-item d-flex ms-lg-4 fw-bold">
                        <span class="lang-switch active fw-bold" id="btn-vi" onclick="changeLang('vi')" style="cursor:pointer">VN</span>
                        <span class="mx-1 text-muted">|</span>
                        <span class="lang-switch fw-bold" id="btn-en" onclick="changeLang('en')" style="cursor:pointer">EN</span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- TRANG CHỦ CONTENT -->
    <main>
        <section class="hero-custom">
            <div id="petal-container"></div>
            <div class="container" style="position: relative; z-index: 5;">
                <h1 style="font-family: 'Montserrat', sans-serif !important; font-weight: 900 !important; font-size: 4.5rem !important; letter-spacing: 1px !important; text-transform: uppercase !important; color: white !important;" 
                    data-vi="TO ALL WE ARE LOVE" 
                    data-en="TO ALL WE ARE LOVE">
                    TO ALL WE ARE LOVE
                </h1>
                
                <p class="lead mt-4 fw-light" style="max-width: 850px; margin: 0 auto; font-family: 'Montserrat', sans-serif !important; font-size: 1.25rem; color: white !important;" 
                data-vi="Đồng hành cùng trẻ em yếu thế kiến tạo tương lai tươi sáng qua giáo dục và y tế." 
                data-en="Accompanying vulnerable children to create a bright future through education and healthcare.">
                Đồng hành cùng trẻ em yếu thế kiến tạo tương lai tươi sáng qua giáo dục và y tế.
                </p>

                <a href="<?php echo home_url('/donate/'); ?>" class="btn btn-donate px-5 py-3 mt-5 shadow-lg" 
                style="font-family: 'Montserrat', sans-serif !important; font-weight: 800 !important; text-transform: uppercase !important;"
                data-vi="ỦNG HỘ NGAY" 
                data-en="DONATE NOW">
                ỦNG HỘ NGAY
                </a>
            </div>
        </section>
        
        <!-- IMPACT DASHBOARD -->
        <section class="section-padding bg-white border-top border-bottom">
            <div class="container">
                <div class="row align-items-end mb-5">
                    <div class="col-md-7">
                        <h2 class="display-5 mb-0" data-vi="Hành trình của sự minh bạch" data-en="The Journey of Transparency">Hành trình của <br>
                            <span class="text-success">sự minh bạch</span>
                        </h2>
                    </div>
                    <div class="col-md-5 text-md-end">
                        <p class="text-muted" data-vi="Dựa trên báo cáo tài chính năm 2025" data-en="Based on 2025 financial report">Dựa trên báo cáo tài chính năm 2025</p>
                    </div>
                </div>

                <div class="row g-4 text-center">
                    <div class="col-md-4">
                        <div class="stat-card">
                            <h3 class="text-danger display-4 fw-bold">90%</h3>
                            <p class="fw-bold text-uppercase mt-3" data-vi="Đến trực tiếp trẻ em" data-en="Directly to children">Đến trực tiếp trẻ em</p>
                            <small class="text-muted" data-vi="Tối ưu chi phí vận hành ở mức thấp nhất." data-en="Optimizing operational costs at the lowest level.">Tối ưu chi phí vận hành ở mức thấp nhất.</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card bg-light">
                            <h3 class="display-4 fw-bold">15,000</h3>
                            <p class="fw-bold text-uppercase mt-3" data-vi="Bữa ăn nhân ái" data-en="Compassionate meals">Bữa ăn nhân ái</p>
                            <small class="text-muted" data-vi="Cung cấp dinh dưỡng cho trẻ em vùng khó khăn." data-en="Providing nutrition for children in difficult areas.">Cung cấp dinh dưỡng cho trẻ em vùng khó khăn.</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card">
                            <h3 class="text-success display-4 fw-bold">100%</h3>
                            <p class="fw-bold text-uppercase mt-3" data-vi="Công khai tài chính" data-en="Financial public">Công khai tài chính</p>
                            <small class="text-muted" data-vi="Mọi giao dịch đều được kiểm toán độc lập." data-en="All transactions are independently audited.">Mọi giao dịch đều được kiểm toán độc lập.</small>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- REAL ACTIVITIES -->
        <section class="section-padding bg-warm">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="display-6 fw-bold" style="font-family: 'Montserrat', sans-serif;" data-vi="Hoạt động thực tế" data-en="Real Activities">Hoạt động thực tế</h2>
                    <p class="text-muted" data-vi="Nụ cười của các em là động lực của chúng tôi" data-en="Their smiles are our motivation">Nụ cười của các em là động lực của chúng tôi</p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-4">
                        <a href="<?php echo home_url('/projects/?filter=health'); ?>" class="text-decoration-none text-dark">
                            <div class="project-card shadow-sm h-100 overflow-hidden border-0" style="border-radius: 20px;">
                                <div class="project-img-box" style="height: 300px; overflow: hidden; background: #eee;">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/yte.jpg" class="img-premium w-100 h-100" style="object-fit: cover; transition: 0.5s;" alt="Y tế">
                                </div>
                                <div class="bg-white p-4 text-center">
                                    <h5 class="fw-bold mb-0" data-vi="Chăm sóc Y tế" data-en="Healthcare">Chăm sóc Y tế</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4">
                        <a href="<?php echo home_url('/projects/?filter=edu'); ?>" class="text-decoration-none text-dark">
                            <div class="project-card shadow-sm h-100 overflow-hidden border-0" style="border-radius: 20px;">
                                <div class="project-img-box" style="height: 300px; overflow: hidden; background: #eee;">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/giaoduc.jpg" class="img-premium w-100 h-100" style="object-fit: cover; transition: 0.5s;" alt="Giáo dục">
                                </div>
                                <div class="bg-white p-4 text-center">
                                    <h5 class="fw-bold mb-0" data-vi="Chương trình Giáo dục" data-en="Education">Chương trình Giáo dục</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4">
                        <a href="<?php echo home_url('/projects/?filter=social'); ?>" class="text-decoration-none text-dark">
                            <div class="project-card shadow-sm h-100 overflow-hidden border-0" style="border-radius: 20px;">
                                <div class="project-img-box" style="height: 300px; overflow: hidden; background: #eee;">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/cong-dong.jpg" class="img-premium w-100 h-100" style="object-fit: cover; transition: 0.5s;" alt="Cộng đồng">
                                </div>
                                <div class="bg-white p-4 text-center">
                                    <h5 class="fw-bold mb-0" data-vi="Hỗ trợ Cộng đồng" data-en="Community">Hỗ trợ Cộng đồng</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- VIDEO & FORM -->
        <section class="section-padding bg-white">        
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5">
                        <h3 class="fw-bold mb-4" style="font-family: 'Montserrat', sans-serif;" data-vi="Hành trình lan tỏa nhân ái" data-en="Our Journey of Love">Hành trình lan tỏa nhân ái</h3>
                        <p class="text-secondary mb-4 small" data-vi="Cùng nhìn lại những khoảnh khắc xúc động và những dự án mà LRF đã triển khai để hỗ trợ cộng đồng yếu thế trên khắp Việt Nam." data-en="Let's look back at the touching moments and projects that LRF has implemented to support vulnerable communities across Vietnam.">
                            Cùng nhìn lại những khoảnh khắc xúc động và những dự án mà LRF đã triển khai để hỗ trợ cộng đồng yếu thế trên khắp Việt Nam.
                        </p>
                        
                        <div class="ratio ratio-16x9 rounded-5 shadow-lg overflow-hidden border" style="border: 8px solid #f8f9fa !important;">
                            <iframe 
                                src="https://www.youtube.com/embed/N93L_Ibeelk" 
                                title="Little Roses Foundation Video" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>

                    <div class="col-lg-5 offset-lg-1">
                        <div class="bg-light p-5 rounded-5 shadow-sm border-top border-success border-4">
                            <h3 class="fw-bold mb-4" style="font-family: 'Montserrat', sans-serif;" data-vi="Tham gia cùng LRF" data-en="Join with LRF">Tham gia cùng LRF</h3>
                            <p class="small text-muted mb-4" data-vi="Để lại thông tin để trở thành Tình nguyện viên hoặc Đối tác của chúng tôi." data-en="Leave your information to become our Volunteer or Partner.">Để lại thông tin để trở thành Tình nguyện viên.</p>
                            
                            <form id="volunteerForm" action="<?php echo get_template_directory_uri(); ?>/process_join.php" method="POST">
                                <div class="mb-3">
                                    <input type="text" name="fullname" class="form-control border-0 py-3 shadow-sm" style="border-radius: 12px;" placeholder="Nguyễn Văn A" required>
                                </div>
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control border-0 py-3 shadow-sm" style="border-radius: 12px;" placeholder="email@vi-du.com" required>
                                </div>
                                <div class="mb-4">
                                    <select name="role" class="form-select border-0 py-3 shadow-sm" style="border-radius: 12px;">
                                        <option value="volunteer">Tình nguyện viên</option>
                                        <option value="partner">Đối tác / Chuyên gia</option>
                                        <option value="donor">Nhà tài trợ</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-dark w-100 py-3 fw-bold shadow" style="border-radius: 50px;" data-vi="GỬI YÊU CẦU ĐĂNG KÝ" data-en="SEND REQUEST">GỬI YÊU CẦU ĐĂNG KÝ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ĐỐI TÁC & NHÀ HẢO TÂM -->
        <section class="section-padding" style="background-color: #ffffff;">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold display-6" style="color: var(--primary-green);" data-vi="Đối tác và Nhà hảo tâm" data-en="Our Donors and Partners">
                        Đối tác và Nhà hảo tâm
                    </h2>
                    <div class="divider-rose"></div>
                </div>

                <div class="partner-wrapper">
                    <div class="row g-3 justify-content-center align-items-center">
                        <?php 
                        $donors = [
                            ['name' => 'Deloitte', 'img' => 'logo-deloitte.png', 'url' => 'https://www.deloitte.com'],
                            ['name' => 'Sacombank', 'img' => 'logo-sacombank.png', 'url' => 'https://www.sacombank.com.vn'],
                            ['name' => 'Microsoft', 'img' => 'Microsoft_logo.png', 'url' => 'https://www.microsoft.com'],
                            ['name' => 'PWC', 'img' => 'logo-pwc.png', 'url' => 'https://www.pwc.com'],
                            ['name' => 'SCB', 'img' => 'logo-scb.png', 'url' => 'https://scb.com.vn'],
                            ['name' => 'Kamala', 'img' => 'logo-kamala.png', 'url' => 'https://kamala.vn/'],
                            ['name' => 'Mia', 'img' => 'mia-copy_100_57.png', 'url' => 'https://mia.com.vn/'],
                            ['name' => 'MSB', 'img' => 'logo_msb.png', 'url' => 'https://www.msb.com.vn/'],
                            ['name' => 'NTS', 'img' => 'nts.png', 'url' => ''],
                            ['name' => 'Dentons Luatviec', 'img' => 'luatviet.png', 'url' => 'https://www.dentonsluatviet.com/'],
                            ['name' => 'Viet Thuong Music', 'img' => 'vietthuong.png', 'url' => 'https://vietthuong.vn/'],
                            ['name' => 'Bravo', 'img' => 'bravo.png', 'url' => 'https://www.bravo.com.vn/'],
                            ['name' => 'Truong Hoang Phat', 'img' => 'truong-hoang-phat.png', 'url' => 'https://banghehocsinhgiare.com/'],
                            ['name' => 'Indochine Counsel', 'img' => 'indochine.png', 'url' => 'https://www.aia.com.vn/'],
                        ];

                        foreach ($donors as $donor) : 
                            // Kiểm tra file tồn tại
                            $img_path = get_template_directory_uri() . '/img/' . $donor['img'];
                        ?>
                            <div class="col-6 col-md-4 col-lg-2">
                                <a href="<?php echo $donor['url']; ?>" target="_blank" rel="noopener" class="partner-box-link">
                                    <div class="partner-card-v2">
                                        <img src="<?php echo $img_path; ?>" alt="<?php echo $donor['name']; ?>" 
                                             onerror="this.src='<?php echo get_template_directory_uri(); ?>/img/placeholder.png'">
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- COOKIE BANNER -->
    <div id="cookie-banner" class="fixed-bottom bg-white p-4 shadow-lg border-top border-success" style="display:none;">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <p class="mb-0 small text-secondary fw-bold" data-vi="Chúng tôi sử dụng Cookies để bảo mật hành trình thiện nguyện của bạn." data-en="We use cookies to secure your charitable journey.">
                Chúng tôi sử dụng Cookies để bảo mật hành trình thiện nguyện của bạn.
            </p>
            <div class="d-flex gap-2">
                <button onclick="acceptCookies()" class="btn btn-dark btn-sm px-4 py-2 rounded-0 fw-bold" style="letter-spacing: 1px;" data-vi="ĐỒNG Ý" data-en="ACCEPT">
                    ĐỒNG Ý
                </button>
                <button onclick="rejectCookies()" class="btn btn-dark btn-sm px-4 py-2 rounded-0 fw-bold" style="letter-spacing: 1px;" data-vi="TỪ CHỐI" data-en="REJECT">
                    TỪ CHỐI
                </button>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-dark text-white pt-5 pb-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h5 class="text-success fw-bold mb-4"><i class="fa-solid fa-heart text-danger me-2"></i> LITTLE ROSE</h5>
                    <p class="text-secondary small" data-vi="Lan tỏa yêu thương, kết nối những tấm lòng nhân ái vì một tương lai tốt đẹp hơn." data-en="Spreading love, connecting compassionate hearts for a better future.">Lan tỏa yêu thương, kết nối những tấm lòng nhân ái vì một tương lai tốt đẹp hơn.</p>
                </div>
                <div class="col-md-4 border-md-start border-secondary ps-md-4">
                    <h5 class="fw-bold mb-4" data-vi="Thông tin liên hệ" data-en="Contact Info">Thông tin liên hệ</h5>
                    <p class="small text-secondary mb-2"><i class="fas fa-map-marker-alt me-2 text-danger"></i> 49 Phạm Ngọc Thạch, Quận 3, TP.HCM</p>
                    <p class="small text-secondary"><i class="fas fa-envelope me-2 text-primary"></i> info@littlerosesfoundation.org</p>
                </div>
                <div class="col-md-4 border-md-start border-secondary ps-md-4">
                    <h5 class="fw-bold mb-4" data-vi="Đường liên kết" data-en="Social Links">Đường liên kết</h5>
                    <div class="social-list">
                        <a href="https://littlerosesfoundation.org" target="_blank" class="social-link-item">
                            <span class="social-icon-box"><i class="fas fa-globe"></i></span> Website
                        </a>
                        <a href="https://www.facebook.com/littlerosesfoundation" target="_blank" class="social-link-item">
                            <span class="social-icon-box"><i class="fab fa-facebook"></i></span> Facebook
                        </a>
                        <a href="https://www.tiktok.com/@littlerosesfoundation" target="_blank" class="social-link-item">
                            <span class="social-icon-box"><i class="fab fa-tiktok"></i></span> TikTok
                        </a>
                        <a href="https://www.instagram.com/little_roses_foundation" target="_blank" class="social-link-item">
                            <span class="social-icon-box"><i class="fab fa-instagram"></i></span> Instagram
                        </a>
                    </div>
                </div>
            </div>
            <hr class="border-secondary mt-5">
            <p class="text-center small text-secondary">© <?php echo date("Y"); ?> Little Rose Foundation - Developed by Petal Three</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Chuyển ngôn ngữ
        function changeLang(lang) {
            document.querySelectorAll('[data-vi]').forEach(el => { 
                el.innerText = el.getAttribute('data-' + lang); 
            });
            document.getElementById('btn-vi').classList.toggle('active', lang === 'vi');
            document.getElementById('btn-en').classList.toggle('active', lang === 'en');
        }

        // Tạo cánh hoa
        function createPetals() {
            const container = document.getElementById('petal-container');
            if(!container) return;
            for (let i = 0; i < 25; i++) {
                const petal = document.createElement('div');
                petal.classList.add('petal');
                petal.style.left = Math.random() * 100 + 'vw';
                petal.style.width = petal.style.height = Math.random() * 15 + 10 + 'px';
                petal.style.animationDuration = Math.random() * 5 + 5 + 's';
                petal.style.animationDelay = Math.random() * 5 + 's';
                container.appendChild(petal);
            }
        }

        // Tắt loading
        window.addEventListener('load', function() {
            createPetals();
            setTimeout(() => {
                const preloader = document.getElementById('preloader');
                if(preloader) { 
                    preloader.style.opacity = '0'; 
                    setTimeout(() => { 
                        preloader.style.display = 'none'; 
                    }, 800); 
                }
            }, 1200);
        });

        // Cookie functions
        function acceptCookies() {
            const banner = document.getElementById('cookie-banner');
            if (banner) {
                banner.style.opacity = '0';
                setTimeout(() => { banner.style.display = 'none'; }, 800);
            }
            localStorage.setItem('LRF_Cookie_Status', 'accepted');
        }

        function rejectCookies() {
            const banner = document.getElementById('cookie-banner');
            if (banner) {
                banner.style.opacity = '0';
                setTimeout(() => { banner.style.display = 'none'; }, 800);
            }
            sessionStorage.setItem('LRF_Cookie_Status', 'rejected');
        }

        // Hiển thị cookie banner
        window.addEventListener('load', function() {
            const isAccepted = localStorage.getItem('LRF_Cookie_Status');
            const isRejected = sessionStorage.getItem('LRF_Cookie_Status');

            if (!isAccepted && !isRejected) {
                setTimeout(() => {
                    const banner = document.getElementById('cookie-banner');
                    if (banner) {
                        banner.style.display = 'block';
                        banner.style.opacity = '1';
                    }
                }, 2000);
            }
        });

        // Xử lý form tình nguyện viên
        document.getElementById('volunteerForm')?.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch('<?php echo get_template_directory_uri(); ?>/process_join.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert('Đăng ký thành công! Cảm ơn bạn đã đăng ký.');
                this.reset();
            })
            .catch(error => {
                alert('Có lỗi xảy ra. Vui lòng thử lại.');
            });
        });
    </script>
    <?php wp_footer(); ?>
</body>
</html>