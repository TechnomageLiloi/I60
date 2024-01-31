Nexus.Topics = {
    collection: function ()
    {
        API.request('Nexus.Topics.Collection', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    }
}