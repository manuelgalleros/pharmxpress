-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2024 at 07:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmxpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `brand_name` varchar(200) NOT NULL,
  `generic_name` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `original_price` float NOT NULL,
  `selling_price` float NOT NULL,
  `profit` float NOT NULL,
  `quantity` int(10) NOT NULL,
  `qty_sold` int(10) NOT NULL,
  `expiry_date` varchar(500) NOT NULL,
  `date_arrival` varchar(500) NOT NULL,
  `prescription_required` varchar(15) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `brand_name`, `generic_name`, `category`, `original_price`, `selling_price`, `profit`, `quantity`, `qty_sold`, `expiry_date`, `date_arrival`, `prescription_required`, `product_image`) VALUES
(4756, 'Vestar', 'Trimetazidine', 'Anti-Angina', 17, 20, 3, 100, 100, '2027-08-26', '2024-11-28', 'Required', '2_Vestar_Product_Shot-24.jpg'),
(4757, 'Analoze', 'Anastrozole', 'Antineoplastic', 8, 12, 4, 90, 90, '2026-03-28', '2024-11-28', 'Required', '2_anazole.jpg'),
(4758, 'United Home Menthosoothe', 'Relief Oil', 'Skin Care', 42, 50, 8, 30, 30, '2024-11-28', '2024-11-28', 'Not Required', '2_UHP_Menthosoothe.jpg'),
(4759, 'Neozep® Drops', 'Phenylephrine HCl Chlorphenamine Maleate', 'Colds Medicine', 120, 140, 20, 20, 20, '2027-03-28', '2024-11-28', 'Not Required', '2_neozep_drops.jpg'),
(4760, 'Solmux Advance Suspension', 'Carbocisteine + Zinc', 'Cough Medicine', 170, 200, 30, 50, 50, '2025-12-28', '2024-11-28', 'Not Required', 'Hi-Res_Product_Shots_-_Solmux_Advance_60mL_00_opt.jpg'),
(4761, 'Tuseran® Forte', 'Dextromethorphan HBr Phenylpropanolamine HCl Paracetamol', 'Cough Medicine', 170, 190, 20, 9, 9, '2026-06-28', '2024-11-28', 'Not Required', 'tuseranforte.png'),
(4762, 'Asmalin® Broncho', 'Salbutamol Guaifenesin', 'Anti-asthma', 345, 370, 25, 28, 28, '2024-11-28', '2024-11-28', 'Required', 'asmalin_broncho.png'),
(4763, 'Ampimax® Tablet', 'Sultamicillin Tosilate', 'Antibacterial', 63, 75, 12, 90, 90, '2025-12-17', '2024-11-28', 'Required', '2_ampimax_tablet.jpg'),
(4764, 'AmoClav® Tablet', 'Co-Amoxiclav', 'Antibacterial', 190, 230, 40, 3, 3, '2024-11-28', '2024-11-28', 'Required', 'amoclav_tablet.jpg'),
(4765, 'Candez® Plus', 'Candesartan Cilexetil + Hydrochlorothiazide', 'Antihypertensive', 57, 70, 13, 25, 25, '2026-01-28', '2024-11-28', 'Required', '2_candez_plus.jpg'),
(4766, 'Dazomet®', 'Metronidazole', 'Antibacterial', 32, 40, 8, 7, 7, '2026-11-06', '2024-11-28', 'Required', '2_dazomet_solution_and_tablet.jpg'),
(4767, 'Fenoflex®', 'Fenofibrate', 'Antihyperlipidemic', 84, 99, 15, 50, 50, '2024-11-28', '2024-11-28', 'Required', '2_fenoflex.jpg'),
(4769, 'Biogesic®', 'Paracetamol', 'Analgesic', 5.5, 7, 1.5, 50, 50, '2024-11-26', '2024-11-28', 'Not Required', 'Biogesic-Tablet-Product-Shot-314.webp'),
(4770, 'Enervon® Z+ Tablet', 'Multivitamins+Zinc', 'Supplements', 8, 12, 4, 50, 50, '2024-11-28', '2024-11-28', 'Not Required', 'Enervon_Z-plus.webp'),
(4771, 'Conzace®', 'Multivitamins + Mineral', 'Supplements', 7, 10, 3, 8, 8, '2024-11-28', '2024-11-28', 'Not Required', 'Conzace-Product-Shot.webp'),
(4772, 'Revicon Forte', 'Multivitamins + Minerals + Amino Acids', 'Supplements', 11, 15, 4, 50, 50, '2024-11-22', '2024-01-28', 'Not Required', '070323_Revicon_30s_Product_Shot_Family.jpg'),
(4773, 'Ferlin®', 'Iron + Vitamin B-Complex', 'Supplements', 17, 20, 3, 53, 53, '2024-06-28', '2023-11-28', 'Not Required', '2_ferlin.jpg'),
(4775, 'Vitamin B1 + B6 + B12 ', 'United Home® Multi-B', 'Supplements', 12, 17, 5, 4, 4, '2024-11-28', '2024-11-28', 'Not Required', '2_UHP_MultiB.jpg'),
(4776, 'Muskelax', 'Ibuprofen + Paracetamol', 'Antipyretic', 8, 10, 2, 20, 20, '2024-10-28', '2024-11-28', 'Not Required', 'Muskelax-Product-Shot.png'),
(4777, 'Dolfenal®', 'Mefenamic Acid', 'Anti-inflammatory', 6.5, 8, 0, 40, 10, '2024-09-28', '2023-11-28', 'Not Required', '2_dolfenal_500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files`
--

CREATE TABLE `uploaded_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uploaded_files`
--

INSERT INTO `uploaded_files` (`id`, `file_name`, `file_path`, `uploaded_on`) VALUES
(7, 'sample_excel_file.xlsx', 'http://localhost/myproject/uploads/sample_excel_file.xlsx', '2024-11-20 14:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `profile_display` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `position`, `profile_display`) VALUES
(1, 'admin', 'admin', 'Admin', 'Admin', ''),
(2, 'cashier', 'cashier', 'Cashier Pharmacy', 'Cashier', ''),
(4, 'manuel', 'admin', 'Manuel Galleros', 'Admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4855;

--
-- AUTO_INCREMENT for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
