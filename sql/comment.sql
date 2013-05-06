DROP TABLE IF EXISTS comment;
CREATE TABLE comment (
  id      int(6) unsigned zerofill NOT NULL auto_increment,
  blog    int(6) not NULL,
  parent  int(6) default NULL,
  cdate   datetime default NULL,
  name    varchar(255) default NULL,
  email   varchar(255) default NULL,
  subject varchar(255) default NULL,
  comment   text,
  PRIMARY KEY (id)
) TYPE=ISAM PACK_KEYS=1;

