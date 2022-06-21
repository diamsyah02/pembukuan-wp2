-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 02:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembukuan`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_marketplace`
--

CREATE TABLE `mst_marketplace` (
  `id` int(11) NOT NULL,
  `name_marketplace` varchar(100) NOT NULL,
  `percent_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_marketplace`
--

INSERT INTO `mst_marketplace` (`id`, `name_marketplace`, `percent_fee`) VALUES
(1, 'Tokopedia', 2),
(3, 'Bukalapak', 3),
(4, 'Bli Bli', 2),
(5, 'Lazada', 3),
(6, 'Shopee', 4),
(7, 'Blanja', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mst_produk`
--

CREATE TABLE `mst_produk` (
  `id` int(11) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `price_buy` int(11) NOT NULL DEFAULT 0,
  `price_sale` int(11) NOT NULL DEFAULT 0,
  `stock` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_produk`
--

INSERT INTO `mst_produk` (`id`, `name_product`, `price_buy`, `price_sale`, `stock`) VALUES
(1, 'Pakan Kucing Angora 500gr', 31000, 40000, 26),
(2, 'Pakan Kucing Persia 500gr', 50000, 75000, 30);

-- --------------------------------------------------------

--
-- Table structure for table `trx_pembelian`
--

CREATE TABLE `trx_pembelian` (
  `id` int(11) NOT NULL,
  `mst_produk_id` int(11) NOT NULL,
  `mst_marketplace_id` int(11) NOT NULL,
  `mst_user_id` int(11) NOT NULL,
  `detail_marketplace` varchar(100) DEFAULT '',
  `qty` int(11) NOT NULL DEFAULT 0,
  `price_produk` int(11) NOT NULL DEFAULT 0,
  `ongkir` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trx_pembelian`
--

INSERT INTO `trx_pembelian` (`id`, `mst_produk_id`, `mst_marketplace_id`, `mst_user_id`, `detail_marketplace`, `qty`, `price_produk`, `ongkir`, `created_at`) VALUES
(6, 1, 1, 1, 'Tokopedia', 31, 30000, 10000, '2022-03-05 00:00:00'),
(7, 2, 4, 1, 'Bli Bli', 50, 50000, 20000, '2022-06-21 00:00:00'),
(8, 2, 0, 1, 'Toko A', 10, 50000, 0, '2022-06-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `trx_penjualan`
--

CREATE TABLE `trx_penjualan` (
  `id` int(11) NOT NULL,
  `mst_produk_id` int(11) NOT NULL,
  `mst_marketplace_id` int(11) NOT NULL,
  `mst_user_id` int(11) NOT NULL,
  `detail_marketplace` varchar(100) DEFAULT '',
  `qty` int(11) NOT NULL DEFAULT 0,
  `price_produk` int(11) NOT NULL DEFAULT 0,
  `promo` int(11) NOT NULL DEFAULT 0,
  `cost_packing` int(11) NOT NULL DEFAULT 0,
  `cost_admin` int(11) NOT NULL DEFAULT 0,
  `discount` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trx_penjualan`
--

INSERT INTO `trx_penjualan` (`id`, `mst_produk_id`, `mst_marketplace_id`, `mst_user_id`, `detail_marketplace`, `qty`, `price_produk`, `promo`, `cost_packing`, `cost_admin`, `discount`, `created_at`) VALUES
(3, 1, 1, 1, 'Tokopedia', 5, 40000, 500, 500, 400, 0, '2022-03-01 00:00:00'),
(4, 2, 1, 1, 'Tokopedia', 10, 75000, 0, 5000, 0, 5, '2022-06-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `created_at`) VALUES
(1, 'Asynchonous', 'Async', '81dc9bdb52d04dc20036dbd8313ed055', '2022-01-07 10:57:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_marketplace`
--
ALTER TABLE `mst_marketplace`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_produk`
--
ALTER TABLE `mst_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trx_pembelian`
--
ALTER TABLE `trx_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trx_penjualan`
--
ALTER TABLE `trx_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_marketplace`
--
ALTER TABLE `mst_marketplace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mst_produk`
--
ALTER TABLE `mst_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trx_pembelian`
--
ALTER TABLE `trx_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trx_penjualan`
--
ALTER TABLE `trx_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
