Requests.Milestones = {
    getCollection: function ()
    {
        API.request('Milestones.Collection', {
            debug: true
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (key_milestone, key_epoch)
    {
        API.request('Milestones.Show', {
            key_milestone: key_milestone,
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

        API.request('Milestones.Create', {
            debug: false
        }, function (data) {
            Requests.Milestones.getCollection();
        }, function () {

        });
    },

    edit: function (key_milestone, key_epoch)
    {
        API.request('Milestones.Edit', {
            key_milestone: key_milestone,
            key_epoch: key_epoch
        }, function (data) {
            const wrap = $('#page');
            wrap.html(data.render);
            wrap.show();
        }, function () {

        });
    },

    save: function (key_milestone, key_epoch)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#application-diary-edit');
        API.request('Milestones.Save', {
            key_milestone: key_milestone,
            key_epoch: key_epoch,
            title: jq_block.find('[name=title]').val(),
            status: jq_block.find('[name=status]').val(),
            summary: jq_block.find('[name=summary]').val(),
            start: jq_block.find('[name=start]').val(),
            finish: jq_block.find('[name=finish]').val()
        }, function (data) {
            Requests.Milestones.getCollection();
        }, function () {

        });
    }
}