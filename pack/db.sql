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
    `starts`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `status`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`row`)
);

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
    PRIMARY KEY (`row`)
);