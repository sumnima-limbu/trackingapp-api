<div class="sidebar sidebar-background" data-color="purple" data-background-color="white">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
  <div class="logo"><a href="#" class="simple-text logo-normal">
      FINDME
    </a></div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item active  ">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.user') }}">
          <i class="material-icons">person</i>
          <p>User List</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.circle') }}">
          <i class="material-icons">content_paste</i>
          <p>Circle List</p>
        </a>
      </li>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.maps') }}">
          <i class="material-icons">location_ons</i>
          <p>Maps</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.notification') }}">
          <i class="material-icons">notifications</i>
          <p>Notifications</p>
        </a>
      </li>
    </ul>
  </div>
</div>