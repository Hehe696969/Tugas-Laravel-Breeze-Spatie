<nav x-data="{ open: false }" style="background: #172554; border-bottom: 1px solid #1e3a8a; box-shadow: 0 3px 10px rgba(15,23,42,0.12);">

    <div style="max-width: 1280px; margin: auto; padding: 0 24px;">
        <div style="display: flex; justify-content: space-between; align-items: center; min-height: 76px; flex-wrap: wrap;">

            {{-- Logo --}}
            <a href="{{ route('dashboard') }}"
                style="display: flex; align-items: center; gap: 10px; text-decoration: none;">

                <div style="width: 42px; height: 42px; background: white; color: #172554; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 19px; font-weight: 800;">
                    MB
                </div>

                <div>
                    <div style="color: white; font-size: 17px; font-weight: 700;">
                        Manajemen Buku
                    </div>
                    <div style="color: #bfdbfe; font-size: 11px;">
                        Sistem Informasi Perpustakaan
                    </div>
                </div>
            </a>

            {{-- Menu Desktop --}}
            <div class="hidden sm:flex" style="align-items: center; gap: 6px;">

                <a href="{{ route('dashboard') }}"
                    style="padding: 11px 14px; border-radius: 7px; text-decoration: none; font-size: 14px; font-weight: 600; color: {{ request()->routeIs('dashboard') ? '#172554' : '#dbeafe' }}; background: {{ request()->routeIs('dashboard') ? '#ffffff' : 'transparent' }};">
                    Dashboard
                </a>

                @can('view books')
                    <a href="{{ route('bukus.index') }}"
                        style="padding: 11px 14px; border-radius: 7px; text-decoration: none; font-size: 14px; font-weight: 600; color: {{ request()->routeIs('bukus.*') ? '#172554' : '#dbeafe' }}; background: {{ request()->routeIs('bukus.*') ? '#ffffff' : 'transparent' }};">
                        Manajemen Buku
                    </a>
                @endcan

                @can('manage users')
                    <a href="{{ route('users.index') }}"
                        style="padding: 11px 14px; border-radius: 7px; text-decoration: none; font-size: 14px; font-weight: 600; color: {{ request()->routeIs('users.*') ? '#172554' : '#dbeafe' }}; background: {{ request()->routeIs('users.*') ? '#ffffff' : 'transparent' }};">
                        Manajemen Pengguna
                    </a>
                @endcan

            </div>

            {{-- Profil dan Logout Desktop --}}
            <div class="hidden sm:flex" style="align-items: center; gap: 12px;">

                <div style="display: flex; align-items: center; gap: 9px;">
                    <div style="width: 36px; height: 36px; border-radius: 50%; background: #dbeafe; color: #172554; display: flex; align-items: center; justify-content: center; font-weight: 700;">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <div>
                        <div style="color: white; font-size: 13px; font-weight: 600;">
                            {{ Auth::user()->name }}
                        </div>
                        <div style="color: #bfdbfe; font-size: 11px;">
                            {{ Auth::user()->getRoleNames()->first() ?? 'Pengguna' }}
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        style="background: #dc2626; color: white; padding: 10px 15px; border: none; border-radius: 7px; font-size: 13px; font-weight: 600; cursor: pointer;">
                        Logout
                    </button>
                </form>

            </div>

            {{-- Tombol Mobile --}}
            <button @click="open = !open" class="sm:hidden"
                style="padding: 9px 12px; background: #1e3a8a; border: 1px solid #3b5998; border-radius: 7px; color: white; font-size: 20px;">
                <span x-show="!open">☰</span>
                <span x-show="open">✕</span>
            </button>

        </div>
    </div>

    {{-- Menu Mobile --}}
    <div x-show="open" x-transition class="sm:hidden"
        style="background: #1e3a8a; padding: 14px 24px;">

        <div style="display: flex; flex-direction: column; gap: 6px;">

            <a href="{{ route('dashboard') }}"
                style="padding: 11px; color: white; text-decoration: none; border-radius: 7px;">
                Dashboard
            </a>

            @can('view books')
                <a href="{{ route('bukus.index') }}"
                    style="padding: 11px; color: white; text-decoration: none; border-radius: 7px;">
                    Manajemen Buku
                </a>
            @endcan

            @can('manage users')
                <a href="{{ route('users.index') }}"
                    style="padding: 11px; color: white; text-decoration: none; border-radius: 7px;">
                    Manajemen Pengguna
                </a>
            @endcan

        </div>

        <div style="border-top: 1px solid #3b5998; margin-top: 12px; padding-top: 15px;">
            <div style="color: white; font-weight: 600;">
                {{ Auth::user()->name }}
            </div>

            <div style="color: #bfdbfe; font-size: 12px; margin-top: 3px;">
                {{ Auth::user()->email }}
            </div>

            <form method="POST" action="{{ route('logout') }}" style="margin-top: 14px;">
                @csrf
                <button type="submit"
                    style="background: #dc2626; color: white; padding: 10px 15px; border: none; border-radius: 7px; font-weight: 600; cursor: pointer;">
                    Logout
                </button>
            </form>
        </div>
    </div>

</nav>