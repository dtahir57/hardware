<div class="col-lg-4">
  <aside class="user-info-wrapper">
    <div class="user-cover" style="background-image: url({{ asset('frontend/img/account/user-cover-img.jpg')}});">
      <div class="info-label" data-toggle="tooltip" title="You currently have 290 Reward Points to spend"><i class="icon-award"></i>290 points</div>
    </div>
    <div class="user-info">
      <div class="user-avatar"><a class="edit-avatar" href="#"></a><img src="{{ asset('frontend/img/account/user-ava.jpg')}}" alt="User"></div>
      <div class="user-data">
        <h4 class="h5">{{ Auth::user()->name }}</h4><span>Joined {{ Auth::user()->created_at->diffForHumans() }}</span>
      </div>
    </div>
  </aside>
  <nav class="list-group">
    <a class="list-group-item with-badge" href="account-orders.html">
      <i class="icon-shopping-bag"></i>Orders<span class="badge badge-default badge-pill">6</span>
    </a>
    <a class="list-group-item {{(Request::is('home')?'active':'')}}" href="{{ route('home') }}">
      <i class="icon-user"></i>Profile
    </a>
    <a class="list-group-item" href="account-address.html">
      <i class="icon-map-pin"></i>Addresses
    </a>
    <a class="list-group-item with-badge" href="account-wishlist.html">
      <i class="icon-heart"></i>Wishlist<span class="badge badge-default badge-pill">3</span>
    </a>
    <a class="list-group-item with-badge" href="account-tickets.html">
      <i class="icon-tag"></i>My Tickets<span class="badge badge-default badge-pill">4</span>
    </a>
    <a class="list-group-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"><span>Log Out</span></a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </nav>
</div>