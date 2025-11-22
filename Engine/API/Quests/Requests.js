Requests.Quests = {
    getCollection: function ()
    {
        API.request('Quests.Collection', {
            debug: true
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (key_quest, key_milestone, key_epoch)
    {
        API.request('Quests.Show', {
            key_quest: key_quest,
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

        API.request('Quests.Create', {
            debug: false
        }, function (data) {
            Requests.Quests.getCollection();
        }, function () {

        });
    },

    edit: function (key_quest, key_milestone, key_epoch)
    {
        API.request('Quests.Edit', {
            key_quest: key_quest,
            key_milestone: key_milestone,
            key_epoch: key_epoch
        }, function (data) {
            const wrap = $('#page');
            wrap.html(data.render);
            wrap.show();
        }, function () {

        });
    },

    save: function (key_quest, key_milestone, key_epoch)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#application-diary-edit');
        API.request('Quests.Save', {
            key_quest: key_quest,
            key_milestone: key_milestone,
            key_epoch: key_epoch,
            title: jq_block.find('[name=title]').val(),
            status: jq_block.find('[name=status]').val(),
            type: jq_block.find('[name=type]').val(),
            summary: jq_block.find('[name=summary]').val(),
            data: jq_block.find('[name=data]').val()
        }, function (data) {
            Requests.Quests.getCollection();
        }, function () {

        });
    }
}