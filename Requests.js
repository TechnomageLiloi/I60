let Requests = {
    layout: function ()
    {
        API.request('apiLayout', {
            'debug': true
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function ()
    {
        API.request('apiShow', {
            'debug': true
        }, function (data) {
            $('#layout').html(data.render);
        }, function () {

        });
    },

    edit: function (key)
    {
        API.request('apiEdit', {
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

        const jq_block = $('#edit');
        API.request('apiSave', {
            key: key,
            title: jq_block.find('[name=title]').val(),
            summary: jq_block.find('[name=summary]').val(),
            status: jq_block.find('[name=status]').val(),
            type: jq_block.find('[name=type]').val(),
            data: jq_block.find('[name=data]').val()
        }, function (data) {
            Requests.show();
        }, function () {

        });
    },

    create: function ()
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('apiCreate', {
            'debug': true
        }, function (data) {
            Requests.show();
        }, function () {

        });
    },

    Problems: {

        create: function () {
            if (!confirm('Are you sure?')) {
                return;
            }

            API.request('apiProblemCreate', {
                'debug': true
            }, function (data) {
                Requests.show();
            }, function () {

            });
        },

        edit: function (key)
        {
            API.request('apiProblemEdit', {
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

            const jq_block = $('#edit');
            API.request('apiProblemSave', {
                key: key,
                title: jq_block.find('[name=title]').val()
            }, function (data) {
                Requests.show();
            }, function () {

            });
        },

        remove: function (key) {
            if (!confirm('Are you sure?')) {
                return;
            }

            API.request('apiProblemRemove', {
                'key': key
            }, function (data) {
                Requests.show();
            }, function () {

            });
        }
    }
};
