Requests.Problems = {
    getCollection: function (keyProblem)
    {
        API.request('Problems.Collection', {
            'key_problem': keyProblem
        }, function (data) {
            $('#wrap-problems').html(data.render);
        }, function () {

        });
    },

    show: function (key)
    {
        API.request('Problems.Show', {
            'key': key
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

    remove: function (key)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Problems.Remove', {
            'key': key
        }, function (data) {
            Requests.Problems.getCollection();
        }, function () {

        });
    },

    edit: function (key)
    {
        API.request('Problems.Edit', {
            'key': key
        }, function (data) {
            $('#layout').html(data.render);
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
        API.request('Problems.Save', {
            'key': key,
            'title': jq_block.find('[name="title"]').val(),
            'goal': jq_block.find('[name="goal"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'program': jq_block.find('[name="program"]').val()
        }, function (data) {
            Requests.Problems.getCollection();
        }, function () {

        });
    }
}