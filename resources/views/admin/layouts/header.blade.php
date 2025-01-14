<style>
    #profile-icon2 {
        display: inherit;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border-radius: 80%;
        /* background-color: #3498db; */
        color: white;
        font-size: 20px;
        font-weight: bold;
    }
</style>

<header id="page-topbar">
    <div class="navbar-header" style="background-color: #c1c1c1">
        <div class="d-flex" style="border: none">
            <div class="navbar-brand-box" style="background-color: #439283">
                <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="/images/logo_kampar.png" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="/images/logo_kampar.png" alt="" height="30"> <span class="logo-txt"
                            style="color: white">SIGISKAM</span>
                    </span>
                </a>

                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="/assets/images/logo.png" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="/assets/images/logo.png" alt="" height="24"> <span
                            class="logo-txt text-danger">Smart Agenda</span>
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{-- <i class="mdi mdi-account-circle  d-xl-inline-block mdi-24px"></i> --}}
                    {{-- <br> --}}
                    @if (auth()->check())
                        <span class="bg-danger" id="profile-icon2">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    @endif
                    <span class="ms-1 fw-medium">
                        @if (auth()->check())
                            {{ auth()->user()->username }}
                        @endif
                        {{-- Admin --}}
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="/admin/profile"><i
                            class="fas fa-user font-size-16 align-middle me-1"></i> Profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i
                            class="mdi mdi-logout font-size-16 align-middle me-1 text-danger"></i> Keluar</a>
                </div>
            </div>

        </div>
    </div>
</header>
