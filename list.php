<?php
$tid=intval($_GET['tid']);
?>
<html>
<meta charset="UTF-8">
<head>

<body>
<h1>欢迎访问列表页：<?=$tid?></h1>
<ul>
    <li><a href="article.php?aid=1">文章1</a></li>
    <li><a href="article.php?aid=2">文章2</a></li>
    <li><a href="article.php?aid=3">文章3</a></li>
</ul>
<script src="jquery-1.8.3.js"></script>
<script>
    //ajax访问ajax.php
    $.get("ajax.php?action=pv&from=list&tid=<?=$tid?>");
</script>
</body>
</head>
</html>
