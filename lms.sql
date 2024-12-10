-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2024 at 12:03 PM
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
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('0716d9708d321ffb6a00818614779e779925365c', 'i:1;', 1731488811),
('0716d9708d321ffb6a00818614779e779925365c:timer', 'i:1731488811;', 1731488811),
('77de68daecd823babbb58edb1c8e14d7106e83bb', 'i:1;', 1730203006),
('77de68daecd823babbb58edb1c8e14d7106e83bb:timer', 'i:1730203006;', 1730203006);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Web Development', 'ico-development', NULL, '2024-10-29 07:16:21', '2024-11-02 03:34:01'),
(2, 'App Development', 'ico-setting', NULL, '2024-10-29 07:25:38', '2024-11-02 03:34:30'),
(3, 'Web Designing', 'ico-design-tool', NULL, '2024-10-30 02:27:31', '2024-11-02 03:34:45'),
(4, 'Digital Marketing', 'ico-social', NULL, '2024-10-30 02:28:19', '2024-11-02 03:35:06'),
(5, 'Self Development', 'ico-persons', NULL, '2024-10-30 02:28:44', '2024-11-02 03:37:03'),
(6, 'Graphics Design', 'ico-design-tool', NULL, '2024-11-13 10:47:14', '2024-11-13 10:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `label_id` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` bigint(20) UNSIGNED NOT NULL,
  `courseTitle` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `courseDuration` time NOT NULL,
  `overview` text NOT NULL,
  `desc` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `category_id`, `label_id`, `instructor_id`, `courseTitle`, `slug`, `image`, `price`, `courseDuration`, `overview`, `desc`, `created_at`, `updated_at`) VALUES
