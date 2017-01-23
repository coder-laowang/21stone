<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>58edu学习资源网</title>
<style type="text/css">
<!--
body{background:#F7F7F7;font-family: Arial;font-size:12px;line-height:150%;}
.main{background:#FFFFFF;color: #666666;max-width:800px;margin:100px auto;padding:10px;list-style:none;border:#DFDFDF 1px solid;overflow:hidden; clear:both;}
#bt{text-align:center; line-height:50px; font-size:14px; font-family:"微软雅黑"; font-weight:bold;}
#nr{font-size:14px; font-family:"微软雅黑"; margin:0 0 10px 20px; line-height:25px;}
#right{clear:both; overflow:hidden;margin:0 0 10px 20px;}
#jz{ text-align:center;}-->
</style>
</head>
<body>
<div class="main">

<p id="bt"><a href="http://www.58edu.cc/" ><B>58edu学习资源网</B></a>：</p>

<!-- 
<p id="bt">对不起，您要找的文章已过期，推荐访问下面的文章，或者返回<B><a href="http://www.58edu.cc/" >首页 </a></B>：</p>
-->
<p id="nr">



<?php newlog();?>

<?php widget_random_log("注册会计");?>
<?php //widget_hotlog("注册会计");?>
<?php
//widget：随机文章
function widget_random_log($title){$index_randlognum = 20;$Log_Model = new Log_Model();$randLogs = $Log_Model->getRandLog($index_randlognum);?>
<div class="cbl-one"><div class="title"><p><?php echo $title; ?></p></div><?php foreach($randLogs as $value): ?><li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li><?php endforeach; ?></div>
<?php }?>
<?php
//widget：热门文章
function widget_hotlog($title){$index_hotlognum = Option::get('index_hotlognum');$Log_Model = new Log_Model();$randLogs = $Log_Model->getHotLog($index_hotlognum);?>
<div class="cbl-one"><div class="title"><p><?php echo $title; ?></p></div><?php foreach($randLogs as $value): ?><li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li><?php endforeach; ?></div><?php }?>


<?php //cms 最新文章
function newlog(){ require('sheli.php'); $db = MySql::getInstance(); $sql = $db->query ("SELECT * FROM ".DB_PREFIX."blog inner join ".DB_PREFIX."sort WHERE hide='n' AND type='blog' AND top='n' AND sortid=sid order by date DESC limit 0,$newlog_mun"); while($row = $db->fetch_array($sql)){ $logpost = !empty($row['excerpt']) ? $row['excerpt'] : ''.$row['content'].''; if (!empty($row['excerpt'])){preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['excerpt'], $match); if(empty($match[1][0])) {
preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['content'], $match); } }else{preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $row['content'], $match); } ; $img = isset($match[0][0]) ? $match[0][0] : ''.$img_ad.''; $date = gmdate('Y年m月d日', $row['date']); $content = strip_tags($logpost,''); $content = mb_substr($content,0,200,'utf-8'); $comment = ($row['comnum'] != 0) ? ''.$row['comnum'].'' : '0'; $gid = $row['gid']; $tag = $db -> query("SELECT * FROM ".DB_PREFIX."tag WHERE gid LIKE '%,$gid,%'"); $out .='<div class="home-log"><ul><div class="home-log-list"  onmouseout=this.className="home-log-list" onmouseover=this.className="home-log-list1">
<div class="home-log-list-tt"><a href="'.Url::log($row['gid']).'" title="'.$row['title'].'"  >'.$row['title'].'</a></div>
<div class="home-log-list-nr"><p>'.$img.'</p><span>'.$content.'...</span></div>       		
<div class="home-log-list-bq">时间:'.$date.' &nbsp; <span id="fenlei"><a href="'.Url::sort($row['sortid']).'" title="查看 '.$row['sortname'].' 中的全部文章">'.$row['sortname'].'</a></span> &nbsp; <span id="liulan">浏览('.$row['views'].')</span> &nbsp; <span id="pinglun">评论('.$comment.')</span>
<span id="qw"><a>最新文章</a></span></div></div></ul></div>'; } echo $out; }?>
</p>


</div>
</body>
</html>