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


Fstyle   �������1:���ġ�2:����
Fis_self �Ƿ�ԭ����1:ԭ����0:ת��
Fis_adopt �Ƿ���� -1���¼ܡ�0:�ѷ���δͨ����� 1���Ѿ�ͨ�����
Fcid      ��˾id
Fcommend  0û���Ƽ� 1���Ƽ�
Fis_submit 0û�ύ 1�ύ��

<option value="1">erp��Ѷ</option>
                <option value="2">erp֪ʶ</option>
                <option value="3">erpѧϰ</option>
                <option value="4">erp��̸</option>
                <option value="5">erpʵʩ</option>
                <option value="6">erpѡ��</option>
                <option value="7">erp����</option>
                <option value="8">erp����</option>
                <option value="9">�����</option>