(25, 1, 2, 12, 'Mastering Full-Stack Web Development: From Front-End Frameworks to Back-End Architecture', 'mastering-full-stack-web-development-from-front-end-frameworks-to-back-end-architecture', 'course-1731494733.jpg', 100.00, '20:30:00', '<p>This course is an advanced dive into the art and science of full-stack web development. It’s tailored for developers who are ready to deepen their knowledge in both front-end and back-end technologies.</p>', '<p>In \"Mastering Full-Stack Web Development,\" students will learn to develop complete web applications, incorporating front-end frameworks like React and Vue and server-side technologies like Node.js and Express. The course covers RESTful APIs, database integration, authentication, and security best practices. Participants will also explore deployment techniques, scalability considerations, and performance optimization strategies for real-world applications. By the course\'s conclusion, students will have built and deployed a comprehensive, secure, and high-performing web application, preparing them to tackle professional web development projects confidently.</p>', '2024-11-13 10:45:33', '2024-11-13 10:45:33'),
(26, 6, 2, 11, 'Foundations of Graphic Design: A Creative Journey into Visual Communication', 'foundations-of-graphic-design-a-creative-journey-into-visual-communication', 'course-1731494904.jpg', 70.00, '02:45:00', '<p>This introductory course provides a thorough grounding in the fundamentals of graphic design, from color theory to digital layout, equipping students with essential skills for a career in visual communication.</p>', '<p>\"Foundations of Graphic Design\" is a step-by-step exploration of key design concepts and techniques. Students will master the principles of layout, typography, color harmony, and visual hierarchy, using industry-standard software like Adobe Photoshop, Illustrator, and InDesign. Practical exercises include logo design, poster creation, and branding projects that build a strong design portfolio. By the end of this course, students will have the ability to create visually engaging designs and effectively communicate ideas, whether for digital or print media.</p>', '2024-11-13 10:48:24', '2024-11-13 10:48:24'),
(27, 4, 1, 12, 'Mastering Digital Marketing: Strategies, Tools, and Techniques for Success in the Digital World', 'mastering-digital-marketing-strategies-tools-and-techniques-for-success-in-the-digital-world', 'course-1731495006.jpg', 80.00, '03:12:00', '<p>This comprehensive digital marketing course is designed to equip learners with the knowledge, strategies, and tools necessary to thrive in today’s fast-paced digital landscape. From social media to SEO, paid advertising to content marketing, this course covers all aspects of digital marketing to create impactful, results-driven campaigns.</p>', '<p>\"Mastering Digital Marketing\" offers a deep dive into modern marketing channels and best practices for crafting digital strategies that resonate with audiences. The course begins with an introduction to the fundamentals of digital marketing, exploring consumer behavior, brand positioning, and digital trends. As students progress, they’ll learn about essential tools like Google Analytics, Facebook Ads Manager, and SEO platforms, gaining hands-on experience in setting up, managing, and analyzing campaigns. Key topics include search engine optimization (SEO), social media marketing, email marketing, content strategy, and paid advertising (PPC).</p><p>The course emphasizes practical skills, teaching students how to develop comprehensive marketing plans, set measurable goals, optimize user engagement, and interpret marketing metrics to refine strategy. By the end, students will be able to design, implement, and measure effective digital marketing campaigns across multiple platforms, making this course ideal for aspiring marketers, business owners, and anyone looking to enhance their online presence and drive growth.</p>', '2024-11-13 10:50:06', '2024-11-13 10:50:06'),
(28, 2, 3, 10, 'Here’s a detailed and professional course description for an App Development course:  Comprehensive App Development: Building Innovative Mobile Applications from Concept to Launch', 'here-s-a-detailed-and-professional-course-description-for-an-app-development-course-comprehensive-app-development-building-innovative-mobile-applications-from-concept-to-launch', 'course-1731495227.jpg', 100.00, '04:45:00', '<p>This all-encompassing app development course is designed for aspiring developers looking to build high-quality, user-centric mobile applications. Covering both iOS and Android platforms, this course guides students through the complete development cycle—from ideation and design to coding, testing, and deployment.</p>', '<ul><li><p>\"Comprehensive App Development\" takes students on a journey through the core stages of mobile app creation. The course begins with an introduction to mobile platforms, focusing on key principles of UI/UX design and the importance of a strong user experience. Using industry-standard tools such as Xcode for iOS and Android Studio for Android, students learn to code in languages like Swift, Kotlin, and Java.</p><p>The course delves into critical areas of app functionality, including user authentication, database management, API integration, and responsive design. Students will also explore best practices for optimizing app performance, debugging, and ensuring compatibility across various devices.</p><p>In the final stages, the course covers app testing, deployment, and updates, equipping students with the knowledge to successfully publish their applications on both the App Store and Google Play. By the end of this course, students will have built a functional, polished mobile app and gained the confidence to bring their innovative ideas to the app marketplace. This course is ideal for those pursuing a career in app development or looking to expand their software development skill set.</p></li></ul>', '2024-11-13 10:53:47', '2024-11-13 10:53:47'),
(29, 5, 2, 11, 'Transformative Self-Development: Building Personal and Professional Success Through Growth Mindset and Habits', 'transformative-self-development-building-personal-and-professional-success-through-growth-mindset-and-habits', 'course-1731495322.jpg', 150.00, '05:45:00', '<p>This immersive self-development course is designed to help individuals cultivate a growth mindset, develop essential life skills, and achieve greater personal and professional fulfillment. Focusing on practical strategies, habit-building, and self-reflection, this course is a roadmap for those ready to unlock their potential.</p>', '<p>\"Transformative Self-Development\" is a comprehensive guide to self-improvement, offering students actionable tools and techniques to enhance various areas of their lives. The course begins with an exploration of mindset theory, teaching students how to adopt a growth-oriented perspective and overcome self-limiting beliefs. Topics include time management, goal-setting, effective communication, stress management, and building resilience.</p><p>Throughout the course, students will engage in self-assessment exercises to better understand their strengths and areas for growth, alongside habit-building practices designed to create positive, lasting change. Each module combines theory with real-world applications, allowing students to immediately apply what they’ve learned to their personal and professional lives. By the end, participants will have created a personalized self-development plan, equipping them to confidently pursue their goals, manage challenges, and cultivate a fulfilling, purpose-driven life.</p><p>This course is ideal for individuals looking to enhance their personal growth, improve productivity, and develop skills that will serve them in both their personal and professional journeys.</p>', '2024-11-13 10:55:22', '2024-11-13 10:55:22'),
(30, 1, 3, 12, 'Professional Web Development: From Fundamentals to Full-Stack Mastery', 'professional-web-development-from-fundamentals-to-full-stack-mastery', 'course-1731495667.jpg', 200.00, '10:30:00', '<p>This comprehensive web development course takes you through the full spectrum of skills needed to become a capable, full-stack developer. From front-end fundamentals to back-end integrations, this course provides an in-depth understanding of how to build, deploy, and maintain dynamic, responsive websites.</p>', '<p>\"Professional Web Development\" is crafted for those eager to master both the front-end and back-end aspects of web development. Starting with HTML, CSS, and JavaScript, students learn to create visually appealing, responsive user interfaces. With hands-on projects, they explore advanced JavaScript frameworks like React, gaining proficiency in building interactive and modern web experiences.</p><p>On the back-end, students dive into server-side development using Node.js, Express, and MongoDB, learning how to manage databases, authenticate users, and build RESTful APIs. Emphasis is placed on the fundamentals of security, performance optimization, and scalable architecture. In addition, students will gain practical knowledge in Git version control, deployment strategies, and best practices for maintaining and updating live applications.</p><p>By the end of the course, students will have built and deployed a full-stack web application, complete with user authentication and database integration. Ideal for those aiming to enter the field of web development or advance their current skills, this course provides the confidence and knowledge needed to create professional, functional websites from scratch.</p>', '2024-11-13 11:01:07', '2024-11-13 11:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `course_labels`
--

CREATE TABLE `course_labels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_labels`
--

INSERT INTO `course_labels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Begineer', '2024-10-29 07:58:52', '2024-10-29 07:58:52'),
(2, 'Advance', '2024-10-29 07:59:03', '2024-10-29 07:59:03'),
(3, 'Intermediate', '2024-10-29 07:59:12', '2024-10-29 07:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `skill` varchar(255) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `user_id`, `role_id`, `phone`, `skill`, `country`, `city`, `address`, `image`, `instagram`, `facebook`, `twitter`, `created_at`, `updated_at`, `description`) VALUES
(10, 19, NULL, '92310000099', 'Physics, Math', 'US', 'NYC', 'Wallen street 123', 'instructor-1731494017.jpg', NULL, NULL, NULL, '2024-11-13 10:33:37', '2024-11-13 10:33:37', '<p>Asim is a passionate educator with a profound knowledge of physics and mathematics. With years of experience in guiding students through complex theories and problem-solving strategies, Asim excels at breaking down challenging concepts into understandable, relatable explanations.</p><p>Known for a teaching style that is both engaging and thorough, Asim helps students not only master formulas and principles but also develop critical thinking skills that apply beyond the classroom.</p><p>Whether you’re tackling advanced calculus, exploring the depths of quantum mechanics, or simply looking to strengthen your foundations, Asim’s mentorship is your pathway to success.</p>'),
(11, 20, NULL, '92310009988', 'Computer, Graphic Designer', 'CA', 'CHI', '2499 Shemar Cape', 'instructor-1731494198.jpg', 'https://insta.com', 'https://fb.com', 'https://tw.com', '2024-11-13 10:36:38', '2024-11-13 10:36:38', '<p>Usman is a skilled mentor with a unique blend of expertise in computer science and graphic design. </p><p>With a creative eye for detail and a solid foundation in technology, </p><p>Usman helps students navigate the technical and artistic sides of digital media. From mastering design software and creating visually striking graphics to understanding programming fundamentals and web development, </p><p>Usman’s guidance empowers students to bring their ideas to life. Known for his patient and hands-on approach, Usman ensures that every concept is clear, making complex techniques feel accessible and exciting. </p><p>Whether you\'re just starting or looking to elevate your skills, Usman’s mentorship is here to help you succeed.</p>'),
(12, 21, NULL, '92310009987', 'IT Manager, Web Developer', 'US', 'PHX', '578 Collins Canyon', 'instructor-1731494383.jpg', 'https://insta.com', 'https://fb.com', 'https://tw.com', '2024-11-13 10:39:43', '2024-11-13 10:39:43', '<p><strong>Meet Ali – Your Experienced Mentor in Web Development and IT Management</strong></p><p><strong><br></strong></p><p>Ali is a seasoned professional with extensive expertise in web development and IT management. With a robust background in building dynamic websites and managing IT infrastructures, Ali combines technical skills with strategic insight. </p><p>He has a deep understanding of front-end and back-end development, database management, and the latest industry tools, ensuring students gain practical knowledge and skills that are relevant in today\'s tech landscape. </p><p>As an IT manager, Ali brings valuable insights into project management, team collaboration, and problem-solving, making him an exceptional guide for those looking to excel in both development and IT leadership.</p><p> Ali’s mentorship is ideal for anyone ready to advance their technical abilities and understanding of IT operations.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_02_105306_create_categories_table', 1),
(5, '2024_10_08_100127_create_course_labels_table', 1),
(6, '2024_10_28_063543_create_roles_table', 1),
(7, '2024_10_28_064321_add_role_to_users_table', 1),
(8, '2024_10_28_105335_create_instructors_table', 1),
(9, '2024_10_28_105407_create_courses_table', 1),
(10, '2024_10_29_061832_create_students_table', 2),
(11, '2024_10_31_063838_add_description_to_instructors_table', 3),
(12, '2024_10_31_090733_add_slug_to_courses_table', 4),
(13, '2024_11_02_082729_add_icon_to_categories_table', 5),
(14, '2024_11_11_130620_create_orders_table', 6),
(15, '2024_11_11_152219_add_payment_completed_at_to_orders_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_payment_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `payment_completed_at` timestamp NULL DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(10) NOT NULL DEFAULT 'USD',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `course_id`, `stripe_payment_id`, `status`, `payment_completed_at`, `amount`, `currency`, `created_at`, `updated_at`) VALUES
(40, 18, 28, NULL, 'pending', NULL, 100.00, 'USD', '2024-11-13 11:05:22', '2024-11-13 11:05:22'),
(41, 22, 30, NULL, 'pending', NULL, 200.00, 'USD', '2024-11-14 14:09:59', '2024-11-14 14:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`id`, `email`, `token`, `created_at`) VALUES
(6, 'customer@gmail.com', 'bdFbU1yAWokPotZDgOsX3i2lQyC5JF2ZgJMorB1G9nsiRQO148aeH6ACcgEl', '2024-11-12 08:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'teacher', NULL, NULL),
(3, 'student', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('CjkJMa1VgGbgILbmehqnSZki8C4MmrSgwMiUdwYD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic3Z1d0VzYkJDRTZ4TlJMOWZjOUlWTUJrSllrNHlFTGVmTmJMNUk2ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hdXRoL3NpZ24taW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1733828084),
('mRY1sfIwoV6OeUYyLuNrG1Gp0QrVur8hoPwMPawP', 18, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidWxZWm1kWTQ4eEFZRXhjU21zalBCY0xPZjN6WHViNlBDRHpWanBTdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hY2NvdW50L2NvdXJzZS1sYWJlbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hY2NvdW50L2luZGV4Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTg7fQ==', 1731668189);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(18, '3X SAMEER', '3xsameer@gmail.com', '2024-11-13 10:26:05', '$2y$12$nSqlnEvHrt9fomTgBmbn6.kQC2QevgFvr3MGiaRbjM7m5/yWTOvAu', NULL, '2024-11-13 10:26:05', '2024-11-13 10:26:05', 1),
(19, 'M Asim', 'masim@gmail.com', '2024-11-13 10:33:37', '$2y$12$K75oK6H0QSwyX6LeULkpleYmB0NiFNM5/FP/vyMzQfeLO4Yip3EW2', NULL, '2024-11-13 10:33:37', '2024-11-13 10:33:37', 2),
(20, 'Usman Raja', 'usmanraja@gmail.com', '2024-11-13 10:36:38', '$2y$12$WZ1P8nwODefNZJ/hXUbGyezV0lgieawwxjOPQ3gQiViU6q/E6BLJy', NULL, '2024-11-13 10:36:38', '2024-11-13 10:36:38', 2),
(21, 'Akash Bajwa', 'akashbajwa@gmail.com', '2024-11-13 10:39:43', '$2y$12$9NDnmjsRRB4dwKDlD.S57.e3h0zrPUuchyktRm96GMB.IS6xQnmDC', NULL, '2024-11-13 10:39:43', '2024-11-13 10:39:43', 2),
(22, 'jksdf', 'jabara9868@gianes.com', '2024-11-14 14:06:19', '$2y$12$FqFGpjC4VEIoxZIxU2OXyOya9CR4ebMjhmxC/lkFT7WbTOrBQI7nW', NULL, '2024-11-14 14:05:55', '2024-11-14 14:06:19', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_slug_unique` (`slug`),
  ADD KEY `courses_category_id_foreign` (`category_id`),
  ADD KEY `courses_label_id_foreign` (`label_id`),
  ADD KEY `courses_instructor_id_foreign` (`instructor_id`);

--
-- Indexes for table `course_labels`
--
ALTER TABLE `course_labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `instructors_phone_unique` (`phone`),
  ADD KEY `instructors_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_stripe_payment_id_unique` (`stripe_payment_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_course_id_foreign` (`course_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_reset_tokens_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `1` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_phone_unique` (`phone`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `course_labels`
--
ALTER TABLE `course_labels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_label_id_foreign` FOREIGN KEY (`label_id`) REFERENCES `course_labels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `instructors_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `instructors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
