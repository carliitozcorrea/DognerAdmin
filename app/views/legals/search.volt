<div class="row">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                {{ link_to("legals", "&larr; Go Back") }}
            </li>
        </ul>
    </nav>
    {{ content() }}

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
                <th>Options</th>
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
            <td class="text-center">{{ link_to("legals/edit/" ~ legal.id, '<i class="icon-pencil"></i> Edit', "class": "btn btn-default") }}</td>
        </tr>
        {% if loop.last %}
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6" align="center">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li>
                                {{ link_to("legals/search?page=" ~ page.before, '<i class="icon-step-backward"></i> Previous', "class": "btn ") }}
                            </li>
                            <li>{{ link_to("legals/search?page=" ~ page.next, '<i class="icon-step-forward"></i> Next', "class": "btn") }}</li>
                            <li>
                                {{ link_to("legals/search", '<i class="icon-fast-backward"></i> First', "class": "btn") }}
                            </li>
                            <li>
                                {{ link_to("legals/search?page=" ~ page.last, '<i class="icon-fast-forward"></i> Last', "class": "btn") }}
                            </li>
                        </ul>
                    </nav>
                </td>
            </tr>
            </tfoot>
            </table>
        {% endif %}
    {% else %}
        No legals are recorded
    {% endfor %}
</div>