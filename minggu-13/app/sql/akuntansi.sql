-- web_crud.`member` definition

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kode_pos` varchar(30) NOT NULL,
  `kelas` int(1) NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- web_crud.`transaction` definition

CREATE TABLE `transaction` (
  `id_transaction` int(2) NOT NULL AUTO_INCREMENT,
  `id_user` int(2) DEFAULT NULL,
  `id_member` int(2) DEFAULT NULL,
  `nominal` varchar(256) NOT NULL,
  `type` int(1) NOT NULL,
  PRIMARY KEY (`id_transaction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- web_crud.`user` definition

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO web_crud.`user`
(id_user, username, password)
VALUES(25, 'ainul', '12345');

INSERT INTO web_crud.`member`
(id_member, first_name, last_name, kota, provinsi, kode_pos, kelas)
VALUES(7, 'fira', 'kamila', 'surabaya', 'jatim', '66112', 1);
INSERT INTO web_crud.`member`
(id_member, first_name, last_name, kota, provinsi, kode_pos, kelas)
VALUES(12, 'Ainul', 'Yaqin', 'Kota Surabaya', 'jatim 2', '60128', 2);
INSERT INTO web_crud.`member`
(id_member, first_name, last_name, kota, provinsi, kode_pos, kelas)
VALUES(13, 'David', 'Immanuel', 'Kota Surabaya', 'jawa timur', '60128', 1);