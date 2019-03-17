SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '表 article ID',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文章-标题：默认为空字符串',
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文章-作者：默认为空字符串',
  `abstract` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文章-摘要：默认为空字符串',
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文章-关键词组，使用逗号分开：默认为空字符串',
  `content` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文章-纯文本内容：默认为空字符串',
  `first_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文章-首图缩略图地址：默认为空字符串',
  `file_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文章-HTML文件所在地址：默认为空字符串',
  `recevied_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '文章-收稿日期：默认为创建时间',
  `is_issue` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '文章-发布标识：如果为0，表示在存稿箱，如果为1，表示已经发布。',
  PRIMARY KEY (`aid`) USING BTREE,
  KEY `i_article_author` (`author`) USING BTREE COMMENT '索引-文章表-作者',
  FULLTEXT KEY `i_article_title` (`title`) COMMENT '索引-文章表-标题',
  FULLTEXT KEY `i_article_abstract` (`abstract`) COMMENT '索引-文章表-摘要',
  FULLTEXT KEY `i_article_kw` (`keywords`) COMMENT '索引-文章表-关键词',
  FULLTEXT KEY `i_article_content` (`content`) COMMENT '索引-文章表-纯文本'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='Article-文章表';

SET FOREIGN_KEY_CHECKS = 1;