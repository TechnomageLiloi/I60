Requests.Journals = {
    getCollection: function ()
    {
        API.request('Journals.Collection', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (key)
    {
        API.request('Journals.Show', {
            'key': key
        }, function (data) {
            $('#page').html(data.render);
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

    remove: function (key)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Journals.Remove', {
            'key': key
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
        API.request('Journals.Save', {
            'key': key,
            'title': jq_block.find('[name="title"]').val(),
            'goal': jq_block.find('[name="goal"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'program': jq_block.find('[name="program"]').val()
        }, function (data) {
            Requests.Journals.getCollection();
        }, function () {

        });
    }
}