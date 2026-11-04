<x-app-layout>
    <div style="background: #f1f5f9; min-height: 85vh; padding: 35px 20px;">

        <div style="max-width: 1200px; margin: auto;">

            {{-- Header Dashboard --}}
            <div style="margin-bottom: 30px;">
                <p style="color: #64748b; font-size: 14px; margin-bottom: 6px;">
                    HALO, {{ strtoupper(auth()->user()->name) }}
                </p>

                <h1 style="font-size: 28px; font-weight: 800; color: #0f172a;">
                    Dashboard Manajemen Buku
                </h1>

                <p style="color: #64748b; margin-top: 5px;">
                    Selamat datang di sistem informasi manajemen buku.
                </p>
            </div>

            {{-- Kartu Sambutan --}}
            <div style="
                background: linear-gradient(120deg, #0f172a, #1e3a8a);
                color: white;
                padding: 32px;
                border-radius: 16px;
                margin-bottom: 25px;
                box-shadow: 0 8px 20px rgba(15, 23, 42, 0.15);
            ">
                <h2 style="font-size: 24px; font-weight: 700; margin-bottom: 10px;">
                    Selamat Datang!
                </h2>

                <p style="color: #dbeafe; margin-bottom: 22px;">
                    Anda berhasil login. Silakan gunakan menu yang tersedia
                    sesuai dengan hak akses akun Anda.
                </p>

                <a href="{{ route('bukus.index') }}"
                   style="
                       display: inline-block;
                       background: white;
                       color: #1e3a8a;
                       padding: 11px 22px;
                       border-radius: 8px;
                       font-weight: 700;
                       text-decoration: none;
                   ">
                    Buka Manajemen Buku →
                </a>
            </div>

            {{-- Informasi Akun --}}
            <div style="
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
                gap: 18px;
                margin-bottom: 25px;
            ">

                <div style="
                    background: white;
                    padding: 24px;
                    border-radius: 14px;
                    border: 1px solid #e2e8f0;
                    box-shadow: 0 3px 10px rgba(15, 23, 42, 0.04);
                ">
                    <p style="font-size: 13px; color: #64748b; margin-bottom: 8px;">
                        NAMA PENGGUNA
                    </p>

                    <h3 style="font-size: 19px; font-weight: 700; color: #0f172a;">
                        {{ auth()->user()->name }}
                    </h3>
                </div>

                <div style="
                    background: white;
                    padding: 24px;
                    border-radius: 14px;
                    border: 1px solid #e2e8f0;
                    box-shadow: 0 3px 10px rgba(15, 23, 42, 0.04);
                ">
                    <p style="font-size: 13px; color: #64748b; margin-bottom: 8px;">
                        EMAIL AKUN
                    </p>

                    <h3 style="font-size: 17px; font-weight: 700; color: #0f172a; overflow-wrap: anywhere;">
                        {{ auth()->user()->email }}
                    </h3>
                </div>

                <div style="
                    background: white;
                    padding: 24px;
                    border-radius: 14px;
                    border: 1px solid #e2e8f0;
                    box-shadow: 0 3px 10px rgba(15, 23, 42, 0.04);
                ">
                    <p style="font-size: 13px; color: #64748b; margin-bottom: 8px;">
                        ROLE PENGGUNA
                    </p>

                    <h3 style="font-size: 19px; font-weight: 700; color: #1d4ed8;">
                        {{ auth()->user()->getRoleNames()->first() ?? 'Belum memiliki role' }}
                    </h3>
                </div>

            </div>

            {{-- Menu Utama --}}
            <div style="
                background: white;
                padding: 25px;
                border-radius: 14px;
                border: 1px solid #e2e8f0;
                box-shadow: 0 3px 10px rgba(15, 23, 42, 0.04);
            ">
                <h2 style="font-size: 19px; font-weight: 700; color: #0f172a; margin-bottom: 18px;">
                    Menu Utama
                </h2>

                <div style="display: flex; flex-wrap: wrap; gap: 12px;">

                    @can('view books')
                        <a href="{{ route('bukus.index') }}"
                           style="
                               background: #1e3a8a;
                               color: white;
                               padding: 12px 20px;
                               border-radius: 8px;
                               text-decoration: none;
                               font-weight: 600;
                           ">
                            📚 Manajemen Buku
                        </a>
                    @endcan

                    @can('manage users')
                        <a href="{{ route('users.index') }}"
                           style="
                               background: #334155;
                               color: white;
                               padding: 12px 20px;
                               border-radius: 8px;
                               text-decoration: none;
                               font-weight: 600;
                           ">
                            👥 Manajemen Pengguna
                        </a>
                    @endcan

                </div>
            </div>

            <p style="text-align: center; color: #94a3b8; font-size: 13px; margin-top: 28px;">
                Sistem Informasi Manajemen Buku
            </p>

        </div>
    </div>
</x-app-layout>