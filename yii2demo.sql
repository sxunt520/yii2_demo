/*
Navicat MySQL Data Transfer

Source Server         : www
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : yii2demo

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2020-08-30 08:34:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `goods`
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '11111');
INSERT INTO `goods` VALUES ('2', '22222');
INSERT INTO `goods` VALUES ('3', '333');
INSERT INTO `goods` VALUES ('4', '444');
INSERT INTO `goods` VALUES ('5', '555');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `auth_key` varchar(32) NOT NULL COMMENT '自动登录key',
  `password_hash` varchar(255) NOT NULL COMMENT '加密密码',
  `password_reset_token` varchar(255) DEFAULT NULL COMMENT '重置密码token',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `role` smallint(6) NOT NULL DEFAULT '10' COMMENT '角色等级',
  `status` smallint(6) NOT NULL DEFAULT '10' COMMENT '状态',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  `access_token` varchar(255) DEFAULT '' COMMENT 'access-token',
  `allowance` int(11) unsigned DEFAULT '5' COMMENT '剩余的允许的请求数量',
  `allowance_updated_at` int(11) unsigned DEFAULT '0' COMMENT '相应的UNIX时间戳数',
  `api_token` varchar(255) DEFAULT '' COMMENT 'api_token',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('6', 'sxunt520', 'KZhXGf9YuuQUvkDvq2i5ruz_mODEqWFE', '$2y$13$H3arYZ7R7fcnCPwkemOlPOV1GGUED7xN43c6kKOhqjpDEMzjjfX7G', null, 'sxunt520@163.com', '10', '10', '1598512693', '1598512693', '', '4', '0', '');
INSERT INTO `user` VALUES ('10', 'admin', '-vwn0lbGUi9qG3BBfjyFLiWj99o03rtC', '$2y$13$Qwv7CyKYR3FXOO1KTC91BuWDBoGKOIld4hl78uUwvPdqvt.7gx2Ke', null, '', '10', '10', '1598685461', '1598720313', '', '4', '1598720313', 'ZxG8txQp5MskzU7LBuWqeh7Ia8FQUEki_1598685517');
