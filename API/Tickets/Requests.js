Requests.Tickets = {
    getCollection: function ()
    {
        API.request('Tickets.Collection', {'debug':false}, function (data) {
            $('#layout').html(data.render);
        }, function () {

        });
    },

    show: function (key_ticket)
    {
        API.request('Tickets.Show', {
            'key_ticket': key_ticket
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

        API.request('Tickets.Create', {'debug':false}, function (data) {
            Requests.Tickets.getCollection();
        }, function () {

        });
    },

    edit: function (key_ticket)
    {
        API.request('Tickets.Edit', {
            'key_ticket': key_ticket
        }, function (data) {
            $('#layout').html(data.render);
        }, function () {

        });
    },

    save: function (key_ticket)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#ticket-edit');
        API.request('Tickets.Save', {
            'key_ticket': key_ticket,
            'title': jq_block.find('[name="title"]').val(),
            'status': jq_block.find('[name="status"]').val()
        }, function (data) {
            Requests.Tickets.getCollection();
        }, function () {

        });
    }
}