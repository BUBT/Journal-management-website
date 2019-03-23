/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80015
 Source Host           : localhost:3306
 Source Schema         : journal

 Target Server Type    : MySQL
 Target Server Version : 80015
 File Encoding         : 65001

 Date: 23/03/2019 16:16:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for favorite
-- ----------------------------
DROP TABLE IF EXISTS `favorite`;
CREATE TABLE `favorite`  (
  `fid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '表 favorite ID',
  `uid` int(10) UNSIGNED NOT NULL COMMENT '用户喜欢表-用户ID',
  `aid` int(10) UNSIGNED NOT NULL COMMENT '用户喜欢表-文章ID',
  PRIMARY KEY (`fid`) USING BTREE,
  INDEX `fk_favorite_uid`(`uid`) USING BTREE,
  INDEX `fk_favorite_aid`(`aid`) USING BTREE,
  CONSTRAINT `fk_favorite_aid` FOREIGN KEY (`aid`) REFERENCES `article` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_favorite_uid` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Favorite-用户喜欢表' ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
