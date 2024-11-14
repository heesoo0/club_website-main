<?php
include 'db_connect.php';

// 데이터베이스 연결 체크
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 사용자 입력 데이터 확인 및 필터링
$title = htmlspecialchars($_POST['title']);
$content = htmlspecialchars($_POST['content']);

// SQL 쿼리 준비
$stmt = $conn->prepare("INSERT INTO board (board_name, boardkind_id, board_content) VALUES (?, ?, ?)");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$boardkind_id = 1; // boardkind_id 값을 1로 설정
$stmt->bind_param("sis", $title, $boardkind_id, $content);

if ($stmt->execute()) {
    $post_id = $stmt->insert_id;

    // 이미지 업로드 처리
    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['name'] as $key => $image) {
            // 파일 시스템 경로 (서버에 저장할 경로)
            $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/club_website-main/image/' . basename($image);

            // 이미지 파일을 서버에 저장
            if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $imagePath)) {
                // 데이터베이스에 저장할 이미지 파일명 (경로 제외)
                $imageName = basename($image);

                // 이미지 경로 저장
                $stmt = $conn->prepare("INSERT INTO image (board_id, boardkind_id, image_name) VALUES (?, ?, ?)");
                if (!$stmt) {
                    die("Prepare failed: " . $conn->error);
                }
                $boardkind_id = 1; // boardkind_id 값을 1로 설정
                $stmt->bind_param("iis", $post_id, $boardkind_id, $imageName);
                if (!$stmt->execute()) {
                    echo "Error inserting image: " . $stmt->error;
                }
            } else {
                echo "Failed to upload image: " . htmlspecialchars($image);
            }
        }
    }

    $stmt->close();
    $conn->close();

    // 성공적으로 저장 후 리디렉션
    header('Location: ../club_promotion.php');
    exit();
} else {
    echo "Error inserting post: " . $stmt->error;
}
?>
