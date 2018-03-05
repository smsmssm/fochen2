create table if not exists t_content
(
	id				int		not null AUTO_INCREMENT,
        Fsubmiter		        varchar(255)		not null default '',
	Ftitle				varchar(255)		not null default '',
	Fcompany                      varchar(255)		not null default '',
        Fstyle				int(1)		not null default 1,
	Fauthor		                varchar(255)		not null default '',
	Fcontent			text			not null default '',
	Fcreate_time			datetime	not null default '0000-00-00 00:00:00',
        Fis_self                        int(1)       not null default 0,
        Fis_adopt                       int             not null default -1,
        Fcid                          varchar(255)       not null default '',
        Fcommend                        int(1)           not null default 0,
        Fis_submit                      int(1)           not null default 0,
        primary key (id),
        index(Fsubmiter),
        index(Ftitle)
        
);


Fstyle   文章类别：1:网文、2:新闻
Fis_self 是否原创：1:原创、0:转载
Fis_adopt 是否被审核 -1：下架、0:已发表但未通过审核 1：已经通过审核
Fcid      公司id
Fcommend  0没被推荐 1被推荐
Fis_submit 0没提交 1提交了

<option value="1">erp资讯</option>
                <option value="2">erp知识</option>
                <option value="3">erp学习</option>
                <option value="4">erp访谈</option>
                <option value="5">erp实施</option>
                <option value="6">erp选型</option>
                <option value="7">erp方案</option>
                <option value="8">erp案例</option>
                <option value="9">活动宣传</option>

