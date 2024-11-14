<?php
include 'db_connect.php'; // DB 연결 코드

// 댓글 데이터와 게시글 ID 가져오기
$comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';
$post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;

if (!empty($comment) && $post_id > 0) {
    // 게시글이 존재하는지 확인하는 SQL 쿼리
    $check_post_sql = "SELECT 1 FROM board WHERE board_id = ?";
    $check_post_stmt = $conn->prepare($check_post_sql);
    $check_post_stmt->bind_param('i', $post_id);
    $check_post_stmt->execute();
    $check_post_stmt->store_result();

    if ($check_post_stmt->num_rows > 0) {
        // 댓글을 데이터베이스에 삽입하는 SQL 쿼리
        $sql = "INSERT INTO comment_1 (board_id, comment_content) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('is', $post_id, $comment);

        if ($stmt->execute()) {
            // 성공적으로 댓글을 추가한 후 리디렉션
            header('Location: ../post_detail.php?id=' . $post_id);
            exit();
        } else {
            echo "댓글 추가에 실패했습니다: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "해당 게시글이 존재하지 않습니다.";
    }

    $check_post_stmt->close();
} else {
    echo "댓글 내용이 비어있거나 유효하지 않은 게시글 ID입니다.";
    header('Location: ../post_detail.php?id=' . $post_id);
}

$conn->close();
?>
