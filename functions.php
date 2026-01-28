<?php    
// 0. Tự động kiểm tra và thêm cột program_name nếu chưa có
function lrf_check_database_column() {
    global $wpdb;
    $table_name = 'wp_donations';
    $column = $wpdb->get_results($wpdb->prepare("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = %s AND COLUMN_NAME = %s", $table_name, 'program_name'));
    if (empty($column)) {
        $wpdb->query("ALTER TABLE $table_name ADD program_name VARCHAR(255) DEFAULT 'Quỹ chung'");
    }
}
add_action('init', 'lrf_check_database_column');

// Hàm lấy chân trang Email chuyên nghiệp
function lrf_get_email_footer() {
    return "
        <br><hr style='border:none; border-top:1px solid #eee; margin:20px 0;'>
        <div style='color: #666; font-size: 13px;'>
            <p><b>LITTLE ROSE FOUNDATION - QUỸ TỪ THIỆN BÔNG HỒNG NHỎ</b></p>
            <p>📍 Địa chỉ: 49 Phạm Ngọc Thạch, Phường Võ Thị Sáu, Quận 3, TP. Hồ Chí Minh</p>
            <p>📞 Điện thoại: 028 7306 9666 | 📧 Email: info@littlerosesfoundation.org</p>
            <p>🌐 Website: <a href='https://littlerosesfoundation.org' style='color:#008D42; text-decoration:none;'>littlerosesfoundation.org</a></p>
            <div style='margin-top: 15px;'>
                <a href='https://www.facebook.com/littlerosesfoundation' style='margin-right:10px; text-decoration:none;'><img src='https://cdn-icons-png.flaticon.com/512/733/733547.png' width='20' style='vertical-align:middle;'> Facebook</a>
                <a href='https://www.instagram.com/little_roses_foundation' style='margin-right:10px; text-decoration:none;'><img src='https://cdn-icons-png.flaticon.com/512/2111/2111463.png' width='20' style='vertical-align:middle;'> Instagram</a>
                <a href='https://www.tiktok.com/@littlerosesfoundation' style='text-decoration:none;'><img src='https://cdn-icons-png.flaticon.com/512/3046/3046121.png' width='20' style='vertical-align:middle;'> TikTok</a>
            </div>
        </div>
    ";
}

// 1. Hàm xử lý lưu ĐÓNG GÓP và gửi GCN
add_action('wp_ajax_save_donation', 'lrf_handle_save_donation');
add_action('wp_ajax_nopriv_save_donation', 'lrf_handle_save_donation');

function lrf_handle_save_donation() {
    global $wpdb;
    $table_name = 'wp_donations'; 

    $fullname = isset($_POST['fullname']) ? sanitize_text_field($_POST['fullname']) : 'Mạnh Thường Quân';
    $email    = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $amount   = isset($_POST['amount']) ? intval($_POST['amount']) : 0;
    $program_name = isset($_POST['program_name']) ? sanitize_text_field($_POST['program_name']) : 'Quỹ chung';

    $transaction_code = "LRF" . strtoupper(substr(md5(time() . $email), 0, 6));

    // LƯU DATABASE
    $inserted = $wpdb->insert($table_name, array(
        'fullname'     => $fullname,
        'email'        => $email,
        'amount'       => $amount,
        'program_name' => $program_name,
        'created_at'   => current_time('mysql', 0)
    ));

    if ($inserted) {
        $attachments = array();
        $font_path = get_template_directory() . '/fonts/Montserrat/static/Montserrat-Bold.ttf';
        $phoi_path = ABSPATH . 'wp-content/uploads/2026/01/Thiet-ke-chua-co-ten-3.png'; 

        // XỬ LÝ TẠO ẢNH GCN
        if (file_exists($phoi_path) && file_exists($font_path)) {
            $image = imagecreatefrompng($phoi_path);
            $img_w = imagesx($image);
            $color_red = imagecolorallocate($image, 177, 32, 41);
            $color_black = imagecolorallocate($image, 33, 33, 33);

            $name_display = mb_strtoupper($fullname, 'UTF-8');
            imagettftext($image, 60, 0, ($img_w - (imagettfbbox(60, 0, $font_path, $name_display)[4])) / 2, 1020, $color_red, $font_path, $name_display);

            $amt_format = number_format($amount, 0, ',', '.') . " VNĐ";
            $line1 = "đã ủng hộ " . $amt_format . " cho chương trình:";
            imagettftext($image, 32, 0, ($img_w - (imagettfbbox(32, 0, $font_path, $line1)[4])) / 2, 1250, $color_black, $font_path, $line1);

            $line2 = "“" . mb_strtoupper($program_name, 'UTF-8') . "”";
            imagettftext($image, 32, 0, ($img_w - (imagettfbbox(32, 0, $font_path, $line2)[4])) / 2, 1340, $color_red, $font_path, $line2);

            $upload_dir = wp_upload_dir();
            $temp_gcn = $upload_dir['path'] . '/GCN-' . time() . '.png';
            imagepng($image, $temp_gcn);
            imagedestroy($image);
            $attachments[] = $temp_gcn;
        }

        // GỬI EMAIL THƯ CẢM ƠN
        $subject = "🌹 Thư cảm ơn & Giấy chứng nhận đóng góp - Little Rose Foundation";
        $body = "
            <div style='font-family: Arial, sans-serif; line-height: 1.6; max-width: 600px; border: 1px solid #f0f0f0; padding: 30px; color: #333;'>
                <div style='text-align: center; margin-bottom: 20px;'>
                    <img src='https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2025/12/Logo-LRF-01-scaled.png' width='150'>
                </div>
                <h2 style='color: #B12029; text-align: center;'>THƯ CẢM ƠN</h2>
                <p>Kính gửi Anh/Chị <b>$fullname</b>,</p>
                <p>Thay mặt Quỹ Từ Thiện Bông Hồng Nhỏ, chúng tôi xin trân trọng cảm ơn Nhà hảo tâm đã đóng góp cho chương trình: <b>$program_name</b>.</p>
                <p>Sự chung tay của Nhà hảo tâm là nguồn động viên to lớn giúp chúng tôi tiếp tục sứ mệnh lan tỏa yêu thương.</p>
                <p style='background: #f9f9f9; padding: 15px; border-left: 4px solid #B12029;'>
                    <b>Thông tin đóng góp:</b><br>
                    Mã giao dịch: #$transaction_code<br>
                    Số tiền: " . number_format($amount) . " VNĐ<br>
                    Ngày thực hiện: " . date('d/m/Y')
                . "</p>
                " . lrf_get_email_footer() . "
            </div>
        ";
        
        $headers = array('Content-Type: text/html; charset=UTF-8', 'From: Little Rose Foundation <hondakai2000@gmail.com>', 'X-Priority: 1 (Highest)', 'Importance: High');
        wp_mail($email, $subject, $body, $headers, $attachments);
        if (!empty($attachments)) { @unlink($attachments[0]); }

        wp_send_json_success(['message' => 'Thành công', 'code' => $transaction_code]);
    } else {
        wp_send_json_error(['message' => 'Không thể lưu vào database']);
    }
    wp_die();
}

