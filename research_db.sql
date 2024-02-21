-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 12:25 PM
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
-- Database: `research_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `names` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `statuss` varchar(1000) NOT NULL,
  `comments` varchar(5000) NOT NULL,
  `comments2` varchar(5000) NOT NULL,
  `comments3` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `names`, `email`, `statuss`, `comments`, `comments2`, `comments3`) VALUES
(17, 'S Ngwane', 'sngwane1998@gmail.com', 'Approved', 'Yes', 'Yes Yes', 'Congrats'),
(18, 'S', 'sssss@gmail.com', 'Rejected On Stage 1', '', '', 'No Comments.'),
(19, 'AA', 'aa@gmail.com', 'Approved', 'Approved', 'Approved again', 'Well done!'),
(20, 'Mr C Zondi', 'zondi@gmail.com', 'Accepted By HOD. Waiting For Sfiso Approval', 'No Comments.', '', ''),
(21, 'Syanda', 'syanda@gmail.com', 'Accepted By HOD. Waiting For Sfiso Approval', 'No Comments.', '', ''),
(22, 'Testing', 'syanda1111@gmail.com', 'Approved', 'No Comments.', 'No Comments.', 'No Comments.'),
(23, 'DDSF', 'syanda111111@gmail.com', 'Accepted By HOD. Waiting For Sfiso Approval', 'No Comments.', '', ''),
(24, 'Sya Ngwane', 'syangwane@gmail.com', 'Accepted By HOD. Waiting For Sfiso Approval', 'No Comments.', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `budget_details`
--

CREATE TABLE `budget_details` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ticket` varchar(100) NOT NULL,
  `ticketComment` varchar(1000) NOT NULL,
  `transportation` varchar(100) NOT NULL,
  `transportationComment` varchar(1000) NOT NULL,
  `registration` varchar(100) NOT NULL,
  `registrationComment` varchar(1000) NOT NULL,
  `accommodation` varchar(100) NOT NULL,
  `accommodationComment` varchar(1000) NOT NULL,
  `subsistence` varchar(100) NOT NULL,
  `subsistenceComment` varchar(1000) NOT NULL,
  `otherCosts` varchar(100) NOT NULL,
  `otherCostsComment` varchar(1000) NOT NULL,
  `totalCost` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `budget_details`
--

INSERT INTO `budget_details` (`id`, `email`, `ticket`, `ticketComment`, `transportation`, `transportationComment`, `registration`, `registrationComment`, `accommodation`, `accommodationComment`, `subsistence`, `subsistenceComment`, `otherCosts`, `otherCostsComment`, `totalCost`) VALUES
(19, 'sngwane1998@gmail.com', '77878', 'uhjhjh', '8787', 'hjhjhj', '8787', 'jhjhjhj', '87878', 'jhjhjhj', '878', 'hjhjhj', '878', 'jhjhj', '185086'),
(20, 'sssss@gmail.com', '656', 'GGH', '767', 'TYTY', '676', 'YTY', '6767', 'YTYTY', '67676', 'TYTYT', '6767', 'YTYTY', '83309'),
(21, 'aa@gmail.com', '2000', 'QQUYU', '1000', 'UYUYU', '1000', 'HGHGH', '2500', 'HGHGH', '44545', 'YGGG', '56565', 'GGHGHG', '107610'),
(22, 'zondi@gmail.com', '655656', 'rtrtr', '5656', 'rtrtr', '565656', 'trtrt', '65656', 'yyty', '6565', 'rtrtr', '54545', 'ftt', '1353734'),
(23, 'syanda@gmail.com', '1000', 'A', '500', 'B', '300', 'C', '1500', 'D', '1000', 'E', '2000', 'N', '6300'),
(24, 'syanda1111@gmail.com', '2000', 'None', '3000', 'None', '200', 'Registration fee has been reduced to R200', '232', 'None', '232', 'None', '232', 'None', '27373'),
(25, 'syanda111111@gmail.com', '34324', 'None', '3423', 'None', '42342', 'None', '3423', 'None', '323', 'None', '1000', 'None', '84835'),
(26, 'syangwane@gmail.com', '1000', 'None', '300', 'None', '500', 'None', '800', 'None', '300', 'Rates', '100', 'None', '2900');

-- --------------------------------------------------------

--
-- Table structure for table `conference_details`
--

