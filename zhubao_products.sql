/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50726 (5.7.26)
 Source Host           : localhost:3306
 Source Schema         : zhubao

 Target Server Type    : MySQL
 Target Server Version : 50726 (5.7.26)
 File Encoding         : 65001

 Date: 07/06/2024 22:29:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for zhubao_products
-- ----------------------------
DROP TABLE IF EXISTS `zhubao_products`;
CREATE TABLE `zhubao_products`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `certificate_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `query_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `declaration_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `product_shape` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `sample_quality` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `amplification` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `detection` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `detection_1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `image_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `qc_content` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ldentifier` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `supervisior` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of zhubao_products
-- ----------------------------
INSERT INTO `zhubao_products` VALUES (2, 'A20240607030641', 'S1717729601', '沉香', '如图', '16mm,15.25g', '带状薄壁组织', '瑞香科沉香属', 'Aquilaria sp.', 'uploads/9qjlVb9803SwQCHG2acuaZdRRaJTcZEo1cFHbtXh.jpg', '2024-06-07 14:50:05', 'A20240607030641S1717729601', '2024-06-07 14:50:05', 'aaa', 'aa');
INSERT INTO `zhubao_products` VALUES (3, 'A20240607032429', 'S1717730669', '沉香', '如图', '16mm,15.25g', '带状薄壁组织', '瑞香科沉香属', 'Aquilaria sp.', 'uploads/eqNmEYVYHOyYCaBg4Z332wlkBsqaIW5sqnexSCsX.jpg', '2024-06-07 14:50:06', 'A20240607032429S1717730669', '2024-06-07 14:50:06', 'aa', 'aa');
INSERT INTO `zhubao_products` VALUES (4, 'A20240607032441', 'S1717730681', '沉香', '如图', '16mm,15.25g', '带状薄壁组织', '瑞香科沉香属', 'Aquilaria sp.', 'uploads/FuDdYH286DvlFBwH6zljjzIhr9uEOwFAEE6VH9FK.jpg', '2024-06-07 14:50:08', 'A20240607032441S1717730681', '2024-06-07 14:50:08', 'aa', 'a');
INSERT INTO `zhubao_products` VALUES (5, 'A20240607032524', 'S1717730724', '沉香', '如图', '16mm,15.25g', '带状薄壁组织', '瑞香科沉香属', 'Aquilaria sp.', 'uploads/wHNDJDggMYz3pRLM4tvWl9q2dvBklDth5tXeWFHU.jpg', '2024-06-07 14:50:09', 'A20240607032524S1717730724', '2024-06-07 14:50:09', 'aa', 'aa');
INSERT INTO `zhubao_products` VALUES (6, 'A20240607032534', 'S1717730734', '沉香', '如图', '16mm,15.25g', '带状薄壁组织', '瑞香科沉香属', 'Aquilaria sp.', 'uploads/fg6qhr8cAFMbEvAZeBpH5ioPLaUCLexjllqDK4UW.jpg', '2024-06-07 14:50:10', 'A20240607032534S1717730734', '2024-06-07 14:50:10', 'aa', 'aa');
INSERT INTO `zhubao_products` VALUES (7, 'A20240607032552', 'S1717730752', '沉香', '如图', '16mm,15.25g', '带状薄壁组织', '瑞香科沉香属', 'Aquilaria sp.', 'uploads/rH11B0pjkq7jxuwmHK4hAq7FeZBcmz9WgGDtJwgJ.jpg', '2024-06-07 14:50:12', 'A20240607032552S1717730752', '2024-06-07 14:50:12', 'aa', 'a');

SET FOREIGN_KEY_CHECKS = 1;
