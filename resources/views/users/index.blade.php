<x-app-layout>
    <div style="background: #f1f5f9; min-height: 85vh; padding: 35px 20px;">
        <div style="max-width: 1200px; margin: auto;">

            {{-- Header --}}
            <div style="margin-bottom: 28px;">
                <p style="color: #64748b; font-size: 13px; margin-bottom: 6px;">
                    SISTEM INFORMASI
                </p>

                <h1 style="font-size: 28px; font-weight: 800; color: #0f172a;">
                    Manajemen Pengguna
                </h1>

                <p style="color: #64748b; margin-top: 5px;">
                    Kelola akun pengguna dan hak akses berdasarkan role.
                </p>
            </div>

            {{-- Pesan Berhasil --}}
            @if (session('success'))
                <div style="
                    background: #dcfce7;
                    color: #166534;
                    padding: 14px 18px;
                    border-radius: 10px;
                    margin-bottom: 20px;
                    border: 1px solid #bbf7d0;
                ">
                    ✓ {{ session('success') }}
                </div>
            @endif

            {{-- Kartu Daftar Pengguna --}}
            <div style="
                background: white;
                padding: 25px;
                border-radius: 16px;
                border: 1px solid #e2e8f0;
                box-shadow: 0 3px 12px rgba(15, 23, 42, 0.05);
            ">

                <div style="margin-bottom: 22px;">
                    <h2 style="font-size: 20px; font-weight: 700; color: #0f172a;">
                        Daftar Pengguna
                    </h2>

                    <p style="font-size: 13px; color: #64748b; margin-top: 4px;">
                        Informasi akun dan role yang dimiliki setiap pengguna.
                    </p>
                </div>

                {{-- Tabel --}}
                <div style="width: 100%; overflow-x: auto;">
                    <table style="
                        width: 100%;
                        border-collapse: collapse;
                        min-width: 650px;
                        font-size: 14px;
                    ">
                        <thead>
                            <tr style="background: #0f172a; color: white;">
                                <th style="padding: 15px 12px; text-align: center;">No</th>
                                <th style="padding: 15px 12px; text-align: left;">Nama Pengguna</th>
                                <th style="padding: 15px 12px; text-align: left;">Email</th>
                                <th style="padding: 15px 12px; text-align: center;">Role</th>
                                <th style="padding: 15px 12px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($users as $user)
                                <tr style="
                                    border-bottom: 1px solid #e2e8f0;
                                    background: {{ $loop->even ? '#f8fafc' : 'white' }};
                                ">

                                    <td style="padding: 15px 12px; text-align: center; color: #64748b;">
                                        {{ $users->firstItem() + $loop->index }}
                                    </td>

                                    <td style="padding: 15px 12px; font-weight: 600; color: #0f172a;">
                                        {{ $user->name }}
                                    </td>

                                    <td style="padding: 15px 12px; color: #475569;">
                                        {{ $user->email }}
                                    </td>

                                    <td style="padding: 15px 12px; text-align: center;">
                                        @forelse ($user->getRoleNames() as $role)
                                            @php
                                                $roleColor = match ($role) {
                                                    'Admin' => ['#fee2e2', '#b91c1c'],
                                                    'Dosen' => ['#dbeafe', '#1d4ed8'],
                                                    'Mahasiswa' => ['#dcfce7', '#15803d'],
                                                    default => ['#e2e8f0', '#475569'],
                                                };
                                            @endphp

                                            <span style="
                                                display: inline-block;
                                                background: {{ $roleColor[0] }};
                                                color: {{ $roleColor[1] }};
                                                padding: 6px 12px;
                                                border-radius: 20px;
                                                font-size: 12px;
                                                font-weight: 700;
                                                margin: 2px;
                                            ">
                                                {{ $role }}
                                            </span>
                                        @empty
                                            <span style="color: #64748b; font-size: 12px;">
                                                Belum memiliki role
                                            </span>
                                        @endforelse
                                    </td>

                                    <td style="padding: 15px 12px; text-align: center;">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                           style="
                                               display: inline-block;
                                               background: #dbeafe;
                                               color: #1d4ed8;
                                               padding: 8px 14px;
                                               border-radius: 7px;
                                               text-decoration: none;
                                               font-weight: 600;
                                               font-size: 13px;
                                           ">
                                            Ubah Role
                                        </a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="padding: 35px 15px; text-align: center; color: #64748b;">
                                        Belum ada pengguna.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div style="margin-top: 22px;">
                    {{ $users->links() }}
                </div>

            </div>

            <p style="text-align: center; color: #94a3b8; font-size: 13px; margin-top: 25px;">
                Sistem Informasi Manajemen Buku
            </p>

        </div>
    </div>
</x-app-layout>