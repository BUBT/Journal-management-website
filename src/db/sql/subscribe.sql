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

 Date: 23/03/2019 16:15:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for subscribe
-- ----------------------------
DROP TABLE IF EXISTS `subscribe`;
CREATE TABLE `subscribe`  (
  `sid` int(11) NOT NULL COMMENT '表 Subscribe ID',
  `uid` int(10) UNSIGNED NOT NULL COMMENT '用户订阅表-用户ID',
  `tid` int(10) UNSIGNED NOT NULL COMMENT '用户订阅表-栏目ID',
  PRIMARY KEY (`sid`) USING BTREE,
  INDEX `fk_subscribe_uid`(`uid`) USING BTREE,
  INDEX `fk_subscribe_tid`(`tid`) USING BTREE,
  CONSTRAINT `fk_subscribe_tid` FOREIGN KEY (`tid`) REFERENCES `tags` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_subscribe_uid` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Subscribe-用户订阅表' ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
