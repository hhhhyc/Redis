<?php
$aid=intval($_GET['aid']);
?>
<html>
<head>
<body>
<h1>欢迎访问内容页：<?=$aid?></h1>
<ul>
   <p>
       正文
   </p>
</ul>
<script src="jquery-1.8.3.js"></script>
<script>
    //ajax访问ajax.php
    $.get("ajax.php?action=pv&from=article&aid=<?=$aid?>");

    //如果页面打开时间超过5秒，打开统计
    setTimeout(function () {
        $.get("ajax.php?action=gt5&aid=<?=$aid?>");
    },5000)
</script>
</body>
</head>
</html>
