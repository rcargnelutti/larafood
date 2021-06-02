-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Tempo de geração: 02/06/2021 às 04:55
-- Versão do servidor: 8.0.23
-- Versão do PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `larafood2`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `detail_plans`
--

CREATE TABLE `detail_plans` (
  `id` bigint UNSIGNED NOT NULL,
  `plan_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `detail_plans`
--

INSERT INTO `detail_plans` (`id`, `plan_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 28, 'plano-de-teste2 UP', NULL, '2021-05-27 23:39:15'),
(5, 29, 'dghsdhfghfdhdfhdfghdfgh', '2021-05-28 00:33:11', '2021-05-28 00:33:11'),
(6, 30, 'Versão atual 2021', '2021-05-29 15:39:13', '2021-05-29 15:39:13');

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_25_162711_create_plans_table', 1),
(6, '2021_05_26_231844_create_detail_plans_table', 2),
(7, '2021_05_28_232157_create_profiles_table', 3),
(8, '2021_05_29_020726_create_permissions_table', 4),
(9, '2021_05_29_150425_create_permission_profile_table', 5),
(10, '2021_06_01_011639_create_plan_profile_table', 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Nome da permissão', 'Descrição da permissão', '2021-05-29 02:38:35', '2021-05-29 02:38:35'),
(4, 'Não deleta nada', 'Não deleta nada', '2021-05-29 02:41:31', '2021-05-29 02:41:31'),
(5, 'Permissão de teste', 'kkkkkkkkkkkk', '2021-05-31 01:25:39', '2021-05-31 01:25:39'),
(6, 'Permissão 02', 'hehehehehe', '2021-05-31 01:26:12', '2021-05-31 01:26:12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `permission_profile`
--

CREATE TABLE `permission_profile` (
  `id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `profile_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `permission_profile`
--

INSERT INTO `permission_profile` (`id`, `permission_id`, `profile_id`) VALUES
(6, 6, 1),
(7, 4, 1),
(8, 1, 1),
(9, 5, 1),
(10, 1, 2),
(11, 4, 2),
(12, 5, 2),
(13, 6, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `plans`
--

CREATE TABLE `plans` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `plans`
--

INSERT INTO `plans` (`id`, `name`, `url`, `price`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Plano 01', 'Plano 01', 24.99, 'Plano 01', NULL, NULL),
(2, 'Plano 02', 'Plano 02', 34.99, 'Plano 02', NULL, NULL),
(3, 'Plano 03', 'Plano 03', 44.99, 'Plano 03', NULL, NULL),
(4, 'Plano 04', 'Plano 04', 54.99, 'Plano 04', NULL, NULL),
(7, 'Plano 05', 'Plano 05', 69.99, 'Plano 05', NULL, NULL),
(8, 'Plano 06', 'Plano 06', 79.99, 'Plano 06', NULL, NULL),
(9, 'Plano 07', 'Plano 07', 89.99, 'Plano 07', NULL, NULL),
(10, 'Plano 08', 'Plano 08', 99.99, 'Plano 08', NULL, NULL),
(11, 'Plano 10', 'plano10', 10.10, 'Desc Plano 10', '2021-05-26 09:55:22', '2021-05-26 09:55:22'),
(12, 'Teste', 'teste', 11.11, 'Desc teste 001', '2021-05-26 09:56:44', '2021-05-26 09:56:44'),
(14, 'Plano Teste 001', 'plano-teste001', 0.99, 'Desc Teste 001', '2021-05-26 10:40:50', '2021-05-26 10:40:50'),
(15, 'MIX 2021', 'm-i-x2021', 10.00, 'MIX é Muito bom', '2021-05-26 10:44:42', '2021-05-26 10:44:42'),
(16, 'MIX 2022', 'm-i-x2022', 1234.56, 'MIX 2022 é melhor ainda', '2021-05-26 10:45:49', '2021-05-26 10:45:49'),
(19, 'dfgdfg', 'dfgdfg', 9.99, 'dsfgsdg', '2021-05-26 15:33:34', '2021-05-26 15:33:34'),
(20, 'Novo UP', 'novo', 11.88, 'novo UP', '2021-05-26 15:35:54', '2021-05-26 16:12:32'),
(22, 'TV', 't-v', 3456.78, 'TV', '2021-05-26 16:12:57', '2021-05-26 16:12:57'),
(23, 'Internet', 'internet', 129.99, 'Internet', '2021-05-26 16:14:36', '2021-05-26 16:14:36'),
(24, 'Netflx UP', 'netflx', 34.99, 'Filmes UP', '2021-05-26 16:16:04', '2021-05-26 18:32:59'),
(26, 'Aula 11 Upgrade', 'aula11', 11.11, 'Aula 11 Upgrade', '2021-05-26 18:37:47', '2021-05-26 18:38:10'),
(27, 'Validação', 'validação', 0.19, 'Validação UP 2', '2021-05-26 20:09:21', '2021-05-27 01:42:09'),
(28, 'Plano de teste 2', 'plano-de-teste2', 12.12, 'Apenas um teste', '2021-05-26 20:53:28', '2021-05-26 20:54:36'),
(29, 'MIX 2000', 'm-i-x2000', 219.19, 'MIX 2000 tem uma variedades de canais', '2021-05-26 22:30:28', '2021-05-26 22:30:53'),
(30, 'Bootstrap update', 'bootstrap-update', 9999.99, 'Bootstrap 5 update', '2021-05-29 15:38:56', '2021-05-29 15:39:51');

-- --------------------------------------------------------

--
-- Estrutura para tabela `plan_profile`
--

CREATE TABLE `plan_profile` (
  `id` bigint UNSIGNED NOT NULL,
  `plan_id` bigint UNSIGNED NOT NULL,
  `profile_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `plan_profile`
--

INSERT INTO `plan_profile` (`id`, `plan_id`, `profile_id`) VALUES
(1, 29, 1),
(2, 29, 2),
(3, 28, 1),
(4, 28, 2),
(5, 26, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Financeiro', 'Financeiro UP', NULL, '2021-05-29 01:18:23'),
(2, 'Comercial', 'Comercial 2', NULL, '2021-05-29 00:47:23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `detail_plans`
--
ALTER TABLE `detail_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_plans_plan_id_foreign` (`plan_id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices de tabela `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Índices de tabela `permission_profile`
--
ALTER TABLE `permission_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_profile_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_profile_profile_id_foreign` (`profile_id`);

--
-- Índices de tabela `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plans_name_unique` (`name`),
  ADD UNIQUE KEY `plans_url_unique` (`url`);

--
-- Índices de tabela `plan_profile`
--
ALTER TABLE `plan_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_profile_plan_id_foreign` (`plan_id`),
  ADD KEY `plan_profile_profile_id_foreign` (`profile_id`);

--
-- Índices de tabela `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `detail_plans`
--
ALTER TABLE `detail_plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `permission_profile`
--
ALTER TABLE `permission_profile`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `plan_profile`
--
ALTER TABLE `plan_profile`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `detail_plans`
--
ALTER TABLE `detail_plans`
  ADD CONSTRAINT `detail_plans_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `permission_profile`
--
ALTER TABLE `permission_profile`
  ADD CONSTRAINT `permission_profile_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_profile_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `plan_profile`
--
ALTER TABLE `plan_profile`
  ADD CONSTRAINT `plan_profile_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plan_profile_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
