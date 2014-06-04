
define(function() {

    return function(msgElement) {
        var req = $.ajax({
            url: '/api/account/resend-activation',
            type: 'POST',
            dataType: 'json'
        });
        if (msgElement) {
            req.done(function(res) {
                if (res.status == 'ok') {
                    dw.backend.logMessage(res.data, msgElement);
                } else {
                    dw.backend.logError(res.message, msgElement);
                }
            });
        }
        return req;
    };

});
