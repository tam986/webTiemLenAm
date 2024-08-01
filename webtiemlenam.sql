-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 01, 2024 lúc 06:16 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webtiemlenam`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nameCategories` varchar(100) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `STT` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `nameCategories`, `parent_id`, `STT`, `created_at`, `updated_at`) VALUES
(1, 'Cuộn Len', NULL, 1, '2024-07-28 15:07:13', '2024-07-28 15:22:11'),
(2, 'Trang phục được làm từ len', NULL, 2, '2024-07-28 15:07:13', '2024-07-28 15:22:16'),
(3, 'Unisex', 2, 1, '2024-07-28 15:08:16', '2024-07-28 15:22:20'),
(4, 'Nón', 2, 2, '2024-07-28 15:08:16', '2024-07-28 15:22:24'),
(5, 'Áo nam', 2, 3, '2024-07-28 15:08:16', '2024-07-28 15:22:28'),
(6, 'Áo nữ', 2, 4, '2024-07-28 15:08:16', '2024-07-28 15:22:32'),
(7, 'Khăn choàng', 2, 5, '2024-07-28 15:08:16', '2024-07-28 15:22:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `productdetail_id` int(11) DEFAULT NULL,
  `nameCountry` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `country`
--

INSERT INTO `country` (`id`, `productdetail_id`, `nameCountry`) VALUES
(1, 61, 'china'),
(2, 62, 'us'),
(3, 63, 'namphi'),
(4, 64, 'taytang'),
(5, 65, 'canada'),
(6, 66, 'china'),
(7, 67, 'taytang'),
(8, 68, 'canada'),
(9, 69, 'namphi'),
(10, 70, 'us'),
(11, 71, 'china'),
(12, 72, 'china');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `cashout` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `productDetail_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productdetail`
--

CREATE TABLE `productdetail` (
  `id` int(11) NOT NULL,
  `products` int(11) DEFAULT NULL,
  `soluongtonkho` int(11) DEFAULT NULL,
  `soluongdaban` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `productdetail`
--

INSERT INTO `productdetail` (`id`, `products`, `soluongtonkho`, `soluongdaban`, `country`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 2, 0, 300000.00, '2024-07-29 03:26:57', '2024-07-29 03:27:12'),
(2, 3, 10, 3, 0, 300000.00, '2024-07-29 03:26:57', '2024-07-29 03:27:17'),
(3, 4, 15, 4, 0, 300000.00, '2024-07-29 03:26:57', '2024-07-29 03:27:23'),
(4, 5, 20, 5, 0, 300000.00, '2024-07-29 03:26:57', '2024-07-29 03:27:30'),
(5, 6, 5, 2, 0, 300000.00, '2024-07-29 03:26:57', '2024-07-29 03:27:34'),
(6, 7, 10, 3, 0, 300000.00, '2024-07-29 03:26:57', '2024-07-29 03:27:41'),
(7, 8, 15, 4, 0, 300000.00, '2024-07-29 03:26:57', '2024-07-29 03:27:46'),
(8, 9, 20, 5, 0, 300000.00, '2024-07-29 03:26:57', '2024-07-29 03:27:50'),
(9, 10, 5, 2, 0, 300000.00, '2024-07-29 03:26:57', '2024-07-29 03:27:54'),
(10, 11, 10, 3, 0, 300000.00, '2024-07-29 03:26:57', '2024-07-29 03:27:57'),
(11, 12, 15, 4, 0, 500000.00, '2024-07-29 03:26:57', '2024-07-29 03:28:01'),
(12, 13, 20, 5, 0, 500000.00, '2024-07-29 03:26:57', '2024-07-29 03:28:04'),
(13, 14, 5, 2, 0, 500000.00, '2024-07-29 03:26:57', '2024-07-29 03:28:07'),
(14, 15, 10, 3, 0, 500000.00, '2024-07-29 03:26:57', '2024-07-29 03:28:11'),
(15, 16, 15, 4, 0, 500000.00, '2024-07-29 03:26:57', '2024-07-29 03:28:17'),
(16, 17, 20, 5, 0, 500000.00, '2024-07-29 03:26:57', '2024-07-29 03:28:21'),
(17, 18, 5, 2, 0, 500000.00, '2024-07-29 03:26:57', '2024-07-29 03:28:25'),
(18, 19, 10, 3, 0, 500000.00, '2024-07-29 03:26:57', '2024-07-29 03:28:28'),
(19, 20, 15, 4, 0, 500000.00, '2024-07-29 03:26:57', '2024-07-29 03:28:36'),
(20, 21, 20, 5, 0, 500000.00, '2024-07-29 03:26:57', '2024-07-29 03:28:43'),
(21, 22, 5, 2, 0, 700000.00, '2024-07-29 03:26:57', '2024-07-29 03:28:48'),
(22, 23, 10, 3, 0, 700000.00, '2024-07-29 03:26:57', '2024-07-29 03:28:53'),
(23, 24, 15, 4, 0, 700000.00, '2024-07-29 03:26:57', '2024-07-29 03:28:58'),
(24, 25, 20, 5, 0, 700000.00, '2024-07-29 03:26:57', '2024-07-29 03:29:06'),
(25, 26, 5, 2, 0, 700000.00, '2024-07-29 03:26:57', '2024-07-29 03:29:09'),
(26, 27, 10, 3, 0, 700000.00, '2024-07-29 03:26:57', '2024-07-29 03:29:13'),
(27, 28, 15, 4, 0, 700000.00, '2024-07-29 03:26:57', '2024-07-29 03:29:16'),
(28, 29, 20, 5, 0, 700000.00, '2024-07-29 03:26:57', '2024-07-29 03:29:21'),
(29, 30, 5, 2, 0, 700000.00, '2024-07-29 03:26:57', '2024-07-29 03:29:25'),
(30, 31, 10, 3, 0, 700000.00, '2024-07-29 03:26:57', '2024-07-29 03:29:28'),
(31, 32, 15, 4, 0, 900000.00, '2024-07-29 03:26:57', '2024-07-29 03:29:31'),
(32, 33, 20, 5, 0, 900000.00, '2024-07-29 03:26:57', '2024-07-29 03:29:34'),
(33, 34, 5, 2, 0, 900000.00, '2024-07-29 03:26:57', '2024-07-29 03:29:37'),
(34, 35, 10, 3, 0, 900000.00, '2024-07-29 03:26:57', '2024-07-29 03:29:42'),
(35, 36, 15, 4, 0, 900000.00, '2024-07-29 03:26:57', '2024-07-29 03:29:45'),
(36, 37, 20, 5, 0, 900000.00, '2024-07-29 03:26:57', '2024-07-29 03:29:49'),
(37, 38, 5, 2, 0, 900000.00, '2024-07-29 03:26:57', '2024-07-29 03:29:52'),
(38, 39, 10, 3, 0, 900000.00, '2024-07-29 03:26:57', '2024-07-29 03:29:58'),
(39, 40, 15, 4, 0, 900000.00, '2024-07-29 03:26:57', '2024-07-29 03:30:04'),
(40, 41, 20, 5, 0, 900000.00, '2024-07-29 03:26:57', '2024-07-29 03:30:07'),
(41, 42, 5, 2, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:30:11'),
(42, 43, 10, 3, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:30:14'),
(43, 44, 15, 4, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:30:18'),
(44, 45, 20, 5, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:30:26'),
(45, 46, 5, 2, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:30:29'),
(46, 47, 10, 3, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:30:32'),
(47, 48, 15, 4, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:30:35'),
(48, 49, 20, 5, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:30:39'),
(49, 50, 5, 2, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:30:49'),
(50, 51, 10, 3, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:30:52'),
(51, 52, 15, 4, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:30:58'),
(52, 53, 20, 5, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:31:04'),
(53, 54, 5, 2, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:31:08'),
(54, 55, 10, 3, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:31:12'),
(55, 56, 15, 4, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:31:21'),
(56, 57, 20, 5, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:31:26'),
(57, 58, 5, 2, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:31:30'),
(58, 59, 10, 3, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:31:34'),
(59, 60, 15, 4, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:31:37'),
(60, 61, 20, 5, 0, 1000000.00, '2024-07-29 03:26:57', '2024-07-29 03:31:42'),
(61, 71, 5, 2, 1, 300000.00, '2024-07-29 03:36:14', '2024-08-01 11:15:37'),
(62, 70, 10, 3, 1, 320000.00, '2024-07-29 03:36:14', '2024-08-01 11:15:32'),
(63, 64, 15, 4, 1, 340000.00, '2024-07-29 03:36:14', '2024-08-01 11:15:13'),
(64, 69, 20, 5, 1, 360000.00, '2024-07-29 03:36:14', '2024-08-01 11:15:28'),
(65, 68, 5, 2, 1, 380000.00, '2024-07-29 03:36:14', '2024-08-01 11:15:24'),
(66, 67, 10, 3, 1, 400000.00, '2024-07-29 03:36:14', '2024-08-01 11:15:21'),
(67, 66, 15, 4, 1, 420000.00, '2024-07-29 03:36:14', '2024-08-01 11:15:19'),
(68, 65, 20, 5, 1, 440000.00, '2024-07-29 03:36:14', '2024-08-01 11:15:16'),
(69, 73, 5, 2, 1, 460000.00, '2024-07-29 03:36:14', '2024-08-01 11:15:43'),
(70, 62, 10, 3, 1, 480000.00, '2024-07-29 03:36:14', '2024-08-01 11:15:06'),
(71, 63, 15, 4, 1, 490000.00, '2024-07-29 03:36:14', '2024-08-01 11:15:10'),
(72, 72, 20, 5, 1, 500000.00, '2024-07-29 03:36:14', '2024-08-01 11:15:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categories` int(11) DEFAULT NULL,
  `nameProduct` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `featured` int(11) DEFAULT 0,
  `hot_product` int(11) DEFAULT 0,
  `status_sale` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `categories`, `nameProduct`, `image`, `title`, `code`, `description`, `featured`, `hot_product`, `status_sale`, `created_at`, `updated_at`) VALUES
(1, 5, 'Áo khoác len cổ chữ V cài khuy', 'nam1', 'họa tiết đan chéo', 'NAM0', 'Một chiếc áo được may tinh tế tỉ mỉ đến từng đường may ', 0, 0, 0, '2024-07-29 11:29:03', '2024-08-01 10:39:05'),
(2, 5, 'Áo khoác len cổ chữ V cài khuy', 'nam2', 'họa tiết đan chéo', 'NAM1', '\"Tôi đã có chiếc cardigan này trong danh sách \'cần thiết kế\' của mình trong vài năm. Khi nhóm thiết kế của chúng tôi quyết định tạo ra một bộ sưu tập trang phục nam, tôi biết cuối cùng cũng đến lúc biến ý tưởng thành hiện thực!\n\nÁo khoác len cài khuy là một trong những món đồ yêu thích nhất trong tủ quần áo của tôi. Sự vượt thời gian thực sự của chúng khiến chúng trở nên rất đa năng. Tôi thích kết hợp chúng với mọi loại trang phục để có sự ấm áp tức thì, dù ở nhà hay trên đường.', 0, 0, 0, '2024-07-28 23:05:56', '2024-08-01 10:39:10'),
(3, 5, 'Áo khoác len cổ chữ V cài khuy', 'nam3', 'họa tiết đan chéo', 'NAM2', 'Một mũi tên được bắn ra từ một ống đựng - một đường thẳng cắt ngang một mục tiêu xa. Fehling là sự giao thoa đồ họa giữa ý định và hình thức. Các đường song song của gân mịn chạy từ gấu đến cổ áo, hội tụ thành hình chữ V đồ họa ở vai. Chiếc áo len unisex này thể hiện sự táo bạo khiêm tốn một cách dễ dàng và tỏa sáng trên mọi dáng người.', 0, 0, 0, '2024-07-28 23:05:56', '2024-08-01 10:39:13'),
(4, 5, 'Áo len cổ tròn', 'nam4', 'kiểu dáng gân', 'NAM3', 'Chiếc áo len cổ chữ V gân sang trọng không bao giờ lỗi mốt. Với vẻ ngoài mang tính biểu tượng trong Shelter sợi len hoặc tông màu lông cừu của Tones, Brownstone dễ dàng phối hợp với áo sơ mi cài khuy trong tuần làm việc và áo phông cuối tuần. Kết cấu raglan liền mạch, từ dưới lên và kiểu dáng thẳng dễ dàng được hoàn thiện với hình dáng hàng ngắn biến Brownstone trở thành một cổ điển tức thì để đan và mặc - phiên bản cập nhật này cung cấp một loạt kích cỡ rộng hơn và hướng dẫn điều chỉnh chiều dài tay áo và thân áo.', 0, 0, 0, '2024-07-28 23:05:56', '2024-08-01 10:39:20'),
(5, 5, 'Áo len cổ chữ V', 'nam5', 'kiểu dáng đơn giản', 'NAM4', 'Được thực hiện trong một mảnh duy nhất từ ​​dưới lên, thiết kế này chứng minh rằng những mảnh thú vị không cần phải khó đan. Được thiết kế như một trang phục unisex, ba chiều dài thân áo khác nhau được cung cấp để bạn có thể tạo ra kiểu dáng và tỷ lệ phù hợp với sở thích của mình.\n\nCác đường viền lỗ tay tự hoàn thiện được thực hiện bằng cách sử dụng viền đan và mép gấp gọn gàng để tạo ra một kết thúc gọn gàng, chuyên nghiệp - không cần nhặt lỗ tay! Các đường viền tay áo, cổ áo và vai vừa vặn thông minh sử dụng hình dáng hoàn thiện đầy đủ để tạo nên vẻ ngoài cao cấp, sẽ mời gọi những người yêu thích chi tiết xem xét kỹ hơn về tay nghề của bạn.\n\nCổ tròn được hoàn thiện với một đường viền gấp độc đáo và viền cổ gấp mềm mại mang lại cảm giác chất lượng cao, với độ bền cao hơn. Kết hợp các kích cỡ áo vest khác nhau với các chiều dài thân áo khác nhau để có được tỷ lệ trang phục phù hợp với tủ quần áo của bạn và mời gọi phối hợp với áo trên và áo khoác ngoài yêu thích của bạn.', 0, 0, 0, '2024-07-28 23:05:56', '2024-08-01 10:39:23'),
(6, 5, 'Áo len cổ tròn', 'nam6', 'phong cách quân đội', 'NAM5', '\"Grist mang đến một cái nhìn tiết chế về áo len câu cá truyền thống, với vai đắp gân và các họa tiết sọc toàn bộ tinh tế gợi nhớ đến những chiếc áo gansey yêu thích cũ. Mặc dù có tính chất thoải mái, nhưng dáng áo vuông khéo léo che giấu các chi tiết định hình giúp giữ tỷ lệ và vừa vặn đẹp mắt. Các đường vai dốc sâu ngăn phần thân trên bị quá tải với vải thừa, trong khi hình dáng thân tinh tế tùy chọn điều chỉnh độ vừa vặn của phần thân dưới.\n\nCác mẫu đan-trái sọc có suy nghĩ của vải chứa đủ sự đa dạng để giữ cho việc đan len trở nên hấp dẫn, và tạo ra một kết cấu ấm áp tinh tế, nhờ vào cấu trúc ba sợi của Imbue Sport, được dệt từ len merino mềm mại. Mảnh vai thả được sửa đổi này được thực hiện từ trên xuống, cho phép thử đồ trong quá trình thực hiện và cho phép tùy chỉnh dễ dàng chiều dài thân và tay áo. ” - nhà thiết kế, Jared Flood', 0, 0, 0, '2024-07-28 23:05:56', '2024-08-01 10:39:27'),
(7, 5, 'Áo len cổ tròn', 'nam7', 'kiểu đan brioche', 'NAM6', 'Giống như những gai trung tâm của lá nhiệt đới, những đường gân thẳng đứng nổi lên trên các góc nghiêng mang lại sự kết hợp giữa hữu cơ và cấu trúc trong Haskins, một chiếc áo len hiện đại cho mọi dáng người. Cổ áo rơi thoải mái bổ sung cho độ rộng của vai cổ điển được đặt vào, làm cho đây là một lựa chọn dễ dàng để phối hợp với áo sơ mi cài khuy hoặc áo sơ mi cổ. Được khắc với các tấm đan xoắn và cáp gọn gàng ở cả mặt trước và mặt sau, chiếc áo len này là một bổ sung nâng cao cho bất kỳ tủ quần áo làm việc nào. Thiết kế ấn tượng này che giấu các kỹ thuật đan đơn giản và mặc tốt trong len Targhee 100% của Arbor.', 0, 0, 0, '2024-07-28 23:05:56', '2024-08-01 10:39:32'),
(8, 5, 'Áo len cổ tròn', 'nam8', 'họa tiết dập nổi', 'NAM7', 'Gặp gỡ Aldous, một nghiên cứu về mũi đan brioche tạo nên một trang phục ấm áp và thoáng khí chào đón. Các bảng điều khiển trung tâm của brioche tổ ong, được kẹp bởi gân brioche, là một bữa tiệc cho đôi tay - dám chống lại việc ôm lấy vải trong khi nó vẫn còn phát triển trên kim của bạn! Các cạnh ống và gân xoắn ở gấu, kết hợp với viền cổ gấp, chỉ làm tăng thêm sự phức tạp ấm cúng của trang phục này. Làm việc với Aldous trong Shelter để có sự kết hợp hoàn hảo giữa sợi tơ và mũi đan sang trọng.\n\nChiếc áo len này được đan phẳng, thành từng mảnh, từ dưới lên. Sau khi lắp ráp, cổ áo được nhặt lên và đan tròn, sau đó gấp lại và khâu vào bên trong áo.', 0, 0, 0, '2024-07-28 23:05:56', '2024-08-01 10:39:37'),
(9, 5, 'Áo len cổ tròn', 'nam9', 'họa tiết dập nổi', 'NAM8', '\nKết cấu lấy cảm hứng từ áo len đánh cá truyền thống (gansey) tạo nên nét đặc sắc cho chiếc áo len cổ chữ V đẹp trai này, được làm từ sợi len Arbor.\nHọa tiết gân nổi bật toàn bộ thân áo nhường chỗ cho họa tiết cáp thừng và hình chữ V ở phần thân trên.\nCác rãnh rộng được tạo bởi mũi trái phân định hai bên hông áo.\nCông đoạn đan bắt đầu theo hình tròn, sau đó chia tách ở phần прой nách để đan phẳng đến vai.\nMép ống tay được hoàn thiện đơn giản, được đan tròn sau khi nối vai, tạo nên kết thúc bóng bẩy và chuyên nghiệp.\nÁo có tùy chọn thân hơi bó hoặc thẳng để phù hợp với dáng người.', 0, 0, 0, '2024-07-28 23:05:56', '2024-08-01 10:39:41'),
(10, 5, 'Áo len cổ tròn', 'nam10', 'họa tiết đan chéo, kiểu dáng cổ điển', 'NAM9', 'Chiếc áo len Shelter tiện dụng này nổi bật với các chi tiết thông minh, phù hợp với mọi tủ đồ nam tính.\nHọa tiết bàn cờ đơn giản được tạo bởi các mũi đan và mũi trái tạo nên kết cấu tinh tế trên toàn bộ áo.\nCổ áo gấp với gân kép tăng thêm độ bền chắc.\nMiếng vá khuỷu tay với màu tương phản (Loft) mang phong cách học thuật hoặc trẻ trung tùy theo lựa chọn màu sắc của bạn.\nThân áo Fort được đan tròn đến nách; phần thân trên và tay áo được đan phẳng và ghép lại.', 0, 0, 0, '2024-07-28 23:05:56', '2024-08-01 10:39:44'),
(11, 5, 'Áo len cổ tròn', 'nam11', 'họa tiết dập nổi phần thân trên', 'NAM10', 'Áo khoác len sang trọng này cập nhật phong cách nam tính cổ điển với phần tay áo ôm vừa vặn hiện đại.\nVai áo được thiết kế gọn gàng của Radmere kết hợp với cổ áo shawl ngoại cỡ, chất liệu len Shelter được dệt kim dày đặc giúp đủ ấm để mặc như áo khoác vào mùa thu mát mẻ.\nCác mũi đan phức tạp sẽ thể hiện rõ ưu điểm nhất với màu sắc sáng hoặc nổi bật; hãy tưởng tượng nó với màu đỏ ấn tượng như Long Johns hoặc màu xám dịu nhẹ như Sweatshirt để tạo hiệu ứng rất khác biệt.', 0, 0, 0, '2024-07-28 23:05:56', '2024-08-01 10:39:48'),
(12, 5, 'Áo len không tay', 'nam12', 'kiểu dáng thủy thủ', 'NAM11', 'Một chiếc áo len đẹp mắt với họa tiết cáp luôn hợp thời trang, và sợi len trung bình bền bỉ là lựa chọn hoàn hảo cho một chiếc áo len đồng hành cùng bạn qua nhiều thập kỷ.\nThoạt nhìn, Svenson có vẻ được tạo thành từ họa tiết Aran truyền thống, nhưng họa tiết tổ ong ở thân giữa kết hợp các mũi trái để tạo hiệu ứng độc đáo, và họa tiết cáp móng ngựa hai bên vui nhộn với kích thước khác nhau.\nMũi đan hạt và gân xoắn một nửa hoàn thiện nghiên cứu về họa tiết, tận dụng hết ưu điểm của sợi len Arbor.\nCác mảnh đan phẳng được định hình cẩn thận để tạo thành phần thân trên là sự kết hợp giữa raglan và vai yên ngựa, đảm bảo vừa vặn và thoải mái.\nBạn có thể đan phiên bản Classic được hiển thị ở đây để có form áo truyền thống, hoặc phiên bản Shaped để vừa vặn thoải mái với dáng người nhỏ nhắn hơn.', 0, 0, 0, '2024-07-28 23:05:56', '2024-08-01 10:39:52'),
(13, 5, 'Áo len không tay', 'nam12', 'kiểu dáng lớp', 'NAM12', 'Cobblestone tôn vinh vẻ đẹp giản đơn và họa tiết của mũi đan garter. Thiết kế trang phục đầu tiên của Jared Flood tôn vinh các chi tiết đơn giản, vượt thời gian: thân trên tròn, các mảnh hông có gân tinh tế và viền garter.\nThân trên đan toàn bộ mũi garter tạo điểm nhấn thị giác cho vai trong khi các hàng ngắn nâng cao phần lưng để vừa vặn thoải mái.\nKết cấu liền mạch, trực quan được đan từ dưới lên tuân theo nguyên tắc của Elizabeth Zimmermann và mang đến trải nghiệm đan thoải mái như thưởng thức một tách trà nóng.\nKết cấu đơn giản của Cobblestone phù hợp cho cả người mới bắt đầu đan áo len và là sự trở lại thú vị với những điều cơ bản cho người đan nhiều kinh nghiệm hơn. Chiếc áo len đa năng này là một phần không thể thiếu trong mọi tủ quần áo.', 0, 0, 0, '2024-07-28 23:05:56', '2024-08-01 10:40:12'),
(14, 6, 'Áo len cổ tròn', 'nu1', 'Kết hợp màu sắc', 'AONU1', 'Kết hợp màu sắc và sợi để tạo ra vải tùy chỉnh của riêng bạn trong chiếc áo len thoải mái này sử dụng biến thể mũi đan tuck stitch dễ thực hiện trên nền mũi hạt. Chúng tôi kết hợp len Arbor bền bỉ, mịn màng với hỗn hợp merino-cotton nhuộm tông màu Dapple để tạo ra một loại vải tinh tế, hội tụ tất cả các yếu tố: họa tiết, độ r垂 (chu垂 -垂 chui: rủ xuống) và biến đổi màu sắc. Chọn bất kỳ sợi len và sự kết hợp sợi DK nào để tạo ra vải riêng độc đáo theo phong cách của bạn. Hãy thử sử dụng len nhuộm tay hoặc len tự sọc làm màu tương phản để tạo hiệu ứng tranh vẽ ấn tượng hơn. Bạn cũng có thể thử giữ nguyên màu chính của mình, đồng thời sử dụng nhiều màu tương phản cho hiệu ứng sọc nền tinh tế hoặc hiệu ứng colorblock. Hãy sáng tạo và tạo ra chiếc áo len mà bạn yêu thích!\n\"Chọn từ ba chiều dài thân áo khác nhau (ngắn vừa, cổ điển hoặc dài) và hai chiều dài tay áo (dài hoặc ngắn) để có được tỷ lệ phù hợp nhất với người mặc. Các chi tiết lấy cảm hứng từ hàng hải như gân hạt dọc theo phần trên của tay áo và cổ áo gấp đôi dệt kim tạo cho thành phẩm một vẻ chất lượng được chăm chút kỹ lưỡng.\" - nhà thiết kế Jared Flood', 0, 0, 0, '2024-07-28 23:50:12', '2024-08-01 10:40:18'),
(15, 6, 'Áo len cổ tròn', 'nu2', 'Tùy chỉnh', 'AONU2', 'Áo len chui đầu từ trên xuống sang trọng này là sự kết hợp hoàn hảo giữa sự ấm cúng và tốc độ đan của len sợi c bulky. Các chi tiết định hình tinh tế giúp phong cách oversized dễ dàng này không bị quá rộng so với người mặc. Tùy chỉnh tỷ lệ áo len của bạn từ menu các tùy chọn cổ áo, thân và tay áo giúp bạn đạt được hình dạng phù hợp nhất với mình. Vì áo được đan từ trên xuống, nên có thể thử trong suốt quá trình đan, cho phép bạn có được độ vừa vặn \"hoàn hảo\" mà không cần phỏng đoán.\" — nhà thiết kế Jared Flood', 0, 0, 0, '2024-07-28 23:50:12', '2024-08-01 10:40:20'),
(16, 6, 'Áo len cổ tròn', 'nu3', 'Kiểu Iceland', 'AONU3', 'Grettir được lấy cảm hứng từ thời gian ở Iceland giữa đường chân trời băng giá và ánh đèn thành phố nhộn nhịp. Kết quả: một phiên bản hiện đại của áo len cổ truyền yoke, với kiểu dáng ôm sát và cổ điển, cùng các tùy chọn cổ tròn hoặc cổ lọ để phù hợp nhất với sự thoải mái và phong cách của bạn.\n\nTrong chuyến thăm bờ biển phía bắc của đất nước, nhà thiết kế Jared Flood đã gặp một người kể chuyện kể cho anh ta nghe về saga tuyệt vời của Grettir - kẻ ngoài vòng pháp luật sống sót lâu nhất trong lịch sử Iceland. Jared thấy mình đặc biệt bị cuốn hút bởi chương cuối cùng trong câu chuyện: sự sụp đổ của Grettir trên những vách đá Drangey, một hòn đảo đá giống như pháo đài ngoài khơi. Địa điểm hùng vĩ này có thể nhìn thấy từ bờ biển và đóng vai trò trực tiếp vào các góc cạnh và họa tiết stranded hữu cơ của thân áo colorwork của chiếc áo len này.', 0, 0, 0, '2024-07-28 23:50:12', '2024-08-01 10:40:24'),
(17, 6, 'Áo len cổ lọ', 'nu4', 'Họa tiết ren', 'AONU4', 'Đặc trưng với đường viền lỗ khuyết tinh tế gợi lên hình ảnh cầu đi bộ ven biển, sóng nước của một con tàu hoặc vỏ cầu gai, Tensile là một lớp áo mùa xuân nhẹ nhàng. Được đan từ Loft hoặc Tones Light thoáng khí, sợi len được dệt kim, đây là một mảnh vải được mặc sát da như bọt biển - những đám mây trên cát - dường như lơ lửng và hầu như không có ở đó, nhưng được giữ lại bởi sức căng của hàng ngàn mũi đan đơn giản.\nÁo này được đan phẳng thành từng mảnh từ dưới lên, sau đó may lại với nhau. Cổ lọ được nhặt lên và đan tròn. Họa tiết lỗ khuyết chỉ được đan theo biểu đồ.', 0, 0, 0, '2024-07-28 23:50:12', '2024-08-01 10:40:27'),
(18, 6, 'Áo len cổ tròn', 'nu5', 'Với phần vai đan chéo', 'AONU5', 'Các cột cáp cong, giống như cánh bao quanh thân áo nổi bật của Alary, được đan liền mạch bằng len Quarry chunky dệt kim. Đan phiên bản tay ngắn của chúng tôi để có một lớp áo mặc ngay bây giờ để mặc lên váy và kết hợp với quần jean, hoặc tùy chỉnh để có độ ấm tối đa với cổ lọ sang trọng, tay áo ba phần tư hoặc dài toàn bộ và gấu thẳng hoặc ôm sát.', 0, 0, 0, '2024-07-28 23:50:12', '2024-08-01 10:40:31'),
(19, 6, 'Áo len cổ tròn', 'nu6', 'Họa tiết dập nổi', 'AONU6', 'Dễ dàng như sáng Chủ nhật và thanh lịch một cách nhẹ nhàng. Niềm vui của những người theo chủ nghĩa tối giản, những đường nét gọn gàng và cấu trúc raglan liền mạch từ trên xuống của Bresson, được in hoa văn chìm tinh tế với các mảng gân hạt góc cạnh, cho phép vẻ đẹp đơn giản của chất liệu của nó nổi bật trong Shelter hoặc Tones dệt kim cao cấp. Đánh dấu', 0, 0, 0, '2024-07-28 23:50:12', '2024-08-01 10:40:34'),
(20, 6, 'Áo len cổ tròn tay lỡ', 'nu7', 'Kiểu dáng gân', 'AONU7', 'Áo khoác len cổ chữ V này được đan phẳng bằng sợi Loft và may lại. Túi áo bắt đầu bằng lớp lót được đan riêng rồi mới đan lên mặt trước (giúp dễ dàng thêm màu tương phản bí mật bên trong túi nếu muốn). Viền túi bằng gân 1 x 1 giữ cho túi không bị hở. Tay áo may vào đảm bảo vừa vặn và các đường viền gân ống tạo nên một kết thúc đẹp và bền.', 0, 0, 0, '2024-07-28 23:50:12', '2024-08-01 10:40:39'),
(21, 6, 'Áo len tay raglan', 'nu8', 'Kiểu dáng gân lớn - Tùy chỉnh', 'AONU8', '“Với cổ chữ V sâu, vai rơi rộng, gấu xẻ và sọc kẻ đậm, tôi có thể thấy nó được mặc quanh năm cho hầu hết mọi dịp. Nó cũng thực sự thoải mái. Hãy vui vẻ lựa chọn các kết hợp sọc màu yêu thích của bạn!” – Julie Hoover', 0, 0, 0, '2024-07-28 23:50:12', '2024-08-01 10:40:42'),
(22, 6, 'Áo len cổ tròn', 'nu9', 'Họa tiết dập nổi - Kiểu dáng ghép nối', 'AONU9', 'Các chi tiết đơn giản như cổ áo gấp đôi, gấu xẻ giữa và lỗ khuyết trang trí ở vai, gấu và tay áo làm cho áo len Culm trở thành một trang phục vừa bóng bẩy vừa đẹp mắt. Tay áo dolman, eo thon và vai rơi tạo nên dáng vẻ cổ điển tinh tế.\n\nGấu áo được đan phẳng, sau đó nối lại để tiếp tục đan tròn đến lỗ tay, rồi mặt trước và mặt sau được đan riêng đến vai. Vai được nối lại với nhau rồi nhặt mũi để đan tay áo, được đan tròn đến cổ tay. Cổ áo được nhặt lên và đan tròn, sau đó gấp lại và khâu vào vị trí.', 0, 0, 0, '2024-07-28 23:50:12', '2024-08-01 10:40:47'),
(23, 6, 'Áo khoác len cổ chữ V', 'nu10', 'Dáng ôm', 'AONU10', '\"Chiếc áo len dễ đan này chứng minh rằng những chiếc áo len phong cách có thể được tạo ra từ những mẫu mũi đan đơn giản nhất. Mũi hạt, bao gồm việc đan xen kẽ các vòng đan và trái trong khi đan tròn, tạo ra một loại vải mềm mại và xốp hoàn hảo cho việc chạy việc vặt cuối tuần hoặc thư giãn tại nhà.\nMặc dù có cấu trúc đơn giản, Stella kết hợp các chi tiết định hình chu đáo góp phần tạo nên dáng vẻ đẹp mắt và tỷ lệ phong cách, ngăn chặn chiếc áo quá khổ này áp đảo người mặc. Dáng áo hộp được bổ sung bởi đường eo tinh tế, thân áo ngắn vừa phải và đường cong gấu duyên dáng được tạo hình bằng các hàng ngắn đơn giản. Tay áo loe hoặc thẳng thư giãn rơi xuống dưới khuỷu tay, đảm bảo rằng những chiếc còng rộng thoải mái tránh xa công việc của bạn trong nhà bếp, vườn hoặc phòng thủ công khi mặc.\" — nhà thiết kế Jared Flood', 0, 0, 0, '2024-07-28 23:50:12', '2024-08-01 10:40:51'),
(24, 6, 'Áo len cổ chữ V', 'nu11', 'Kẻ sọc', 'AONU11', '\"Chiếc áo len dễ đan này chứng minh rằng những chiếc áo len phong cách có thể được tạo ra từ những mẫu mũi đan đơn giản nhất. Mũi hạt, bao gồm việc đan xen kẽ các vòng đan và trái trong khi đan tròn, tạo ra một loại vải mềm mại và xốp hoàn hảo cho việc chạy việc vặt cuối tuần hoặc thư giãn tại nhà.\nMặc dù có cấu trúc đơn giản, Stella kết hợp các chi tiết định hình chu đáo góp phần tạo nên dáng vẻ đẹp mắt và tỷ lệ phong cách, ngăn chặn chiếc áo quá khổ này áp đảo người mặc. Dáng áo hộp được bổ sung bởi đường eo tinh tế, thân áo ngắn vừa phải và đường cong gấu duyên dáng được tạo hình bằng các hàng ngắn đơn giản. Tay áo loe hoặc thẳng thư giãn rơi xuống dưới khuỷu tay, đảm bảo rằng những chiếc còng rộng thoải mái tránh xa công việc của bạn trong nhà bếp, vườn hoặc phòng thủ công khi mặc.\" — nhà thiết kế Jared Flood', 0, 0, 0, '2024-07-28 23:50:12', '2024-08-01 10:40:54'),
(25, 6, 'Áo len không tay', 'nu12', 'Kiểu dáng trơn - Len dày', 'AONU12', 'Thời trang và sự dễ dàng kết hợp trong chiếc áo len Weidlinger nổi bật. Các góc kiến trúc của cấu trúc mô đun được làm mềm bởi những dải mũi hạt tinh tế trên toàn bộ. Các rãnh gân đứt tạo thành cổ áo và còng tay, thêm sự thú vị và cấu trúc cho ngay cả những chi tiết nhỏ nhất, trong khi các đường gân vuông góc được đặt cẩn thận trên mặt trước để tôn lên mọi dáng người. Giàu cả về kết cấu và sự thoải mái, Weidlinger sẽ là chiếc áo len hàng đầu của bạn cho mọi dịp, từ thời gian nghỉ ngơi tại nhà với một tách trà đến buổi tối đi chơi với bạn bè. Với cả hai chiều dài cắt ngắn và cổ điển, bạn sẽ thấy nó phù hợp hoàn hảo với bộ sưu tập hiện tại của mình.', 0, 0, 0, '2024-07-28 23:50:12', '2024-08-01 10:40:58'),
(26, 7, 'Khăn len', 'khanchoang1', 'Kiểu dáng đơn giản', 'AOCHOANG1', 'Sợi len chunky làm nổi bật kết cấu nhỏ, sần của vải Shaker Rib để tạo ra chiếc khăn len đan nhanh, vừa ấm vừa phong cách. Tạo nên chiếc khăn của riêng bạn bằng cách thêm bất kỳ họa tiết thêu gợi ý nào của chúng tôi bằng cách sử dụng các mảnh vụn len từ kho của bạn!', 0, 0, 0, '2024-07-29 00:13:59', '2024-08-01 10:43:58'),
(27, 7, 'Khăn len họa tiết', 'khanchoang2', 'Họa tiết đan chéo', 'AOCHOANG2', '“Mẫu mũi đan đơn giản hơn so với vẻ ngoài của nó, sử dụng các mũi cáp chéo chỉ một lần sau mỗi 14 hàng; phần lặp lại 2 hàng còn lại được đan cho tất cả các hàng còn lại. Chiếc khăn bắt đầu và kết thúc với một viền gân được đan trên một kim nhỏ hơn; các kết cấu cáp chảy không bị gián đoạn từ gân, và một đường viền dây được đan dọc theo mỗi cạnh của chiếc khăn suốt chiều dài để tạo ra một kết thúc bóng bẩy, chuyên nghiệp. Ngay cả mặt trái của vải cũng có một vẻ ngoài có hoa văn độc đáo khiến chiếc khăn này trở nên đặc biệt bất kể mặt nào hướng ra ngoài. Được làm bằng len DK đàn hồi, vải có kết cấu sâu và độ xốp tuyệt vời, hoàn hảo để ôm ấp khi ra ngoài gặp gỡ các yếu tố.” - nhà thiết kế Jared Flood', 0, 0, 0, '2024-07-29 00:13:59', '2024-08-01 10:44:02'),
(28, 7, 'Khăn len hai mặt', 'khanchoang3', 'Kiểu dáng gân', 'AOCHOANG3', 'Chiếc khăn len đảo ngược này trong gân hạt là một dự án hoàn hảo cho những người đan ít kinh nghiệm hơn hoặc cho bất kỳ ai thích phong cách đơn giản, không phức tạp. Một đường viền dây đan gọn gàng mang đến sự hoàn thiện tinh tế cho Dunaway, với tùy chọn đan khởi đầu và kết thúc ống để tăng thêm sự tinh tế. Đan nó bằng sợi len yêu thích của bạn để có một chiếc khăn gọn gàng, đẹp trai; trọng lượng worsted cho một chiếc khăn choàng quá khổ ấm cúng để xua tan thời tiết mùa đông.', 0, 0, 0, '2024-07-29 00:13:59', '2024-08-01 10:44:07'),
(29, 7, 'Khăn len họa tiết', 'khanchoang4', 'Họa tiết dệt', 'AOCHOANG4', 'Mang những sợi cáp cổ điển đến tủ quần áo hiện đại của bạn với chiếc khăn dễ làm và thú vị này. Thực hành kỹ thuật của bạn trên hai cáp khác nhau giao nhau trên cùng một hàng để ghi nhớ nhanh chóng. Một phương pháp xử lý viền dây dễ thực hiện mang lại kết thúc chuyên nghiệp (không có mép xoăn!) Chọn từ hai tùy chọn chiều rộng và tận hưởng việc xem các cáp bơ tươi giòn hình thành trong Tones 3 sợi tròn, nảy hoặc Imbue Worsted 5 sợi sang trọng, đàn hồi', 0, 0, 0, '2024-07-29 00:13:59', '2024-08-01 10:44:10'),
(30, 7, 'Khăn len và khăn choàng', 'khanchoang5', 'Kiểu dáng gân và ren', 'AOCHOANG5', 'Đánh bại thời tiết lạnh giá với phong cách tức thì với chiếc khăn hoặc khăn choàng len cáp chunky. Các khối họa tiết kết cấu gợi nhớ đến áo len của thủy thủ tạo ra một loại vải hấp dẫn trên toàn bộ và giữ cho quá trình đan len trở nên hấp dẫn. Làm nên một chiếc khăn truyền thống hoặc, nếu bạn thích những phụ kiện không làm giảm đi, hãy mở rộng Byway của bạn thành một chiếc khăn choàng ấn tượng. Quarry làm cho việc đan len bay nhanh và hiển thị các mẫu mũi đan đẹp mắt.', 0, 0, 0, '2024-07-29 00:13:59', '2024-08-01 10:44:15'),
(31, 7, 'Khăn len và khăn choàng', 'khanchoang6', 'Kiểu dáng gân', 'AOCHOANG6', 'Lấy cảm hứng từ những đường cong của lá lan bên dưới những tia sáng của một nhà kính mái vòm, ren chảy vào gân xoắn trong cả khăn và khăn choàng Ensata.\nChiếc khăn được đan phẳng từ đầu đến cuối. Khăn choàng được đan tròn từ dưới lên.\n\nChiếc khăn được đan phẳng từ đầu đến cuối. Khăn choàng được đan tròn từ dưới lên.', 0, 0, 0, '2024-07-29 00:13:59', '2024-08-01 10:44:19'),
(32, 7, 'Khăn len ghép nối', 'khanchoang7', 'Kiểu dáng trơn và gân', 'AOCHOANG7', '“Một hình chữ nhật ấm cúng để đan trong hai trọng lượng len (fingering hoặc worsted) và bốn kích cỡ (khăn / khăn choàng / chăn nhỏ / chăn lớn). Những đường kẻ xoắn trong một họa tiết hoa văn phong phú thêm một yếu tố hữu cơ làm giảm cấu trúc hình thức của mẫu và dịch chuyển đẹp mắt trong cả tông màu đá quý và sắc thái nhạt từ thiên nhiên. Gân viền cung cấp một kết thúc cổ điển, gọn gàng cho các cạnh. ”− Anne Hanson', 0, 0, 0, '2024-07-29 00:13:59', '2024-08-01 10:44:23'),
(33, 7, 'Khăn len họa tiết', 'khanchoang8', 'Họa tiết dập nổi', 'AOCHOANG8', 'Với năng lượng bị bắt giữ của chuyển động ràng buộc, những đường nét động lực của chuyển động lao xuống cùng chiều dài của Nourse. Các đường kẻ chéo của gân góc mạnh mẽ hội tụ trong các hình chữ V được nhấn mạnh hướng dẫn mắt qua vải Shelter dẻo dai của nó. Là phần bổ sung lý tưởng cho áo len Fehling, chiếc khăn đồ họa này vừa tinh tế vừa nổi bật, với hai kích thước phù hợp với sở thích của bạn.', 0, 0, 0, '2024-07-29 00:13:59', '2024-08-01 10:44:27'),
(34, 7, 'Khăn len đan', 'khanchoang9', 'Đan ngắn hàng', 'AOCHOANG9', 'Một nghiên cứu về sự thanh lịch và dễ dàng, Cassatt là một chiếc khăn đan được tạo ra để phủ lên vai trần khi ngày chuyển sang tối. Mỗi viên kim cương lát gạch là một đoạn phim ngắn về các biểu hiện dọc và ngang liên kết với nhau. Các cáp tinh tế tạo thành các góc chính xác của chiếc khăn lấy cảm hứng từ may vá này trong khi định nghĩa rõ ràng của Arbor nhấn mạnh vải ba chiều sang trọng của nó.', 0, 0, 0, '2024-07-29 00:13:59', '2024-08-01 10:44:32'),
(35, 7, 'Khăn choàng và khăn len', 'khanchoang10', 'Họa tiết đan chéo', 'AOCHOANG10', 'Với con mắt nghệ sĩ về hình học và khoảng trống âm, Calcarea ôm lấy thiết kế được giải phóng và cấu trúc năng động. Được tạo hình với một đường cong tinh tế, chiếc khăn mô đun này có các khối mũi đan trơn được bao quanh bởi các bảng khung garter. Được đan từ đầu đến cuối, các mũi đan được buộc lại để tạo thành các lỗ thông hơi, tạo ra những vệt không gian mở giữa vải đơn giản khác. Đan phụ kiện sáng tạo này ở một màu trung tính để nhấn mạnh hình dạng hoặc khung trong tông màu đậm để nhấn mạnh các khoảng trống vải nổi bật.', 0, 0, 0, '2024-07-29 00:13:59', '2024-08-01 10:44:37'),
(36, 7, 'Khăn len, khăn choàng hoặc chăn', 'khanchoang11', 'Họa tiết đan chéo và ren', 'AOCHOANG11', 'Những thác nước của các ô ba chiều đổ xuống chiều dài của chiếc khăn tuyệt đẹp này. Sử dụng những hóa thân khéo léo của cáp, hàng ngắn và mũi trượt, sự đặc biệt của kỹ thuật của Hallidie che giấu sự duyên dáng dễ mặc của nó. Hướng dẫn được viết và biểu đồ cho một loạt các tùy chọn khả năng tiếp cận. Làm việc với mẫu này trong một sợi len worsted hoặc DK để bổ sung hấp dẫn cho tất cả các vẻ ngoài mùa đông của bạn.', 0, 0, 0, '2024-07-29 00:13:59', '2024-08-01 10:44:41'),
(37, 7, 'Khăn choàng', 'khanchoang12', 'Họa tiết dập nổi', 'AOCHOANG12', 'Một sự pha trộn xúc giác của Arbor sợi len worsted và Loft sợi len, khăn Tallera thật sự đàn hồi và cực kỳ dễ chịu khi chạm vào. Những dải rộng của gân nén được nhấn mạnh bởi các điểm nhấn góc cạnh của nửa gân Fisherman\'s Rib - tất cả được xây dựng thông qua các hàng ngắn đơn giản. Cho dù quấn đôi quanh cổ để tạo vẻ ngoài khăn choàng hoặc đeo dài như khăn, sự thoáng khí tự nhiên của Loft giữ cho trọng lượng nhẹ và ngăn cảm giác bị áp đảo bởi vải dày của Tallera.', 0, 0, 0, '2024-07-29 00:13:59', '2024-08-01 10:44:46'),
(38, 4, 'Mũ len', 'non1', 'dệt ngang', 'NON1', 'Hoàn hảo cho những loại len tròn, đàn hồi với khả năng định hình mũi đan tuyệt vời, mẫu mũ này mô phỏng giỏ đan một cách thông minh thông qua việc sử dụng sáng tạo các mũi đan, mũi trái và luồn chỉ. Đây là một trong những mẫu mũi đan mang lại kết quả ấn tượng mặc dù chỉ sử dụng những mũi đan cơ bản nhất! Vải dệt có kết cấu sâu được cân bằng với một viền đan đôi thêm sự thoải mái mềm mại và một nền vững chắc cho các kết cấu dệt phát triển từ nó. (Đây là một dự án tuyệt vời để xây dựng kỹ năng của bạn bằng cách học cách đan khởi đầu tạm thời và viền gấp!', 0, 0, 0, '2024-07-29 01:13:10', '2024-08-01 10:42:15'),
(39, 4, 'Mũ len', 'non2', 'họa tiết đan chéo', 'NON2', '\"Mẫu mũi tổ ong này được đan xen với các cột mũi xếp chồng lên nhau tạo nên một loại vải nhịp nhàng, gợn sóng và cực kỳ mềm mại. Một viền đan lệch trơn tru chuyển tiếp vào mẫu cáp, tiếp tục không bị gián đoạn thành một thiết kế vương miện hình hoa, mang lại sự kết hợp nghệ thuật cho toàn bộ chiếc mũ.\" - nhà thiết kế, Jared Flood', 0, 0, 0, '2024-07-29 01:13:10', '2024-08-01 10:42:18'),
(40, 4, 'Mũ thủy thủ', 'non3', 'cho len dày và trung bình', 'NON3', 'Chiếc mũ unisex phong cách thủy thủ đẹp mắt này mang những sợi cáp thừng táo bạo và những hình dạng cây hạt giống tinh tế mọc lên từ một viền đan nửa xoắn, có thể được làm dài hoặc ngắn hơn để đạt được độ vừa vặn mong muốn của bạn.\r\nĐược thiết kế cho các chỉ số đo len DK và chunky, chiếc mũ này tỏa sáng trong cả len sợi len và len sợi cối.', 0, 0, 0, '2024-07-29 01:13:10', '2024-08-01 10:42:21'),
(41, 4, 'Mũ len và mũ nồi', 'non4', 'kiểu dáng gân', 'NON4', '\"Để kỷ niệm một trong những mẫu mũ được yêu thích và đa năng nhất của chúng tôi, chúng tôi đã cập nhật Mawson để bao gồm kích cỡ cho toàn bộ gia đình (mới sinh, em bé, trẻ em, người lớn thường, người lớn lớn) cũng như hai tùy chọn tạo hình vương miện khác nhau (vương miện tiêu chuẩn ban đầu và vương miện nhọn mới thêm) để cho phép tùy chỉnh đầy đủ.\r\n\r\nMẫu có thể được làm như một chiếc mũ beanie tiêu chuẩn hoặc như một chiếc mũ nồi cổ điển với viền gấp bằng bất kỳ loại len worsted hoặc DK nào trong dòng sản phẩm của chúng tôi. Đây là mẫu duy nhất bạn cần để đáp ứng mọi yêu cầu của mọi người! (Mũ len gân!)\" - nhà thiết kế, Jared Flood', 0, 0, 0, '2024-07-29 01:13:10', '2024-08-01 10:42:25'),
(42, 4, 'Mũ len và mũ nồi', 'non5', 'họa tiết đan chéo', 'NON5', 'Ngày càng lạnh, cáp càng dày - giữ ấm và thoải mái trong mọi cuộc phiêu lưu của bạn với kết cấu dễ chịu của Sparkwood. Những khối cáp tổ ong dày được nhấn nhá bởi những dải dây thừng đơn, thêm sự đàn hồi và thú vị cho chiếc mũ kinh điển của ngư dân này. Tận hưởng sự nhẹ nhàng của Tones sợi len khi nó cân bằng giữa khả năng cách nhiệt dày đặc và khả năng thở không trọng lượng, hoặc chọn sự mềm mại và độ nảy với Imbue Worsted. Để thêm niềm vui cho viền mũ nồi của bạn, hãy chơi với các sắc thái hai tông màu của Tones hoặc các sắc thái bổ sung của Imbue để tạo nên sự kết hợp màu sắc hài hòa.', 0, 0, 0, '2024-07-29 01:13:10', '2024-08-01 10:42:29'),
(43, 4, 'Mũ len', 'non6', 'kiểu dáng đơn giản', 'NON6', 'Len chunky tăng cường kết cấu nhỏ, sần của vải Shaker Rib cho một chiếc mũ đan nhanh vừa ấm vừa phong cách. Tạo nên chiếc mũ của riêng bạn bằng cách thêm bất kỳ họa tiết thêu gợi ý nào của chúng tôi bằng cách sử dụng các mảnh vụn len từ kho của bạn!\r\n\r\nMẫu này là một phần của dòng sản phẩm BT by Brooklyn Tweed của chúng tôi và là món quà miễn phí của chúng tôi dành cho bạn khi mua ít nhất 1 cuộn len chunky - chỉ cần thêm len và mẫu của bạn vào giỏ hàng và nhập mã: shake_hat_btxbt khi thanh toán.', 0, 0, 0, '2024-07-29 01:13:10', '2024-08-01 10:42:35'),
(44, 4, 'Mũ len', 'non7', 'kết hợp màu sắc', 'NON7', '“Chiếc mũ Foliage Dot sử dụng một mẫu mũi đan độc đáo và thú vị khiến tôi nhớ đến những chiếc lá mùa thu. Mỗi họa tiết “lá” tương tự như một cái núm, trong đó một số mũi được tăng lên từ một mũi đơn để tạo ra mỗi chiếc lá có kết cấu. Tuy nhiên, không giống như một cái núm, việc giảm các mũi bổ sung này được phân bố trên một vài vòng tiếp theo, thay vì được đan cùng một lúc.” - nhà thiết kế, Jared Flood', 0, 0, 0, '2024-07-29 01:13:10', '2024-08-01 10:42:39'),
(45, 4, 'Mũ len', 'non8', 'họa tiết đan chéo', 'NON8', 'Proof Hat là một chiếc mũ beanie truyền thống với kết cấu hiện đại đồ họa. Viền đan đôi hình ống chảy vào một họa tiết của các xương sườn chia đôi đan chéo. Các kênh đan hộp mực thêm một lớp kết cấu sâu thứ hai để tạo ra một chiếc mũ unisex nổi bật. Kết hợp chiếc mũ thỏa mãn này với khăn quàng cổ Proof để tạo thành một bộ hoặc làm nên một loạt mũ để thử tất cả các sắc thái của Arbor hoặc Dapple nói với bạn.', 0, 0, 0, '2024-07-29 01:13:10', '2024-08-01 10:42:43'),
(46, 4, 'Mũ len', 'non9', 'họa tiết dệt', 'NON9', 'Mang những sợi cáp cổ điển đến tủ quần áo hiện đại của bạn với chiếc mũ dễ làm và thú vị này! Thực hành kỹ thuật của bạn trên hai cáp khác nhau giao nhau trên cùng một vòng để ghi nhớ nhanh chóng. Cho dù bạn thích mũ beanie hay mũ nồi hơn, bạn sẽ yêu thích cảm giác của chiếc mũ này trong Imbue Worsted mềm mại, xốp.\r\n\r\nMẫu này là một phần của dòng sản phẩm BT by Brooklyn Tweed của chúng tôi và là món quà miễn phí của chúng tôi dành cho bạn khi mua ít nhất 2 cuộn len worsted - chỉ cần thêm len và mẫu của bạn vào giỏ hàng và nhập mã: woven_roots_btxbt khi thanh toán.', 0, 0, 0, '2024-07-29 01:13:10', '2024-08-01 10:42:46'),
(47, 4, 'Mũ len', 'non10', 'kết hợp màu sắc', 'NON10', 'Một trong những món đồ đan đầu tiên tôi từng làm là một chiếc mũ len đen cho chồng, Marcel. Hơn 10 năm sau, anh ấy vẫn mặc nó - và báo cáo rằng nhiều bạn bè của anh ấy đã hỏi về nguồn gốc của nó.\r\n\r\nLoại mũ này được gọi là mũ thủy thủ; chiếc khăn kèm theo cũng được lấy cảm hứng từ khăn quàng cổ của thủy thủ và được thiết kế để hoạt động như một lớp gọn gàng để mặc dưới áo khoác dạ hoặc áo len. Vì nó không được thiết kế để quấn quanh cổ như những chiếc khăn dài hơn nên nó gần như nhanh chóng đan như chiếc mũ. ” - Véronik Avery', 0, 0, 0, '2024-07-29 01:13:10', '2024-08-01 10:42:50'),
(48, 4, 'Mũ len', 'non11', 'họa tiết dập nổi', 'NON11', 'Vải có kết cấu của Mũ Admix được thiết kế để kết hợp các loại len khác nhau cùng trọng lượng để tạo ra hiệu ứng màu sắc và kết cấu thú vị. Chọn hai hoặc nhiều loại len trọng lượng DK với màu sắc, quy trình nhuộm hoặc thành phần sợi tương phản để tạo ra các loại vải độc đáo. Ở đây, chúng tôi kết hợp một loại len nhuộm màu đồng phục chắc chắn (Arbor) với một loại hỗn hợp cotton-merino nhuộm màu (Dapple). Những chuyển màu mềm mại của len nhuộm tay hoặc tông màu chuyển đổi và trộn nhẹ nhàng khi xen kẽ với một cơ sở vững chắc trong một màu phối hợp hoặc bổ sung.', 0, 0, 0, '2024-07-29 01:13:10', '2024-08-01 10:42:54'),
(49, 4, 'Mũ thủy thủ', 'non12', 'Bộ mũ thủy thủ và khăn len', 'NON12', '“Những kết cấu sọc nhẹ nhàng của Grist mang đến một cái nhìn hiện đại cho các kết cấu gansey truyền thống từ áo len ngư dân cổ điển. Các mẫu đan-trái trang trí thân mũ vừa mềm mại vừa rõ nét trong Imbue Sport, một loại len merino ba sợi với sự cân bằng giữa độ rõ nét và độ phồng. Chiếc mũ được làm bằng một viền đan đôi xốp được làm gấp đôi chiều dài mục tiêu, sau đó được gấp lại và kẹp lại với nhau, tạo ra một lớp hoàn thiện bóng bẩy, chuyên nghiệp với lớp đệm và độ ấm thêm xung quanh tai. Các mẫu kết cấu đơn giản - kết hợp các mũi đan và trái đơn giản trong các kết hợp khác nhau - dễ nhớ và dễ làm. ” - nhà thiết kế, Jared Flood', 0, 0, 0, '2024-07-29 01:13:10', '2024-08-01 10:42:58'),
(50, 3, 'Áo len Cardigan', 'unisex1', 'Cardigan đầu tiên', 'UNISEX01', 'Áo len phong cách này được thiết kế như một lời giới thiệu thân thiện với việc đan cardigan. Được viết bằng ngôn ngữ dễ tiếp cận và các kỹ thuật cơ bản, mẫu thiết kế từ trên xuống này tự hào với đường nét sạch sẽ và vừa vặn hoàn hảo. Các chi tiết chu đáo như viền gân liền mạch từ cổ áo qua đường raglan và viền dây nâng tầm chiếc cardigan này từ hàng tiêu chuẩn lên đến sản phẩm chủ lực thiết yếu. Với vô số tùy chọn cá nhân hóa như kiểu cổ áo và tay áo, chiều dài thân áo và ba kích cỡ túi vá nhỏ xinh tùy chọn, chiếc áo len của bạn sẽ hoàn toàn độc đáo và mang đậm dấu ấn cá nhân.', 0, 0, 0, '2024-07-29 02:31:14', '2024-08-01 10:43:05'),
(51, 3, 'Áo len Cardigan đan chéo', 'unisex2', 'Họa tiết Burroughs', 'UNISEX02', 'Giống như các phương trình trên bảng đen, các mảng đan chéo và đường zigzag của các mũi dệt có kết cấu khắc họa bề mặt của Burroughs, nổi bật rõ nét trên nền len Targhee worsted dệt xoắn mềm mại và đàn hồi của Arbor. Tay áo may liền gọn gàng, viền khuy chắc chắn và cổ áo choàng học thuật hoàn thiện chiếc cardigan cổ điển này, vừa dễ dàng phối hợp với áo nỉ cũ vừa phù hợp với trang phục quay trở lại trường học mới của bạn.', 0, 0, 0, '2024-07-29 02:31:14', '2024-08-01 10:43:10'),
(52, 3, 'Áo len Cardigan cổ choàng', 'unisex3', 'Cổ choàng phong cách Garden', 'UNISEX03', 'Các kết cấu kiến trúc của thiết kế này hoàn toàn phù hợp với các loại len tròn nhiều sợi với khả năng định hình mũi dệt vượt trội. Cả len Tones (3 sợi) và Imbue (5 sợi) đều tạo ra những loại vải đẹp, tận dụng tối đa tất cả các chi tiết kết cấu trên trang phục này.“Hai mẫu gân khác nhau được sử dụng để neo giữ các đường chéo mạnh mẽ của vải dệt mũi xoắn này. Một viền và cổ áo choàng được đan bằng mũi gân garter mềm mại tạo nên một kết thúc chắc chắn, bền bỉ với đường viền sạch sẽ. Tay áo rộng và thoải mái, dài đến dưới khuỷu tay - một chiếc áo len thực sự để bạn có thể làm việc, trong vườn, bếp, xưởng mộc hoặc bất cứ nơi nào bạn cần giữ ấm mà không bị áo len cản trở tay.” - nhà thiết kế, Jared Flood', 0, 0, 0, '2024-07-29 02:31:14', '2024-08-01 10:43:15'),
(53, 3, 'Áo len chui đầu', 'unisex4', 'Áo len chui đầu Nido', 'UNISEX04', 'Được đan bằng mũi brioche mềm mại, các đường kẻ dọc của loại vải đẹp này tạo nên nền tảng cho các chi tiết kiến trúc làm nổi bật các yếu tố tạo hình độc đáo của trang phục. Từ xa, chiếc áo len trông giống như một chiếc áo len cổ điển hàng ngày; đến gần hơn, bạn sẽ thấy các đường vai được may khéo léo và các chi tiết tạo hình tinh tế khiến nó trở nên đặc biệt. Các viền đan sang trọng (và thú vị để làm) tạo khung cho các viền gân của áo len ở cổ tay, gấu và cổ áo, mang lại sự thoải mái và độ bền. Áo len được đan liền mạch từ trên xuống, cho phép người đan hoặc người mặc thử áo trong khi đang tiến hành. Điều này mang lại lợi thế tuyệt vời là có thể tùy chỉnh chiều dài của cả thân áo và tay áo để đạt được độ vừa vặn/tỷ lệ hoàn hảo mà bạn mong muốn. Với các tùy chọn dáng áo thay thế, mẫu bao gồm các chiều dài gợi ý cho thân áo bán ngắn hoặc cổ điển và các biến thể tay áo không tay, nửa tay và tay dài. Hướng dẫn cho thân áo thuôn tùy chọn cũng được bao gồm.', 0, 0, 0, '2024-07-29 02:31:14', '2024-08-01 10:45:11'),
(54, 3, 'Áo len chui đầu', 'unisex5', 'Oda đan chéo kiểu Raglan', 'UNISEX05', 'Chiếc áo len dáng rộng dễ mặc này được trang trí bằng các mảng đan chéo mềm mại có tất cả các dấu hiệu của một sản phẩm chủ lực trong tủ quần áo. Với vai raglan gọn gàng và dáng thẳng cổ điển, Oda dễ dàng mặc được trong len Shelter hoặc Tones dệt nhẹ. Kết cấu may thẳng đơn giản mang lại vừa đủ cấu trúc và độ bóng.', 0, 0, 0, '2024-07-29 02:31:14', '2024-08-01 10:45:14'),
(55, 3, 'Áo len chui đầu', 'unisex6', 'Koto gân khớp', 'UNISEX06', 'Dáng áo rơi vai tương lai và kết cấu nổi bật của Koto tương phản với độ xốp truyền thống của len Shelter và Tones tạo nên một chiếc áo len hoàn toàn hiện đại. Viền gân khớp mảnh nhấn mạnh đường viền hình mũi ngắn ấn tượng, trong khi các mặt trước gọn gàng ở cổ áo, cổ tay áo và gấu tạo nên một kết thúc tối giản đẹp mắt.', 0, 0, 0, '2024-07-29 02:31:14', '2024-08-01 10:45:18'),
(56, 3, 'Áo len chui đầu Kinsella', 'unisex7', 'Đan chéo kiểu Raglan', 'UNISEX07', 'Len đan truyền thống gặp kiến trúc hiện đại trong Kinsella, khám phá khéo léo về kết cấu và quy mô với cấu trúc raglan góc cạnh sâu và các cột đan chéo mập mạp và mảnh mai được đặt cạnh nhau, cân bằng bởi dáng áo rộng unisex. Đặt dấu ấn cá nhân của bạn với lựa chọn thân áo và tay áo ngắn hoặc cổ điển - len Shelter hoặc Tones giữ cho Kinsella thoải mái và nhẹ nhàng từ cổ áo gấp sang trọng đến gấu gân gọn gàng.', 0, 0, 0, '2024-07-29 02:31:14', '2024-08-01 10:45:22'),
(57, 3, 'Áo len chui đầu đan nhiều màu', 'unisex8', 'Glastonbury', 'UNISEX08', 'Một bàn cờ caro đơn giản biến đổi thành các dải op-art chuyển động, dẫn bạn vào một hành trình kỳ ảo của ánh sáng và bóng tối. Quyết định con đường của bạn sẽ đưa bạn đi đâu: từ mũi khởi đầu ống tùy chọn đến dáng áo unisex thẳng hoặc thuôn, được bao quanh bởi các gấu gân xoắn gọn gàng. Con đường vẫn tiếp tục, nhưng áo len của bạn không cần phải như vậy - hãy làm theo bản đồ của chúng tôi để điều chỉnh chiều dài tay áo và thân áo mà không làm gián đoạn mẫu đan màu.', 0, 0, 0, '2024-07-29 02:31:14', '2024-08-01 10:45:26'),
(58, 3, 'Áo ghi-lê', 'unisex9', 'Họa tiết Ashfork', 'UNISEX09', 'Sự bóng bẩy của học giả kết hợp với trang phục dễ mặc của nhà thám hiểm trong Ashfork, một chiếc áo ghi-lê cắt ngắn thanh lịch phù hợp với những địa điểm nắng ấm cũng như những thư viện ánh sáng mờ ảo. Được đan mô-đun liền mạch từ trên xuống, các đan chéo kéo dài chạy từ vai đến gấu trong những đường nét phong cách táo bạo trong khi viền mũi gân chắc chắn với viền dây thêm một chút tinh tế. Được đan bằng hỗn hợp len cotton hữu cơ và Merino thoáng khí của Dapple, chiếc áo ghi-lê này tạo nên lớp áo hoàn hảo cho bất kỳ cuộc phiêu lưu nào.', 0, 0, 0, '2024-07-29 02:31:14', '2024-08-01 10:45:30'),
(59, 3, 'Mũ len Nido', 'unisex10', 'Nido ấm áp', 'UNISEX010', 'Chiếc mũ cổ điển này được đan bằng mũi brioche mềm mại và kết hợp các chi tiết tạo hình chu đáo. Với cả biến thể mũ beanie và mũ len được cung cấp trong một phạm vi kích cỡ từ sơ sinh đến người lớn, Nido có thể trở thành phong cách yêu thích của cả gia đình bạn. Chiếc mũ được đan từ dưới lên, bắt đầu với viền gân 1x1 trên kim nhỏ hơn. Viền được đan ngắn hơn cho mũ Beanie và dài hơn cho mũ Watchcap. Một vòng chuyển tiếp giảm được đan giữa viền gân 1x1 và thân brioche để điều chỉnh sự khác biệt về kích thước giữa hai loại vải này. Hình dạng vương miện 5 điểm của mũ kết hợp giảm đôi để giữ cho mẫu brioche không bị gián đoạn suốt quá trình. Đường cong tạo hình kép cải thiện độ vừa vặn trên đầu và tạo ra hình dạng mũ hơi nhọn khi đội cao trên đầu.', 0, 0, 0, '2024-07-29 02:31:14', '2024-08-01 10:45:33'),
(60, 3, 'Áo len Cardigan cổ yoke', 'unisex11', 'Họa tiết Cobblestone', 'UNISEX011', 'Với tầm nhìn hướng tới sự dễ mặc và thẩm mỹ hiện đại, Áo cardigan Cobblestone là sự tái hiện của chiếc áo len Cobblestone sau 10 năm. Chiếc áo cardigan liền mạch từ trên xuống này cung cấp một loạt các chi tiết tùy chỉnh để đảm bảo rằng chiếc áo unisex này sẽ phù hợp với dáng người của bạn theo mọi cách đúng đắn. Từ chiều dài tay áo và gấu áo có thể điều chỉnh đến phần eo và hông tùy chọn, sản phẩm chủ lực trong tủ quần áo này cung cấp một loạt các khả năng cho cả những người đan len dày dạn và người mới bắt đầu. Với chiếc Cobblestone mới nhất này trong tủ quần áo của bạn, bạn sẽ tìm thấy một chiếc áo cổ điển hoàn hảo cho mọi thời tiết, sẽ giữ được phong cách trong ít nhất mười năm tới.', 0, 0, 0, '2024-07-29 02:31:14', '2024-08-01 10:45:38'),
(61, 3, 'Áo len chui đầu', 'unisex12', 'Đan nhiều màu Peaks', 'UNISEX012', 'Phong cách trang phục ngoài trời kết hợp với thời trang hiện đại trong một chiếc áo len chui đầu mạnh mẽ với những chi tiết tinh tế. Len pha màu Shelter tạo hiệu ứng đóng băng cho một họa tiết đan xen đơn giản gợi lên những dãy núi xuyên qua tuyết rơi. Đường viền raglan uốn lượn tạo nên dáng áo vừa vặn ở vai trong khi cổ áo được cắt dọc cho phép tiếp tục đan màu theo vòng tròn. Với những đặc điểm như cổ áo choàng tự viền bao bọc các mép cắt tạo nên một kết thúc hoàn hảo, Peaks là một món quà dành cho những người đan len nâng cao.', 0, 0, 0, '2024-07-29 02:31:14', '2024-08-01 10:45:42'),
(62, 1, 'Len dày', 'yarn1', 'Len dày - Mềm-Ấm', 'L01', 'Len dày, mềm, ấm, dệt theo kiểu truyền thống, thích hợp cho áo len, phụ kiện và chăn.', 0, 0, 0, '2024-08-01 10:36:50', '2024-08-01 10:50:52'),
(63, 1, 'Len trung bình', 'yarn2', 'Len trung bình - Mềm - Đàn hồi', 'L02', 'Len trung bình, mềm, đàn hồi, định hình mũi dệt tốt, thích hợp cho áo len và phụ kiện hàng ngày.', 0, 0, 0, '2024-08-01 10:36:50', '2024-08-01 10:50:55'),
(64, 1, 'Len dày', 'yarn3', 'Len dày - Xốp - Mềm', 'L03', 'Len dày, xốp, mềm, dệt từ ba sợi len không xoắn, định hình mũi dệt tốt, thích hợp cho áo len, áo khoác, chăn và phụ kiện ấm áp.', 0, 0, 0, '2024-08-01 10:36:50', '2024-08-01 10:50:58'),
(65, 1, 'Len trung bình', 'yarn4', 'Len trung bình - Mềm - xốp', 'L04', 'Len trung bình, mềm, xốp, pha trộn len merino và cotton hữu cơ, màu sắc chuyển đổi, thích hợp cho áo len trẻ em, khăn choàng nhẹ và quần áo.', 0, 0, 0, '2024-08-01 10:36:50', '2024-08-01 10:51:01'),
(66, 1, 'Len dày', 'yarn5', 'Len dày - Mềm - Đàn hồi - Màu sắc phối hợp', 'L05', 'Len dày, mềm, đàn hồi, màu sắc phối hợp, thích hợp cho áo len, phụ kiện và chăn.', 0, 0, 0, '2024-08-01 10:36:50', '2024-08-01 10:51:04'),
(67, 1, 'Len dày', 'yarn6', 'Len dày - Mềm - Đàn hồi', 'L06', 'Len dày, mềm, đàn hồi, định hình mũi dệt tốt, màu sắc pha trộn, thích hợp cho áo len, phụ kiện và chăn.', 0, 0, 0, '2024-08-01 10:36:50', '2024-08-01 10:51:08'),
(68, 1, 'Len mỏng', 'yarn7', 'Len mỏng - Mềm - Đàn hồi', 'L07', 'Len mỏng, mềm, đàn hồi, màu sắc phối hợp, thích hợp cho áo len nhẹ, phụ kiện, ren và đan nhiều màu.', 0, 0, 0, '2024-08-01 10:36:50', '2024-08-01 10:51:11'),
(69, 1, 'Len dày', 'yarn8', 'len dày - Mềm - Đàn hồi', 'L08', 'Len dày, mềm, đàn hồi, định hình mũi dệt tốt, tái chế từ len thừa, thích hợp cho áo len.', 0, 0, 0, '2024-08-01 10:36:50', '2024-08-01 10:51:15'),
(70, 1, 'Len trung bình', 'yarn9', 'Len trung bình - Mềm - Đàn hồi', 'L09', 'Len trung bình, mềm, đàn hồi, định hình mũi dệt tốt, màu sắc đa dạng, thích hợp cho đan nhiều màu, nối ghép và dự án nhỏ.', 0, 0, 0, '2024-08-01 10:36:50', '2024-08-01 10:51:18'),
(71, 1, 'Len mỏng', 'yarn10', 'Len mỏng - Mềm - Đàn hồi', 'L10', 'Len mỏng, mềm, đàn hồi, định hình mũi dệt nhẹ, màu sắc pha trộn, thích hợp cho áo len và phụ kiện nhẹ.', 0, 0, 0, '2024-08-01 10:36:50', '2024-08-01 10:51:21'),
(72, 1, 'Len dày', 'yarn11', 'Len dày - Mềm -Đàn hồi', 'L11', 'Len dày, mềm, đàn hồi, định hình mũi dệt tốt, màu sắc đa dạng, thích hợp cho phụ kiện, áo len, áo khoác và chăn.', 0, 0, 0, '2024-08-01 10:36:50', '2024-08-01 10:51:25'),
(73, 1, 'Len mỏng', 'yarn12', 'Len mỏng xốp - Ấm áp', 'L12', 'Len dày, mềm, đàn hồi, định hình mũi dệt tốt, màu sắc đa dạng, thích hợp cho phụ kiện, áo len, áo khoác và chăn.', 0, 0, 0, '2024-08-01 10:36:50', '2024-08-01 10:51:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `creatat` datetime DEFAULT current_timestamp(),
  `updateat` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `uname`, `email`, `pass`, `address`, `phone`, `image`, `role`, `creatat`, `updateat`) VALUES
(1, 'tam', 'thanhtam1532@gmail.com', '123', '23 thạnh xuân', 325568596, 'user3', 0, '2024-07-29 03:49:40', '2024-07-29 03:49:40'),
(2, 'tinh', 'thanhtam1532@gmail.com', '456', '25 thạnh xuân', 908, 'user4', 1, '2024-07-29 03:51:07', '2024-07-29 04:19:04');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productdetail_id` (`productdetail_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productDetail_id` (`productDetail_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `productdetail`
--
ALTER TABLE `productdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cloth_id` (`products`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories` (`categories`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `productdetail`
--
ALTER TABLE `productdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `country`
--
ALTER TABLE `country`
  ADD CONSTRAINT `country_ibfk_1` FOREIGN KEY (`productdetail_id`) REFERENCES `productdetail` (`id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`productDetail_id`) REFERENCES `productdetail` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`);

--
-- Các ràng buộc cho bảng `productdetail`
--
ALTER TABLE `productdetail`
  ADD CONSTRAINT `productdetail_ibfk_1` FOREIGN KEY (`products`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categories`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
