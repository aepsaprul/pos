-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2021 pada 22.59
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `credit_payments`
--

CREATE TABLE `credit_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `pay_date` datetime DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `credit_payments`
--

INSERT INTO `credit_payments` (`id`, `customer_id`, `pay_date`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-11-02 08:56:07', 5000, '2021-11-02 01:56:07', '2021-11-02 01:56:07'),
(2, 1, '2021-11-02 08:56:52', 5000, '2021-11-02 01:56:52', '2021-11-02 01:56:52'),
(3, 5, '2021-11-02 15:58:05', 5000, '2021-11-02 08:58:05', '2021-11-02 08:58:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `customer_code` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `shop_id`, `customer_code`, `customer_name`, `email`, `contact`, `address`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'aep', 'aep@hhghg.com', '12345', 'addss', '2021-10-08 23:29:49', '2021-10-09 02:39:57'),
(2, NULL, NULL, 'aep', 'aep@err.com', '4356', 'fergrg', '2021-10-08 23:29:54', '2021-10-09 02:40:11'),
(5, NULL, NULL, 'aep', 'aep@hhghg.com', '123', 'qwe', '2021-10-08 23:32:35', '2021-10-09 15:20:17'),
(7, NULL, NULL, 'aep', 'aep@err.com', '123', 'ww', '2021-10-08 23:33:00', '2021-10-09 15:20:29'),
(9, NULL, NULL, 'hafiz', 'hafiz@gmail.com', '09899', 'dfdfdf', '2021-10-09 15:13:00', '2021-10-09 15:13:00'),
(13, 3, NULL, 'Sapta', 'sapta@gmail.com', '08115044756', 'Jl Pramuka No 02', '2021-11-21 09:14:35', '2021-11-21 09:14:35'),
(14, 5, NULL, 'Miranda Tedjasaputra', 'miranda@gmail.com', '082130100402', 'alan Pos Kota No. 4, RT. 04 / RW. 06, Pinangsia, Tamansari', '2021-11-21 12:35:41', '2021-11-21 12:35:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nickname` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `employees`
--

