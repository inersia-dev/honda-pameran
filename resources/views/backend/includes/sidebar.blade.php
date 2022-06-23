<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none" style="background-color: #fff;">
        <div class="c-sidebar-brand-full">
            <img class="img-fluid" src="/img/logo/logo-astra.png" alt="" width="150">
        </div>

    </div><!--c-sidebar-brand-->

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.dashboard')"
                :active="activeClass(Route::is('admin.dashboard'), 'c-active c-sidebar-nav-icon-red')"
                icon="c-sidebar-nav-icon cil-speedometer"
                :text="__('Dashboard')" />
        </li>
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.admin.pameran')"
                :active="activeClass(Route::is('admin.admin.pameran'), 'c-active')"
                icon="c-sidebar-nav-icon cil-layers"
                text="Proposal" />
        </li>
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                {{-- :href="route('admin.dashboard')"
                :active="activeClass(Route::is('admin.dashboard'), 'c-active')" --}}
                icon="c-sidebar-nav-icon cil-list"
                text="LPJ" />
        </li>

        <li class="c-sidebar-nav-title">Konfigurasi</li>
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin/konfigurasi.getDealer')"
                :active="activeClass(Route::is('admin/konfigurasi.getDealer'), 'c-active')"
                icon="c-sidebar-nav-icon cil-building"
                text="Dealer" />
        </li>

        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin/konfigurasi.getUserPusat')"
                :active="activeClass(Route::is('admin/konfigurasi.getUserPusat'), 'c-active')"
                icon="c-sidebar-nav-icon cil-user"
                text="User Main Dealer" />
        </li>
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin/konfigurasi.getUserCabang')"
                :active="activeClass(Route::is('admin/konfigurasi.getUserCabang'), 'c-active')"
                icon="c-sidebar-nav-icon cil-people"
                text="User Dealer" />
        </li>
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin/konfigurasi.getDisplay')"
                :active="activeClass(Route::is('admin/konfigurasi.getDisplay'), 'c-active')"
                icon="c-sidebar-nav-icon cil-bike"
                text="Display / Product" />
        </li>
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin/konfigurasi.getLokasi')"
                :active="activeClass(Route::is('admin/konfigurasi.getLokasi'), 'c-active')"
                icon="c-sidebar-nav-icon cil-map"
                text="Lokasi" />
        </li>
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin/konfigurasi.getKategori')"
                :active="activeClass(Route::is('admin/konfigurasi.getKategori'), 'c-active')"
                icon="c-sidebar-nav-icon cil-file"
                text="Kategori" />
        </li>
        {{-- <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin/konfigurasi.getKaryawan')"
                :active="activeClass(Route::is('admin/konfigurasi.getKaryawan'), 'c-active')"
                icon="c-sidebar-nav-icon cil-address-book"
                text="Karyawan" />
        </li> --}}
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin/konfigurasi.getSalesPeople')"
                :active="activeClass(Route::is('admin/konfigurasi.getSalesPeople'), 'c-active')"
                icon="c-sidebar-nav-icon cil-address-book"
                text="Sales People" />
        </li>



        @if (
            $logged_in_user->hasAllAccess() ||
            (
                $logged_in_user->can('admin.access.user.list') ||
                $logged_in_user->can('admin.access.user.deactivate') ||
                $logged_in_user->can('admin.access.user.reactivate') ||
                $logged_in_user->can('admin.access.user.clear-session') ||
                $logged_in_user->can('admin.access.user.impersonate') ||
                $logged_in_user->can('admin.access.user.change-password')
            )
        )
            <li class="c-sidebar-nav-title">Sistem</li>
            <li class="c-sidebar-nav-item">
                <x-utils.link
                    class="c-sidebar-nav-link"
                    {{-- :href="route('admin.dashboard')"
                    :active="activeClass(Route::is('admin.dashboard'), 'c-active')" --}}
                    icon="c-sidebar-nav-icon cil-cog"
                    text="Pengaturan" />
            </li>

            <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-user"
                    class="c-sidebar-nav-dropdown-toggle"
                    text="Akses Admin" />

                <ul class="c-sidebar-nav-dropdown-items">
                    @if (
                        $logged_in_user->hasAllAccess() ||
                        (
                            $logged_in_user->can('admin.access.user.list') ||
                            $logged_in_user->can('admin.access.user.deactivate') ||
                            $logged_in_user->can('admin.access.user.reactivate') ||
                            $logged_in_user->can('admin.access.user.clear-session') ||
                            $logged_in_user->can('admin.access.user.impersonate') ||
                            $logged_in_user->can('admin.access.user.change-password')
                        )
                    )
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.user.index')"
                                class="c-sidebar-nav-link"
                                :text="__('User Management')"
                                :active="activeClass(Route::is('admin.auth.user.*'), 'c-active')" />
                        </li>
                    @endif

                    @if ($logged_in_user->hasAllAccess())
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.role.index')"
                                class="c-sidebar-nav-link"
                                :text="__('Role Management')"
                                :active="activeClass(Route::is('admin.auth.role.*'), 'c-active')" />
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        @if ($logged_in_user->hasAllAccess())
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-list"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Logs')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::dashboard')"
                            class="c-sidebar-nav-link"
                            :text="__('Dashboard')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::logs.list')"
                            class="c-sidebar-nav-link"
                            :text="__('Logs')" />
                    </li>
                </ul>
            </li>
        @endif
    </ul>

    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div><!--sidebar-->
