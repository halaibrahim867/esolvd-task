<!-- partials/sidebar.blade.php -->
<nav class="bg-dark text-white p-3 vh-100" style="width: 250px;">
    <h4>Dashboard</h4>
    <ul class="nav flex-column">
        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link text-white">Home</a></li>
        <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link text-white">Users</a></li>
        <li class="nav-item"><a href="{{ route('roles.index') }}" class="nav-link text-white">Roles</a></li>
        <li class="nav-item"><a href="{{ route('permissions.index') }}" class="nav-link text-white">Permissions</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white">Settings</a></li>
    </ul>
</nav>
