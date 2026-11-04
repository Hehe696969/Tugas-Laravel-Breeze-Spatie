<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Buku
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <h3 class="text-2xl font-bold mb-6">
                    {{ $buku->judul }}
                </h3>

                <div class="space-y-4">
                    <div>
                        <span class="font-semibold">Penulis:</span>
                        {{ $buku->penulis }}
                    </div>

                    <div>
                        <span class="font-semibold">Penerbit:</span>
                        {{ $buku->penerbit }}
                    </div>

                    <div>
                        <span class="font-semibold">Tahun Terbit:</span>
                        {{ $buku->tahun_terbit }}
                    </div>

                    <div>
                        <span class="font-semibold">Kategori:</span>
                        {{ $buku->kategori }}
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('bukus.index') }}"
                       class="bg-gray-500 text-white px-4 py-2 rounded">
                        Kembali ke Daftar Buku
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
