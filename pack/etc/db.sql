-- MariaDB dump 10.19  Distrib 10.5.11-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: jobnic
-- ------------------------------------------------------
-- Server version	10.5.11-MariaDB

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`
(
    `row`      int(11) NOT NULL AUTO_INCREMENT,
    `jobid`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `type`     text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `user`     text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `title`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `describe` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `skills`   text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `datetime` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `closed`   text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `price`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `person`   text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `status`   text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `views`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `stars`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `nes`      text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`row`)
);

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages`
(
    `row`      int(11) NOT NULL AUTO_INCREMENT,
    `msgid`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `fullname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `email`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `phone`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `message`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `datetime` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `stat`     text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`row`)
);

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE `people`
(
    `row`       int(11) NOT NULL AUTO_INCREMENT,
    `id`        text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `bio`       text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `firstname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `lastname`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `phone`     text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `email`     text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `password`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `twitter`   text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `linkedin`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `instagram` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `github`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `telegram`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `skills`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `join`      text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `stars`     text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `status`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `views`     text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `facebook`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `active`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `token`     text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `theme`     text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `2fa`       text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `2facode`   text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `verified`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `awesome`   text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`row`)
);

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports`
(
    `row`      int(11) NOT NULL AUTO_INCREMENT,
    `reportid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `user`     text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `datetime` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`row`)
);

--
-- Table structure for table `ticks`
--

DROP TABLE IF EXISTS `ticks`;
CREATE TABLE `ticks`
(
    `row`      int(11) NOT NULL AUTO_INCREMENT,
    `tikid`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `user`     text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `title`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `describe` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `datetime` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `answered` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `status`   text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`row`)
);

--
-- Table structure for table `applies`
--

DROP TABLE IF EXISTS `applies`;
CREATE TABLE `applies`
(
    `row`    int(11) NOT NULL AUTO_INCREMENT,
    `dt`     text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `job`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `userid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`row`)
);

--
-- Table structure for table `applies`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests`
(
    `row`    int(11) NOT NULL AUTO_INCREMENT,
    `type`   text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `userid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `reqid`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `dt`     text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`row`)
);