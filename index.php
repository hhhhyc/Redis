<?php
/**
 * 新闻站首页
 *
 * 功能1:统计首页，列表页，内容页pv
 * 功能2：统计浏览时间超过五秒的内容页
 * 功能3：内容页pv+1分，浏览时间超过5秒+5，不超过5秒-1，生成内容页的质量分
 */
?>
<html>
<head>
<body>
  <h1>欢迎访问首页</h1>
<ul>
    <li><a href="list.php?tid=1">第一类</a></li>
    <li><a href="list.php?tid=2">第二类</a></li>
    <li><a href="list.php?tid=3">第三类</a></li>
</ul>
<script src="jquery-1.8.3.js"></script>
<script>
    //ajax访问ajax.php
    $.get("ajax.php?action=pv&from=index");
</script>
</body>
</head>
</html>
