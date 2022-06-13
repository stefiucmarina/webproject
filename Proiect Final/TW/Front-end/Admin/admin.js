function popup(id) {
    var x = document.getElementById(id);
    if (x.classList.contains("active")) {
      x.classList.remove("active")
    } else {
      x.classList.add("active")
    }
  }