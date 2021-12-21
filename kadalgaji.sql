-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 03:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kadalgaji`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jurnal` text DEFAULT NULL,
  `tugas` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `approve` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id`, `user_id`, `tanggal`, `jurnal`, `tugas`, `status`, `approve`) VALUES
(3, 1, '2021-11-26', 'Proses pembuatan tampilan aplikasi', 'Membuat tampilan aplikasi', 1, 1),
(4, 3, '2021-11-26', '', NULL, 1, 1),
(5, 2, '2021-11-26', '', 'Meeting dengan client', 0, 1),
(6, 2, '2021-11-28', NULL, NULL, 0, 1),
(7, 2, '2021-11-29', NULL, NULL, 1, 1),
(8, 2, '2021-12-15', '', NULL, 1, 1),
(9, 2, '2021-12-18', NULL, NULL, 0, 0),
(10, 3, '2021-12-18', '', NULL, 1, 1),
(11, 12, '2021-12-18', NULL, NULL, 0, 0),
(12, 2, '2021-12-19', '', NULL, 0, 1),
(13, 12, '2021-12-19', 'Web Bug fixed', NULL, 0, 0),
(14, 13, '2021-12-19', 'ok ', 'buatkan kopi kopiko', 0, 0),
(15, 2, '2021-12-20', '', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `kunci` varchar(255) NOT NULL,
  `jumlahA` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`kunci`, `jumlahA`) VALUES
('artikel', '<section class=\"testimonials\">\r\n        <div class=\"container\">\r\n          <div class=\"row\">\r\n            <div class=\"col\">\r\n              <h2>Berita</h2>\r\n            </div>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col\">\r\n              <div class=\"owl-carousel owl-theme owl-loaded\">\r\n                <div class=\"owl-stage-outer\">\r\n                  <div class=\"owl-stage\">\r\n                    <div class=\"owl-item testimonial\">\r\n                      <div class=\"card\">\r\n                        <div class=\"card-img\">\r\n                          <img src=\"img/users/john-fang.svg\" alt=\"john fang\">\r\n                        </div>\r\n                        <div class=\"card-body\">\r\n                          <h5 class=\"card-title\"><a href=\"#\">Investasi Properti, Peluang dan Tantangannya</a></h5>\r\n   <p class=\"job\">Admin</p>\r\n    <p class=\"card-text\" style=\"text-align:justify;\">Dalam jangka waktu beberapa tahun terakhir, trend untuk mengembangkan bisnis properti semakin tinggi. Developer bahlan mulai mengarahkan industri ini kepada kategori kondominium hotel. Kondominium ini merupakan apartemen yang disebut sebagai kondotel yang mempunyai ciri berbeda dibandingkan dengan apartemen biasa. Bagi yang sedang mencari produk investasi maka investasi properti memberikan peluang yang besar untuk ditekuni.</p>\r\n                        </div>\r\n                      </div>\r\n                    </div>\r\n                    <div class=\"owl-item testimonial\">\r\n                      <div class=\"card\">\r\n                        <div class=\"card-img\">\r\n                          <img src=\"img/users/jeny-doe.svg\" alt=\"jeny doe\">\r\n                        </div>\r\n                        <div class=\"card-body\">\r\n                          <h5 class=\"card-title\"><a href=\"#\">Inilah 4 Kerjasama Property Yang Bisa Diterapkan untuk Menunjang Bisnis Anda</a></h5>\r\n                          <p class=\"job\">Admin</p>\r\n                          <p class=\"card-text\" style=\"text-align:justify;\">Berbisnis tidak hanya masalah modal dan usaha, tetapi juga kemitraan. Bahkan dengan kemitraan, modal dan usaha bisa disiasati dengan lebih baik. Misalnya saja memulai usaha tanpa modal. Usaha tanpa modal sangat mungkin dilakukan dengan cara melakukan hubungan kemitraan atau kerjasama bisnis. Dalam bisnis propertipun juga sama, kerjasama bisa selalu bisa diterapkan. Untuk itu, berikut 4 tipe kerjasama bisnis property yang perlu kita ketahui.</p>\r\n                        </div>\r\n                      </div>\r\n                    </div>\r\n                    <div class=\"owl-item testimonial\">\r\n                      <div class=\"card\">\r\n                        <div class=\"card-img\">\r\n                          <img src=\"img/users/william.svg\" alt=\"William\">\r\n                        </div>\r\n                        <div class=\"card-body\">\r\n                          <h5 class=\"card-title\"><a href=\"#\">Saat Pandemi Covid, Properti Masih Menjadi Primadona Investasi</a></h5>\r\n                          <p class=\"job\">Admin</p>\r\n                          <p class=\"card-text\" style=\"text-align:justify;\">Properti dinilai masih menjadi primadona investasi karena memiliki nilai aset yang terus meningkat tanpa banyak mengalami fluktuasi dan risiko yang relatif cukup rendah. Safir Senduk, perencana keuangan di Safir Senduk & Rekan, mengatakan investasi properti dapat memberikan dua keuntungan sekaligus, yaitu pendapatan dari biaya sewa jika pemilik rumah menyewakan huniannya kepada pihak lain dan keuntungan dari penjualan properti ketika pemilik menjual propertinya saat nilainya meningkat</p>\r\n                        </div>\r\n                      </div>\r\n                    </div>\r\n                  </div>\r\n                </div>\r\n                <div class=\"owl-dots float-left\">\r\n                </div>\r\n                <div class=\"owl-nav float-right d-flex\">\r\n                  <div class=\"owl-prev mr-3\">\r\n                    <img src=\"img/icons/slider-control-disable.svg\" alt=\"slider prev\">\r\n                  </div>\r\n                  <div class=\"owl-next\">\r\n                    <img src=\"img/icons/slider-control-disable.svg\" alt=\"slider next\">\r\n                  </div>\r\n                </div>\r\n              </div>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </section>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gaji` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `nama`, `gaji`) VALUES
(1, 'App Developer', '2000000'),
(2, 'Sales', '150000'),
(4, 'CEO', '500000'),
(5, 'OB', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `kunci` varchar(255) NOT NULL,
  `jumlah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`kunci`, `jumlah`) VALUES
('beranda', '   \r\n<section id=\"my-properties\">\r\n        <div class=\"container\" data-aos=\"zoom-in\">\r\n          <div class=\"row text-center mb-3\">\r\n            <div class=\"col\">\r\n            </div>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-md-6 col-lg-4 mb-3\">\r\n              <div class=\"properti-box\">\r\n                <h4 class=\"properti-name\">Jasa Pembuatan Gedung</h4>\r\n                <img src=\"foto/gedung.png\" alt=\"gedung\" class=\"properti-img\" />\r\n                <a href=\"#\" class=\"btn btn-light properti-detail-button\">Show Details</a>\r\n              </div>\r\n            </div>\r\n            <div class=\"col-md-6 col-lg-4 mb-3\">\r\n              <div class=\"properti-box\">\r\n                <h4 class=\"properti-name\">Jasa Pembuatan Rumah</h4>\r\n                <img src=\"foto/rumah2.png\" alt=\"Rumah 2\" class=\"properti-img\" />\r\n                <a href=\"#\" class=\"btn btn-light properti-detail-button\">Show Details</a>\r\n              </div>\r\n            </div>\r\n            <div class=\"col-md-6 col-lg-4 mb-3\">\r\n              <div class=\"properti-box\">\r\n                <h4 class=\"properti-name\">Jasa Pembuatan Ruko</h4>\r\n                <img src=\"foto/ruko.png\" alt=\"Rumah 1\" class=\"properti-img\" />\r\n                <a href=\"#\" class=\"btn btn-light properti-detail-button\">Show Details</a>\r\n              </div>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </section>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `level` int(11) NOT NULL,
  `divisi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `notelp`, `foto`, `level`, `divisi_id`) VALUES
(2, 'Dadux', 'dadux@gmail.com', '60b1c3941468d7e8b3e32f3661033fa7f061ac40', '134314314', 'foto/787d449685aec991427548a62327d712.jpg', 2, 4),
(3, 'Rosy Anto', 'rosyanto@gmail.com', '60b1c3941468d7e8b3e32f3661033fa7f061ac40', '1212121', 'foto/600f24699c69e8dd12e39753f0657ce0.jpg', 1, 2),
(12, 'rommy', 'rommy@gmail.com', 'a7b82f16fbe71fec33fbd0a46f132647c3ff1915', '12121', 'foto/ac4c959f463b451edc9ff3feaeceb31e.jpg', 1, 1),
(13, 'mang oleh', 'contoh@gmail.com', 'b510a3cba6344ac1684de2b3156a7c4a6fef02ae', '', 'foto/747538d0335d2e27536fee64a3efebc0.png', 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`kunci`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`kunci`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `divisi_id` (`divisi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
