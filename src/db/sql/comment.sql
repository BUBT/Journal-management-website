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

 Date: 02/04/2019 16:20:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Comment表 ID',
  `aid` int(10) UNSIGNED NOT NULL,
  `uid` int(10) UNSIGNED NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_comment_article`(`aid`) USING BTREE,
  INDEX `fk_comment_uid`(`uid`) USING BTREE,
  CONSTRAINT `fk_comment_article` FOREIGN KEY (`aid`) REFERENCES `article` (`aid`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_comment_uid` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES (1, 1, 1, '这是一条评论评论评论评论评论漂亮漂亮');
INSERT INTO `comment` VALUES (2, 1, 1, '这是一条评论评论评论评论评论漂亮漂亮');
INSERT INTO `comment` VALUES (3, 1, 1, '这是一条评论评论评论评论评论漂亮漂亮');
INSERT INTO `comment` VALUES (4, 1, 1, '这是一条评论评论评论评论评论漂亮漂亮');
INSERT INTO `comment` VALUES (5, 1, 1, '这是一条评论评论评论评论评论漂亮漂亮');
INSERT INTO `comment` VALUES (6, 14, 1, 'dsdsdsd');
INSERT INTO `comment` VALUES (7, 14, 1, 'dsdsdsd');
INSERT INTO `comment` VALUES (8, 14, 1, 'dsdsdsd');
INSERT INTO `comment` VALUES (9, 14, 1, 'dsdsds');
INSERT INTO `comment` VALUES (10, 14, 1, 'dsdsds');
INSERT INTO `comment` VALUES (11, 14, 1, 'dsdsds');
INSERT INTO `comment` VALUES (12, 13, 1, 'dsdsds');
INSERT INTO `comment` VALUES (13, 1, 1, 'dsdsfs');
INSERT INTO `comment` VALUES (14, 14, 1, 'dsdsds');
INSERT INTO `comment` VALUES (15, 14, 1, 'dsdsdsd');
INSERT INTO `comment` VALUES (16, 14, 1, 'sdsds');
INSERT INTO `comment` VALUES (17, 14, 1, 'dsdsd');
INSERT INTO `comment` VALUES (18, 14, 1, 'dsdsdsaaaaa');
INSERT INTO `comment` VALUES (19, 13, 1, 'dsdswq');
INSERT INTO `comment` VALUES (20, 13, 1, 'dwdwqdwdwqwdq');
INSERT INTO `comment` VALUES (21, 14, 1, 'dwdqw');
INSERT INTO `comment` VALUES (22, 1, 1, 'dwqdqdwq');
INSERT INTO `comment` VALUES (23, 1, 1, 'dsadaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
INSERT INTO `comment` VALUES (24, 1, 1, 'dsasasdadaasdwdwqdwdwwdwdwqdwdwqdqdwqdwqdwqdqdwdwdwqdwqdqwdwqdqwdwqdqwdq');
INSERT INTO `comment` VALUES (25, 1, 1, 'Failed to load image http://localhost:8081/src/upload/upload_1553670929.jpg the server responded with a status of 404 (HTTP/1.1 404 Not Found)  From server ::1');
INSERT INTO `comment` VALUES (26, 1, 1, '{{ comment.comment }}');
INSERT INTO `comment` VALUES (27, 1, 1, '{{ comment.comment }}');
INSERT INTO `comment` VALUES (28, 14, 1, 'dsdsdsds');
INSERT INTO `comment` VALUES (29, 14, 1, '这里只展示纵向滚动，横向同理就不用说明了，可自己尝试，横向滚动属性为scroll-x，把纵向滚动改为横向滚动即可。');
INSERT INTO `comment` VALUES (30, 14, 1, 'bindscrolltoupper是scroll-view的属性，bindscrolltoupper类型为EventHandle，表示滚动到顶部/左边，会触发scrolltoupper事件，顶部/左边，是因为滚动视图可以横向滚动和纵向滚动，bindscrolltoupper=\"upper\"定义绑定事件，在逻辑代码中编写，滚动到顶部，触发scrolltoupper事件。  作者：达叔小生 链接：https://juejin.im/post/5b850678e51d4538e710a25e 来源：掘金 著作权');
INSERT INTO `comment` VALUES (31, 14, 1, 'dsdsds');
INSERT INTO `comment` VALUES (32, 14, 1, 'sasad');
INSERT INTO `comment` VALUES (33, 14, 1, 'dsds');
INSERT INTO `comment` VALUES (34, 14, 1, 'ddsdsdsdsadsad');
INSERT INTO `comment` VALUES (35, 14, 1, 'dsdsds');
INSERT INTO `comment` VALUES (36, 14, 1, 'ddadsadsadadadas');

SET FOREIGN_KEY_CHECKS = 1;
