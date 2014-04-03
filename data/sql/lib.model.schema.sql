
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- bbsdata
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `bbsdata`;


CREATE TABLE `bbsdata`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(50),
	`author` VARCHAR(30),
	`mail` TEXT,
	`url` TEXT,
	`body` TEXT,
	`passwd` VARCHAR(15),
	`parent_id` INTEGER,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
);

#-----------------------------------------------------------------------------
#-- question
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `question`;


CREATE TABLE `question`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER,
	`title` TEXT,
	`stripped_title` VARCHAR(255),
	`body` TEXT,
	`html_body` TEXT,
	`interested_users` INTEGER default 0,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `question_stripped_title_unique` (`stripped_title`),
	INDEX `question_FI_1` (`user_id`),
	CONSTRAINT `question_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`)
);

#-----------------------------------------------------------------------------
#-- answer
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `answer`;


CREATE TABLE `answer`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`question_id` INTEGER,
	`user_id` INTEGER,
	`body` TEXT,
	`html_body` TEXT,
	`relevancy_up` INTEGER default 0,
	`relevancy_down` INTEGER default 0,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `answer_FI_1` (`question_id`),
	CONSTRAINT `answer_FK_1`
		FOREIGN KEY (`question_id`)
		REFERENCES `question` (`id`),
	INDEX `answer_FI_2` (`user_id`),
	CONSTRAINT `answer_FK_2`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`)
);

#-----------------------------------------------------------------------------
#-- user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;


CREATE TABLE `user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nickname` VARCHAR(50),
	`first_name` VARCHAR(100),
	`last_name` VARCHAR(100),
	`email` VARCHAR(100),
	`sha1_password` VARCHAR(40),
	`salt` VARCHAR(32),
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
);

#-----------------------------------------------------------------------------
#-- interest
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `interest`;


CREATE TABLE `interest`
(
	`question_id` INTEGER  NOT NULL,
	`user_id` INTEGER  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`question_id`,`user_id`),
	CONSTRAINT `interest_FK_1`
		FOREIGN KEY (`question_id`)
		REFERENCES `question` (`id`),
	INDEX `interest_FI_2` (`user_id`),
	CONSTRAINT `interest_FK_2`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`)
);

#-----------------------------------------------------------------------------
#-- relevancy
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `relevancy`;


CREATE TABLE `relevancy`
(
	`answer_id` INTEGER  NOT NULL,
	`user_id` INTEGER  NOT NULL,
	`score` INTEGER,
	`created_at` DATETIME,
	PRIMARY KEY (`answer_id`,`user_id`),
	CONSTRAINT `relevancy_FK_1`
		FOREIGN KEY (`answer_id`)
		REFERENCES `answer` (`id`),
	INDEX `relevancy_FI_2` (`user_id`),
	CONSTRAINT `relevancy_FK_2`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`)
);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
