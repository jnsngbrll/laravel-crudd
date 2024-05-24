<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>{{ __('Dashboard') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a
                class="nav-link collapsed"
                data-bs-target="#resources-nav"
                data-bs-toggle="collapse"
                href="#"
            >
                <i class="bi bi-menu-button-wide"></i><span>Resources</span
                ><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="resources-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('post.index') }}">
                        <i class="bi bi-circle"></i><span>Posts</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>