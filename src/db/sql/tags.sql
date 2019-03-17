SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `article`;

CREATE TABLE `tags` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '表 Tags ID',
  `tag` varchar(255) NOT NULL DEFAULT '' COMMENT '栏目列表-栏目名：默认为空字符串',
  PRIMARY KEY (`tid`),
  UNIQUE KEY `i_tags_unique` (`tag`) COMMENT '唯一性索引：栏目名',
  FULLTEXT KEY `i_tags_tag` (`tag`) COMMENT '索引-栏目列表-栏目名'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Tags-栏目列表';

SET FOREIGN_KEY_CHECKS = 1;