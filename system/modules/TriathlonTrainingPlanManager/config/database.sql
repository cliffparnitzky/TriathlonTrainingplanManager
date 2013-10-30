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
  `kindOfSport` varchar(5) NOT NULL default '',
  `performanceClass` varchar(3) NOT NULL default '',
  `trainingInstructions` blob NOT NULL,
  `comment` text NULL,
  `published` char(1) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8; 

-- 
-- Table `tl_module`
-- 

CREATE TABLE `tl_module` (
  `triathlonLeagueRatingType` varchar(255) NOT NULL default '',
  `triathlonLeagueColumns` varchar(255) NOT NULL default '',
  `triathlonLeagueTable` blob NULL,
  `triathlonLeagueAutoSortTable` char(1) NOT NULL default '',
  `triathlonLeagueUpdateDate` varchar(255) NOT NULL default '',
  `triathlonLeagueRaceCount` varchar(255) NOT NULL default '',
  `triathlonLeagueTableTemplate` varchar(255) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
 