
#
# Table structure for table 'tx_ecxprjgreinertc_test'
#
CREATE TABLE tx_ecxprjgreinertc_test (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	type int(11) DEFAULT '0' NOT NULL,
	sorting int(10) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	starttime int(11) DEFAULT '0' NOT NULL,
	endtime int(11) DEFAULT '0' NOT NULL,
	title varchar(120) DEFAULT '' NOT NULL,
	image text NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);


#
# Table structure for table 'pages'
#
CREATE TABLE pages (
	tx_ecxprjgreinertc_menuitemclass varchar(120) NOT NULL DEFAULT '0',
);


#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
	tx_ecxprjgreinertc_showSubtitle int(11) NOT NULL DEFAULT '0',
);