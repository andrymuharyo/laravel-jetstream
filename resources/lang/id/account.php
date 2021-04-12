<?php

return [

   "menu" => [
    "name"    => "Profil",
    "label"   => "Kelola akun",
    "profile" => "Sunting profil",
   ],
   "label" => [
        "profile" => [
            "name" => "Informasi Profil",
            "info" => "Perbarui informasi profil dan alamat email akun Anda.",
        ],
        "password" => [
            "name" => "Perbarui Kata Sandi",
            "info" => "Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk tetap aman.",
        ],
        "two_factor" => [
            "name"        => "Otentikasi Dua Faktor",
            "info"        => "Tambahkan keamanan tambahan ke akun Anda menggunakan otentikasi dua faktor.",
            "description" => "Ketika otentikasi dua faktor diaktifkan, Anda akan dimintai token acak yang aman selama otentikasi. Anda dapat mengambil token ini dari aplikasi Google Authenticator ponsel Anda.",
            "on"          => "otentikasi dua faktor anda aktif.",
            "off"         => "Anda belum mengaktifkan otentikasi dua faktor.",
            "store"       => "Simpan kode pemulihan ini di pengelola kata sandi yang aman. Mereka dapat digunakan untuk memulihkan akses ke akun Anda jika perangkat otentikasi dua faktor Anda hilang.",
            "enabled"     => "Otentikasi dua faktor sekarang diaktifkan. Pindai kode QR berikut menggunakan aplikasi pengautentikasi ponsel Anda.",
            "alert"       => [
                "info" => "or your security, please confirm your password to continue.",
            ],
            "regenerate" => "Buat kembali Kode Pemulihan",
            "recovery"   => "Tampilkan Kode Pemulihan",
        ],
        "session" => [
            "name"        => "Sesi Browser",
            "info"        => "Kelola dan keluar dari sesi aktif Anda di browser dan perangkat lain",
            "description" => "Jika perlu, Anda dapat keluar dari semua sesi browser Anda yang lain di semua perangkat Anda. Beberapa sesi terbaru Anda tercantum di bawah ini; namun, daftar ini mungkin tidak lengkap. Jika Anda merasa akun Anda telah dibobol, Anda juga harus memperbarui kata sandi Anda.",
            "device"      => "Anda sekarang berada di perangkat ini",
            "last_active" => "Aktif terakhir",
            "button"      => "Keluar dari Sesi Browser Lainnya",
        ],
        "delete" => [
            "name"        => "Hapus Akun",
            "info"        => "Hapus akun Anda secara permanen.",
            "description" => "Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda simpan.",
            "button"      => "Hapus akun",
            "alert"       => "Anda yakin ingin menghapus akun Anda? Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.",
        ],
    ],
    "roles" => [
        "administrator" => "Pengguna administrator dapat melakukan tindakan apa pun.",
        "editor"        => "Pengguna editor memiliki kemampuan untuk membaca, membuat, dan memperbarui.",
    ],
];
