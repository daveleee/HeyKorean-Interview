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
          if (isset($_GET['kind'])) {
            $kind = $_GET['kind'];
          }

          if (isset($_GET['kind']) && $kind == 1) {   // When tutee board opened
        ?>

<!-- Start Tutee Board -->
        <h1>Tutee List(튜'티')</h1>

        <article class="tuteeBoard">
          <table> 
            <thead>
              <tr>
                <th scope="col" class="no"> <center> 번호 </center> </th>
                <th scope="col" class="title"> <center> 제목 </center></th>
                <th scope="col" class="item"> <center> 아이템 </center></th>
                <th scope="col" class="email"> <center> 작성자 </center></th>
                <th scope="col" class="date"> <center> 작성일 </center></th>
                <th scope="col" class="view"> <center> 조회수 </center></th>
              </tr>
            </thead>
            <tbody> 
            <?php 
              $sql1 = "SELECT * FROM tbl_board ORDER BY board_no DESC";
              $result1 = mysqli_query($conn, $sql1);
              while ($row1 = mysqli_fetch_assoc($result1)) {
                $datetime = explode(' ', $row1['board_date']);
                $date = $datetime[0];
                $time = $datetime[1];
                if($date == Date('Y-m-d'))
                  $row1['board_date'] = $time;
                else
                  $row1['board_date'] = $date;
            ?>
              <tr>
                <td class="no" style="width: 10%;"> <center> <?php echo $row1['board_no']; ?> </center></td>
                <td class="title" style="width: 40%;"> <center> <a href="biz_view.php?no=<?php echo $row1['board_no']; ?>&kind=1"> <?php echo $row1['board_title']; ?> </a> </center></td>
                <td class="item" style="width: 10%;"> <center> <?php echo "꼼꼼한지도"; ?> </center></td>
                <td class="email" style="width: 25%;"> <center> <?php echo $row1['board_email']; ?> </center></td>
                <td class="date" style="width: 10%;"> <center> <?php echo $row1['board_date']; ?> </center></td>
                <td class="view" style="width: 10%;"> <center> <?php echo $row1['board_view']; ?> </center></td>
              </tr>
            <?php 
              }
            ?>
            </tbody>
          </table>
        </article>
<!-- End Tutee Board -->

        <?php
          }
          else if (isset($_GET['kind']) && $kind == 2) {    // When tutor board opened
        ?>

<!-- Start Tutor Board -->
        <h1>Tutor List(튜'터')</h1>
<!-- End Tutor Board -->

        <?php 
          }
          else {
            echo "튜티/ 튜터 게시판을 선택하세요";   // undefined index($kind) point exception
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