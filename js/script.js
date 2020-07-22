function hide() {
    var tabla = document.getElementById("tabla");
    var thumbs = document.getElementById("thumbs");
    if (tabla.style.display === "none") {
      tabla.style.display = "block";
      thumbs.style.display = "none";

    } else {
        thumbs.style.display = "block";
        tabla.style.display = "none";
    }
  }
