Requests.Problems = {
    getCollection: function (key_lesson)
    {
        API.request('Problems.Collection', {
            'key_lesson': key_lesson
        }, function (data) {
            $('#wrap-problems').html(data.render);
        }, function () {

        });
    },

    show: function (key)
    {
        API.request('Problems.Show', {
            'key_problem': key
        }, function (data) {
            $('#layout').html(data.render);
        }, function () {

        });
    },

    create: function (keyLesson)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Problems.Create', {
            'key_lesson': keyLesson
        }, function (data) {
            Requests.Problems.getCollection(keyLesson);
        }, function () {

        });
    },

    edit: function (key_problem)
    {
        API.request('Problems.Edit', {
            'key_problem': key_problem
        }, function (data) {
            $('#layout').html(data.render);
        }, function () {

        });
    },

    save: function (key_problem)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#ticket-edit');
        API.request('Problems.Save', {
            'key_problem': key_problem,
            'title': jq_block.find('[name="title"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'program': jq_block.find('[name="program"]').val()
        }, function (data) {
            window.location.reload();
        }, function () {

        });
    }
}