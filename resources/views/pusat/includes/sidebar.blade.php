<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none" style="background-color: #cf1418;">
        <div class="c-sidebar-brand-full">
            <img class="img-fluid" src="/img/logo/logo-astra-putih.png" alt="" width="150">
        </div>
        <div class="c-sidebar-brand-minimized">
            <img class="img-fluid" src="/img/logo/logo-astra-putih.png" alt="" width="150">
        </div>


    </div><!--c-sidebar-brand-->

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('pusat.home')"
                :active="activeClass(Route::is('pusat.home'), 'c-active c-sidebar-nav-icon-red')"
                icon="c-sidebar-nav-icon cil-speedometer"
                :text="__('Dashboard')" />
        </li>
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('pusat.proposal.index')"
                :active="activeClass(Route::is('pusat.proposal.index'), 'c-active')"
                icon="c-sidebar-nav-icon cil-inbox"
                text="Inbox"/>
        </li>
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('pusat.proposal.getData')"
                :active="activeClass(Route::is('pusat.proposal.getData'), 'c-active')"
                icon="c-sidebar-nav-icon cil-layers"
                text="Proposal"/>
        </li>
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('pusat.lpj.index')"
                :active="activeClass(Route::is('pusat.lpj.index'), 'c-active')"
                icon="c-sidebar-nav-icon cil-list"
                text="LPJ" />
        </li>

        <li class="c-sidebar-nav-title">Menu</li>
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                {{-- :href="route('admin.dashboard')"
                :active="activeClass(Route::is('admin.dashboard'), 'c-active')" --}}
                icon="c-sidebar-nav-icon cil-cog"
                text="Pengaturan" />
        </li>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div><!--sidebar-->
