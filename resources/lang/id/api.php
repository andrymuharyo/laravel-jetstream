<?php

return [

   "menu" => [
        "name" => "Token API",
   ],
   "label" => [
        "create" => [
            "name"       => "Buat API Token",
            "info"       => "Token API memungkinkan layanan pihak ketiga untuk mengautentikasi dengan aplikasi kami atas nama Anda.",
            "token_name" => "Nama token",
            "permission" => "Izin",
            "created"    => "Salin token API baru Anda. Demi keamanan Anda, ini tidak akan ditampilkan lagi.",
        ],
        "manage" => [
            "name" => "Kelola API Token",
            "info" => "Anda dapat menghapus salah satu token yang ada jika tidak lagi diperlukan.",
            "used"  => "Terakhir digunakan",
        ],
        "delete" => [
            "name" => "Hapus token API",
            "info" => "Anda yakin ingin menghapus token API ini?",
        ],
    ],

];
