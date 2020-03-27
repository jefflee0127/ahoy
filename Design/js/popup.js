$('html').height($('#body').height());
function resize(obj) {
  obj.style.height = "1px";
  obj.style.height = (12+obj.scrollHeight)+"px";
}

function viewToggle(asdf) {
    if (asdf.value==="view-replies")
    {
        asdf.innerText="Hide Replies";
        asdf.value="hide-replies";
        getElementById("reply2").style.display="box";
    }
    else {
        asdf.textContent="View Replies";
        asdf.value="view-replies";
        getElementById("reply2").style.display="none";
    }
}

function replyToggle() {
    document.getElementById("reply-or-not").style.display="box";
}
