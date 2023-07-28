-- ROUTES  
-- 
PATCH           api/v1/comment/{comment}/complete  
GET|HEAD        api/v1/comments   
POST            api/v1/comments   
GET|HEAD        api/v1/comments/{comment}   
PUT|PATCH       api/v1/comments/{comment}  
DELETE          api/v1/comments/{comment}  





-- MySQL dump 10.13  Distrib 8.0.33, for macos13.3 (arm64)
--
-- Host: localhost    Database: warehouse
-- ------------------------------------------------------
-- Server version	8.0.33

--  
-- Table structure for table `comments`  
--  

CREATE TABLE `comments` (  
`id` bigint unsigned NOT NULL AUTO_INCREMENT,  
`comment` text COLLATE utf8mb4_unicode_ci NOT NULL,  
`user_id` bigint unsigned NOT NULL,  
`created_at` timestamp NULL DEFAULT NULL,  
`updated_at` timestamp NULL DEFAULT NULL,  
PRIMARY KEY (`id`),  
KEY `comments_user_id_foreign` (`user_id`),  
CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;  
  
--  
-- Table structure for table `sub_comment`  
--  

CREATE TABLE `sub_comment` (  
`id` bigint unsigned NOT NULL AUTO_INCREMENT,  
`sub_comment` text COLLATE utf8mb4_unicode_ci NOT NULL,  
`comment_id` bigint unsigned NOT NULL,  
`user_id` bigint unsigned NOT NULL,  
`created_at` timestamp NULL DEFAULT NULL,  
`updated_at` timestamp NULL DEFAULT NULL,  
PRIMARY KEY (`id`),  
KEY `sub_comment_comment_id_foreign` (`comment_id`),  
KEY `sub_comment_user_id_foreign` (`user_id`),  
CONSTRAINT `sub_comment_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`),  
CONSTRAINT `sub_comment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;  

--  
-- Table structure for table `users`  
--  

CREATE TABLE `users` (  
`id` bigint unsigned NOT NULL AUTO_INCREMENT,  
`name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,  
`email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,  
`email_verified_at` timestamp NULL DEFAULT NULL,  
`password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,  
`remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,  
`created_at` timestamp NULL DEFAULT NULL,  
`updated_at` timestamp NULL DEFAULT NULL,  
PRIMARY KEY (`id`),  
UNIQUE KEY `users_email_unique` (`email`)  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;  
  
-- Dump completed on 2023-07-28 17:13:46  
