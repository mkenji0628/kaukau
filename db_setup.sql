CREATE DATABASE IF NOT EXISTS kaukau_db;

CREATE USER IF NOT EXISTS test_user
    IDENTIFIED BY '1234';

GRANT ALL ON kaukau_db.* TO test_user;




CREATE TABLE IF NOT EXISTS tasks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
	price int not null,
    status VARCHAR(10) NOT NULL DEFAULT 'notyet',
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);







CREATE DATABASE IF NOT EXISTS kaukau_db;

CREATE USER IF NOT EXISTS test_user
    IDENTIFIED BY '1234';

GRANT ALL ON kaukau_db.* TO test_user;



CREATE TABLE IF NOT EXISTS product (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
	price int not null,
);


CREATE TABLE IF NOT EXISTS product (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
	price int not null,
	status VARCHAR(10) NOT NULL DEFAULT 'notyet'
);



insert into product values(null, '松の実', 700, aaa);
insert into product values(null, 'くるみ', 270);
insert into product values(null, 'ひまわりの種', 210);
insert into product values(null, 'アーモンド', 220);
insert into product values(null, 'カシューナッツ', 250);
insert into product values(null, 'ジャイアントコーン', 180);
insert into product values(null, 'ピスタチオ', 310);
insert into product values(null, 'マカダミアナッツ', 600);
insert into product values(null, 'かぼちゃの種', 180);
insert into product values(null, 'ピーナッツ', 150);
insert into product values(null, 'クコの実', 400);