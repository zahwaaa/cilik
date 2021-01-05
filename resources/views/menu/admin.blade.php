<li class="nav-item {{ Nav::isRoute('user.index') }}">
    <a class="nav-link" href="{{ route('user.index') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>Users</span>
    </a>
</li>

<li class="nav-item {{ Nav::isRoute('kompetisi.admin.index') }}">
    <a class="nav-link" href="{{ route('kompetisi.admin.index') }}">
        <i class="fas fa-fw fa-book"></i>
        <span>Competitions</span>
    </a>
</li>

<li class="nav-item {{ Nav::isRoute('category.index') }}">
    <a class="nav-link" href="{{ route('category.index') }}">
        <i class="fas fa-fw fa-book"></i>
        <span>Article Categories</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-book"></i>
        <span>Articles</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Articles Menu:</h6>
            <a class="collapse-item" href="{{ route('article.index') }}">Pending Articles</a>
            <a class="collapse-item" href="{{ route('article.published') }}">Published Articles</a>
            <a class="collapse-item" href="{{ route('article.rejected') }}">Rejected Articles</a>
            <a class="collapse-item" href="{{ route('article.deleted') }}">Deleted Articles</a>
        </div>
    </div>
</li>

<li class="nav-item {{ Nav::isRoute('article.comments') }}">
    <a class="nav-link" href="{{ route('article.comments') }}">
        <i class="fas fa-fw fa-book"></i>
        <span>Article Comments</span>
    </a>
</li>

<li class="nav-item {{ Nav::isRoute('shop.category') }}">
    <a class="nav-link" href="{{ route('shop.category') }}">
        <i class="fas fa-fw fa-list"></i>
        <span>Product Categories</span>
    </a>
</li>

<li class="nav-item {{ Nav::isRoute('shop.index') }}">
    <a class="nav-link" href="{{ route('shop.index') }}">
        <i class="fas fa-fw fa-list"></i>
        <span>Products</span>
    </a>
</li>

<li class="nav-item {{ Nav::isRoute('shop.list') }}">
    <a class="nav-link" href="{{ route('shop.list') }}">
        <i class="fas fa-fw fa-shopping-cart"></i>
        <span>Shop</span>
    </a>
</li>

<li class="nav-item {{ Nav::isRoute('slider.index') }}">
    <a class="nav-link" href="{{ route('slider.index') }}">
        <i class="fas fa-fw fa-list"></i>
        <span>Sliders</span>
    </a>
</li>

<li class="nav-item {{ Nav::isRoute('slider.banner') }}">
    <a class="nav-link" href="{{ route('slider.banner') }}">
        <i class="fas fa-fw fa-list"></i>
        <span>Banners</span>
    </a>
</li>
