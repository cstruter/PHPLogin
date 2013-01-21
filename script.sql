CREATE TABLE users (
  userID int(11) NOT NULL AUTO_INCREMENT,
  email varchar(255) NOT NULL,
  pass char(32) NOT NULL,
  PRIMARY KEY (userID)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;
 
-- Insert Query
INSERT INTO users(email, pass)
VALUES('admin@yourdomain.com', MD5('123456'))
 