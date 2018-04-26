<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{ link_to(null, 'class': 'navbar-brand', 'Dogner Admin')}}
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav">
                <li>
                    {{ link_to('legals', 'Legals') }}
                </li>
                {#<li class="dropdown">#}
                    {#<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"#}
                       {#aria-expanded="false">Legals<span class="caret"></span></a>#}
                    {#<ul class="dropdown-menu">#}
                        {#<li><a href="#">Action</a></li>#}
                        {#<li><a href="#">Another action</a></li>#}
                        {#<li><a href="#">Something else here</a></li>#}
                        {#<li role="separator" class="divider"></li>#}
                        {#<li><a href="#">Separated link</a></li>#}
                        {#<li role="separator" class="divider"></li>#}
                        {#<li><a href="#">One more separated link</a></li>#}
                    {#</ul>#}
                {#</li>#}
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">{{ auth.getName() }}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>{{ link_to('users/changePassword', 'Change Password') }}</li>
                    </ul>
                </li>
                <li>{{ link_to('session/logout', 'Logout') }}</li>
            </ul>
        </div>
    </div>
</nav>
{#<div class="navbar navbar-inverse">#}
  {#<div class="navbar-inner">#}
    {#<div class="container" style="width: auto;">#}
      {#<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">#}
        {#<span class="icon-bar"></span>#}
        {#<span class="icon-bar"></span>#}
        {#<span class="icon-bar"></span>#}
      {#</a>#}
      {#{{ link_to(null, 'class': 'brand', 'Dogner Admin')}}#}
        {#<div class="nav-collapse">#}

          {#<ul class="nav">#}

            {#{%- set menus = [#}
              {#'Home': null,#}
              {#'Users': 'users',#}
              {#'Profiles': 'profiles',#}
              {#'Permissions': 'permissions'#}
            {#] -%}#}

            {#{%- for key, value in menus %}#}
              {#{% if value == dispatcher.getControllerName() %}#}
              {#<li class="active">{{ link_to(value, key) }}</li>#}
              {#{% else %}#}
              {#<li>{{ link_to(value, key) }}</li>#}
              {#{% endif %}#}
            {#{%- endfor -%}#}

          {#</ul>#}
      {#</div>#}
    {#</div>#}
  {#</div>#}
{#</div>#}

<div class="container">
    {{ content() }}
</div>