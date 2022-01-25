CREATE TABLE IF NOT EXISTS `jobs`
(
    `row`      INT(11) AUTO_INCREMENT,
    `jobid`    TEXT,
    `type`     TEXT,
    `user`     TEXT,
    `title`    TEXT,
    `describe` TEXT,
    `skills`   TEXT,
    `datetime` TEXT,
    `closed`   TEXT,
    `price`    TEXT,
    `person`   TEXT,
    `status`   TEXT,
    `views`    TEXT,
    `stars`    TEXT,
    `nes`      TEXT,
    PRIMARY KEY (`row`)
);

CREATE TABLE IF NOT EXISTS `messages`
(
    `row`      INT(11) AUTO_INCREMENT,
    `msgid`    TEXT,
    `fullname` TEXT,
    `email`    TEXT,
    `phone`    TEXT,
    `message`  TEXT,
    `datetime` TEXT,
    `stat`     TEXT,
    PRIMARY KEY (`row`)
);

CREATE TABLE IF NOT EXISTS `people`
(
    `row`       INT(11) AUTO_INCREMENT,
    `id`        TEXT,
    `bio`       TEXT,
    `firstname` TEXT,
    `lastname`  TEXT,
    `phone`     TEXT,
    `email`     TEXT,
    `password`  TEXT,
    `join`      TEXT,
    `stars`     TEXT,
    `status`    TEXT,
    `views`     TEXT,
    `active`    TEXT,
    `token`     TEXT,
    `theme`     TEXT,
    `2fa`       TEXT,
    `2facode`   TEXT,
    `verified`  TEXT,
    `awesome`   TEXT,
    PRIMARY KEY (`row`)
);

CREATE TABLE IF NOT EXISTS `reports`
(
    `row`      INT(11) AUTO_INCREMENT,
    `reportid` TEXT,
    `user`     TEXT,
    `datetime` TEXT,
    PRIMARY KEY (`row`)
);

CREATE TABLE IF NOT EXISTS `ticks`
(
    `row`      INT(11) AUTO_INCREMENT,
    `tikid`    TEXT,
    `user`     TEXT,
    `title`    TEXT,
    `describe` TEXT,
    `datetime` TEXT,
    `answered` TEXT,
    `status`   TEXT,
    PRIMARY KEY (`row`)
);

CREATE TABLE IF NOT EXISTS `applies`
(
    `row`    INT(11) AUTO_INCREMENT,
    `dt`     TEXT,
    `job`    TEXT,
    `userid` TEXT,
    PRIMARY KEY (`row`)
);

CREATE TABLE IF NOT EXISTS `requests`
(
    `row`    INT(11) AUTO_INCREMENT,
    `type`   TEXT,
    `userid` TEXT,
    `reqid`  TEXT,
    `dt`     TEXT,
    `status` TEXT,
    PRIMARY KEY (`row`)
);

CREATE TABLE IF NOT EXISTS `skills`
(
    `row`          INT(11) AUTO_INCREMENT,
    `user`         TEXT,
    `skill_id`     TEXT,
    `skill_name`   TEXT,
    `skill_number` TEXT,
    PRIMARY KEY (`row`)
);

CREATE TABLE IF NOT EXISTS `socialmedia`
(
    `row`          INT(11) AUTO_INCREMENT,
    `user`         TEXT,
    `social_id`    TEXT,
    `social_media` TEXT,
    `social_link`  TEXT,
    PRIMARY KEY (`row`)
);