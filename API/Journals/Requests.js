Requests.Journals = {
    getCollection: function (key_problem)
    {
        API.request('Journals.Collection', {
            key_problem: key_problem
        }, function (data) {
            $('#wrap-journals').html(data.render);
        }, function () {

        });
    },

    show: function (key)
    {
        API.request('Journals.Show', {
            'key': key
        }, function (data) {
            $('#layout').html(data.render);
        }, function () {

        });
    },

    create: function ()
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Journals.Create', {
            'debug': true
        }, function (data) {
            Requests.Journals.getCollection();
        }, function () {

        });
    },

    edit: function (key)
    {
        API.request('Journals.Edit', {
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
        API.request('Journals.Save', {
            'key': key,
            'title': jq_block.find('[name="title"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'program': jq_block.find('[name="program"]').val()
        }, function (data) {
            Requests.Journals.getCollection();
        }, function () {

        });
    }
}