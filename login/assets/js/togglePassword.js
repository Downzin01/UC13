function toggleSenha() {
    var senhaInput = document.getElementById("senha");
    var icon = document.getElementById("icon-eye");
    
    if (senhaInput.type === "password") {
        senhaInput.type = "text";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    } else {
        senhaInput.type = "password";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    }
}