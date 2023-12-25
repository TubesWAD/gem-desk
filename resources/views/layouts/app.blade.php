<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="stylesheet" href="{{asset('css/app.css')}}"/>

</head>
<body>
<div class="kontainer">
    <aside>
        <div class="top">
            <div class="logo">
                <img src="{{asset('img/gd-logo.png')}}"/>
                <h2 class="text-muted">GEM-DESK</h2>
            </div>
            <div class="close" id="close-btn">
                <span class="material-symbols-outlined">close</span>
            </div>
        </div>

        <div class="asidebar">
            <a href="" class="{{ request()->routeIs('') ? 'active' : '' }}">
                <span class="material-symbols-outlined">manage_accounts</span>
                <h3>Role</h3>
            </a>
            <a href="#" class="{{ request()->routeIs('') ? 'active' : '' }}">
                <span class="material-symbols-outlined">person</span>
                <h3>User</h3>
            </a>
            <a href="#" class="{{ request()->routeIs('') ? 'active' : '' }}">
                <span class="material-symbols-outlined">location_home</span>
                <h3>Organization</h3>
            </a>
            <a href="#" class="{{ request()->routeIs('') ? 'active' : '' }}">
                <span class="material-symbols-outlined">inventory_2</span>
                <h3>Asset Management</h3>
            </a>
            <a href="#" class="{{ request()->routeIs('') ? 'active' : '' }}">
                <span class="material-symbols-outlined">support_agent</span>
                <h3>Service Catalog</h3>
            </a>
            <a href="#" class="{{ request()->routeIs('') ? 'active' : '' }}">
                <span class="material-symbols-outlined">emergency_home</span>
                <h3>Insiden Management</h3>
            </a>
            <a href="{{route('tickets.index')}}" class="{{ request()->routeIs('tickets**') ? 'active' : '' }}">
                <span class="material-symbols-outlined">confirmation_number</span>
                <h3>Ticket Management</h3>
            </a>
            <a href="#">
                <span class="material-symbols-outlined">logout</span>
                <h3>Logout</h3>
            </a>
        </div>
    </aside>
    <!-- ============================END OF ASIDE================== -->
    <main>
        <div class="main-top">
            <h1>Dashboard</h1>

            <div class="top">
                <button class="material-symbols-outlined" id="menu-btn">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-symbols-outlined active">light_mode</span>
                    <span class="material-symbols-outlined">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Dinda</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="dind.png" alt="photo-profile"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fitur">
            @yield('content')
        </div>


    </main>
    <!-- ============================END OF MAIN================== -->

</div>
@stack('script')
<script>
    $("#alert").fadeTo(1500,300).slideUp(300, function (){
        $('#alert').slideUp(300);
    });
</script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>

