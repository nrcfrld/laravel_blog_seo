<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">RicoBlog</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">RB</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class=active><a class="nav-link" href="{{route('home')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>

        <li class="menu-header">Starter</li>
        <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-poll-h"></i> <span>Posts</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('posts.index')}}">Posts List</a></li>
            <li><a class="nav-link" href="{{route('posts.create')}}">Add Post</a></li>
            <li><a class="nav-link" href="{{route('posts.trash')}}">Deleted Posts</a></li>
        </ul>
        <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-bookmark"></i> <span>Categories</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('categories.index')}}">Categories List</a></li>
        </ul>
        </li>
        <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-hashtag"></i> <span>Tags</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('tags.index')}}">Tags List</a></li>
        </ul>
        </li>
        <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>Users Management</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('users.index')}}">Users List</a></li>
        </ul>
        </li>
    </ul>
    </aside>
</div>