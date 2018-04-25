{{ content() }}

<ul class="pager">
    <li class="previous pull-left">
        {{ link_to("legals/index", "&larr; Go Back") }}
    </li>
    <li class="pull-right">
        {{ link_to("legals/create", "Create Legal", "class": "btn btn-primary") }}
    </li>
</ul>

{% for legal in page.items %}
    {% if loop.first %}
        <table class="table table-bordered table-striped" align="center">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Version</th>
            <th>Created</th>
            <th>Modified</th>
        </tr>
        </thead>
        <tbody>
    {% endif %}
    <tr>
        <td>{{ legal.id }}</td>
        <td>{{ legal.name }}</td>
        <td>{{ legal.version }}</td>
        <td>{{ legal.created }}</td>
        <td>{{ legal.modified }}</td>
        <td width="12%">{{ link_to("legals/edit/" ~ legal.id, '<i class="icon-pencil"></i> Edit', "class": "btn") }}</td>
        {#<td width="12%">{{ link_to("legals/delete/" ~ legal.id, '<i class="icon-remove"></i> Delete', "class": "btn") }}</td>#}
    </tr>
    {% if loop.last %}
        </tbody>
        <tfoot>
        <tr>
            <td colspan="10" align="right">
                <div class="btn-group">
                    {{ link_to("legals/search", '<i class="icon-fast-backward"></i> First', "class": "btn") }}
                    {{ link_to("legals/search?page=" ~ page.before, '<i class="icon-step-backward"></i> Previous', "class": "btn ") }}
                    {{ link_to("legals/search?page=" ~ page.next, '<i class="icon-step-forward"></i> Next', "class": "btn") }}
                    {{ link_to("legals/search?page=" ~ page.last, '<i class="icon-fast-forward"></i> Last', "class": "btn") }}
                    <span class="help-inline">{{ page.current }}/{{ page.total_pages }}</span>
                </div>
            </td>
        </tr>
        </tfoot>
        </table>
    {% endif %}
{% else %}
    No legals are recorded
{% endfor %}
