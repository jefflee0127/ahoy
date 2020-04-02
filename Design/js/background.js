setInterval(notify, 10000);

function notify() {
    if (/*알림개수가 다름*/){
        var option = {
            type: "basic",
            title: "Somebody",
            message: "Left A Comment",
            iconUrl: "/images/logo.png"
        };
        chrome.notifications.create(option, callback);
        function callback() {

        };
    };
}
