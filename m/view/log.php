<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<?php 
$logUrl=str_replace("www", "m",BLOG_URL);
?>
<div id="m">
<?php foreach($logs as $value): ?>
<div class="title">
	<mip-link href="<?php echo $logUrl; ?>post-<?php echo $value['logid'];?>.html"><?php echo $value['log_title']; ?></mip-link>
	</div>
	<div class="info"><?php echo gmdate('Y-n-j', $value['date']); ?></div>
	<div class="info2">
评论:<?php echo $value['comnum']; ?> 阅读:<?php echo $value['views']; ?> 

</div>
<?php endforeach; ?>
<div id="page"><?php echo $page_url;?></div>
</div>