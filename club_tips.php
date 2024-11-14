<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>동아리 개설 팁</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .tips-container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }

        .toc {
            margin-bottom: 20px;
        }

        .toc ul {
            list-style-type: none;
            padding: 0;
        }

        .toc li {
            margin-bottom: 10px;
        }

        .toc a {
            text-decoration: none;
            color: blue;
        }

        .tips-section {
            margin-bottom: 40px;
        }

        .tips-section h2 {
            border-bottom: 2px solid #333;
            padding-bottom: 5px;
        }

        /* 반응형 디자인 */
        @media (max-width: 768px) {
            .tips-container {
                padding: 10px;
            }

            .toc ul {
                padding: 10px;
                margin: 0;
            }

            .toc li {
                margin-bottom: 5px;
            }

            .tips-section {
                margin-bottom: 20px;
            }

            .tips-section h2 {
                font-size: 1.5em;
            }
        }

        @media (max-width: 480px) {
            .tips-container {
                padding: 5px;
            }

            .tips-section h2 {
                font-size: 1.2em;
            }

            .toc ul {
                padding: 0;
                font-size: 0.9em;
            }
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

    <div class="sidebar">
        <ul>
            <li><a href="club_apply.php">동아리 정보 안내</a>
                <ul>
                    <li><a href="club_apply.php">동아리 신청방법</a></li>
                    <li><a href="club_tips.php">동아리 팁</a></li>
                </ul>
            </li>
            <li><a href="club_promotion.php">동아리 홍보 게시글</a></li>
            <li><a href="free_board.php">자유 게시판</a></li>
        </ul>
    </div>    

    <main>
        <div class="tips-container">
            <h1>동아리 개설 팁</h1>

            <!-- 목차 -->
            <div class="toc">
                <h3>목차</h3>
                <ul>
                    <li><a href="#date">활동 날짜 정하기</a></li>
                    <li><a href="#method-place">활동 방법 및 장소</a></li>
                    <li><a href="#content">활동 내용</a></li>
                    <li><a href="#fee">참가비</a></li>
                    <li><a href="#recruitment">부원 모집</a></li>
                    <li><a href="#penalty">패널티 및 퇴출 사항</a></li>
                </ul>
            </div>

            <!-- 활동 날짜 정하기 -->
            <div id="date" class="tips-section">
                <h2>활동 날짜 정하기</h2>
                <p>모집을 하기 전 활동 날짜와 시간을 정해도 좋고, 모집을 완료한 후 부원들과 함께 날짜를 정해도 좋아요. 최대한 많은 부원들이 참여할 수 있는 날짜로 정해요.</p>
            </div>

            <!-- 활동 방법 및 장소 -->
            <div id="method-place" class="tips-section">
                <h2>활동 방법 및 활동 장소</h2>
                <p>활동 방법은 대면, 비대면, 비대면&대면으로 총 세 가지 방법이 있어요. 각 동아리의 특성에 맞게 방법을 정해봐요!</p>
                <p>활동 장소는 각 동아리별에 맞는 장소를 찾으면 되는데 예를 들어 학교 강의실에서 활동하고 싶다면 각 조교님께 문의해보시고, 도서관의 스터디룸 또한 활동 장소로 사용 가능합니다!</p>
            </div>

            <!-- 활동 내용 -->
            <div id="content" class="tips-section">
                <h2>활동 내용</h2>
                <p>먼저 자신이 생각한 카테고리 안에서 어떤 활동을 진행하고 싶은지 크게 2~3가지를 정한 후 구체적으로 활동 내용을 작성하면 됩니다. 활동 내용이 구체적일수록 다른 사람들이 동아리에 대해 이해를 잘 할 수 있어요!</p>
            </div>

            <!-- 참가비 -->
            <div id="fee" class="tips-section">
                <h2>참가비</h2>
                <p>참가비는 매 월, 학기별, 연별로 나눌 수 있어요. 동아리 활동 시 사용되는 금액이 대략적으로 얼마일지 생각해서 정하면 됩니다. 참가비는 항상 투명하게 사용되어야 하고, 영수증을 꼭 사진이나 실물로 남겨두어야 해요!</p>
            </div>

            <!-- 부원 모집 -->
            <div id="recruitment" class="tips-section">
                <h2>부원 모집</h2>
                <h3>1. 모집 공고 기본 양식</h3>
                <p>
                    제목: 000동아리에서 부원을 모집합니다!<br>
                    모집대상: 신입생, 재학생, 복학생, 학년 상관없이 모두 가능<br>
                    모집기간: 0월 0일 ~ 0월 0일<br>
                    활동 내용: <br>
                    - <br>
                    - <br>
                    지원 방법: 성명/학과/학년/지원동기 및 각오를 작성하여 오픈채팅방 또는 문자로 제출해주세요.<br>
                </p>

                <h3>2. 지원 폼에 사용하면 좋은 내용</h3>
                <p>
                    이메일, 이름, 전화번호, 학번, 학년, 학과, 재학 여부, 분야 별 선택, 지원 동기, 관련 경험 등을 포함합니다.
                </p>

                <h3>3. 부원 뽑는 팁</h3>
                <p>동아리의 특성에 맞는 지원자들을 선택하세요. 참여도와 열정이 중요하다면 지원 동기와 면접을 통해 확인하고, 실력을 중요시한다면 관련 경험이나 실력을 참고하세요.</p>
            </div>

            <!-- 패널티 및 퇴출 사항 -->
            <div id="penalty" class="tips-section">
                <h2>패널티 및 퇴출 사항</h2>
                <p>동아리를 잘 운영하기 위해서는 규칙이 중요합니다. 규칙을 지키지 못하면 경고와 퇴출에 대한 매뉴얼을 마련하여 운영하기 편리하게 하세요. 경고나 패널티를 설정하고, 심각한 경우 퇴출 사항도 정해두는 것이 좋습니다.</p>
            </div>

        </div> </main>

    <!-- 내부 링크 이동 스크립트 -->
    <script>
        document.querySelectorAll('.toc a').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
