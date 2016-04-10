CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `openid` varchar(50) NOT NULL DEFAULT '',
  `mobile` varchar(18) DEFAULT NULL,
  `address` varchar(256) NOT NULL DEFAULT '',
  `header_img` varchar(128) NOT NULL DEFAULT '',
  `note` varchar(256) NOT NULL DEFAULT '',
  `gender` varchar(128) NOT NULL DEFAULT '',
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8

CREATE TABLE `tbl_campaigns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(20) NOT NULL DEFAULT '',
  `contact_us_info` varchar(256) NOT NULL DEFAULT '',
  `description` varchar(128) NOT NULL DEFAULT '',
  `start_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hints` varchar(256) NOT NULL DEFAULT '',
  `duplicate_reply` varchar(256) NOT NULL DEFAULT '',
  `end_title` varchar(20) NOT NULL DEFAULT '',
  `end_description` varchar(256) NOT NULL DEFAULT '',
  `is_random` int(1) NOT NULL DEFAULT '1',
  `total_limit_num` int(5) NOT NULL DEFAULT '0',
  `each_limit_num` int(5) NOT NULL DEFAULT '0',
  `is_launched` int(1) NOT NULL DEFAULT '0',
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8

CREATE TABLE `tbl_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_id` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(20) NOT NULL DEFAULT '',
  `num` int(18) NOT NULL DEFAULT '0',
  `pic` varchar(128) NOT NULL DEFAULT '',
  `odds` int(4) NOT NULL DEFAULT '5',
  `nth` int(4) NOT NULL DEFAULT '10',
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8

CREATE TABLE `tbl_sn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL DEFAULT '',
  `is_redeem` int(1) NOT NULL DEFAULT '0',
  `price_id` varchar(20) NOT NULL DEFAULT '',
  `user_id` varchar(20) NOT NULL DEFAULT '',
  `redeem_time` timestamp NOT NULL DEFAULT '2000-01-01 00:00:00',
  `redeem_note` varchar(256) NOT NULL DEFAULT '',
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8