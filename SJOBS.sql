

CREATE TABLE business (
  
  business_id mediumint(8) UNSIGNED NOT NULL,

  business_name varchar(50) NOT NULL,

  business_email varchar(50) NOT NULL,

  business_description varchar(50) NOT NULL,

  business_image varchar(200) NOT NULL,

   PRIMARY KEY (business_id);
)



INSERT INTO business (business_name, business_email, business_description, business_image) 
VALUES
('Sant Josep Obrer', 'sjosec@santjosepobrer.com', 'Colegio donde estudiamos', 'http://www.santjosepobrer.es/Logo_SJS.jpg');




CREATE TABLE offers (
  
  offer_id mediumint(8) UNSIGNED NOT NULL,
  
  offer_title varchar(50) NOT NULL,
 
  offer_description varchar(250) NOT NULL,
  
  publication_date datetime NOT NULL,
  
  end_date datetime DEFAULT NULL,

  business_id mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (offer_id)
  FOREIGN KEY (business_id) REFERENCES business (business_id) on delete no action on update no action

)

CREATE TABLE users (
  
  user_id mediumint(8) UNSIGNED NOT NULL,

  user_name varchar(50) NOT NULL,

  surname varchar(50) NOT NULL,

  user_email varchar(50) NOT NULL,

  password char(40) NOT NULL
, 
  PRIMARY KEY (user_id)
)



INSERT INTO users (user_name, surname, user_email, password) 

VALUES
('admin', 'SJOBS', 'admin@adminsjobs.es', SHA1('admin')),

('oscar', 'cobo', 'ocobo97@gmail.com', SHA1('oscar')),

('fran', 'sarciat', 'fransarciat@gmail.com', SHA1('fran')),

('adrian', 'valenzuela', 'avgvalenzuela@gmail.com', SHA1('adrian'));

