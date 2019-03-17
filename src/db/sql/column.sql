SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `article`;

CREATE TABLE `column` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '表 Column ID',
  `tid` int(10) unsigned NOT NULL COMMENT '栏目详情表-栏目ID',
  `aid` int(10) unsigned NOT NULL COMMENT '栏目详情表-文章ID',
  PRIMARY KEY (`cid`),
  KEY `fk_column_aid` (`tid`),
  CONSTRAINT `fk_column_aid` FOREIGN KEY (`tid`) REFERENCES `article` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_column_tid` FOREIGN KEY (`tid`) REFERENCES `tags` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column-栏目详情表';

SET FOREIGN_KEY_CHECKS = 1;