CREATE TABLE `conference_details` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subjects` varchar(1000) NOT NULL,
  `venue` varchar(1000) NOT NULL,
  `host` varchar(1000) NOT NULL,
  `duration` varchar(1000) NOT NULL,
  `titleOfPaper` varchar(1000) NOT NULL,
  `coAuthers` varchar(1000) NOT NULL,
  `otherFinancial` varchar(1000) NOT NULL,
  `amtReceived` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conference_details`
--

INSERT INTO `conference_details` (`id`, `email`, `subjects`, `venue`, `host`, `duration`, `titleOfPaper`, `coAuthers`, `otherFinancial`, `amtReceived`) VALUES
(19, 'sngwane1998@gmail.com', 'jjhjhjhjhj', 'hjhjhjhj', 'hjhuhuhu', 'yyttyyg', 'yytyt', 'ytytyty', 'jhj', '8778'),
(20, 'sssss@gmail.com', 'S', 'S', 'S', 'S', 'S', 'S', 'S', '1000'),
(21, 'aa@gmail.com', 'QQ', 'QQ', 'QQ', 'QQ', 'QQ', 'QQ', 'QQ', '2000'),
(22, 'zondi@gmail.com', 'Testing', 'ghghg', 'ghghg', 'ghgh', 'hghh', 'ghg', 'ghgh', '100'),
(23, 'syanda@gmail.com', 'Testing', 'Seme Hall', 'IT Dept', '22 - 25 July 2023', 'Students', 'Mr S Ngwane', 'None', '10'),
(24, 'syanda1111@gmail.com', 'Testing', 'GH', 'MUT', '1-3/11/2023', 'RR', 'Mr C Zondi', 'NG', '1000'),
(25, 'syanda111111@gmail.com', 'FGFGD', 'DFGDF', 'DFGD', '44444345453', 'FDGFGD', 'DFGDF', 'None', '1000'),
(26, 'syangwane@gmail.com', 'Test', 'D Labs', 'MUT', '1 - 5 Nov 2023', 'MUT Students', 'Mr Ngwane', 'MUT', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `passwords` varchar(1000) NOT NULL,
  `role` varchar(1000) NOT NULL,
  `statuss` varchar(100) NOT NULL,
  `snumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `name`, `email`, `passwords`, `role`, `statuss`, `snumber`) VALUES
(1, 'Mr Syanda Ngwane', 'role1@gmail.com', '$2y$10$gXJ39DHvGS14uQxnmyM/w.CEiLyutwJ108ayK6y0VlySPSmfclC2a', '1', 'Active', '11111'),
(2, 'Mr Lindani Myeni', 'role2@gmail.com', '$2y$10$e0eYJXsnMAWt68/yx/B6lOEECikcLvrp.A0zhQe62CUxjPxQnJ5OC', '2', 'Active', '22222'),
(3, 'Mr Syathemba Ndlovu', 'role3@gmail.com', '$2y$10$0Y2wQx3xgj.o1HGNbFwwMeU3c9Jk7Ec9K8Ofr8tQM791zSRdBcmN6', '3', 'Active', '33333'),
(4, 'Lungelo', 'lungelomageba14@gmail.com', '$2y$10$EWloHV2xCARxMF6AqbCI0uZ1VMkX0BIjYUUep77yZIVKDgIkNKqsK', '3', 'Active', '12345'),
(8, 'Siyanda Cele', 'syandangwane1998@gmail.com', '$2y$10$ruQy40a9BItx.3yERBs7VenZ2PsQVm25Ri/Kzb0JBSEMaaeohviq.', '3', 'Active', '12345'),
(9, 'vigie', 'vgwala149@gmail.com', '$2y$10$2nE2o6vNIfPXXhaNXKHx0.qk/RzRNnxFwYpGAdwBtT9NTloSWJ6p6', '3', 'Active', '987654');

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `names` varchar(100) NOT NULL,
  `staffNo` varchar(100) NOT NULL,
  `qualification` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `cell` varchar(100) NOT NULL,
  `department` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`id`, `title`, `names`, `staffNo`, `qualification`, `email`, `tel`, `cell`, `department`) VALUES
(19, 'Mr', 'S Ngwane', '11111111', 'ghghgh', 'sngwane1998@gmail.com', '0876767676', '0878787878', 'gghghg'),
(20, 'Prof', 'S', '7676766767', 'S', 'sssss@gmail.com', '0988787876', '0989898988', 'S'),
(21, 'Dr', 'AA', '5665656', 'AA', 'aa@gmail.com', '0989887878', '0989878787', 'IT'),
(22, 'Mr', 'Mr C Zondi', '67678767', 'DIPLOMA', 'zondi@gmail.com', '0876765654', '0876765654', 'IT'),
(23, 'Mr', 'Syanda', '12345678', 'Diploma', 'syanda@gmail.com', '0317876564', '0786576543', 'IT'),
(24, 'Prof', 'Testing', '43456', 'A', 'syanda1111@gmail.com', '0989878767', '0898787675', 'S'),
(25, 'Prof', 'DDSF', '32343', 'FGFD', 'syanda111111@gmail.com', '0987876767', '0989878767', 'FGDF'),
(26, 'Mr', 'Sya Ngwane', '45657', 'Diploma', 'syangwane@gmail.com', '0786765654', '0875654345', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `supporting_documents`
--

CREATE TABLE `supporting_documents` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `invitation` varchar(1000) NOT NULL,
  `full_paper` varchar(1000) NOT NULL,
  `proof_of_acceptance` varchar(1000) NOT NULL,
  `official_programme` varchar(1000) NOT NULL,
  `period_date` varchar(1000) NOT NULL,
  `travelling_quotation` varchar(1000) NOT NULL,
  `visa_cost` varchar(1000) NOT NULL,
  `accommodation_costs` varchar(100) NOT NULL,
  `registration_fee` varchar(1000) NOT NULL,
  `proof_of_dhet` varchar(1000) NOT NULL,
  `proof_of_application` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supporting_documents`
--

INSERT INTO `supporting_documents` (`id`, `email`, `invitation`, `full_paper`, `proof_of_acceptance`, `official_programme`, `period_date`, `travelling_quotation`, `visa_cost`, `accommodation_costs`, `registration_fee`, `proof_of_dhet`, `proof_of_application`) VALUES
(23, 'sngwane1998@gmail.com', 'documents/692667459-L4 Basic steps of doing research.pdf', 'documents/2062977533-L4 Basic steps of doing research.pdf', 'documents/172685431-L4 Basic steps of doing research.pdf', 'documents/1756927343-L4 Basic steps of doing research.pdf', 'documents/1319761704-L4 Basic steps of doing research.pdf', 'documents/1740723023-L4 Basic steps of doing research.pdf', 'documents/1378968453-L4 Basic steps of doing research.pdf', 'documents/1655792650-L4 Basic steps of doing research.pdf', 'documents/982793456-L4 Basic steps of doing research.pdf', 'documents/491871832-L4 Basic steps of doing research.pdf', 'documents/742421152-L4 Basic steps of doing research.pdf'),
(24, 'sssss@gmail.com', 'documents/1860576087-Deep Drive on Container Security.pdf', 'documents/145601955-Getting into the Serverless Mindset.pdf', 'documents/1949954517-Intro to AWS Fargate.pdf', 'documents/1173456468-Intro to AWS Fargate.pdf', 'documents/1153587542-Intro to AWS Elastic Beanstalk.pdf', 'documents/397280929-Introduction to Containers.pdf', 'documents/1850423954-Introduction to Serverless Development.pdf', 'documents/862717824-Intro to AWS Elastic Beanstalk.pdf', 'documents/735369950-Getting Sarted with .NET on AWS.pdf', 'documents/986421972-Getting into the Serverless Mindset.pdf', 'documents/1216053710-Deep Drive on Container Security.pdf'),
(25, 'aa@gmail.com', 'documents/1608909153-Deep Drive on Container Security.pdf', 'documents/1427481534-AWS Lambda Foundations.pdf', 'documents/19239800-Intro to AWS Fargate.pdf', 'documents/1136982747-Getting Sarted with .NET on AWS.pdf', 'documents/1939558022-Amazon Elastic Kubernetes Service (EKS) Primer.pdf', 'documents/1987358775-Getting Sarted with .NET on AWS.pdf', 'documents/184802999-Deep Drive on AWS Fargate Building Serverless Containers at Scale.pdf', 'documents/784722997-Introduction to Containers.pdf', 'documents/548153219-Getting Sarted with .NET on AWS.pdf', 'documents/1806072996-Deep Drive on AWS Fargate Building Serverless Containers at Scale.pdf', 'documents/1946168503-Getting into the Serverless Mindset.pdf'),
(26, 'zondi@gmail.com', 'documents/953353538-Deep Drive on Container Security.pdf', 'documents/1159749942-Intro to AWS Fargate.pdf', 'documents/291186261-Deep Drive on AWS Fargate Building Serverless Containers at Scale.pdf', 'documents/1760430797-Intro to AWS Fargate.pdf', 'documents/834516306-Deep Drive on AWS Fargate Building Serverless Containers at Scale.pdf', 'documents/1846134745-Amazon Elastic Kubernetes Service (EKS) Primer.pdf', 'documents/152757191-Introduction to Containers.pdf', 'documents/2027714857-Deep Drive on AWS Fargate Building Serverless Containers at Scale.pdf', 'documents/768535269-Deep Drive on AWS Fargate Building Serverless Containers at Scale.pdf', 'documents/1211042561-Getting into the Serverless Mindset.pdf', 'documents/1221448693-Deep Drive on Container Security.pdf'),
(27, 'syanda@gmail.com', 'documents/1088850080-AWS Lambda Foundations.pdf', 'documents/399451063-Introduction to Containers.pdf', 'documents/1205640234-Amazon Elastic Kubernetes Service (EKS) Primer.pdf', 'documents/888731407-Introduction to Serverless Development.pdf', 'documents/1405685997-Getting into the Serverless Mindset.pdf', 'documents/1925024642-Deep Drive on AWS Fargate Building Serverless Containers at Scale.pdf', 'documents/2135358503-Introduction to Containers.pdf', 'documents/1156699296-Deep Drive on Container Security.pdf', 'documents/1842853706-Amazon Elastic Kubernetes Service (EKS) Primer.pdf', 'documents/103398382-L4 Basic steps of doing research.pdf', 'documents/956032759-Amazon Elastic Container Service (ECS) Primer.pdf'),
(28, 'syanda1111@gmail.com', 'documents/582365351-Intro to AWS Fargate.pdf', 'documents/1252862364-Introduction to Serverless Development.pdf', 'documents/2138415685-AWS Lambda Foundations.pdf', 'documents/1324898230-Getting Sarted with .NET on AWS.pdf', 'documents/357857872-Amazon Elastic Kubernetes Service (EKS) Primer.pdf', 'documents/75315639-Deep Drive on Container Security.pdf', 'documents/833097943-Introduction to Containers.pdf', 'documents/855192552-L4 Basic steps of doing research.pdf', 'documents/1041044815-AWS Lambda Foundations.pdf', 'documents/1134082202-Getting into the Serverless Mindset.pdf', 'documents/1148539265-Getting Sarted with .NET on AWS.pdf'),
(29, 'syanda111111@gmail.com', 'documents/1160844364-Intro to AWS Fargate.pdf', 'documents/2015039750-Getting into the Serverless Mindset.pdf', 'documents/907551115-Getting Sarted with .NET on AWS.pdf', 'documents/1756653280-Amazon Elastic Kubernetes Service (EKS) Primer.pdf', 'documents/1335425099-Introduction to Containers.pdf', 'documents/2126904423-Intro to AWS Fargate.pdf', 'documents/221626803-Deep Drive on Container Security.pdf', 'documents/1923711544-L4 Basic steps of doing research.pdf', 'documents/1276153897-AWS Lambda Foundations.pdf', 'documents/96970205-Intro to AWS Fargate.pdf', 'documents/569895752-Introduction to Containers.pdf'),
(30, 'syangwane@gmail.com', 'documents/1573364594-Deep Drive on AWS Fargate Building Serverless Containers at Scale.pdf', 'documents/902798079-AWS Lambda Foundations.pdf', 'documents/2094891310-Introduction to Serverless Development.pdf', 'documents/1007675283-Introduction to Serverless Development.pdf', 'documents/349958729-Accelerating Messaging Modernization with Amazon MQ.pdf', 'documents/423959215-Amazon Elastic Kubernetes Service (EKS) Primer.pdf', 'documents/468110930-Intro to AWS Elastic Beanstalk.pdf', 'documents/504595890-Introduction to Serverless Development.pdf', 'documents/167286085-AWS Lambda Foundations.pdf', 'documents/1311619909-L4 Basic steps of doing research.pdf', 'documents/1677066884-Deep Drive on AWS Fargate Building Serverless Containers at Scale.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budget_details`
--
ALTER TABLE `budget_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conference_details`
--
ALTER TABLE `conference_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supporting_documents`
--
ALTER TABLE `supporting_documents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `budget_details`
--
ALTER TABLE `budget_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `conference_details`
--
ALTER TABLE `conference_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_details`
--
ALTER TABLE `personal_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `supporting_documents`
--
ALTER TABLE `supporting_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
