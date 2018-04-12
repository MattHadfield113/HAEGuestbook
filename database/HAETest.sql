CREATE TABLE guestbook
(
  id            INT AUTO_INCREMENT
    PRIMARY KEY,
  post_approved TINYINT(1) DEFAULT '0' NOT NULL,
  post_by       TEXT                   NOT NULL,
  post_title    TEXT                   NOT NULL,
  post_content  TEXT                   NOT NULL
)
  ENGINE = InnoDB;

CREATE TABLE users
(
  id       INT AUTO_INCREMENT
    PRIMARY KEY,
  username TEXT NOT NULL,
  password TEXT NOT NULL,
  email    TEXT NOT NULL
)
  ENGINE = InnoDB;

