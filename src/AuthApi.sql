CREATE TABLE `now_auth_group` (
	`id` INT(10) NOT NULL AUTO_INCREMENT COMMENT '用户组表',
	`title` VARCHAR(80) NOT NULL COMMENT '用户组名称' COLLATE 'utf8mb4_general_ci',
	`rules` TEXT NULL COMMENT '用户组规则组' COLLATE 'utf8mb4_general_ci',
	`status` TINYINT(1) NOT NULL DEFAULT '1' COMMENT '用户组状态：1正常、0关闭',
	PRIMARY KEY (`id`)
) COMMENT='用户组表' COLLATE='utf8mb4_general_ci' ENGINE=InnoDB AUTO_INCREMENT=0;

CREATE TABLE `now_auth_group_access` (
	`user_id` BIGINT(16) NOT NULL COMMENT '用户id',
	`group_id` INT(10) NOT NULL COMMENT '用户组id',
	UNIQUE INDEX `uid` (`user_id`),
	UNIQUE INDEX `group_id` (`group_id`)
) COLLATE='utf8mb4_general_ci' ENGINE=InnoDB;


CREATE TABLE `now_auth_rule` (
	`id` INT(10) NOT NULL AUTO_INCREMENT COMMENT 'AUTH规则表',
	`pid` INT(10) NOT NULL DEFAULT '0' COMMENT '父级ID',
	`name` VARCHAR(80) NOT NULL COMMENT '规则名' COLLATE 'utf8mb4_general_ci',
	`method` VARCHAR(10) NOT NULL COMMENT 'REST method' COLLATE 'utf8mb4_general_ci',
	`title` VARCHAR(30) NULL DEFAULT NULL COMMENT '规则中文名' COLLATE 'utf8mb4_general_ci',
	`status` TINYINT(1) NOT NULL DEFAULT '1' COMMENT '规则状态：1正常、0关闭',
	PRIMARY KEY (`id`)
) COMMENT='AUTH规则表' COLLATE='utf8mb4_general_ci' ENGINE=InnoDB;


CREATE TABLE `now_users` (
	`id` BIGINT(16) NOT NULL AUTO_INCREMENT COMMENT '用户表',
	`username` VARCHAR(80) NOT NULL COMMENT '用户登录名' COLLATE 'utf8mb4_general_ci',
	`password` VARCHAR(255) NOT NULL COMMENT '用户密码' COLLATE 'utf8mb4_general_ci',
	`portrait` VARCHAR(255) NULL DEFAULT NULL COMMENT '用户头像' COLLATE 'utf8mb4_general_ci',
	`phone` VARCHAR(15) NULL DEFAULT NULL COMMENT '用户手杨号' COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(50) NULL DEFAULT NULL COMMENT '用户email' COLLATE 'utf8mb4_general_ci',
	`name` VARCHAR(50) NULL DEFAULT NULL COMMENT '用户姓名' COLLATE 'utf8mb4_general_ci',
	`last_time` INT(10) NULL DEFAULT NULL COMMENT '登录时间',
	`last_ip` VARCHAR(20) NULL DEFAULT NULL COMMENT '登录IP' COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`)
) COMMENT='用户表' COLLATE='utf8mb4_general_ci' ENGINE=InnoDB AUTO_INCREMENT=0;
