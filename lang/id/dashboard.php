<?php

return [
    /** SIDEBAR */
    'sidebar' => [
        'menus' => [
            'name' => [
                'user-management' => 'Tata Pengguna',
                'profile' => 'Profil',
                'monitoring' => 'Monitoring Presensi',
                'profile' => 'Profil',
                'reports' => 'Laporan'
            ],
            'description' => [
                'user-management' => 'Menu untuk daftar manajemen pengguna',
                'profile' => 'Menu untuk memperbaharui profil pengguna yang telah masuk',
                'monitoring' => 'Menu untuk monitoring presensi',
                'reports' => 'Menu untuk mencetak laporan'
            ]
        ],

        'submenus' => [
            'name' => [
                'user' => 'Akun Admin',
                'role-permissions' => 'Izin Akses Pengguna',
                'profile' => 'Perbaharui Profil',
                'reports' => [
                    'presence' => 'Presensi',
                    'recap-presence' => 'Rekap Presensi'
                ]
            ],
            'description' => [
                'user' => 'Menu untuk daftar akun admin yang telah terdaftar pada aplikasi',
                'role-permissions' => 'Menu untuk daftar level/ peran',
                'profile' => 'Izin akses untuk memperbaharui profil'
            ],
            'permissions' => [
                'title' => [
                    'create' => [
                        'admin' => 'Buat Admin Baru',
                        'role' => 'Buat Level Baru',
                        'monitoring' => 'Cetak Presensi'
                    ],
                    'edit' => [
                        'admin' => 'Perbaharui Admin',
                        'role' => 'Perbaharui Level'
                    ],
                    'show' => [
                        'admin' => 'Detail Admin',
                        'role' => 'Detail Level'
                    ],
                    'delete' => [
                        'admin' => 'Hapus Admin',
                        'role' => 'Hapus Level'
                    ],

                    'permission' => [
                        'show' => 'Detail Informasi Izin Akses',
                        'assign' => 'Penetapan Izin Akses'
                    ]
                ],

                'description' => [
                    'create' => [
                        'admin' => 'Izin akses untuk membuat akun admin baru',
                        'role' => 'Izin akses untuk membuat level/ peran admin baru',
                        'monitoring' => 'Izin akses untu mencetak monitoring presensi',
                    ],
                    'edit' => [
                        'admin' => 'Izin akses untuk memperbaharui akun admin',
                        'role' => 'Izin akses untuk memperbaharui level/ peran admin',
                    ],
                    'show' => [
                        'admin' => 'Izin akses untuk melihat detail informasi akun admin',
                        'role' => 'Izin akses untuk melihat detail informasi level/ peran admin',
                    ],
                    'delete' => [
                        'admin' => 'Izin akses untuk menghapus akun admin',
                        'role' => 'Izin akses untuk menghapus level/ peran admin',
                    ],

                    'permission' => [
                        'show' => 'Izin akses untuk melihat detail informasi semua perizinan',
                        'assign' => 'Izin akses untuk menetapkan semua perizinan'
                    ]
                ]
            ]
        ]
    ],

    /** Global */
    'content' => [
        'title' => [
            'user' => 'Daftar Akun Pengguna',
            'role' => 'Daftar Peran/ Level',

            'create' => [
                'user' => 'Tambah Baru Pengguna',
                'role' => 'Tambah Baru Peran/ Level'
            ],
            'edit' => [
                'user' => 'Ubah Pengguna',
                'role' => 'Ubah Peran/ Level'
            ],
            'delete' => [
                'header' => 'Konfirmasi Penghapusan',
                'body' => 'Apakah Anda yakin?',
                'text' => 'Anda tidak akan dapat mengembalikan ini',
                'buttons' => [
                    'yes' => 'Ya',
                    'no' => 'Tidak'
                ]
            ]
        ],

        'buttons' => [
            'create' => 'Tambah Baru',
            'submit' => 'Kirim',
            'cancel' => 'Batal'
        ],

        'required' => 'Informasi Yang Dibutuhkan',

        'profile' => [
            'title' => 'Perbaharui Profil',
            'card' => [
                'left' => [
                    'contact-information' => 'Informasi Kontak',
                    'social-profile' => 'Sosial Media'
                ],
                'right' => [
                    'accordion-title' => [
                        'setting' => 'Konfigurasi',
                        'time-line' => 'Linimasa'
                    ]
                ]
            ],
        ],
    ],

    'flash' => [
        'success' => [
            'title' => 'Berhasil!',
            'user' => 'Pengguna baru telah disimpan!',
            'role' => 'Peran/ Level baru telah disimpan!',
            'avatar' => 'Foto Avatar telah diperbaharui!'
        ],
        'edit' => [
            'user' => 'Data Pengguna telah diperbaharui',
            'role' => 'Data Peran/ Level telah diperbaharui'
        ],
        'delete' => [
            'user' => 'Data Pengguna telah terhapus!',
            'role' => [
                'cannot' => 'Peran/ Level ini tidak boleh dihapus!',
                'can' => 'Peran/ Level telah terhapus!'
            ],
        ]
    ]
];