// 2. Hàm lấy danh sách ĐÓNG GÓP (Real-time)
add_action('wp_ajax_get_donations', 'lrf_handle_get_donations');
add_action('wp_ajax_nopriv_get_donations', 'lrf_handle_get_donations');

function lrf_handle_get_donations() {
    global $wpdb;
    $table_name = 'wp_donations'; 
    $results = $wpdb->get_results("SELECT fullname, amount, program_name, created_at FROM $table_name ORDER BY created_at DESC LIMIT 10", ARRAY_A);
    header('Content-Type: application/json');
    echo json_encode($results);
    wp_die();
}

// 3. Hàm xử lý đăng ký TÌNH NGUYỆN VIÊN
add_action('wp_ajax_register_volunteer', 'lrf_handle_volunteer_registration');
add_action('wp_ajax_nopriv_register_volunteer', 'lrf_handle_volunteer_registration');

function lrf_handle_volunteer_registration() {
    global $wpdb;
    $table_name = 'volunteers';    

    // 2. Lấy dữ liệu (BỎ id_number)
    $fullname    = sanitize_text_field($_POST['fullname']);
    $email       = sanitize_email($_POST['email']);
    $dob         = sanitize_text_field($_POST['dob']);
    $social_link = esc_url_raw($_POST['social_link']);
    $address     = sanitize_textarea_field($_POST['address']);
    $role        = sanitize_text_field($_POST['role']);

    // 3. Lưu vào Database
    $inserted = $wpdb->insert($table_name, array(
        'fullname'    => $fullname,
        'email'       => $email,
        'dob'         => $dob,
        'social_link' => $social_link,
        'address'     => $address,
        'role'        => $role,
        'created_at'  => current_time('mysql', 0)
    ));

    if ($inserted) {
        $subject = "🌹 Xác nhận đăng ký tham gia Little Rose Foundation";
        $body = "
            <div style='font-family: Arial, sans-serif; line-height: 1.6; max-width: 600px; border: 1px solid #f0f0f0; padding: 30px; color: #333;'>
                <div style='text-align: center; margin-bottom: 20px;'>
                    <img src='https://petal-three-lrf.infinityfreeapp.com/wp-content/uploads/2025/12/Logo-LRF-01-scaled.png' width='150'>
                </div>
                <h2 style='color: #008D42; text-align: center;'>CHÀO MỪNG THÀNH VIÊN MỚI</h2>
                <p>Chào Tình Nguyện viên <b>$fullname</b>,</p>
                <p>LRF vô cùng hạnh phúc khi nhận được đơn đăng ký tham gia với vai trò: <b>$role</b> của bạn.</p>
                <p>Chúng tôi sẽ sớm liên hệ để trao đổi chi tiết về các hoạt động thiện nguyện sắp tới.</p>
                " . lrf_get_email_footer() . "
            </div>
        ";
        
        $headers = array('Content-Type: text/html; charset=UTF-8', 'From: Little Rose Foundation <hondakai2000@gmail.com>', 'X-Priority: 1 (Highest)');
        wp_mail($email, $subject, $body, $headers);
        wp_send_json_success(['message' => 'Thành công']);
    } else {
        wp_send_json_error(['message' => 'Không thể lưu vào database']);
    }
    wp_die();
}