function login () {
    // (A) GET EMAIL + PASSWORD
    var data = new FormData(document.getElementById("login-form"));

    // (B) AJAX REQUEST
    fetch("dummy.php", { method:"POST", body:data })
    .then((res) => { return res.text(); })
    .then((txt) => {
      if (txt == "OK") { location.href = "home.html"; }
      else { alert(txt); }
    });
    return false;
  }