INSERT INTO `employees` (`id`, `shop_id`, `full_name`, `nickname`, `email`, `contact`, `address`, `position_id`, `photo`, `created_at`, `updated_at`) VALUES
(2, 3, 'Radisha Didi Utama', 'Radisha', 'radisha@gmail.com', '081274743100', 'Jl. Letjen S. Parman Kav. 28 Tanjung Duren', 3, NULL, '2021-11-15 22:32:46', '2021-11-20 03:42:07'),
(3, 3, 'Raja Sapta Ervian', 'Raja', 'raja@gmail.com', '082288893100', 'Komplek Kampus Widuri, Jl. Palmerah Barat 353 Blok B No.4, RT.3/RW.5, Grogol Utara', 5, NULL, '2021-11-15 22:38:00', '2021-11-20 03:41:55'),
(4, 3, 'Daniel Indra Djajadi', 'Daniel', 'daniel@gmail.com', '082151611144', 'Jl. Puri Kencana No.1, RT.6/RW.2, Kembangan Sel., Kembangan, Kota Jakarta Barat', 4, NULL, '2021-11-15 22:39:38', '2021-11-20 03:41:44'),
(5, 5, 'Danny Juwono', 'Danny', 'danny@gmail.com', '081311335566', 'Jl. Tanjung Duren Raya, RT.1/RW.4, Tj. Duren Utara, Grogol petamburan, Kota Jakarta Barat', 3, NULL, '2021-11-15 22:40:43', '2021-11-20 03:41:29'),
(6, 5, 'Darjoto Setyawan', 'Darjoto', 'darjoto@gmail.com', '081289818282', 'Jalan Daan Mogot Km.13, Cengkareng, RT.12/RW.3, Cengkareng Tim., Cengkareng', 2, NULL, '2021-11-15 22:41:33', '2021-11-20 03:41:16'),
(7, 4, 'Budi Mulio Utomo', 'Budi', 'budi@gmail.com', '085211981112', 'Ruko Rich Palace Jl. Meruya Ilir Raya No. 36-40, Blok D6-D7, Srengseng', 4, NULL, '2021-11-15 22:43:36', '2021-11-20 03:41:05'),
(8, 4, 'Budiman Effendi', 'Budiman', 'budiman@gmail.com', '082120305511', 'JL. Arjuna Utara No. 1 Tanjung Duren Selatan, Gedung Tomang Tol Lt.4, Jakarta, South Tanjung Duren', 2, NULL, '2021-11-15 22:44:23', '2021-11-20 03:40:56'),
(9, 4, 'Bimo Surono', 'Bimo', 'bimo@gmail.com', '082130401166', 'Jl. Raya Ring Road, Rawa Buaya, Cengkareng, RT.8/RW.6, Duri Kosambi, Cengkareng, Kota Jakarta Barat', 3, NULL, '2021-11-15 22:45:26', '2021-11-20 03:40:46'),
(10, 3, 'Hadi Gunawan', 'Hadi', 'hadi@gmail.com', '082130100456', 'Jalan Puri Kencana Ruko Puri Niaga Blok J1 No. 3 T-U, South Kembangan, Kembangan, West Jakarta City, Special Capital Region of Jakarta', 5, NULL, '2021-11-15 22:46:35', '2021-11-20 03:40:32'),
(11, 4, 'Halim Setiabudi Wijono', 'Halim', 'halim@gmail.com', '085253536464', 'Jl. H. Saili, RT.2/RW.6, Kemanggisan, Palmerah, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11480, Indonesia', 2, NULL, '2021-11-15 22:47:30', '2021-11-20 03:31:04'),
(13, 4, 'James Kallman', 'James', 'james@gmail.com', '082130100402', 'Jl. Raya Utan Kayu No.105 B Jakarta Timur 13120 Indonesia', 3, NULL, '2021-11-16 02:24:21', '2021-11-20 03:30:51'),
(15, 5, 'Karta Wiguna', 'Karta', 'karta@gmail.com', '0811504475', 'Jl. Daan Mogot, RT.3/RW.12, Kalideres, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11840, Indonesia', 4, NULL, '2021-11-20 03:35:24', '2021-11-20 03:35:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory_product_ins`
--

CREATE TABLE `inventory_product_ins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inventory_product_ins`
--

INSERT INTO `inventory_product_ins` (`id`, `product_id`, `supplier_id`, `price`, `quantity`, `sub_total`, `date`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 4, 2, 10000, 5, 50000, '2021-11-24 09:49:31', 1, '2021-11-24 02:49:31', '2021-11-24 02:49:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory_product_outs`
--

CREATE TABLE `inventory_product_outs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inventory_product_outs`
--

INSERT INTO `inventory_product_outs` (`id`, `product_id`, `shop_id`, `price`, `quantity`, `sub_total`, `date`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 14000, 2, 28000, '2021-11-24 13:39:40', 1, '2021-11-24 06:39:40', '2021-11-24 06:39:40'),
(2, 6, 4, 11000, 2, 22000, '2021-11-24 13:41:20', 1, '2021-11-24 06:41:20', '2021-11-24 06:41:20'),
(3, 7, 5, 10000, 5, 50000, '2021-11-24 13:41:33', 1, '2021-11-24 06:41:33', '2021-11-24 06:41:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `bid` double DEFAULT NULL,
  `date_recorded` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `code` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `invoices`
--

INSERT INTO `invoices` (`id`, `customer_id`, `total_amount`, `bid`, `date_recorded`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(1, NULL, 20000, NULL, '2021-11-26 16:48:59', 1, '7n5qDEqSJ9', '2021-11-26 09:48:59', '2021-11-26 09:48:59'),
(2, NULL, 30000, NULL, '2021-11-26 16:51:20', 1, 'epmGN3S68Z', '2021-11-26 09:51:20', '2021-11-26 09:51:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_18_132507_create_products_table', 1),
(6, '2021_09_18_134015_create_product_categories_table', 1),
(7, '2021_09_18_134204_create_sales_table', 1),
(8, '2021_09_18_134910_create_customers_table', 1),
(9, '2021_09_18_135253_create_receive_products_table', 1),
(10, '2021_09_18_140036_create_suppliers_table', 1),
(11, '2021_09_18_140419_create_purchase_orders_table', 1),
(15, '2021_10_05_234905_create_invoices_table', 2),
(16, '2021_11_02_070046_create_nav_mains_table', 3),
(17, '2021_11_02_070650_create_nav_subs_table', 3),
(18, '2021_11_02_071603_create_nav_main_users_table', 3),
(19, '2021_11_02_071630_create_nav_sub_users_table', 3),
(20, '2021_11_02_141432_create_credit_payments_table', 4),
(21, '2021_11_06_093450_create_shops_table', 5),
(23, '2021_11_15_163341_create_employees_table', 6),
(29, '2021_11_16_201155_create_roles_table', 7),
(30, '2021_11_17_054153_create_roles_nav_mains_table', 7),
(31, '2021_11_17_054221_create_roles_nav_subs_table', 7),
(33, '2021_11_18_053319_create_product_shops_table', 8),
(34, '2021_11_18_162555_create_positions_table', 9),
(39, '2021_11_24_084815_create_inventory_product_ins_table', 10),
(40, '2021_11_24_085030_create_inventory_product_outs_table', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nav_mains`
--

CREATE TABLE `nav_mains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nav_mains`
--

INSERT INTO `nav_mains` (`id`, `title`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'home', '2021-11-18 21:39:09', '2021-11-18 21:39:09'),
(2, 'Master', '#', '2021-11-18 21:39:22', '2021-11-18 21:39:22'),
(3, 'Produk', 'product_shop', '2021-11-18 21:39:40', '2021-11-18 21:39:40'),
(4, 'Transaksi', '#', '2021-11-18 21:39:56', '2021-11-18 21:39:56'),
(5, 'Customer', 'customer', '2021-11-18 21:40:16', '2021-11-18 21:40:16'),
(6, 'Supplier', 'supplier', '2021-11-18 21:40:25', '2021-11-18 21:40:25'),
(7, 'Kasir', '#', '2021-11-18 21:40:36', '2021-11-18 21:40:36'),
(8, 'Laporan', 'report', '2021-11-18 21:40:48', '2021-11-18 21:40:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nav_subs`
--

CREATE TABLE `nav_subs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nav_main_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nav_subs`
--

INSERT INTO `nav_subs` (`id`, `title`, `link`, `nav_main_id`, `created_at`, `updated_at`) VALUES
(1, 'Karyawan', 'master/employee', 2, '2021-11-18 21:41:10', '2021-11-18 21:41:10'),
(2, 'Jabatan', 'master/position', 2, '2021-11-18 21:41:31', '2021-11-18 21:41:31'),
(3, 'Navigasi', 'master/nav', 2, '2021-11-18 21:41:55', '2021-11-18 21:41:55'),
(4, 'Roles', 'master/roles', 2, '2021-11-18 21:42:12', '2021-11-18 21:42:12'),
(5, 'User', 'master/user', 2, '2021-11-18 21:42:26', '2021-11-18 21:42:26'),
(6, 'Kategori Produk', 'master/product_category', 2, '2021-11-18 21:42:51', '2021-11-18 21:42:51'),
(7, 'Produk', 'master/product', 2, '2021-11-18 21:43:07', '2021-11-18 21:43:07'),
(8, 'Toko', 'master/shop', 2, '2021-11-18 21:43:19', '2021-11-18 21:43:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('aepsaprul18@gmail.com', '$2y$10$NiGno195NLj1/4NT7zWEhO5nZgUk0NmPE07.CSH5wbkiN32tNt7vS', '2021-10-11 02:04:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Manajer', '2021-11-18 21:36:32', '2021-11-18 21:36:32'),
(3, 'Supervisor', '2021-11-18 21:36:50', '2021-11-18 21:36:50'),
(4, 'Customer Service', '2021-11-18 21:36:50', '2021-11-18 21:37:10'),
(5, 'Admin Gudang', '2021-11-19 07:14:11', '2021-11-19 07:14:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_code` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `product_price_selling` double DEFAULT 0,
  `stock` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_category_id`, `product_price`, `product_price_selling`, `stock`, `created_at`, `updated_at`) VALUES
(3, '0000001', 'Obeng', 1, 20000, 22000, 12, '2021-10-15 05:38:08', '2021-11-20 02:36:02'),
(4, '0000004', 'Pampers', 2, 10000, 13500, 2, '2021-10-15 05:38:28', '2021-11-20 02:35:52'),
(5, '0000005', 'Sampo Clear 200ml', 4, 23000, 25000, NULL, '2021-11-20 02:35:40', '2021-11-20 02:35:40'),
(6, '0000006', 'Rinso Cair 150ml', 4, 5000, 6000, NULL, '2021-11-20 02:38:58', '2021-11-20 02:38:58'),
(7, '0000007', 'Minyak Goreng Bimoli', 7, 14000, 15000, NULL, '2021-11-20 02:41:21', '2021-11-20 02:41:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Peralatan Listrik', NULL, '2021-10-10 02:04:34'),
(2, 'Makanan Ringan', '2021-10-10 01:57:57', '2021-10-10 01:57:57'),
(4, 'Kesehatan', '2021-10-10 02:09:02', '2021-10-10 02:09:02'),
(5, 'Peralatan Bayi', '2021-10-10 02:09:24', '2021-10-10 02:09:24'),
(6, 'Perabotan Rumah Tangga', '2021-10-11 19:44:49', '2021-11-20 02:34:26'),
(7, 'Sembako', '2021-11-20 02:40:26', '2021-11-20 02:40:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_shops`
--

CREATE TABLE `product_shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `price_selling` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_shops`
--

INSERT INTO `product_shops` (`id`, `product_id`, `shop_id`, `code`, `price`, `price_selling`, `created_at`, `updated_at`) VALUES
(2, 4, NULL, 'P0002', 11000, 12000, '2021-11-18 03:59:27', '2021-11-18 03:59:27'),
(3, 5, 3, 'KS001', 15000, 16000, '2021-11-20 03:55:00', '2021-11-20 03:55:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` double(8,2) DEFAULT NULL,
  `unit_price` double(8,2) DEFAULT NULL,
  `sub_total` double(8,2) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `receive_products`
--

CREATE TABLE `receive_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `receive_products`
--

INSERT INTO `receive_products` (`id`, `product_id`, `price`, `quantity`, `sub_total`, `date`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 5, 23000, 4, 92000, '2021-11-26 16:05:31', 1, '2021-10-15 05:34:52', '2021-11-26 09:05:31'),
(3, 3, 20000, 5, 100000, '2021-11-26 16:05:48', 1, '2021-10-15 05:38:53', '2021-11-26 09:05:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2021-11-17 01:37:31', '2021-11-17 21:40:44'),
(2, 'Inventory', '2021-11-17 01:37:35', '2021-11-17 21:40:56'),
(3, 'Kasir Toko', '2021-11-17 01:37:43', '2021-11-17 21:41:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles_nav_mains`
--

CREATE TABLE `roles_nav_mains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roles_id` int(11) DEFAULT NULL,
  `nav_main_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles_nav_mains`
--

INSERT INTO `roles_nav_mains` (`id`, `roles_id`, `nav_main_id`, `created_at`, `updated_at`) VALUES
(4, 1, 1, '2021-11-20 02:52:25', '2021-11-20 02:52:25'),
(5, 1, 2, '2021-11-20 02:52:25', '2021-11-20 02:52:25'),
(6, 1, 8, '2021-11-20 02:52:25', '2021-11-20 02:52:25'),
(7, 2, 1, '2021-11-20 02:53:00', '2021-11-20 02:53:00'),
(8, 2, 2, '2021-11-20 02:53:00', '2021-11-20 02:53:00'),
(9, 2, 3, '2021-11-20 02:53:00', '2021-11-20 02:53:00'),
(10, 2, 4, '2021-11-20 02:53:00', '2021-11-20 02:53:00'),
(11, 2, 5, '2021-11-20 02:53:00', '2021-11-20 02:53:00'),
(12, 2, 6, '2021-11-20 02:53:00', '2021-11-20 02:53:00'),
(13, 2, 8, '2021-11-20 02:53:00', '2021-11-20 02:53:00'),
(14, 3, 1, '2021-11-20 02:53:28', '2021-11-20 02:53:28'),
(15, 3, 3, '2021-11-20 02:53:29', '2021-11-20 02:53:29'),
(16, 3, 4, '2021-11-20 02:53:29', '2021-11-20 02:53:29'),
(17, 3, 5, '2021-11-20 02:53:29', '2021-11-20 02:53:29'),
(18, 3, 7, '2021-11-20 02:53:29', '2021-11-20 02:53:29'),
(19, 3, 8, '2021-11-20 02:53:29', '2021-11-20 02:53:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles_nav_subs`
--

CREATE TABLE `roles_nav_subs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roles_id` int(11) DEFAULT NULL,
  `nav_sub_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles_nav_subs`
--

INSERT INTO `roles_nav_subs` (`id`, `roles_id`, `nav_sub_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2021-11-20 02:52:26', '2021-11-20 02:52:26'),
(3, 1, 2, '2021-11-20 02:52:26', '2021-11-20 02:52:26'),
(4, 1, 5, '2021-11-20 02:52:26', '2021-11-20 02:52:26'),
(5, 1, 6, '2021-11-20 02:52:26', '2021-11-20 02:52:26'),
(6, 1, 7, '2021-11-20 02:52:26', '2021-11-20 02:52:26'),
(7, 1, 8, '2021-11-20 02:52:26', '2021-11-20 02:52:26'),
(8, 2, 1, '2021-11-20 02:53:00', '2021-11-20 02:53:00'),
(9, 2, 5, '2021-11-20 02:53:01', '2021-11-20 02:53:01'),
(10, 2, 6, '2021-11-20 02:53:01', '2021-11-20 02:53:01'),
(11, 2, 7, '2021-11-20 02:53:01', '2021-11-20 02:53:01'),
(12, 2, 8, '2021-11-20 02:53:01', '2021-11-20 02:53:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `invoice_id`, `product_id`, `quantity`, `sub_total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 1, 20000, '2021-11-26 09:48:53', '2021-11-26 09:48:59'),
(2, 1, 2, 4, 1, 10000, '2021-11-26 09:51:10', '2021-11-26 09:51:20'),
(3, 1, 2, 3, 1, 20000, '2021-11-26 09:51:17', '2021-11-26 09:51:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `shops`
--

INSERT INTO `shops` (`id`, `name`, `contact`, `email`, `address`, `created_at`, `updated_at`) VALUES
(3, 'Inventory', '082130100401', 'inventry@gmail.com', 'Jl Pahlawan No 13', '2021-11-17 22:29:58', '2021-11-17 22:29:58'),
(4, 'Toko Satu', '082120305511', 'tokosatu@gmail.com', 'Jl. Letjen S. Parman Kav. 28 Tanjung Duren Selatan Grogol Petamburan', '2021-11-17 22:30:50', '2021-11-17 22:30:50'),
(5, 'Toko Dua', '081274743100', 'tokodua@gmail.com', 'Komplek Kampus Widuri, Jl. Palmerah Barat 353 Blok B No.4', '2021-11-17 22:31:25', '2021-11-17 22:31:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_code` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_contact` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_code`, `supplier_name`, `supplier_contact`, `supplier_address`, `supplier_email`, `created_at`, `updated_at`) VALUES
(2, 'MAI', 'PT Mayora Indah', '081234', 'Jl Soedirman', 'mayoraindah@gmial.com', '2021-10-09 22:53:12', '2021-10-10 01:05:23'),
(3, 'UNI', 'PT Unilever Indonesia', '123', 'Jl pahlawan', 'unilever@gmail.com', '2021-10-10 00:37:58', '2021-10-10 01:07:53'),
(4, 'WGP', 'PT Wings Group Purwokerto', '0218888', 'Jl Panjaitan', 'wings@gmail.com', '2021-10-10 01:06:30', '2021-10-10 01:06:30'),
(5, 'ISM', 'PT Indofood Sukses Makmur', '021456', 'Jl Ahmad Yani', 'indofood@gmail.com', '2021-10-10 01:07:41', '2021-10-10 01:07:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `roles_id` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `employee_id`, `roles_id`, `created_at`, `updated_at`) VALUES
(1, 'aep', 'aep@gmail.com', NULL, '$2y$10$Vk8s4ocDXzremP6LPnt7XuhUZJObe5lW.8dh1PQRBFJJLW//jNo6S', NULL, NULL, 0, '2021-10-03 05:31:41', '2021-10-10 19:25:29'),
(12, 'Raja Sapta Ervian', 'raja@gmail.com', NULL, '$2y$10$sz5owum8ULfVJcw99fcSgewJc6oLPHnYAnlU/GWMQXHu7hYIdqSQO', NULL, 3, 2, '2021-11-19 22:34:37', '2021-11-19 22:34:37'),
(14, 'Danny Juwono', 'danny@gmail.com', NULL, '$2y$10$DkkfNFlBl7YGQ2vWREsTYuS1HY5sdAtb8U9pUx/M.GlW0ObdslNpG', NULL, 5, 3, '2021-11-21 12:33:32', '2021-11-21 12:33:32'),
(15, 'Budi Mulio Utomo', 'budi@gmail.com', NULL, '$2y$10$TOSB0vgnZFKZFqPzw.CXaup676fNTFlo/BF/k1L.pijlPvTnlEO5S', NULL, 7, 3, '2021-11-21 12:34:05', '2021-11-21 12:34:05');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `credit_payments`
--
ALTER TABLE `credit_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `inventory_product_ins`
--
ALTER TABLE `inventory_product_ins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `inventory_product_outs`
--
ALTER TABLE `inventory_product_outs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nav_mains`
--
ALTER TABLE `nav_mains`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nav_subs`
--
ALTER TABLE `nav_subs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_shops`
--
ALTER TABLE `product_shops`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `receive_products`
--
ALTER TABLE `receive_products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles_nav_mains`
--
ALTER TABLE `roles_nav_mains`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles_nav_subs`
--
ALTER TABLE `roles_nav_subs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `credit_payments`
--
ALTER TABLE `credit_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventory_product_ins`
--
ALTER TABLE `inventory_product_ins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `inventory_product_outs`
--
ALTER TABLE `inventory_product_outs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `nav_mains`
--
ALTER TABLE `nav_mains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `nav_subs`
--
ALTER TABLE `nav_subs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `product_shops`
--
ALTER TABLE `product_shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `receive_products`
--
ALTER TABLE `receive_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `roles_nav_mains`
--
ALTER TABLE `roles_nav_mains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `roles_nav_subs`
--
ALTER TABLE `roles_nav_subs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
