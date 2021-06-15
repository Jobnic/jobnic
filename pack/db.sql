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
    PRIMARY KEY (`row`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

INSERT INTO people (row, id, bio, firstname, lastname, phone, email, password, twitter, linkedin, instagram, github,
                    telegram, skills)
VALUES (1, '458749', 'Hello<br>I am Amir', 'Amirhossein', 'Mohammadi', '9014784362', 'amir@yahoo.com', '123456',
        'GNU_Amir',
        'amirhosseinmohammadi', 'leonardo_l_larson', 'BlackIQ', 'BlackIQ', 'python-50 php-70 c-20');

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
    `status`   text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`row`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

INSERT INTO jobs (row, jobid, type, user, title, `describe`, skills, status)
VALUES (1, '15948', 'programming', '458749', 'Android Programming', 'We need a Kotlin developer', 'php kotlin linux',
        'true');