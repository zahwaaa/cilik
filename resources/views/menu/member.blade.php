<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-book"></i>
        <span>Articles</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Articles Menu:</h6>
            <a class="collapse-item" href="{{ route('article_member.index') }}">Create New Article</a>
            <a class="collapse-item" href="{{ route('article_member.published') }}">Published Articles</a>
            <a class="collapse-item" href="{{ route('article_member.rejected') }}">Rejected Articles</a>
            <a class="collapse-item" href="{{ route('article_member.deleted') }}">Deleted Articles</a>
        </div>
    </div>
</li>

<li class="nav-item {{ Nav::isRoute('shop.daftar') }}">
    <a class="nav-link" href="{{ route('shop.daftar') }}">
        <i class="fas fa-fw fa-shopping-cart"></i>
        <span>Shop</span>
    </a>
</li>

<li class="nav-item {{ Nav::isRoute('kompetisi.member.index') }}">
    <a class="nav-link" href="{{ route('kompetisi.member.index') }}">
        <i class="fas fa-fw fa-shopping-cart"></i>
        <span>My Competitions</span>
    </a>
</li>
