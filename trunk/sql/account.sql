DROP TABLE IF EXISTS account;
CREATE TABLE account (
  id       int(6) unsigned zerofill NOT NULL auto_increment,
  login    varchar(32) NOT NULL,
  password varchar(32) NOT NULL,
  name     varchar(50),
  email    varchar(200),
  avatar   varchar(50) DEFAULT 'default.jpg',
  PRIMARY KEY (id),
  UNIQUE(login)
);

