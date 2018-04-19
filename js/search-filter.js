var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-mySelect":*/
x = document.getElementsByClassName("custom-mySelect");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByClassName("mySelect")[0];
  /*for each element, create a new DIV that will act as the mySelected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "mySelect-mySelected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "mySelect-items mySelect-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original mySelect element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original mySelect box,
        and the mySelected item:*/
        var i, s, h;
        s = this.parentNode.parentNode.getElementsByClassName("mySelect")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.mySelectedIndex = i;
            h.innerHTML = this.innerHTML;
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the mySelect box is clicked, close any other mySelect boxes,
      and open/close the current mySelect box:*/
      e.stopPropagation();
      closeAllmySelect(this);
      this.nextSibling.classList.toggle("mySelect-hide");
      this.classList.toggle("mySelect-arrow-active");
  });
}
function closeAllmySelect(elmnt) {
  /*a function that will close all mySelect boxes in the document,
  except the current mySelect box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("mySelect-items");
  y = document.getElementsByClassName("mySelect-mySelected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("mySelect-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("mySelect-hide");
    }
  }
}
/*if the user clicks anywhere outside the mySelect box,
then close all mySelect boxes:*/
document.addEventListener("click", closeAllmySelect);