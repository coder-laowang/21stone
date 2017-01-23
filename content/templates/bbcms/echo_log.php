<?php if(!defined('EMLOG_ROOT')) {exit('error!');}include View::getView('sy/head');?><div
	class="r-width <?php if (_g('blog-cbl') == "left"): ?>right<?php else: endif; if (_g('blog-cbl') == "right"): ?>left<?php else: endif; ?>">
	<div id="mbx">
		<p>
			现在位置：<a title="返回首页" href="<?php echo BLOG_URL; ?>">首页</a> &raquo; <?php blog_sort($logid); ?> &raquo; <a href="<?php echo Url::log($logid); ?>"><?php echo $log_title; ?></a></p>
	</div>
	<div id="sheli-log">
		<div id="sheli-log-tt">
			<span id="log-list-tt-tt"></span><?php topflg($top); ?><?php echo $log_title; ?></div>
		<div id="sheli-log-bq">作者:<?php blog_author($author); ?> &nbsp; 分类:<?php blog_sort($logid); ?> &nbsp; 评论(<?php echo $comnum;?>) &nbsp; 浏览(<?php echo $views; ?>) &nbsp; <?php blog_tag($logid); ?></div>
		<div id="sheli-log-nr"><?php if (_g('log_ad-kg') == "top"): ?><?php echo _g('log_ad'); ?><?php else: endif; ?>
		<img alt="<?php echo $log_title; ?>" src="<?php echo str_replace("www", "img", BLOG_URL)?>upload/<?php echo md5($logid); ?>.jpg">
		<?php $log_content=content_nofollow($log_content,BLOG_URL);
		
		$log_content=replace_text($log_content);
		?>
		<?php $p = $_GET["p"];$aArr = split('-=-',stripslashes($log_content));$aCount = count($aArr);if ($aCount>1){if ($p>0){echo $aArr[$p].log_fy($logid,$p,$aCount);}else{echo $aArr[0].log_fy($logid,0,$aCount);}}else{echo $log_content;}?><hr
				id="fgx">
			&nbsp;&nbsp;&nbsp;&nbsp;转载分享请注明原文地址(<a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a>)：<a
				href="<?php echo Url::log($logid); ?>"><?php echo $log_title; ?></a><br />

			<div
				style="border: 1px solid #ddd; padding: 5px 5px; margin: 2px 0 3px; color: #666;">
				免责声明<br>
				<p>1、本站在建设中引用了互连网上的一些资源并对有明确来源的注明了出处，版权归原作者及网站所有，如本网转载稿件涉及版权等问题。请通知我们，联系QQ：121671486。</p>
				<p>2、本站的材料按原样提供，不附加任何形式的保证。此外，本网转载出于传递更多信息之目的，并不意味着赞同其观点或证实其内容的真实性。</p>
			</div>	
				<?php if (_g('log_ad-kg') == "bottom"): ?><?php echo _g('log_ad'); ?><?php else: endif; ?><?php if (in_array('log-dhg', _g('on-off'))):?><div
				id="cyEmoji" role="cylabs" data-use="emoji"
				sid="<?php echo $logData['logid'] ; ?>"></div>
			<!-- 	<script type="text/javascript" charset="utf-8"
				src="http://changyan.itc.cn/js/??lib/jquery.js,changyan.labs.js?appid=cyrvio22uCG"></script> -->
			<?php else: endif; ?></div><?php if (in_array('bqkg', _g('on-off'))):?><script>ffz()</script><?php else: endif; ?><?php if (in_array('next', _g('on-off'))):?><?php nextLog($logid, $sortid, 'prev'); nextLog($logid, $sortid, 'next');?><?php else: endif; ?><div
			id="nextlog"><?php neighbor_log($neighborLog); ?></div>
		<div id="log-bq">
			<script type="text/javascript">bdfx()</script>
		</div><?php if (in_array('xg-logs', _g('on-off'))):?><div id="xg-logs">
			<div id="xg-logs-tt">
				<h3>相关文章</h3>
			</div>
			<div id="xg-logs-wz"><?php xg_logs($logData);?></div>
		</div><?php else: endif; ?><?php doAction('log_related', $logData); ?><?php if (in_array('pl-log', _g('on-off'))):?><?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); blog_comments($comments); ?><?php else: endif; ?></div>
</div>
<div class="l-width <?php echo _g('blog-cbl');?>"><?php include View::getView('side-log');?></div><?php include View::getView('footer');?>