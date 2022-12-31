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
        is_one_way_list tinyint(4) unsigned DEFAULT 0 NOT NULL,
);

#
# Table structure for table 'tx_rhmajordomo_domain_model_emailverification'
#

CREATE TABLE tx_rhmajordomo_domain_model_emailverification (
	emaillist_id int(11) NOT NULL,
	email_hash varchar(255) NOT NULL,
	secret varchar(255) NOT NULL,
        register tinyint(4) unsigned DEFAULT 0 NOT NULL,
);
