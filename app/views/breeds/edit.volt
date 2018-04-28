<div class="row">
    <div class="col-sm-12">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    {{ link_to("tips", "&larr; Go Back") }}
                </li>
            </ul>
        </nav>
        {{ content() }}
        <h2>Edit Tip {{ tip.title }}</h2>
            <p>Created: <strong><em>{{ tip.created }}</em></strong></p>
            <p>Modified: <strong><em>{{ tip.modified }}</em></strong></p>
    </div>
        <form method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="col-sm-6">
            <div class="form-group">
                {{ form.render("id") }}
                <label for="title" class="control-label">Name</label>
                {{ form.render("title") }}
            </div>
            <div class="form-group">
                <label for="description" class="control-label">Description</label>
                {{ form.render("description") }}
            </div>
            <div class="form-group">
                <label for="date" class="control-label">Date</label>
                {{ form.render("date") }}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="photo" class="control-label">Photo</label>
                {{ form.render("photo") }}
                <br>
                {% if(tip.photo) %}
                    <a href="{{ tip.photo }}">
                        <img class="img-thumbnail" src="{{ tip.photo }}" alt{{ tip.title }} style="width: 140px;">
                    </a>
                {% endif %}
            </div>
            <div class="form-group">
                <label for="videoFile" class="control-label">Video</label>
                {{ form.render("video") }}
                <br>
                {% if(tip.video) %}
                    <video width="100%" height="auto" controls="controls" poster="" preload="true">
                        <source src="{{ tip.video }}" type="video/mov"/>
                        <source src="{{ tip.video }}" type="video/mp4"/>
                        <source src="{{ tip.video }}" type="video/oog"/>
                        Your browser does not support the video tag.
                    </video>
                {% endif %}
            </div>
        </div>
        <div class="col-sm-12">
            {{ submit_button("Save", "class": "btn btn-success") }}
        </div>
    </form>
</div>