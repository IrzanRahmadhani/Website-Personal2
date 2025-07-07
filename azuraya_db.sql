-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2025 at 08:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azuraya_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `deskripsi`, `kategori`, `gambar`) VALUES
(1, 'Joiway X1 Kit Baby Blue', 230000, 'Specification : \r\nZinc Alloy Material Grade 5 (perlindungan yang kuat permukaan halus) Built In Battery 1100mAh Fast Charging Type C Use J Smart 3 Chip Adjustable Airflow Two Option Cartridge 0,8 Ohm dan 0,6 Ohm Easy Unplug CT Light & Vibration Interactions \r\n\r\nInclude : 1x Joiway Device X1 1x Cartridge 0.6 Ohm 1x Cartridge 0.8 Ohm 1x Lanyard 1x Manual book Harap konfirmasi terlebih dahulu untuk ketersediaan stock barang , jika tidak dan stock nya kosong. akan kami kirimkan barang random. \r\n\r\nHormat Kami, \r\nAzuraya Vapor Store', 'Pod', 'Pod-Joiway-X1-Kit-Baby-Blue.jpeg'),
(2, 'Zuluu Boro Pod Black Red', 350000, 'Features :\r\n– Internal Battery : 1100mAh\r\n– Adjustable Power up to 40W\r\n– Boro Pod Cartridge Capacity : 4.5ML\r\n– Compatible with Boro Tank RBA\r\n– Type C Charge Connection\r\n– Replacable Front Door Panel\r\n\r\nIncludes :\r\n1x Zuluu Boro Pod Device\r\n1x Zuluu Boro Pod Cartridge 0.6 Ohm\r\n1x User Manual\r\n\r\nHarap konfirmasi terlebih dahulu untuk ketersediaan stock barang , jika tidak dan stock nya kosong. akan kami kirimkan barang random. \r\n\r\nHormat Kami, \r\nAzuraya Vapor Store', 'Device', 'Zuluu-Boro-Pod-Black-Red.jpg'),
(5, 'TRML T200 Scarlet Pink', 550000, 'Features :\r\n– Dimensions : 90×53,5x25mm\r\n– Battery : Dual 18650 Batteries (NOT INCLUDED)\r\n– Output Power : 5W-220W\r\n– Working Voltage : 6,4V-8,4V\r\n– Output Voltage : 1V-8V\r\n– Resistance : 0,07 ohm – 3,5 ohm\r\n– Chassis Material : Aluminium Alloy\r\n– Threaded Connection : 510\r\n– Charging Mode : Type-C\r\n\r\nIncludes :\r\n1x TRML T200 Box Mod\r\n1x USB Type-C Cable\r\n1x User Manual\r\n\r\n\r\nHarap konfirmasi terlebih dahulu untuk ketersediaan stock barang , jika tidak dan stock nya kosong. akan kami kirimkan barang random.\r\n\r\nHormat kami,\r\nAzuraya Vapor Store', 'Device', 'Mod-TRML-T200-Scarlet-Pink.jpeg'),
(6, 'Dovpo MVV 2 Carbon Green', 423000, 'Parameter :\r\n– Material : PC + Zinc Alloy\r\n– Threaded connection : 510\r\n– OLED Display : 0.96 TFT screen\r\n– Output Power : 5.0W~220.0W\r\n– Working Voltage : 6.4V~8.4V\r\n– Resistance under Wattage Mode : 0.07~3.5ohm\r\n– Charging Mode : USB TYPE-C\r\n– Charging Current : 2000mA\r\n– Battery : dual 18650 battery (not included)\r\n\r\nIncludes :\r\n1X MVP BOX MOD\r\n1X USB Type- C Cable\r\n1X Instruction Manual\r\n\r\nHarap konfirmasi terlebih dahulu untuk ketersediaan stock barang , jika tidak dan stock nya kosong. akan kami kirimkan barang random. \r\n\r\nHormat Kami, \r\nAzuraya Vapor Store', 'Device', 'Mod-Dovpo-MVV-2-Carbon-Green.jpg'),
(7, 'Ursa Nano S2 Muklay Bundling Pearl White', 180000, 'Parameter :\r\nDimension: 24.4*15.4*107.8mm\r\nBuilt-in Rechargeable 1000mAh Battery\r\n2.5ml Capacity for Vape Juice\r\nFine Leather Texture\r\n30W Max Output Power\r\nRGB Indicator Light\r\nCoil Resistance: 0.8ohm/1.2ohm\r\nCompatible with Lost Vape Ursa V2 Pod Cartridge\r\nPrecise Airflow Control\r\nType-C Fast Recharging\r\n.\r\nIncludes :\r\n1x Lost Vape Ursa Nano S2 Pod Muklay\r\n1x Cartridge Ursa V2 – 0.8 Ohm\r\n1x Rokko Salt Nic 15ML\r\n1x Type-C Cable\r\n1x Warranty Card\r\n1x User Manual\r\n1x Muklay Lanyard\r\n\r\nHarap konfirmasi terlebih dahulu untuk ketersediaan stock barang , jika tidak dan stock nya kosong. akan kami kirimkan barang random. \r\n\r\nHormat Kami, \r\nAzuraya Vapor Store', 'Pod', 'Pod-Ursa-Nano-S2-Muklay-Bundling-Pearl-White.jpg'),
(8, 'Bequ Mango 60ml', 155000, 'BEQU LIGHTS V2\r\n*100% Authentic By Poda E-Liquid X Rays Distribution X FVS Distribution\r\n\r\nFlavour : Mango \r\nNicotine : 3MG\r\nVolume : 60ML\r\nPG/VG : 30/70\r\n\r\nHarap konfirmasi terlebih dahulu untuk ketersediaan stock barang , jika tidak dan stock nya kosong. akan kami kirimkan barang random. \r\n\r\nHormat Kami, \r\nAzuraya Vapor Store', 'Liquid', 'Bequ-Mango-60ml.jpeg'),
(9, 'Blunanarilla 60ml', 155000, 'BLUNANARILLA\r\n*100% Authentic By Indonesia Juice Cartel\r\n\r\nFlavour : Blueberry Banana Smoothies\r\nNicotine : 3MG | 6MG\r\nVolume : 60ML\r\nPG/VG : 30/70\r\n\r\nHarap konfirmasi terlebih dahulu untuk ketersediaan stock barang , jika tidak dan stock nya kosong. akan kami kirimkan barang random. \r\n\r\nHormat Kami, \r\nAzuraya Vapor Store', 'Liquid', 'COVER.jpeg'),
(10, 'EJM Nafas Kopi Susu 60ml', 95000, 'NAFAS CREAMY\r\n*100% Authentic By EJM x Tickets Brew Malaysia\r\n\r\nFlavour : Kopi Susu (CREAMY)\r\nNicotine : 3MG\r\nVolume : 60ML\r\nPG/VG : –\r\n\r\nHarap konfirmasi terlebih dahulu untuk ketersediaan stock barang , jika tidak dan stock nya kosong. akan kami kirimkan barang random. \r\n\r\nHormat Kami, \r\nAzuraya Vapor Store', 'Liquid', 'EJM-Nafas-Kopi-Susu-60ml.jpeg'),
(11, 'HK White 60ml', 155000, 'HK V2 WHITE\r\n*100% Authentic By Wise Juice x Arrifarisan\r\n\r\nFlavour : White Cereal Chocolate Milk\r\nNicotine : 3MG | 6MG | 9MG\r\nVolume : 60ML\r\nPG/VG : 40/60\r\n\r\nHarap konfirmasi terlebih dahulu untuk ketersediaan stock barang , jika tidak dan stock nya kosong. akan kami kirimkan barang random. \r\n\r\nHormat Kami, \r\nAzuraya Vapor Store', 'Liquid', 'HK-White-60ml.jpg'),
(12, 'Ketan Jinak 60ml', 130000, 'KETAN JINAK\r\n*100% Authentic By Koko Sarang x Mildos\r\n\r\nFlavors : Ketan Hitam\r\nNicotine : 1,5MG | 3MG | 6MG | 9MG\r\nVolume : 60ML\r\nPG/VG : 30/70\r\n\r\nHarap konfirmasi terlebih dahulu untuk ketersediaan stock barang , jika tidak dan stock nya kosong. akan kami kirimkan barang random. \r\n\r\nHormat Kami, \r\nAzuraya Vapor Store', 'Liquid', 'Ketan-Jinak-60ml.jpeg'),
(13, 'Kdest Merah Putih 2400 MAH 40 A', 45000, 'HARGA UNTUK 1PCS BUKAN PER PACK ( DIJUAL SATUAN )\r\n\r\nSpecification :\r\n– Brand : Kdest\r\n– Size : 18650\r\n– Capacity : 2400mAh\r\n– Positive : Flat\r\n– Discharge : 40A\r\n\r\nHarap konfirmasi terlebih dahulu untuk ketersediaan stock barang , jika tidak dan stock nya kosong. akan kami kirimkan barang random. \r\n\r\nHormat Kami, \r\nAzuraya Vapor Store', 'Aksesoris', 'batrai-Kdest-Merah-Putih-2400-MAH-40-A.jpg'),
(14, 'Cartridge Nixx 0.8 Ohm', 35000, 'HARGA PER 1PCS BUKAN PER PACK ( DIJUAL SATUAN )\r\n\r\nParameter :\r\nCapacity : 2ML\r\nSide Filling System\r\nResistance : 0.8Ω\r\n1 Pack : 3 Pcs of Cartridge\r\n\r\nCompatible For :\r\nNixx Fitler Plus Pod\r\n\r\nHarap konfirmasi terlebih dahulu untuk ketersediaan stock barang , jika tidak dan stock nya kosong. akan kami kirimkan barang random. \r\n\r\nHormat Kami, \r\nAzuraya Vapor Store', 'Aksesoris', 'Cartridge-Nixx-0.8.jpg'),
(15, 'Charger VRK F2 Type C', 150000, 'Specification :\r\n– I2 Bay\r\n– Input : 5v = 2A (max)\r\n– Output : 4.18v = 1A*2\r\n– Charging Current of 2000 mAh\r\n– Polarity Protection\r\n\r\nFeatures :\r\n– Quick : Twice as fast as any 2 bay charger on themarket\r\n– 2000 mAcharging current\r\n– Safe : Class I ABS fire retardant materials\r\n– External adaptor : Minimal heating while charging\r\n– Smart : Automatic current selection / distribution technology\r\n– Automatic reverse polarity protection, IMR battery restoration\r\n\r\nIncludes :\r\n1x VRK F2 Charger\r\n1x Power Cable Type C\r\n1x User Manual\r\n1x Warranty Card\r\n\r\nHarap konfirmasi terlebih dahulu untuk ketersediaan stock barang , jika tidak dan stock nya kosong. akan kami kirimkan barang random. \r\n\r\nHormat Kami, \r\nAzuraya Vapor Store', 'Aksesoris', 'Charger-VRK-F2-Type-C.jpg'),
(16, 'Coil Super Sonix DeathVomit', 30000, '-', 'Aksesoris', 'Coil-Super-Sonix-DeathVomit.jpg'),
(17, 'COTTON MONSTER PREMIUM', 45000, 'Parameter :\r\n– Net Weight : 0.4oz / +- 1.2 Meters\r\n\r\nHarap konfirmasi terlebih dahulu untuk ketersediaan stock barang , jika tidak dan stock nya kosong. akan kami kirimkan barang random. \r\n\r\nHormat Kami, \r\nAzuraya Vapor Store', 'Aksesoris', 'COTTON-MONSTER-PREMIUM.jpg'),
(18, 'RDA Tot X Dual Coil SS', 350000, 'Spesification :\r\n24MM Diameter RDA\r\n22MM Deck\r\nDeck inspired from the Most Flavorful Dual CoiL RDA\r\nCyclop / Honeycomb Adjustable Airflow\r\nTop – to Bottom Airflow\r\n24K Gold Plated Positive Post\r\nCompatible With Bottom Feed Box Mod\r\n\r\nIncludes :\r\n1x ToTx Dual Coil RDA Shiny Edition\r\n1x Accessories Bag\r\n\r\nHarap konfirmasi terlebih dahulu untuk ketersediaan stock barang , jika tidak dan stock nya kosong. akan kami kirimkan barang random. \r\n\r\nHormat Kami, \r\nAzuraya Vapor Store', 'Atomizer', 'RDA-Tot-X-Dual-Coil-SS-350k.jpg'),
(19, 'RBA Sturdy One Clone', 350000, 'Parameter :\r\n- Diameter : 20.0mm\r\n- Height : 34.8mm\r\n- Weight : 18.4g\r\n- 4.5mm Diameter Chimney\r\n\r\nFeatures :\r\n- PCTG (Clear) Dot sized Proprietary Tank\r\n- SS316 (Food Grade) Chimneys, Cap, Deck, Base, Dot adapter\r\n- SS316 (Food Grade) Slotted Post screws\r\n- SS304 Airflow pins\r\n- PEEK insulators\r\n- Black PEEK & Brass Boro adapter\r\n- Silicone & Nitrile Orings / Fill plug\r\n- Dual Platform friendly (Dot & Boro)\r\n- Direct Wicking System\r\n- Reduced Chamber Cap with Dome System\r\n- Built-in 510 Threading\r\n- Reverse Threaded chimney\r\n- Spare Kit provided\r\n- Support Coils up to a Maximum of 3.5mm in Diameter\r\n\r\nCompatible for :\r\n- Dotaio V1\r\n- Dotaio V2\r\n- Dotaio V2 Lite\r\n- And others device with same RBA with Dotaio RBA\r\n\r\nIncludes :\r\n1x Sturdy One RBA\r\n1x 1.0 Airflow Pin\r\n1x 2.0 Airflow Pin\r\n1x 3.0 Airflow Pin\r\n1x 3.5 Airflow Pin\r\n1x Boro Sized Adaptor\r\n1x Spare Bag Kit\r\n\r\nHarap konfirmasi terlebih dahulu untuk ketersediaan stock barang , jika tidak dan stock nya kosong. akan kami kirimkan barang random. \r\n\r\nHormat Kami, \r\nAzuraya Vapor Store', 'Atomizer', 'RBA-Sturdy-One-Clone-350k.jpg'),
(20, 'RDA WASPNANO Authentic', 220000, 'Brand: Oumier\r\nUnit: 1 Set\r\nPackage: Gift Box\r\n\r\nEach set contain:\r\n1pc Wasp Nano RDA V2\r\n2pcs Post Screws\r\n1pc Deck Screw\r\n2pcs Silicone Rings\r\n2pcs Prebuilt Coil 0.28ohm\r\n1pc Screwdriver\r\n1pc BF Pin\r\n1pc Cotton\r\n1pc Extra Top Cap\r\n1pc User Manual\r\n\r\nHarap konfirmasi terlebih dahulu untuk ketersediaan stock barang , jika tidak dan stock nya kosong. akan kami kirimkan barang random. \r\n\r\nHormat Kami, \r\nAzuraya Vapor Store', 'Atomizer', 'RDA-WASPNANO-Authentic.jpg'),
(21, 'RBA Sturdy One Clone ', 350000, 'Features:\r\nName: TITA RBA\r\nColor: Black, Silver\r\nSize: 20x16x35mm\r\nMaterial: 316SS+AL\r\nAirflow Inserts: 1.0mm, 1.5mm, 2.0mm, 2.5mm, 3.0mm\r\nAirflow type: MTL & DL\r\nLiquid Capacity: 3.0ml\r\nCompatible for dotmod AIO\r\n\r\nPacking List:\r\n\r\n1x TITA RBA\r\n1x 510 Adapter\r\n1x Spare O-ring and accessories package\r\n1x Airflow kits ( 1.0mm, 1.5mm, 2.0mm, 2.5mm, 3.0mm )\r\n\r\nHarap konfirmasi terlebih dahulu untuk ketersediaan stock barang , jika tidak dan stock nya kosong. akan kami kirimkan barang random. \r\n\r\nHormat Kami, \r\nAzuraya Vapor Store', 'Atomizer', 'RBA-TITA-550k.jpg'),
(22, 'RELOAD S RDA SPECTRUM', 900000, 'Product Features:\r\nDual Adjustable Top-Down Air Flow Hits Both Sides and Bottom Simultaneously To Maximize –\r\nFlavors and Minimize Leaking\r\n3 PCS Top Cap Design Ensures Easy Airflow Adjustment\r\n24mm Diameter, 22mm Chamber\r\n14mm Wide Bore 810 Drip Tip ( PCTG )\r\n28.5 mm Tall With Drip Tip\r\n24K Gold Plated Screws/Contacts for Maximum Conductivity\r\nPostless Quad Terminal Style Build Deck\r\n304 SS Construction with PCTG clear sleeve\r\nElectroplating for colors\r\nPeek Insulator\r\nSquonk Ready\r\nSerial Number and Logo On The Bottom Of The DecK\r\nBuilder Friendly\r\n\r\nProduct Includes:\r\n1x Reload S RDA with Squonk Pin installed\r\n1x Customized Reload Allen Driver\r\n1x 810 Drip Tip\r\n1xGold Plated Regular 510 Pin\r\n1xSpare Parts Pack (4 extra screws,1 peek insulator,\r\nassorted O-rings, 1 Allen key for Squonk pin)\r\n\r\nHarap konfirmasi terlebih dahulu untuk ketersediaan stock barang , jika tidak dan stock nya kosong. akan kami kirimkan barang random. \r\n\r\nHormat Kami, \r\nAzuraya Vapor Store', 'Atomizer', 'RELAOAD-S-RDA-SPECTRUM.jpeg'),
(23, 'Creamy Coffee Milk ', 25000, 'Kopi khas Azuraya ', 'Minikopi', 'creamy-coffee-milk-17k.jpg'),
(24, 'Creamy Milk Series', 25000, 'Kopi khas Azuraya', 'Minikopi', 'Creamy-milk-series-17k.jpg'),
(25, 'Idealis Dark Coffee ', 30000, 'Kopi khas Azuraya', 'Minikopi', 'Idealis-Dark-Coffee-20k.jpg'),
(26, 'Savory Latte Series', 35000, 'Kopi khas Azuraya', 'Minikopi', 'Savory-Latte-Series-25k.jpg'),
(27, 'Soda Sparkling ', 25000, 'Kopi khas Azuraya', 'Minikopi', 'Soda-Sparkling-15k.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
