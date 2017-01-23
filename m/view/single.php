<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div id="m">
	<div class="posttitle"><?php echo $log_title; ?></div>
	<div class="postinfo"><?php echo gmdate('Y-n-j', $date); ?> <?php echo $user_cache[$author]['name'];?></div>
	<?php 
	$content =nl2br($log_content);
	//$content =strip_tags($content);
	//$content =replace_text_wps(nl2br($log_content));
	//$content =strip_tags($content);
	$content =strip_tags($content,"<img><p><b><a>");
	$content = preg_replace("/style=\"(.*)\"/","",$content);
	
	$content = preg_replace("/<img (.*)\/>/",'<mip-img layout="responsive" $1  sizes="(max-width: 750px) 100vw, 750px" ></mip-img>',$content);
	
	//$content =replace_text_wps($content);
	
	
	
	
	
	function replace_text_wps($text){
		
		$replace = array(
				// '关键词' => '替换的关键词'
				'<img' => '<mip-img layout="responsive" sizes="(max-width: 750px) 100vw, 750px"',
				'style="text-align: center;"' => '',
				'sizes="(max-width: 750px) 100vw, 750px" />' => 'sizes="(max-width: 750px) 100vw, 750px" /></mip-img>',
				'class="aligncenter size-full wp-image-164"' => '',
				'style="color: #ff0000;"' => ''
		);
		$text = str_replace(array_keys($replace), $replace, $text);
		return $text;
	}
	
	function _safe($str){
	
		$html_string = array("&amp;", "&nbsp;", "'", '"', "<", ">", "\t", "\r");
	
		$html_clear = array("&", " ", "&#39;", "&quot;", "&lt;", "&gt;", "&nbsp; &nbsp; ", "");
	
		$js_string = array("/<script(.*)<\/script>/isU");
	
		$js_clear = array("");
	
	
	
		$frame_string = array("/<frame(.*)>/isU", "/<\/fram(.*)>/isU", "/<iframe(.*)>/isU", "/<\/ifram(.*)>/isU",);
	
		$frame_clear = array("", "", "", "");
	
	
	
		$style_string = array("/<style(.*)<\/style>/isU", "/<link(.*)>/isU", "/<\/link>/isU");
	
		$style_clear = array("", "", "");
	
	
	
		$str = trim($str);
	
		//过滤字符串
	
		$str = str_replace($html_string, $html_clear, $str);
	
		//过滤JS
	
		$str = preg_replace($js_string, $js_clear, $str);
	
		//过滤ifram
	
		$str = preg_replace($frame_string, $frame_clear, $str);
	
		//过滤style
	
		$str = preg_replace($style_string, $style_clear, $str);
	
		return $str;
	
	}
	?>
	<div class="postcont"><?php echo $content; ?></div>
</div>