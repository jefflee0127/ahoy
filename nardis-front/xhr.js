const box = document.getElementById('commentarea');
//const submit = document.getElementById('submit');
const submit = document.getElementById('submit');
const testID = document.getElementById('testID');
//const testAlert = document.getElementById('testAlert');

/*
function getData(){
  const xhr=new XMLHttpRequest();
  xhr.open("get", "http://localhost/covid/script.php" );
  //xhr.responseType = 'json';
  xhr.onload = () => {
    const data = xhr.response;
    result.innerHTML = data;
    //console.log(data);
  };

  xhr.send();
}
*/

/*
function sendData(){
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;
  hr = new XMLHttpRequest();
  var vars = "email="+email+"&password="+password;
  console.log(email);
  console.log(password);
  hr.open("POST", "http://localhost/covid/script.php", true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onload = () => {
    const data = hr.responseText;
    box.innerHTML = data;
    //console.log(data);
  };
  hr.send(vars);
  console.log(vars);
  chrome.windows.getCurrent(function(w) {
    chrome.tabs.getSelected(w.id,
    function (response){
        alert(response.url);
    });
  });
}
*/

function getUrl() {
chrome.windows.getCurrent(function(w) {
  chrome.tabs.getSelected(w.id,
  function (response){
      link = response.url;
      //console.log(link);
      hr = new XMLHttpRequest();
      var info="link="+link;
      //console.log(info);
      hr.open("POST", "http://localhost/backend/nardis_core/comment_load.php", true);
      hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      hr.onload = () => {
        const data = hr.responseText;
        //console.log(data);
        box.innerHTML += data;
        //console.log(data);
      };
      hr.send(info);
  });
});
}


function sendPost(){
  chrome.windows.getCurrent(function(w) {
    chrome.tabs.getSelected(w.id,
    function (response){
        //const title = document.getElementById('title').value;
        const description = document.getElementById('comment').value;
        link = response.url;
        //console.log(link);

        hr = new XMLHttpRequest();
        //console.log(info);
        //hr.open("POST", "http://localhost/phpstudy/mention_create.php", true);
        //hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          /*
          hr.onload = () => {
          const data = hr.responseText;
          box.innerHTML = data;
          //console.log(data);
        };
        */
        chrome.storage.sync.get(['u_id'], function(result) {
                  var info="description="+description+"&link="+link+"&u_id="+result.u_id;
                  hr.open("POST", "http://localhost/backend/nardis_core/mention_create.php", true);
                  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                  hr.send(info);
                  location.reload();
        });

    });
  });
  /*
  hr = new XMLHttpRequest();
  var info= "title="+title+"&description="+description+"&link="+link;
  hr.open("POST", "http://localhost/phpstudy/mention_create.php", true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.send(info);
  */
}


//getBtn.addEventListener('click', getData);
//submit.addEventListener('click', sendData);
//postBtn.addEventListener('click' , sendData);

//window.onload = loginchk;
submit.addEventListener('click', sendPost);
window.onload = getUrl;

chrome.storage.sync.get(['name'], function(result) {
          console.log('Value currently is ' + result.name);
          testID.innerHTML = result.name;
});

//box.innerHTML += "<h1><a href='www.google.com'>hello!</a></h1>";
