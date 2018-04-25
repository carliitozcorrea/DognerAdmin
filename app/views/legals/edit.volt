<ul class="pager">
    <li class="previous pull-left">
        {{ link_to("legals", "&larr; Go Back") }}
    </li>
    <li class="pull-right">
        {{ submit_button("Save", "class": "btn btn-big btn-success") }}
    </li>
</ul>

{{ content() }}

<div class="center scaffold">
    <h2>Edit Legal</h2>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#A" data-toggle="tab">Basic</a></li>
        {#<li><a href="#B" data-toggle="tab">Successful Logins</a></li>#}
        {#<li><a href="#C" data-toggle="tab">Password Changes</a></li>#}
        {#<li><a href="#D" data-toggle="tab">Reset Passwords</a></li>#}
    </ul>

    <div class="tabbable">
        <div class="tab-content">
            <div class="tab-pane active" id="A">
                <form method="post" autocomplete="off">
                    <div class="form-group">
                        {{ form.render("id") }}
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            {{ form.render("name") }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-sm-2 control-label">Content</label>
                        <div class="col-sm-10">
                            {{ form.render("content") }}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>