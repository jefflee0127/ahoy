$(function () {
  $('textarea.mention-example2').mentionsInput({
    onDataRequest:function (mode, query, callback) {
      $.getJSON('http://localhost/backend/nardis_mention/get_users.php', function(responseData) {
        responseData = _.filter(responseData, function(item) { return item.name.toLowerCase().indexOf(query.toLowerCase()) > -1 });
        callback.call(this, responseData);
      });
    }

  });
});
