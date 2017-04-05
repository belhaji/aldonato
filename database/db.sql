CREATE TABLE accounts (
  id       INTEGER PRIMARY KEY AUTO_INCREMENT,
  login    VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  name     VARCHAR(255) NOT NULL,
  category VARCHAR(255) NOT NULL
);

CREATE TABLE requests (
  id          INTEGER PRIMARY KEY AUTO_INCREMENT,
  account_id  INTEGER,
  description TEXT,
  date        DATE,
  amount      DOUBLE,
  limit_date  DATE,
  picture     VARCHAR(255),
  status      SMALLINT,
  CONSTRAINT FOREIGN KEY (account_id) REFERENCES accounts (id)
);

CREATE TABLE donations (
  id          INTEGER PRIMARY KEY AUTO_INCREMENT,
  account_id  INTEGER,
  request_id  INTEGER,
  amount      DOUBLE,
  date        DATE,
  receiver_id INTEGER,
  CONSTRAINT FOREIGN KEY (account_id) REFERENCES accounts (id),
  CONSTRAINT FOREIGN KEY (request_id) REFERENCES requests (id),
  CONSTRAINT FOREIGN KEY (receiver_id) REFERENCES accounts (id)
);

CREATE TABLE requests_news (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  request_id INTEGER,
  account_id INTEGER,
  date DATE
);


CREATE TABLE donations_news (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  donation_id INTEGER,
  account_id INTEGER,
  date DATE
);
