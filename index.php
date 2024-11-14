<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>어서오세요</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-align: center;
        }
        main {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center; /* 수직 중앙 정렬 */
            align-items: center; /* 수평 중앙 정렬 */
            height: 80vh; /* 뷰포트 높이 80% */
            padding: 20px; /* 필요한 패딩 추가 */
            position: relative; /* position을 상대적으로 설정 */
            z-index: 1; /* 텍스트가 이미지 위에 오도록 설정 */
        }

        .footer-image {
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            margin: 10px 0;
            z-index: 0; /* 이미지가 텍스트 뒤로 가도록 설정 */
        }



        .content {
            padding: 20px;
            margin-top: 50px;
        }

        .content h1 {
            margin-bottom: 20px;
        }

        .content p {
            margin-bottom: 20px;
            font-size: 1.2em;
        }

        .footer-image {
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            margin: 10px 0;
        }

        .footer-image img {
            width: 100%;
            max-width: 600px;
            height: auto;
        }

        .footer-text {
            margin-top: 20px;
        }



        .content {
            padding: 20px;
            margin-top: 50px;
            background-color: rgba(255, 255, 255, 0.8); /* 흰색 배경 + 약간 투명도 */
            border-radius: 10px; /* 모서리를 둥글게 */
            
        }

        .content h1, .content p {
            margin-bottom: 20px;
        }

        .content p {
            font-size: 1.2em;
        }

    </style>
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php">
                <img src="school_logo.png" alt="학교 로고">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="club_apply.php">동아리 정보 안내</a></li>
                <li><a href="club_promotion.php">동아리 홍보 게시글</a></li>
                <li><a href="free_board.php">자유 게시판</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="content">
            <h1>어서오세요</h1>
            <p>다양한 동아리 정보와 게시글을 통해 
                <br>새로운 친구를 만나고, 재미있는 활동에 참여해보세요. 
                <br>여러분의 소중한 이야기도 나누고,
                <br>함께 만들어가는 즐거운 동아리 문화를 
                <br>경험해보시길 바랍니다!</p>
        </div>
    </main>

    <div class="footer-image">
        <img src="https://img.freepik.com/free-vector/hand-drawn-flat-design-people-waving-illustration_52683-79273.jpg?t=st=1726650033~exp=1726653633~hmac=de92113714e09a6cfd98a04faeaad029cee19e80d24037420513fa2108edd275&w=826" alt="동아리 이미지">
    </div>
</body>
</html>