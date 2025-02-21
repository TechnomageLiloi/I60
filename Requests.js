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
    }
};
