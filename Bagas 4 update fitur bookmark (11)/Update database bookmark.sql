-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jun 2024 pada 22.29
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rating_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ayambaek`
--

CREATE TABLE `ayambaek` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `warung_id` int(11) NOT NULL,
  `review_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ayambaek`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `bfc`
--

CREATE TABLE `bfc` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `warung_id` int(11) NOT NULL,
  `review_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bfc`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `warung_id` int(11) DEFAULT NULL,
  `warung_name` varchar(255) DEFAULT NULL,
  `warung_link` varchar(255) DEFAULT NULL,
  `warung_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bookmarks`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `crispy54`
--

CREATE TABLE `crispy54` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `warung_id` int(11) NOT NULL,
  `review_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `crispy54`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `mariyam`
--

CREATE TABLE `mariyam` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `warung_id` int(11) NOT NULL,
  `review_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mariyam`
--



-- --------------------------------------------------------

--
-- Struktur dari tabel `masjono`
--

CREATE TABLE `masjono` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `warung_id` int(11) NOT NULL,
  `review_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `masjono`
--



-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `warung_id` int(11) NOT NULL,
  `review_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `reviews`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `vitosari`
--

CREATE TABLE `vitosari` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `warung_id` int(11) NOT NULL,
  `review_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `vitosari`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `warbang`
--

CREATE TABLE `warbang` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `warung_id` int(11) NOT NULL,
  `review_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `warbang`
--


--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ayambaek`
--
ALTER TABLE `ayambaek`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bfc`
--
ALTER TABLE `bfc`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `crispy54`
--
ALTER TABLE `crispy54`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mariyam`
--
ALTER TABLE `mariyam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `masjono`
--
ALTER TABLE `masjono`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `vitosari`
--
ALTER TABLE `vitosari`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `warbang`
--
ALTER TABLE `warbang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ayambaek`
--
ALTER TABLE `ayambaek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bfc`
--
ALTER TABLE `bfc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT untuk tabel `crispy54`
--
ALTER TABLE `crispy54`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mariyam`
--
ALTER TABLE `mariyam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `masjono`
--
ALTER TABLE `masjono`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `vitosari`
--
ALTER TABLE `vitosari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT untuk tabel `warbang`
--
ALTER TABLE `warbang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
