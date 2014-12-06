-- ----------------------------------------------------------------------------------------------
-- install.sql
-- Файл таблиц баз данных плагина Idea
--
-- @author      Андрей Воронов <andreyv@gladcode.ru>
-- @copyrights  Copyright © 2014, Андрей Воронов
--              Является частью плагина Idea
-- @version     0.0.1 от $DATE$
-- ----------------------------------------------------------------------------------------------

CREATE TABLE `prefix_idea` (
  `idea_id`      INT(11) NOT NULL AUTO_INCREMENT,
  `idea_user_id` INT(11) NOT NULL,
  `idea_link`    INT(11) NULL,
  `idea_text`    TEXT    NULL,
  PRIMARY KEY (`idea_id`),
  KEY `user_index` (`idea_user_id`)
)
  ENGINE =MyISAM
  DEFAULT CHARSET =utf8
  AUTO_INCREMENT =1;

