-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2024 at 10:30 AM
-- Server version: 5.7.41
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaweitku_produk`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `foto`, `deskripsi`) VALUES
(6, 4, 'Anggur', 'WhatsApp Image 2024-01-10 at 20.02.41.jpeg', 'Anggur berbiji ganda adalah varietas anggur yang memiliki lebih dari satu biji di dalamnya. produk ini biasanya kecil hingga sedang, berwarna merah, ungu, hijau, atau kuning, tergantung pada jenis varietasnya. Anggur ini memiliki rasa manis, segar, dan biji yang memberikan tekstur kenyal. Cocok untuk dikonsumsi segar, dibuat jus, atau diolah menjadi produk lain seperti selai atau anggur kering. Meskipun ada varietas tanpa biji, anggur berbiji ganda tetap populer untuk pengalaman makan yang lebih kompleks.'),
(8, 4, 'Jeruk', 'WhatsApp Image 2024-01-10 at 19.39.21.jpeg', 'Jeruk adalah produk yang berbiji ganda, dimana bijinya terlindungi oleh daging produk yang tebal. Kulitnya umumnya berwarna oranye, bersisik, dan dapat dikupas. Dagingnya juicy, manis, dan asam pada saat yang bersamaan, memberikan rasa segar dan kenikmatan saat dikonsumsi. Jeruk kaya akan vitamin C dan serat, menjadikannya produk yang sehat dan populer di seluruh dunia'),
(9, 3, 'Pace', 'Noni_fruit_dev.jpg', 'Pada beberapa jenis tumbuhan, seperti pace, bunga muncul secara teratur dan terus menerus sepanjang tahun, sehingga kita dapat melihat adanya bunga, pentil (produk muda) dan produk masak pada waktu yang bersamaan di satu pohon'),
(10, 4, 'Semangka', 'WhatsApp Image 2024-01-10 at 20.32.39.jpeg', 'Semangka adalah produk yang besar, berkulit hijau tua atau hijau muda, dengan daging produk berwarna merah muda atau merah terang. produk ini memiliki biji hitam yang terdapat dalam daging produknya. Daging semangka memiliki rasa manis, segar, dan sangat juicy. Biasanya dikonsumsi secara langsung, dipotong-potong, atau dibuat menjadi jus. Selain rasanya yang menyegarkan, semangka juga sering menjadi pilihan untuk menghidrasi tubuh karena kandungan airnya yang tinggi.'),
(11, 3, 'Nangka', '030346400_1605083468-Manfaat-produk-Nangka_-Cegah-Sembelit-hingga-Kanker-shutterstock_1116553757.jpg', 'Nangka adalah nama sejenis pohon, sekaligus produknya. Pohon nangka termasuk ke dalam suku Moraceae; nama ilmiahnya adalah Artocarpus heterophyllus. Dalam bahasa Inggris, nangka dikenal sebagai jackfruit.'),
(12, 3, 'Durian', '20231205-durian.jpg', 'Durian adalah nama tumbuhan tropis yang berasal dari wilayah Asia Tenggara, sekaligus nama produknya yang bisa dimakan. Nama ini diambil dari ciri khas kulit produknya yang keras dan berlekuk-lekuk tajam sehingga menyerupai duri. Sebutan populernya adalah \"raja dari segala produk\" (King of Fruit). Durian adalah produk yang kontroversial, meskipun banyak orang yang menyukainya, tetapi sebagiannya kurang menyukai dengan aromanya'),
(13, 1, 'Persik', 'WhatsApp Image 2024-01-10 at 20.35.54.jpeg', 'produk persik memiliki kulit halus berwarna merah muda atau oranye, dengan daging kuning atau oranye yang lembut dan juicy. Rasanya manis dengan sentuhan keasaman yang menyegarkan. Terdapat biji tunggal di tengah produk. Persik sering dikonsumsi segar, dalam salad produk, atau diolah menjadi jus atau selai.'),
(14, 1, 'Alpukat', 'WhatsApp Image 2024-01-10 at 20.38.25.jpeg', 'produk alpukat memiliki kulit hijau gelap dan bentuk bulat atau oval. Daging produknya berwarna hijau atau kuning lembut, berbentuk creamy dengan tekstur yang lembut dan buttery. Alpukat memiliki biji besar di tengahnya. Rasanya kaya dan creamy dengan sentuhan lemak yang sehat. produk ini sering digunakan dalam berbagai hidangan, seperti guacamole, salad, atau sebagai tambahan dalam sandwich.'),
(15, 1, 'Rambutan', 'WhatsApp Image 2024-01-10 at 20.40.44.jpeg', 'produk rambutan memiliki kulit merah atau kuning yang berbulu dan lembut. Bentuknya bulat dengan daging produk yang transparan dan berair. Daging produknya manis dengan rasa segar dan sedikit keasaman. Di tengah daging, terdapat biji yang terpisah dengan mudah. Rambutan sering dikonsumsi segar sebagai produk camilan, dan rasanya sangat populer karena kelezatan dan keunikannya.');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'produk Tunggal'),
(3, 'produk Majemuk'),
(4, 'produk Ganda');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'siswa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
