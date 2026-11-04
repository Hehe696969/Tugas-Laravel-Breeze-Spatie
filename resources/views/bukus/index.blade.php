<x-app-layout>
    <div style="background: #f1f5f9; min-height: 85vh; padding: 35px 20px;">
        <div style="max-width: 1200px; margin: auto;">

            {{-- Header --}}
            <div style="margin-bottom: 28px;">
                <p style="color: #64748b; font-size: 13px; margin-bottom: 6px;">
                    SISTEM INFORMASI
                </p>

                <h1 style="font-size: 28px; font-weight: 800; color: #0f172a;">
                    Manajemen Buku
                </h1>

                <p style="color: #64748b; margin-top: 5px;">
                    Kelola dan lihat seluruh koleksi buku yang tersedia.
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

            {{-- Kartu Tabel --}}
            <div style="
                background: white;
                padding: 25px;
                border-radius: 16px;
                border: 1px solid #e2e8f0;
                box-shadow: 0 3px 12px rgba(15, 23, 42, 0.05);
            ">

                {{-- Judul dan Tombol --}}
                <div style="
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    flex-wrap: wrap;
                    gap: 15px;
                    margin-bottom: 22px;
                ">
                    <div>
                        <h2 style="font-size: 20px; font-weight: 700; color: #0f172a;">
                            Daftar Koleksi Buku
                        </h2>

                        <p style="font-size: 13px; color: #64748b; margin-top: 4px;">
                            Data buku yang tersimpan dalam sistem.
                        </p>
                    </div>

                    @can('create books')
                        <a href="{{ route('bukus.create') }}"
                           style="
                               display: inline-block;
                               background: #1e3a8a;
                               color: white;
                               padding: 11px 19px;
                               border-radius: 8px;
                               text-decoration: none;
                               font-weight: 600;
                               font-size: 14px;
                           ">
                            + Tambah Buku
                        </a>
                    @endcan
                </div>

                {{-- Tabel --}}
                <div style="width: 100%; overflow-x: auto;">
                    <table style="
                        width: 100%;
                        border-collapse: collapse;
                        min-width: 750px;
                        font-size: 14px;
                    ">
                        <thead>
                            <tr style="background: #0f172a; color: white;">
                                <th style="padding: 15px 12px; text-align: center;">No</th>
                                <th style="padding: 15px 12px; text-align: left;">Judul Buku</th>
                                <th style="padding: 15px 12px; text-align: left;">Penulis</th>
                                <th style="padding: 15px 12px; text-align: left;">Penerbit</th>
                                <th style="padding: 15px 12px; text-align: center;">Tahun</th>
                                <th style="padding: 15px 12px; text-align: left;">Kategori</th>
                                <th style="padding: 15px 12px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($bukus as $buku)
                                <tr style="border-bottom: 1px solid #e2e8f0; background: {{ $loop->even ? '#f8fafc' : 'white' }};">

                                    <td style="padding: 14px 12px; text-align: center; color: #64748b;">
                                        {{ $loop->iteration + ($bukus->currentPage() - 1) * $bukus->perPage() }}
                                    </td>

                                    <td style="padding: 14px 12px; font-weight: 600; color: #0f172a;">
                                        {{ $buku->judul }}
                                    </td>

                                    <td style="padding: 14px 12px; color: #475569;">
                                        {{ $buku->penulis }}
                                    </td>

                                    <td style="padding: 14px 12px; color: #475569;">
                                        {{ $buku->penerbit }}
                                    </td>

                                    <td style="padding: 14px 12px; text-align: center; color: #475569;">
                                        {{ $buku->tahun_terbit }}
                                    </td>

                                    <td style="padding: 14px 12px;">
                                        <span style="
                                            display: inline-block;
                                            background: #dbeafe;
                                            color: #1e40af;
                                            padding: 5px 10px;
                                            border-radius: 20px;
                                            font-size: 12px;
                                            font-weight: 600;
                                        ">
                                            {{ $buku->kategori }}
                                        </span>
                                    </td>

                                    <td style="padding: 14px 12px; text-align: center; white-space: nowrap;">
                                        @can('edit books')
                                            <a href="{{ route('bukus.edit', $buku) }}"
                                               style="
                                                   display: inline-block;
                                                   background: #dbeafe;
                                                   color: #1d4ed8;
                                                   padding: 7px 12px;
                                                   border-radius: 6px;
                                                   text-decoration: none;
                                                   font-weight: 600;
                                                   margin: 2px;
                                               ">
                                                Edit
                                            </a>
                                        @endcan

                                        @can('delete books')
                                            <form action="{{ route('bukus.destroy', $buku) }}"
                                                  method="POST"
                                                  style="display: inline-block; margin: 2px;">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        onclick="return confirm('Yakin ingin menghapus buku ini?')"
                                                        style="
                                                            background: #fee2e2;
                                                            color: #b91c1c;
                                                            border: none;
                                                            padding: 7px 12px;
                                                            border-radius: 6px;
                                                            font-weight: 600;
                                                            cursor: pointer;
                                                        ">
                                                    Hapus
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" style="
                                        padding: 35px 15px;
                                        text-align: center;
                                        color: #64748b;
                                    ">
                                        <div style="font-size: 30px; margin-bottom: 8px;">
                                            📚
                                        </div>
                                        Belum ada data buku.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div style="margin-top: 22px;">
                    {{ $bukus->links() }}
                </div>

            </div>

            <p style="text-align: center; color: #94a3b8; font-size: 13px; margin-top: 25px;">
                Sistem Informasi Manajemen Buku
            </p>

        </div>
    </div>
</x-app-layout>