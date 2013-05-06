DROP TABLE IF EXISTS event;
CREATE TABLE event (
  id          int(6) unsigned zerofill NOT NULL auto_increment,
  account     int(6) default NULL,
  sdate       datetime default NULL,
  title       varchar(255) default NULL,
  description text,
  PRIMARY KEY (id)
) TYPE=ISAM PACK_KEYS=1;

