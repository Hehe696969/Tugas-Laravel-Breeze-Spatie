<x-app-layout>
    <div style="background: #f1f5f9; min-height: 85vh; padding: 35px 20px;">
        <div style="max-width: 800px; margin: auto;">

            {{-- Header --}}
            <div style="margin-bottom: 28px;">
                <p style="color: #64748b; font-size: 13px; margin-bottom: 6px;">
                    SISTEM INFORMASI
                </p>

                <h1 style="font-size: 28px; font-weight: 800; color: #0f172a;">
                    Edit Buku
                </h1>

                <p style="color: #64748b; margin-top: 5px;">
                    Perbarui informasi buku yang tersimpan dalam sistem.
                </p>
            </div>

            {{-- Form --}}
            <div style="
                background: white;
                padding: 30px;
                border-radius: 16px;
                border: 1px solid #e2e8f0;
                box-shadow: 0 3px 12px rgba(15, 23, 42, 0.05);
            ">

                <h2 style="font-size: 20px; font-weight: 700; color: #0f172a; margin-bottom: 6px;">
                    Informasi Buku
                </h2>

                <p style="font-size: 13px; color: #64748b; margin-bottom: 25px;">
                    Ubah informasi pada kolom yang diperlukan.
                </p>

                <form action="{{ route('bukus.update', $buku) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Judul --}}
                    <div style="margin-bottom: 20px;">
                        <label for="judul" style="display: block; font-weight: 600; color: #334155; margin-bottom: 8px;">
                            Judul Buku
                        </label>

                        <input
                            type="text"
                            id="judul"
                            name="judul"
                            value="{{ old('judul', $buku->judul) }}"
                            required
                            style="width: 100%; padding: 12px 14px; border: 1px solid #cbd5e1; border-radius: 8px; outline-color: #1e3a8a;"
                        >

                        @error('judul')
                            <p style="color: #dc2626; font-size: 13px; margin-top: 6px;">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Penulis --}}
                    <div style="margin-bottom: 20px;">
                        <label for="penulis" style="display: block; font-weight: 600; color: #334155; margin-bottom: 8px;">
                            Penulis
                        </label>

                        <input
                            type="text"
                            id="penulis"
                            name="penulis"
                            value="{{ old('penulis', $buku->penulis) }}"
                            required
                            style="width: 100%; padding: 12px 14px; border: 1px solid #cbd5e1; border-radius: 8px; outline-color: #1e3a8a;"
                        >

                        @error('penulis')
                            <p style="color: #dc2626; font-size: 13px; margin-top: 6px;">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Penerbit --}}
                    <div style="margin-bottom: 20px;">
                        <label for="penerbit" style="display: block; font-weight: 600; color: #334155; margin-bottom: 8px;">
                            Penerbit
                        </label>

                        <input
                            type="text"
                            id="penerbit"
                            name="penerbit"
                            value="{{ old('penerbit', $buku->penerbit) }}"
                            required
                            style="width: 100%; padding: 12px 14px; border: 1px solid #cbd5e1; border-radius: 8px; outline-color: #1e3a8a;"
                        >

                        @error('penerbit')
                            <p style="color: #dc2626; font-size: 13px; margin-top: 6px;">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tahun --}}
                    <div style="margin-bottom: 20px;">
                        <label for="tahun_terbit" style="display: block; font-weight: 600; color: #334155; margin-bottom: 8px;">
                            Tahun Terbit
                        </label>

                        <input
                            type="number"
                            id="tahun_terbit"
                            name="tahun_terbit"
                            value="{{ old('tahun_terbit', $buku->tahun_terbit) }}"
                            min="1900"
                            max="{{ date('Y') }}"
                            required
                            style="width: 100%; padding: 12px 14px; border: 1px solid #cbd5e1; border-radius: 8px; outline-color: #1e3a8a;"
                        >

                        @error('tahun_terbit')
                            <p style="color: #dc2626; font-size: 13px; margin-top: 6px;">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div style="margin-bottom: 28px;">
                        <label for="kategori" style="display: block; font-weight: 600; color: #334155; margin-bottom: 8px;">
                            Kategori
                        </label>

                        <input
                            type="text"
                            id="kategori"
                            name="kategori"
                            value="{{ old('kategori', $buku->kategori) }}"
                            required
                            style="width: 100%; padding: 12px 14px; border: 1px solid #cbd5e1; border-radius: 8px; outline-color: #1e3a8a;"
                        >

                        @error('kategori')
                            <p style="color: #dc2626; font-size: 13px; margin-top: 6px;">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div style="display: flex; flex-wrap: wrap; gap: 12px; border-top: 1px solid #e2e8f0; padding-top: 22px;">

                        <button
                            type="submit"
                            style="background: #1e3a8a; color: white; padding: 12px 23px; border-radius: 8px; border: none; cursor: pointer; font-weight: 600;"
                        >
                            Simpan Perubahan
                        </button>

                        <a
                            href="{{ route('bukus.index') }}"
                            style="background: #e2e8f0; color: #334155; padding: 12px 23px; border-radius: 8px; text-decoration: none; font-weight: 600;"
                        >
                            Kembali
                        </a>

                    </div>
                </form>
            </div>

            <p style="text-align: center; color: #94a3b8; font-size: 13px; margin-top: 25px;">
                Sistem Informasi Manajemen Buku
            </p>

        </div>
    </div>
</x-app-layout>