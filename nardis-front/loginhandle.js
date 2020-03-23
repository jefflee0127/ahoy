const loginbtn = document.getElementById('loginbtn');
console.log(loginbtn);

function loginchk(){
  const xhr=new XMLHttpRequest();
  xhr.open("get", "http://localhost/backend/nardis_login/chk_login.php" );
  //xhr.responseType = 'json';
  xhr.onload = () => {
    isLogin = xhr.responseText;
    data = JSON.parse(isLogin);
    if(data["valid"]=="true"){
      location.replace("popup.html");
      chrome.storage.sync.set({'u_id':data["u_id"]});
      chrome.storage.sync.set({'name':data["name"]});
      chrome.storage.sync.set({'id':data["id"]});
      //console.log(storage.sync.get('name'));
    }
  }
  xhr.send();
}

function visitlogin() {
  var newURL = "http://localhost/backend/nardis_login/login.php";
  chrome.tabs.create({ url: newURL });
}

window.onload = loginchk;
loginbtn.addEventListener('click', visitlogin);
