<div class="row">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                {{ link_to("tips", "&larr; Go Back") }}
            </li>
        </ul>
    </nav>
    {{ content() }}
    <h2>Edit Tip {{ tip.title }}</h2>
    {#<form method="post" autocomplete="off">#}
        {#<div class="form-group">#}
            {#{{ form.render("id") }}#}
            {#<label for="name" class="control-label">Name</label>#}
            {#{{ form.render("name") }}#}
        {#</div>#}
        {#<div class="form-group">#}
            {#<label for="content" class="control-label">Content</label>#}
            {#{{ form.render("content") }}#}
        {#</div>#}
        {#{{ submit_button("Save", "class": "btn btn-success") }}#}
    {#</form>#}
</div>