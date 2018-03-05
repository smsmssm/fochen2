CREATE TABLE `tmaster` (                                 
           `id` int(8) unsigned NOT NULL auto_increment,          
           `Fgroup` int(1) NOT NULL default '2',                  
           `FCompanyId` int(8) NOT NULL,                          
           `Farticle_num` int(5) NOT NULL default '0',            
           `Farticle_adopt` int(5) NOT NULL default '0',          
           PRIMARY KEY  (`id`)                                    
         ) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 


group 0管理员  1：超级用户  2：一般用户