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



insert into product values(null, '松の実', 700, 'notyet');
insert into product values(null, 'くるみ', 270, 'notyet');
insert into product values(null, 'ひまわりの種', 210, 'notyet');
insert into product values(null, 'アーモンド', 220, 'notyet');
insert into product values(null, 'カシューナッツ', 250, 'notyet');
insert into product values(null, 'ジャイアントコーン', 180), 'notyet';
insert into product values(null, 'ピスタチオ', 310, 'notyet');
insert into product values(null, 'マカダミアナッツ', 600, 'notyet');
insert into product values(null, 'かぼちゃの種', 180, 'notyet');
insert into product values(null, 'ピーナッツ', 150, 'notyet');
insert into product values(null, 'aaa', 700, 'notyet');
