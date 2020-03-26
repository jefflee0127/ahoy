$('html').height($('#body').height());
function resize(obj) {
  obj.style.height = "1px";
  obj.style.height = (12+obj.scrollHeight)+"px";
}

function viewToggle(self) {
    if (self.value==="view-replies")
    {
        self.innerText="Hide Replies";
        self.value="hide-replies";
        self.css("background-color", 'black');
        self.html("asdfasdf");
        $('.reply1').css('display', none);
    }
    else {
        self.textContent="View Replies";
        self.value="view-replies";
    }
}
