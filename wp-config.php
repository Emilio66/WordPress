<?php
/** 
 * WordPress 基础配置文件。
 *
 * 本文件包含以下配置选项：MySQL 设置、数据库表名前缀、密钥、
 * WordPress 语言设定以及 ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 * 编辑 wp-config.php} Codex 页面。MySQL 设置具体信息请咨询您的空间提供商。
 *
 * 这个文件用在于安装程序自动生成 wp-config.php 配置文件，
 * 您可以手动复制这个文件，并重命名为“wp-config.php”，然后输入相关信息。
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/**
 * WordPress 数据库的名称
 */
define ( 'DB_NAME', 'wordpress' );

/**
 * MySQL 数据库用户名
 */
define ( 'DB_USER', 'wp' );

/**
 * MySQL 数据库密码
 */
define ( 'DB_PASSWORD', 'wp321' );

/**
 * MySQL 主机
 */
define ( 'DB_HOST', 'localhost' );

/**
 * 创建数据表时默认的文字编码
 */
define ( 'DB_CHARSET', 'utf8' );

/**
 * 数据库整理类型。如不确定请勿更改
 */
define ( 'DB_COLLATE', '' );

/**
 * #@+
 * 身份认证密匙设定。
 *
 * 您可以随意写一些字符
 * 或者直接访问 {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org 私钥生成服务}，
 * 任何修改都会导致 cookie 失效，所有用户必须重新登录。
 *
 * @since 2.6.0
 */
define ( 'AUTH_KEY', '[3*CWBz84WIbSz~Pa}Rj)_05o]~z4@/Sk+?wS-*aB8]d.y43b~OG.GEJ}XlG#F|/' );
define ( 'SECURE_AUTH_KEY', '+nI*VL!J-C$W)$0vdIn2*#-WZu-T=iHH>tD&MxF4Ch,@Ky6*9Bhl*e=4l6Zb(?_I' );
define ( 'LOGGED_IN_KEY', '$Y$No;f>(?3VImxA-JPQ1PRbjZX:kwL&7M2>?Okv?Tr2#I>$x~,!n+9>f`Qn)P6D' );
define ( 'NONCE_KEY', 'Kx5_i5K_/Q3YVCW-L^w%mUA}inN!gIg$gZNh:->f)LlQ0>tUrXDmhuDgy*,N!A$A' );
define ( 'AUTH_SALT', '3)rTK&r{~EW:@,L&X9&#6TpuaQS+<(u4XdldbwAzHD[oDN%XLVQD/t9?Mh|4^l4@' );
define ( 'SECURE_AUTH_SALT', '=e;>M]rSX!~?$>brJF!41Q4GE3qyZ)O5A(DRP`w~$D/M|_,.Ix(ZJgG!yl!$l2ek' );
define ( 'LOGGED_IN_SALT', '~N 5J[6SZbE?2BvI3rwP8tqlBLUq0X}b%)cyKZB5tg87]FDgoUv4!nY|A)Qa1|h|' );
define ( 'NONCE_SALT', '7[wFqb-&DL|qNHW],;f^{+-}ZJp~`Ec/2&14h@eFhhC6vC|#~YN<uVh3S6_FJV!p' );

/**
 * #@-
 */

/**
 * WordPress 数据表前缀。
 *
 * 如果您有在同一数据库内安装多个 WordPress 的需求，请为每个 WordPress 设置不同的数据表前缀。
 * 前缀名只能为数字、字母加下划线。
 */
$table_prefix = 'wp_';

/**
 * WordPress 语言设置，中文版本默认为中文。
 *
 * 本项设定能够让 WordPress 显示您需要的语言。
 * wp-content/languages 内应放置同名的 .mo 语言文件。
 * 要使用 WordPress 简体中文界面，只需填入 zh_CN。
 */
define ( 'WPLANG', 'zh_CN' );

/**
 * 开发者专用：WordPress 调试模式。
 *
 * 将这个值改为“true”，WordPress 将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用本功能。
 */
define ( 'WP_DEBUG', false );

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/**
 * WordPress 目录的绝对路径。
 */
if (! defined ( 'ABSPATH' ))
	define ( 'ABSPATH', dirname ( __FILE__ ) . '/' );

/**
 * 设置 WordPress 变量和包含文件。
 */
require_once (ABSPATH . 'wp-settings.php');
