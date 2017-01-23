<?php
if (! defined ( 'EMLOG_ROOT' )) {
	exit ( 'error!' );
}
?>
<!DOCTYPE html>
<html mip>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1, user-scalable=0">
<title><?php echo $site_title; ?></title>
<style mip-custom>
body {
	background-color: #FFFFFF;
	font-size: 14px;
	margin: 0;
	padding: 0;
	font-family: Helvetica, Arial, sans-serif;
	-webkit-text-size-adjust: none;
}

a:link, a:visited, a:hover, a:active {
	text-decoration: none;
	color: #333;
}

#top {
	background-color: #32598B;
	padding: 10px 8px;
}

#footer {
	background-color: #EFEFEF;
	color: #666666;
	padding: 5px;
	text-align: center;
	font-weight: bold;
}

#page {
	text-align: center;
	font-size: 26px;
	color: #CCCCCC
}

#page a:link, a:active, a:visited, a:hover {
	padding: 0px 6px;
}

#m {
	padding: 10px;
}

#blogname {
	font-weight: bold;
	color: #FFFFFF;
	font-size: 14px;
}

#blogname a {
	text-decoration: none;
	color: #FFFFFF;
}

#navi {
	background: #EFEFEF;
	padding: 3px 0px;
	text-align: right;
}

.title {
	font-weight: bold;
	margin: 10px 0px 5px 0px;
}

.title a:link, a:active, a:visited, a:hover {
	color: #333360;
	text-decoration: none
}

.info {
	font-size: 12px;
	color: #999999;
}

.info2 {
	font-size: 12px;
	border-bottom: #CCCCCC dotted 1px;
	text-align: right;
	color: #666666;
	margin: 5px 0px;
	padding: 5px;
}

.posttitle {
	font-size: 16px;
	color: #333;
	font-weight: bold;
}

.postinfo {
	font-size: 12px;
	color: #999999;
}

.postcont {
	border-bottom: 1px solid #DDDDDD;
	padding: 12px 0px;
	margin-bottom: 10px;
}

.t {
	font-size: 16px;
	font-weight: bold;
}

.c {
	padding: 10px;
}

.l {
	border-bottom: 1px solid #DDDDDD;
	padding: 10px 0px;
}

.twcont {
	color: #333;
	padding-top: 12px;
}

.twinfo {
	text-align: right;
	color: #999999;
	border-bottom: 1px solid #DDDDDD;
	padding: 8px 0px;
	font-size: 12px;
}

.comcont {
	color: #333;
	padding: 6px 0px;
}

.reply {
	color: #FF3300;
	font-size: 12px;
}

.cominfo {
	text-align: right;
	color: #999999;
	border-bottom: 1px solid #DDDDDD;
	padding: 8px 0px;
	font-size: 12px;
}

.texts {
	width: 92%;
	height: 200px;
}

.excerpt {
	width: 92%;
	height: 100px;
}

textarea {
	width: 95%;
}

textarea {
	border: 1px solid #A5ABB3;
	color: #303C46;
}

.delcom {
	font-size: 12px;
	text-align: right;
	color: #666666;
	margin: 5px 0px;
	padding: 5px;
}
</style>
<link rel="stylesheet" type="text/css"
	href="https://mipcache.bdstatic.com/static/v1/mip.css">
<link rel="shortcut icon" href="//m.58edu.cc/mipicon.ico"
	type="image/x-icon" />
<link rel="canonical" href="http://m.58edu.cc/">
</head>
<body>
	<div id="top">
		<div id="blogname">
			<mip-link title="首页" href="//m.21stone.cn"><?php echo Option::get('blogname'); ?></mip-link>
		</div>
	</div>
	<div class="mip-nav-wrapper">
		<mip-nav-slidedown data-id="bs-navbar"
			class="mip-element-sidebar container"
			data-brandhref="//www.mipengine.org/">
		<nav id="bs-navbar"
			class="navbar-collapse collapse navbar navbar-static-top">
			<ul class="nav navbar-nav navbar-right">
				<li class="index-body"><mip-link title="首页" href="//m.21stone.cn">首页</mip-link>
				</li>
				<hr class="hr-xs">
                <?php if(Option::get('istwitter') == 'y'): ?>
                <li class="doc-body"><mip-link
						href="//m.21stone.cn/?action=tw">微语</mip-link></li>
                <?php endif;?>
                <hr class="hr-xs">
				<li class="navbar-wise-close"><span id="navbar-wise-close-btn"></span>
				</li>
			</ul>
		</nav>
		</mip-nav-slidedown>
	</div>