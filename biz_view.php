<?php
  require_once($_SERVER["DOCUMENT_ROOT"] . '/heykorean-interview/header.php');
  require_once($_SERVER["DOCUMENT_ROOT"] . '/heykorean-interview/config_local.php');
 
?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->
    <link href="build/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- 합쳐지고 최소화된 최신 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- 부가적인 테마 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

    <!-- 합쳐지고 최소화된 최신 자바스크립트 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <title>Hey Korean Interview</title>

    <!-- 부트스트랩 -->
    <link href="build/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="build/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
    <script src="build/bootstrap/js/bootstrap.min.js"></script>

  </head>
  <body>  
    <?php 
      if ($loggedIn) {  // When login successful
        echo $email . " 님";
        echo "<br><br><br><br><br>";
    ?>

    <div class="row">
      <div class="col-lg-2">
        <ul>
          <li>
            <a href="http://dave.local:8888/heykorean-interview/biz_list.php?kind=1">프리랜서/ 튜티</a>
          </li>
          <li>
            <a href="http://dave.local:8888/heykorean-interview/biz_list.php?kind=2">프리랜서/ 튜터</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-10">
        <?php 
          $no = $_GET['no'];
          $kind = $_GET['kind']; 

          $sql1="SELECT * FROM tbl_board where board_no=" . $no;
          $result1=mysqli_query($conn, $sql1) or die("Long text pushing error.");
          while($row1=mysqli_fetch_assoc($result1))
          {
        ?>
          <div>
            <div>
              <div>
                <strong><?php echo $row1['board_title']; ?></strong>
                  <br><br>
              </div>
              <dl>
                <dt>
                  <span>작성자: <?php echo $row1['board_email']; ?></span>
                  <span>카테고리: 
                    <?php 
                      if ($kind == 1) {
                        echo "Tutee(튜'티')";
                      }
                      else if ($kind == 2) {
                        echo "Tutor(튜'터')";
                      }
                      else {
                        echo "Category error";
                      }
                    ?>
                  </span>
                  <span>조회수: <?php echo $row1['board_view']; ?></span>
                </dt>
              </dl>
            </div>

            <div>
              <?php echo $row1['board_text']; ?>
            </div>
             
             <br><br>
            <div>
              <a href="#">Apply as a tutor</a>  
            </div>
          </div>
         
        <?php
          } 
        ?>
      </div>
    </div>


    <?php 
      }
      else {
        echo "failed to session login";   // When login session already died
      }
    ?>
  </body>
</html>
























