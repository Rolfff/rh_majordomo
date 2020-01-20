#
# Table structure for table 'tx_rhmajordomo_domain_model_emaillist'
#
CREATE TABLE tx_rhmajordomo_domain_model_emaillist (

	digest_name varchar(255) DEFAULT '' NOT NULL,
	list_name varchar(255) DEFAULT '' NOT NULL,
	list_email_address varchar(255) DEFAULT '' NOT NULL,
	email_moderator varchar(255) DEFAULT '' NOT NULL,
	approve_passwd varchar(255) DEFAULT '' NOT NULL,
	majordomo_mail_box varchar(255) DEFAULT '' NOT NULL,

);
