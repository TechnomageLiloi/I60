Requests.Epochs = {
    getCollection: function ()
    {
        API.request('Epochs.Collection', {
            debug: true
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (key_epoch)
    {
        API.request('Epochs.Show', {
            key_epoch: key_epoch
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

        API.request('Epochs.Create', {
            debug: false
        }, function (data) {
            Requests.Epochs.getCollection();
        }, function () {

        });
    },

    edit: function (key_epoch)
    {
        API.request('Epochs.Edit', {
            key_epoch: key_epoch
        }, function (data) {
            const wrap = $('#page');
            wrap.html(data.render);
            wrap.show();
        }, function () {

        });
    },

    save: function (key_epoch)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#application-diary-edit');
        API.request('Epochs.Save', {
            key_epoch: key_epoch,
            title: jq_block.find('[name=title]').val(),
            status: jq_block.find('[name=status]').val(),
            summary: jq_block.find('[name=summary]').val(),
            start: jq_block.find('[name=start]').val(),
            finish: jq_block.find('[name=finish]').val()
        }, function (data) {
            Requests.Epochs.getCollection();
        }, function () {

        });
    }
}