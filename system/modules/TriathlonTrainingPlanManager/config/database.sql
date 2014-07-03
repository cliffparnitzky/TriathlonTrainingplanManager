-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************

-- 
-- Table `tl_triathlon_training_plans`
-- 

CREATE TABLE `tl_triathlon_training_plans` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tstamp` int(10) unsigned NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `date` varchar(11) NOT NULL default '',
  `kindOfSport` varchar(20) NOT NULL default '',
  `assignmentForPerformanceClass` char(1) NOT NULL default '',
  `assignmentPerformanceClass` varchar(255) NOT NULL default '',
  `assignmentForMembers` char(1) NOT NULL default '',
  `assignmentMembers` blob NULL,
  `assignmentForMemberGroups` char(1) NOT NULL default '',
  `assignmentMemberGroups` blob NULL,
  `instructions` blob NOT NULL,
  `comment` text NULL,
  `published` char(1) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8; 

-- 
-- Table `tl_module`
-- 

-- CREATE TABLE `tl_module` (
--   `triathlonLeagueRatingType` varchar(255) NOT NULL default '',
--   `triathlonLeagueColumns` varchar(255) NOT NULL default '',
--   `triathlonLeagueTable` blob NULL,
--   `triathlonLeagueAutoSortTable` char(1) NOT NULL default '',
--   `triathlonLeagueUpdateDate` varchar(255) NOT NULL default '',
--   `triathlonLeagueRaceCount` varchar(255) NOT NULL default '',
--   `triathlonLeagueTableTemplate` varchar(255) NOT NULL default ''
-- ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Table `tl_content`
-- 

CREATE TABLE `tl_content` (
  `triathlonTrainingPlanSource` varchar(64) NOT NULL default '',
  `triathlonTrainingPlan` int(10) unsigned NOT NULL default '0',
  `triathlonTrainingPlanTemplate` varchar(255) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
 