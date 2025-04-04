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

    show: function (key_journal)
    {
        API.request('Journals.Show', {
            'key_journal': key_journal
        }, function (data) {
            $('#layout').html(data.render);
        }, function () {

        });
    },

    create: function (key_problem)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Journals.Create', {
            'key_problem': key_problem
        }, function (data) {
            Requests.Journals.getCollection(key_problem);
        }, function () {

        });
    },

    edit: function (key_journal)
    {
        API.request('Journals.Edit', {
            'key_journal': key_journal
        }, function (data) {
            $('#layout').html(data.render);
        }, function () {

        });
    },

    save: function (key_journal)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#ticket-edit');
        API.request('Journals.Save', {
            'key_journal': key_journal,
            'title': jq_block.find('[name="title"]').val(),
            'status': jq_block.find('[name="status"]').val()
        }, function (data) {
            window.location.reload();
        }, function () {

        });
    }
}