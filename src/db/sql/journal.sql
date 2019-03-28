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

 Date: 28/03/2019 16:12:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article`  (
  `aid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '表 article ID',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文章-标题：默认为空字符串',
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文章-作者：默认为空字符串',
  `abstract` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文章-摘要：默认为空字符串',
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文章-关键词组，使用逗号分开：默认为空字符串',
  `content` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文章-纯文本内容：默认为空字符串',
  `first_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文章-首图缩略图地址：默认为空字符串',
  `file_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '文章-HTML文件所在地址：默认为空字符串',
  `recevied_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '文章-收稿日期：默认为创建时间',
  `is_issue` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '文章-发布标识：如果为0，表示在存稿箱，如果为1，表示已经发布。',
  `view` int(255) UNSIGNED NOT NULL DEFAULT 0 COMMENT '文章-浏览量：默认为0，用户每点击一次增加1',
  `star` int(255) UNSIGNED NOT NULL DEFAULT 0 COMMENT '文章-收藏量：默认为0，用户每收藏一次增加1，取消收藏则减1',
  PRIMARY KEY (`aid`) USING BTREE,
  INDEX `i_article_author`(`author`) USING BTREE COMMENT '索引-文章表-作者',
  FULLTEXT INDEX `i_article_title`(`title`) COMMENT '索引-文章表-标题',
  FULLTEXT INDEX `i_article_abstract`(`abstract`) COMMENT '索引-文章表-摘要',
  FULLTEXT INDEX `i_article_kw`(`keywords`) COMMENT '索引-文章表-关键词',
  FULLTEXT INDEX `i_article_content`(`content`) COMMENT '索引-文章表-纯文本'
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Article-文章表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES (1, '标题', '作者', '返回：最新发布文章列表(aid title abstract first_img author recevied_date is_favorite tag )', '关键词', 'dsdsdsdsdsdsds纯文本内容呀还有一i张图', 'http://localhost:8081/src/thumbs/thumb_1553257628.jpeg', 'http://localhost:8081/src/issues/issues_1553670933.html', '2019-03-18 02:10:18', 1, 26, 1);
INSERT INTO `article` VALUES (2, '标题', '作者', '南海南', '关键字', '内容', 'http://localhost:8081/src/thumbs/thumb_1553257628.jpeg', 'http://localhost:8081/src/issues/issues_1553670933.html', '2019-03-19 15:41:14', 1, 6, 1);
INSERT INTO `article` VALUES (3, '海南论坛开拓者', 'dsds', '返回：最新发布文章列表(aid title abstract first_img author recevied_date is_favorite tag )', 'dsadsa', 'dsidojaosiadsadasdhifuehf', 'http://localhost:8081/src/thumbs/thumb_1553257628.jpeg', 'http://localhost:8081/src/issues/issues_1553670933.html', '2019-03-22 20:48:27', 1, 13, 1);
INSERT INTO `article` VALUES (4, '我爱海南', 'dsds', '返回：最新发布文章列表(aid title abstract first_img author recevied_date is_favorite tag )', 'dsadsa', 'dsidojaosiadsadasdhifuehf', 'http://localhost:8081/src/thumbs/thumb_1553257628.jpeg', 'http://localhost:8081/src/issues/issues_1553670933.html', '2019-03-22 20:50:47', 1, 6, 1);
INSERT INTO `article` VALUES (5, 'hduskda', '今天海南边上', 'dsdsda返回：最新发布文章列表(aid title abstract first_img author recevied_date is_favorite tag )', 'dsadsa', 'dsidojaosiadsadasdhifuehf', 'http://localhost:8081/src/thumbs/thumb_1553257628.jpeg', 'http://localhost:8081/src/issues/issues_1553670933.html', '2019-03-22 20:52:14', 1, 1, 0);
INSERT INTO `article` VALUES (6, 'Title', 'Author', 'Abstract', 'Keywords', 'This is a article.A image .', 'http://localhost:8081/src/thumbs/thumb_1553755169.webp', 'http://localhost:8081/src/issues/issues_1553670933.html', '2019-03-27 15:15:34', 1, 1, 0);
INSERT INTO `article` VALUES (7, '测试缩略图', '管理员', '测试缩略图的生成情况', '测试', '测试缩略图', 'http://localhost:8081/src/thumbs/thumb_1553755169.webp', 'http://localhost:8081/src/issues/issues_1553754653.html', '2019-03-28 14:30:54', 1, 0, 0);
INSERT INTO `article` VALUES (8, '海南热带海洋学院学报后台管理', '管理员', '包括【数据一览】、【作品长廊】、【稿件管理】、【文章录入】等功能。', '大撒大撒', '', 'http://localhost:8081/src/thumbs/thumb_1553757567.png', 'http://localhost:8081/src/issues/issues_1553757567.html', '2019-03-28 15:19:27', 1, 0, 0);

-- ----------------------------
-- Table structure for column
-- ----------------------------
DROP TABLE IF EXISTS `column`;
CREATE TABLE `column`  (
  `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '表 Column ID',
  `tid` int(10) UNSIGNED NOT NULL COMMENT '栏目详情表-栏目ID',
  `aid` int(10) UNSIGNED NOT NULL COMMENT '栏目详情表-文章ID',
  PRIMARY KEY (`cid`) USING BTREE,
  UNIQUE INDEX `un_aid_tid`(`tid`, `aid`) USING BTREE COMMENT '唯一性索引',
  UNIQUE INDEX `un_column_aid`(`aid`) USING BTREE COMMENT '一篇文章只允许出现在一个栏目下',
  CONSTRAINT `fk_column_aid` FOREIGN KEY (`aid`) REFERENCES `article` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_column_tid` FOREIGN KEY (`tid`) REFERENCES `tags` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Column-栏目详情表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of column
-- ----------------------------
INSERT INTO `column` VALUES (1, 1, 1);
INSERT INTO `column` VALUES (7, 1, 3);
INSERT INTO `column` VALUES (10, 2, 4);
INSERT INTO `column` VALUES (25, 3, 6);
INSERT INTO `column` VALUES (19, 4, 7);
INSERT INTO `column` VALUES (9, 5, 2);
INSERT INTO `column` VALUES (24, 5, 8);
INSERT INTO `column` VALUES (12, 6, 5);

-- ----------------------------
-- Table structure for favorite
-- ----------------------------
DROP TABLE IF EXISTS `favorite`;
CREATE TABLE `favorite`  (
  `fid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '表 favorite ID',
  `uid` int(10) UNSIGNED NOT NULL COMMENT '用户喜欢表-用户ID',
  `aid` int(10) UNSIGNED NOT NULL COMMENT '用户喜欢表-文章ID',
  PRIMARY KEY (`fid`) USING BTREE,
  UNIQUE INDEX `uk_favorite`(`uid`, `aid`) USING BTREE COMMENT '唯一性索引',
  INDEX `fk_favorite_aid`(`aid`) USING BTREE,
  CONSTRAINT `fk_favorite_aid` FOREIGN KEY (`aid`) REFERENCES `article` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_favorite_uid` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Favorite-用户喜欢表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of favorite
-- ----------------------------
INSERT INTO `favorite` VALUES (36, 1, 1);
INSERT INTO `favorite` VALUES (10, 1, 2);
INSERT INTO `favorite` VALUES (35, 1, 3);
INSERT INTO `favorite` VALUES (37, 1, 4);

-- ----------------------------
-- Table structure for subscribe
-- ----------------------------
DROP TABLE IF EXISTS `subscribe`;
CREATE TABLE `subscribe`  (
  `sid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '表 Subscribe ID',
  `uid` int(10) UNSIGNED NOT NULL COMMENT '用户订阅表-用户ID',
  `tid` int(10) UNSIGNED NOT NULL COMMENT '用户订阅表-栏目ID',
  PRIMARY KEY (`sid`) USING BTREE,
  INDEX `fk_subscribe_uid`(`uid`) USING BTREE,
  INDEX `fk_subscribe_tid`(`tid`) USING BTREE,
  CONSTRAINT `fk_subscribe_tid` FOREIGN KEY (`tid`) REFERENCES `tags` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_subscribe_uid` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = 'Subscribe-用户订阅表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of subscribe
-- ----------------------------
INSERT INTO `subscribe` VALUES (8, 1, 3);
INSERT INTO `subscribe` VALUES (9, 1, 1);
INSERT INTO `subscribe` VALUES (10, 1, 2);

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags`  (
  `tid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '表 Tags ID',
  `tag` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '栏目列表-栏目名：默认为空字符串',
  PRIMARY KEY (`tid`) USING BTREE,
  UNIQUE INDEX `i_tags_unique`(`tag`) USING BTREE COMMENT '唯一性索引：栏目名'
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Tags-栏目列表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES (3, '20世纪中国学术家研究');
INSERT INTO `tags` VALUES (1, '南海研究');
INSERT INTO `tags` VALUES (2, '当代海南论坛');
INSERT INTO `tags` VALUES (7, '教育学');
INSERT INTO `tags` VALUES (5, '文学');
INSERT INTO `tags` VALUES (4, '民族学');
INSERT INTO `tags` VALUES (6, '艺术学');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '表 user ID',
  `openid` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '' COMMENT '用户-小程序唯一标识符',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '' COMMENT '用户-用户名',
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '' COMMENT '用户-头像地址',
  PRIMARY KEY (`uid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci COMMENT = 'User-用户表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'oGNPi5BTJGhGEqM1AwlEGHc87usw', '叽嘻嘻嘻', 'https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKTJEia7U5mWw2D6lplH3FKzbG2jGmN7QC69yQwwOGpzZQ08u32gxqR6JvstepYShxhwKUCLQEGUmA/132');

SET FOREIGN_KEY_CHECKS = 1;
