CREATE TABLE `informasi_wisata` (\n `id_wisata` int(10) NOT NULL AUTO_INCREMENT,\n `nama_wisata` varchar(50) NOT NULL,\n `id_user` varchar(10) NOT NULL,\n `deskripsi` text NOT NULL,\n `alamat` varchar(100) DEFAULT NULL,\n `harga_tiket` varchar(100) NOT NULL,\n `jadwal` varchar(100) NOT NULL,\n `gambar` text NOT NULL,\n `coordinate` varchar(100) NOT NULL,\n `linkmaps` varchar(100) NOT NULL,\n PRIMARY KEY (`id_wisata`),\n KEY `id_pengelola` (`id_user`),\n CONSTRAINT `informasi_wisata_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE\n) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci"}}