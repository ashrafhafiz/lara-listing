<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ active_class(['admin/dashboard']) }}">
                <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                    <i class="far fa-square"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="dropdown {{ active_class(['admin/sections/*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Sections</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ active_class(['admin/sections/hero']) }}">
                        <a class="nav-link" href="{{ route('admin.sections.hero.index') }}">Hero</a>
                    </li>
                    <li><a class="nav-link" href="#">Another</a></li>
                    <li><a class="nav-link" href="#">Something</a></li>
                </ul>
            </li>
            <li class="dropdown {{ active_class(['admin/listings/*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Listings</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ active_class(['admin/listings/category']) }}">
                        <a class="nav-link" href="{{ route('admin.category.index') }}">Category</a>
                    </li>
                    <li class="{{ active_class(['admin/listings/location']) }}">
                        <a class="nav-link" href="{{ route('admin.location.index') }}">Location</a>
                    </li>
                    <li class="{{ active_class(['admin/listings/amenity']) }}">
                        <a class="nav-link" href="{{ route('admin.amenity.index') }}">Amenities</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                    <span>Bootstrap</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
                    <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
                    <li><a class="nav-link" href="bootstrap-breadcrumb.html">Breadcrumb</a></li>
                    <li><a class="nav-link" href="bootstrap-buttons.html">Buttons</a></li>
                    <li><a class="nav-link" href="bootstrap-card.html">Card</a></li>
                    <li><a class="nav-link" href="bootstrap-carousel.html">Carousel</a></li>
                    <li><a class="nav-link" href="bootstrap-collapse.html">Collapse</a></li>
                    <li><a class="nav-link" href="bootstrap-dropdown.html">Dropdown</a></li>
                    <li><a class="nav-link" href="bootstrap-form.html">Form</a></li>
                    <li><a class="nav-link" href="bootstrap-list-group.html">List Group</a></li>
                    <li><a class="nav-link" href="bootstrap-media-object.html">Media Object</a></li>
                    <li><a class="nav-link" href="bootstrap-modal.html">Modal</a></li>
                    <li><a class="nav-link" href="bootstrap-nav.html">Nav</a></li>
                    <li><a class="nav-link" href="bootstrap-navbar.html">Navbar</a></li>
                    <li><a class="nav-link" href="bootstrap-pagination.html">Pagination</a></li>
                    <li><a class="nav-link" href="bootstrap-popover.html">Popover</a></li>
                    <li><a class="nav-link" href="bootstrap-progress.html">Progress</a></li>
                    <li><a class="nav-link" href="bootstrap-table.html">Table</a></li>
                    <li><a class="nav-link" href="bootstrap-tooltip.html">Tooltip</a></li>
                    <li><a class="nav-link" href="bootstrap-typography.html">Typography</a></li>
                </ul>
            </li>

        </ul>

    </aside>
</div>
