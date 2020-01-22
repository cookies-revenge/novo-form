
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- nft__authors
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `nft__authors`;

CREATE TABLE `nft__authors`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `crdate` INTEGER DEFAULT 0 NOT NULL,
    `tstamp` INTEGER DEFAULT 0 NOT NULL,
    `title` VARCHAR(128) NOT NULL,
    `upvotes` INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- nft__books
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `nft__books`;

CREATE TABLE `nft__books`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `crdate` INTEGER DEFAULT 0 NOT NULL,
    `tstamp` INTEGER DEFAULT 0 NOT NULL,
    `title` VARCHAR(128) NOT NULL,
    `subtitle` VARCHAR(256) NOT NULL,
    `total_pages` INTEGER DEFAULT 0 NOT NULL,
    `publish_date` INTEGER DEFAULT 0 NOT NULL,
    `abstract` TEXT,
    `genre_id` INTEGER DEFAULT 0 NOT NULL,
    `author_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `nft__books_fi_043ea7` (`author_id`),
    CONSTRAINT `nft__books_fk_043ea7`
        FOREIGN KEY (`author_id`)
        REFERENCES `nft__authors` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- nft__chapter
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `nft__chapter`;

CREATE TABLE `nft__chapter`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `crdate` INTEGER DEFAULT 0 NOT NULL,
    `tstamp` INTEGER DEFAULT 0 NOT NULL,
    `title` VARCHAR(128) NOT NULL,
    `total_pages` INTEGER DEFAULT 0 NOT NULL,
    `book_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `nft__chapter_fi_0b213b` (`book_id`),
    CONSTRAINT `nft__chapter_fk_0b213b`
        FOREIGN KEY (`book_id`)
        REFERENCES `nft__books` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
