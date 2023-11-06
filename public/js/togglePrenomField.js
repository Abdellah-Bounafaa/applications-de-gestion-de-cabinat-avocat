function togglePrenomField(type, prenom, nom, label) {
    var typeSelect = document.getElementById(type);
    var prenomField = document.getElementById(prenom);
    var nomField = document.getElementById(nom);
    var nomLabel = document.getElementById(label);
    if (typeSelect.value == "2") {
        nomLabel.innerHTML = "Nom D'entreprise : ";
        prenomField.disabled = true;
        prenomField.required = false;
        nomField.setAttribute("placeholder", "Nom D'entreprise");
        prenomField.value = "";
    } else {
        nomLabel.innerHTML = "Nom : ";
        nomField.setAttribute("placeholder", "Nom De Client :");
        prenomField.disabled = false;
        prenomField.required = true;
    }
}
