CREATE TABLE IF NOT EXISTS `tbberita` (
`Id` int(11) NOT NULL AUTO_INCREMENT,
`Judul` varchar(100) NOT NULL,
`Berita` varchar(255) NOT NULL,
PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;
CREATE TABLE IF NOT EXISTS `tbcache` (
`Id` int(11) NOT NULL AUTO_INCREMENT,
`Query` varchar(100) NOT NULL,
`DocId` int(11) NOT NULL,
`Value` float NOT NULL,
PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;
CREATE TABLE IF NOT EXISTS `tbindex` (
`Id` int(11) NOT NULL AUTO_INCREMENT,
`Term` varchar(30) NOT NULL,
`DocId` int(11) NOT NULL,
`Count` int(11) NOT NULL,
`Bobot` float NOT NULL,
PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=364 ;
CREATE TABLE IF NOT EXISTS `tbstem` (
`Id` int(11) NOT NULL AUTO_INCREMENT,
`Term` varchar(30) NOT NULL,
`Stem` varchar(30) NOT NULL,
PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;
CREATE TABLE IF NOT EXISTS `tbvektor` (
`DocId` int(11) NOT NULL,
`Panjang` float NOT NULL,
PRIMARY KEY (`DocId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;