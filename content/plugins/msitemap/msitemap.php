<?php
/*
Plugin Name: msitemap
Version: 2.0
Plugin URL: http://www.bk41.cn
Description: 生成手机端sitemap，供搜索引擎抓取
Author: laowang
Author Email: 329433722@qq.com
Author URL: http://www.bk41.cn
*/
!defined('EMLOG_ROOT') && exit('access deined!');
function msitemap_update() {
	require_once EMLOG_ROOT . '/content/plugins/msitemap/class.msitemap.php';
	extract(msitemap_config());
	$sitemap = new msitemap($sitemap_name);
	return $sitemap->build();
}
function msitemap_del($logid) {
	global $sitemap_name;
	$url = Url::log($logid);
	$file = EMLOG_ROOT . '/' . $sitemap_name;
	$xml = file_get_contents($file);
	$xml = preg_replace("|<url>\n<loc>".preg_quote($url)."<\/loc>.*?<\/url>\n|is","",$xml);
	file_put_contents($file,$xml);
}
function msitemap_update_on_comment() {
	global $sitemap_name;
	if(Option::get('ischkcomment') == 'n') return;
	$gid = isset($_POST['gid']) ? intval($_POST['gid']) : -1;
	$url = Url::log($gid);
	$lastmod = gmdate('c');
	$file = EMLOG_ROOT . '/' . $sitemap_name;
	$xml = file_get_contents($file);
	$xml = preg_replace("|<loc>".preg_quote($url)."<\/loc>\n<lastmod>(.*?)<\/lastmod>|i","<loc>$url</loc>\n<lastmod>$lastmod</lastmod>",$xml);
	file_put_contents($file,$xml);
}
/* function msitemap_footer() {
	global $sitemap_name;
	echo '<a href="' . BLOG_URL . $sitemap_name . '" rel="sitemap">sitemap</a>';
} */
function msitemap_menu() {
	echo '<div class="sidebarsubmenu" id="msitemap"><a href="./plugin.php?plugin=msitemap">Msitemap</a></div>';
}
function msitemap_config() {
	return @unserialize(file_get_contents(EMLOG_ROOT . '/content/plugins/msitemap/config'));
}
extract(msitemap_config());
addAction('save_log','sitemap_update');
addAction('del_log','sitemap_del');
if($sitemap_comment_time) {
	addAction('comment_saved','msitemap_update_on_comment');
}
/* if($sitemap_show_footer) {
	addAction('index_footer','msitemap_footer');
} */
/* if(Option::get('istwitter') == 'y') {
	addAction('post_twitter','msitemap_update');
} */
addAction('adm_sidebar_ext', 'msitemap_menu');