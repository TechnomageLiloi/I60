Requests.Lessons = {
    getCollection: function (keyLevel)
    {
        API.request('Lessons.Collection', {
            'key_level': keyLevel
        }, function (data) {
            $('#wrap-lessons').html(data.render);
        }, function () {

        });
    },

    show: function (key)
    {
        API.request('Lessons.Show', {
            'key': key
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    create: function (keyLevel)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Lessons.Create', {
            'key_level': keyLevel
        }, function (data) {
            Requests.Lessons.getCollection(keyLevel);
        }, function () {

        });
    },

    remove: function (key)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Lessons.Remove', {
            'key': key
        }, function (data) {
            Requests.Lessons.getCollection();
        }, function () {

        });
    },

    edit: function (key)
    {
        API.request('Lessons.Edit', {
            'key': key
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#ticket-edit');
        API.request('Lessons.Save', {
            'key': key,
            'title': jq_block.find('[name="title"]').val(),
            'goal': jq_block.find('[name="goal"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'program': jq_block.find('[name="program"]').val()
        }, function (data) {
            Requests.Lessons.getCollection();
        }, function () {

        });
    }
}