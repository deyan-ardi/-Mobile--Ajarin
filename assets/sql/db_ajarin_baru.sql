-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Feb 2021 pada 17.05
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ajarin_baru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_kelas`
--

CREATE TABLE `anggota_kelas` (
  `id_anggota` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota_kelas`
--

INSERT INTO `anggota_kelas` (`id_anggota`, `id_kelas`, `id_user`, `status`) VALUES
(16, 11, 5, 'Pemilik'),
(19, 11, 4, 'Anggota'),
(22, 12, 4, 'Pemilik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_bab`
--

CREATE TABLE `daftar_bab` (
  `id_bab` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_bab` varchar(250) NOT NULL,
  `deskripsi_bab` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_bab`
--

INSERT INTO `daftar_bab` (`id_bab`, `id_kelas`, `nama_bab`, `deskripsi_bab`) VALUES
(5, 11, 'Pembelajaran 1 - Pengenalan Gaya Gravitasi', 'Tujuan : Mengetahui dan memahami terkait pengaruh gaya gravitasi'),
(6, 11, 'Pembelajaran 2 - Perkembangan Gravitasi dan Hukum Gravitasi', 'Tujuan : Mengetahui Perkembangan Gravitasi dan Hukum Gravitasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_kelas`
--

CREATE TABLE `daftar_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(250) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_kelas`
--

INSERT INTO `daftar_kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`, `deskripsi`, `created_by`, `id_user`) VALUES
(11, '#0HLJ3S', 'IPA Kelas 6', 'Mari kita belajar materi IPA untuk kelas 6 dengan VR', 'Riyan ardi', 5),
(12, '#S490J8', 'IPS Kelas 5', 'Yuk belajar IPS dengan VR', 'ardi', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_materi`
--

CREATE TABLE `daftar_materi` (
  `id_materi` int(11) NOT NULL,
  `id_bab` int(11) NOT NULL,
  `nama_materi` varchar(250) NOT NULL,
  `deskripsi_materi` varchar(100) NOT NULL,
  `kategori_materi` int(11) NOT NULL,
  `link_materi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_materi`
--

INSERT INTO `daftar_materi` (`id_materi`, `id_bab`, `nama_materi`, `deskripsi_materi`, `kategori_materi`, `link_materi`) VALUES
(11, 5, 'Coba Tonton Video Berikut', 'Berikut merupakan salah satu contoh pengaruh gaya gravitasi', 0, 'https://www.youtube.com/embed/QKm-SOOMC4c');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'guru', 'Digunakan Untuk Guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(2, '127.0.0.1', 'hmjtiundiksha@gmail.com', 1613742477),
(3, '127.0.0.1', 'hmjtiundiksha@gmail.com', 1613742481),
(6, '127.0.0.1', 'riyan.clsg@gmail.com', 1613748495);

-- --------------------------------------------------------

--
-- Struktur dari tabel `progress_belajar`
--

CREATE TABLE `progress_belajar` (
  `id_progress` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_bab` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$DMcI2yXi4tH5ZwuUKPhjQex3fcje7lSllD1ED.qKgLHXlYCeyWwGK', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1613747213, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '127.0.0.1', NULL, '$2y$10$4gZ2kFc992Gyt8mbqgePZ.6oJkQHWDqZ6paK6WsnfBzkywx9nJwti', 'hmjtiundiksha@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1613711597, NULL, 1, 'DEYAN', NULL, NULL, NULL),
(3, '127.0.0.1', NULL, '$2y$10$5HsAWWX332OFjjC1xNsNoO5TYSFYdlf38UOcd/xETfdKKwJJB3vFC', 'riyan.clsg11@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1613711658, 1613748499, 1, 'ardi', NULL, NULL, NULL),
(4, '127.0.0.1', NULL, '$2y$10$P93cS.GqHBtNhsWxkkRlq.4C4hCCIn0/yH67yk5XEjCqsxWt9ASMa', 'riyan.clsg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1613711762, 1613747264, 1, 'ardi', NULL, NULL, NULL),
(5, '127.0.0.1', NULL, '$2y$10$Wbn/yzRsgBmsf4vxLI/WEeDa9wcO6OGbA1EJn/pebnkDhtfXFTyPy', 'riyan@undiksha.ac.id', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1613742516, 1613748519, 1, 'Riyan ardi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(5, 2, 2),
(4, 3, 2),
(3, 4, 3),
(6, 5, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `fk_id_kelas_anggota` (`id_kelas`),
  ADD KEY `fk_id_user_anggota` (`id_user`);

--
-- Indeks untuk tabel `daftar_bab`
--
ALTER TABLE `daftar_bab`
  ADD PRIMARY KEY (`id_bab`),
  ADD KEY `fk_id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `daftar_kelas`
--
ALTER TABLE `daftar_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `fk_id_user_daftar_kelas` (`id_user`);

--
-- Indeks untuk tabel `daftar_materi`
--
ALTER TABLE `daftar_materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `fk_id_bab` (`id_bab`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `progress_belajar`
--
ALTER TABLE `progress_belajar`
  ADD PRIMARY KEY (`id_progress`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `daftar_bab`
--
ALTER TABLE `daftar_bab`
  MODIFY `id_bab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `daftar_kelas`
--
ALTER TABLE `daftar_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `daftar_materi`
--
ALTER TABLE `daftar_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `progress_belajar`
--
ALTER TABLE `progress_belajar`
  MODIFY `id_progress` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  ADD CONSTRAINT `fk_id_kelas_anggota` FOREIGN KEY (`id_kelas`) REFERENCES `daftar_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_user_anggota` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `daftar_bab`
--
ALTER TABLE `daftar_bab`
  ADD CONSTRAINT `fk_id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `daftar_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `daftar_kelas`
--
ALTER TABLE `daftar_kelas`
  ADD CONSTRAINT `fk_id_user_daftar_kelas` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `daftar_materi`
--
ALTER TABLE `daftar_materi`
  ADD CONSTRAINT `fk_id_bab` FOREIGN KEY (`id_bab`) REFERENCES `daftar_bab` (`id_bab`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
