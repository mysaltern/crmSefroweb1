/*
 Navicat Premium Data Transfer

 Source Server         : portal
 Source Server Type    : MySQL
 Source Server Version : 100131
 Source Host           : localhost:3306
 Source Schema         : sefrowebcms

 Target Server Type    : MySQL
 Target Server Version : 100131
 File Encoding         : 65001

 Date: 22/08/2019 12:34:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category_writing
-- ----------------------------
DROP TABLE IF EXISTS `category_writing`;
CREATE TABLE `category_writing`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `type` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `name`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of category_writing
-- ----------------------------
INSERT INTO `category_writing` VALUES (1, 'اقتصادی', 1);
INSERT INTO `category_writing` VALUES (2, 'تحلیل اقتصادی', 2);
INSERT INTO `category_writing` VALUES (3, 'سیاسی', 1);
INSERT INTO `category_writing` VALUES (4, 'اجتماعی', 1);
INSERT INTO `category_writing` VALUES (5, 'تحلیل اجتماعی', 2);

SET FOREIGN_KEY_CHECKS = 1;
