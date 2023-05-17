CREATE DATABASE `chatter`;
USE `chatter`;

drop table if exists `users`;
drop table if exists `messages`;
drop table if exists `groups`;
drop table if exists `friends`;
drop table if exists `membership`;  /* membership to a group i.e. relationship table */

CREATE TABLE `users`(
	`userid` int not null auto_increment,
    `uniqueid` varchar(255),
    `username` varchar(255) not null,
    `email` varchar(255) not null,
    `password` varchar(255) not null,
    `profile` varchar(255) default("Default.png"),
    `status` varchar(10) default("Online"),
    `datejoined` date,
    primary key(`userid`)
);

CREATE TABLE `messages`(
	`msgid` int not null auto_increment,
    `message` varchar(1000) not null,
    `senderid` int not null,
    `receipientid` int not null,
    `timesent` date not null,
    primary key(`msgid`),
    `msgstatus` varchar(10) default("unread")
);
