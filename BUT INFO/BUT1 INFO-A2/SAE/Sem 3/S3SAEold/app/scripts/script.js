function openForm() {
    document.getElementById("login-popup").style.display = "flex";
    document.getElementById("login-popup").style.flexDirection="column";
    document.getElementById("login-popup").style.justifyContent= "center";
    document.getElementById("login-popup").style.alignItems= "center";
    console.log("OUI");
  }
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }