const testID = document.getElementById('testID');
const alertarea = document.getElementById('alertarea');

//console.log("hello");

function getAlert() {
  chrome.storage.sync.get(['id'], function(result) {
            //console.log('Value currently is ' + result.name);
            //testID.innerHTML = result.name;
            hr = new XMLHttpRequest();
            var info="id="+result.id;
            hr.open("POST", "http://localhost/backend/nardis_core/notif_load.php", true);
            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            hr.onload = () => {
              const data = hr.responseText;
              console.log(result.id);
              //console.log(data);
              alertarea.innerHTML = data;
              //console.log(data);
            };
            hr.send(info);
            notifs = document.getElementsByName('notif');
  });

}

function visitpage(link) {
  chrome.tabs.create({ url: link });
}


chrome.storage.sync.get(['name'], function(result) {
          console.log('Value currently is ' + result.name);
          testID.innerHTML = result.name;
});

getAlert();

var notifs = document.getElementsByName('notif');
console.log(notifs);
console.log(notifs.length);
