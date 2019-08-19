
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


INSERT INTO `setup` (`id`, `parameter`, `value`) VALUES
(13, 'currency', 'USD');


CREATE TABLE `vehicle_class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vehicle_class`
--

INSERT INTO `vehicle_class` (`id`, `name`) VALUES
(2, 'Economy'),
(3, 'Fullsize'),
(4, 'Sport Utilty'),
(5, 'Compact'),
(6, 'Midsize'),
(7, 'Minivan'),
(8, 'Convertible'),
(9, 'Luxury'),
(10, 'Fullsize Van'),
(13, 'Pickup');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vehicle_class`
--
ALTER TABLE `vehicle_class`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vehicle_class`
--
ALTER TABLE `vehicle_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
