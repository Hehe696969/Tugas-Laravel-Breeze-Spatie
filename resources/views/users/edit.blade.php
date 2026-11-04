<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 22px; font-weight: 700; color: #172554;">
            Ubah Role Pengguna
        </h2>
    </x-slot>

    <div style="background: #f1f5f9; min-height: 80vh; padding: 40px 16px;">
        <div style="max-width: 650px; margin: auto;">

            <div style="background: white; border-radius: 14px; padding: 28px; box-shadow: 0 4px 12px rgba(15, 23, 42, 0.06);">

                <div style="margin-bottom: 26px;">
                    <h3 style="font-size: 20px; font-weight: 700; color: #172554; margin-bottom: 6px;">
                        Informasi Pengguna
                    </h3>
                    <p style="font-size: 14px; color: #64748b;">
                        Periksa informasi pengguna sebelum mengubah role.
                    </p>
                </div>

                <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 18px; margin-bottom: 28px;">
                    <div style="margin-bottom: 12px;">
                        <p style="font-size: 13px; color: #64748b;">Nama Pengguna</p>
                        <p style="font-weight: 600; color: #1e293b;">
                            {{ $user->name }}
                        </p>
                    </div>

                    <div>
                        <p style="font-size: 13px; color: #64748b;">Email</p>
                        <p style="font-weight: 600; color: #1e293b;">
                            {{ $user->email }}
                        </p>
                    </div>
                </div>

                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div style="margin-bottom: 28px;">
                        <label for="role" style="display: block; font-weight: 600; color: #334155; margin-bottom: 10px;">
                            Pilih Role Pengguna
                        </label>

                        <select name="role" id="role" required
                            style="display: block; width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; background: white; color: #1e293b;">
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}"
                                    {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('role')
                            <p style="color: #dc2626; font-size: 13px; margin-top: 8px;">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div style="display: flex; flex-wrap: wrap; gap: 12px;">
                        <button type="submit"
                            style="background: #1e3a8a; color: white; padding: 11px 20px; border-radius: 8px; border: none; cursor: pointer; font-weight: 600;">
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('users.index') }}"
                            style="background: #e2e8f0; color: #334155; padding: 11px 20px; border-radius: 8px; text-decoration: none; font-weight: 600;">
                            Kembali
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>