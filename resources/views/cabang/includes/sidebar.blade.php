<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none" style="background-color: #144F97;">
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
                :href="route('cabang.home')"
                :active="activeClass(Route::is('cabang.home'), 'c-active c-sidebar-nav-icon-red')"
                icon="c-sidebar-nav-icon cil-speedometer"
                :text="__('Dashboard')" />
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route('cabang.proposal.getInbox') }}" class="{{ activeClass(Route::is('cabang.proposal.getInbox'), 'c-active') }} c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon cil-inbox"></i>
                Inbox
                @php
                    $inbox_ = DB::table('proposals')->where('status_proposal', '!=', 1)
                                                ->where('dealer_proposal', Auth::guard('cabang')->user()->dealer)
                                                ->where('inbox_d', true)
                                                ->count();
                @endphp
                @if ($inbox_ != 0)
                    <span class="badge bg-danger ms-auto">{{ $inbox_ }}</span>
                @endif
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('cabang.proposal.index')"
                :active="activeClass(Route::is('cabang.proposal.index'), 'c-active')"
                icon="c-sidebar-nav-icon cil-layers"
                text="Proposal" />
        </li>
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('cabang.lpj.index')"
                :active="activeClass(Route::is('cabang.lpj.index'), 'c-active')"
                icon="c-sidebar-nav-icon cil-list"
                text="LPJ" />
        </li>

        {{-- <li class="c-sidebar-nav-title">Menu</li>
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.dashboard')"
                :active="activeClass(Route::is('admin.dashboard'), 'c-active')"
                icon="c-sidebar-nav-icon cil-cog"
                text="Pengaturan" />
        </li> --}}
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div><!--sidebar-->
