DROP TABLE IF EXISTS blog;
CREATE TABLE blog (
  id       int(6) unsigned zerofill NOT NULL auto_increment,
  account  int(6) default NULL,
  sdate    datetime default NULL,
  headline varchar(255) default NULL,
  story    text,
  PRIMARY KEY (id)
) TYPE=ISAM PACK_KEYS=1;

