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
function callback_init() {
	require_once EMLOG_ROOT . '/content/plugins/msitemap/class.msitemap.php';
	require_once EMLOG_ROOT . '/content/plugins/msitemap/msitemap.php';
	extract(msitemap_config());
	$sitemap = new msitemap($sitemap_name);
	$sitemap->build();
}