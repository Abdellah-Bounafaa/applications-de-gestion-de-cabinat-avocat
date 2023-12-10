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
function toggleNewAudiance() {
    var etat = document.getElementById("etatAudiance");
    var audiance = document.getElementById("id_audiance");
    var div_audiance = document.getElementById("new_audiance");
    var div_jugement = document.getElementById("nouveau_jugement");

    if (etat.value == "0" && audiance.value !== "") {
        div_jugement.style.display = "block";
    } else {
        div_jugement.style.display = "none";
    }
    if ((etat.value == "1" || etat.value == "3") && audiance.value !== "") {
        div_audiance.style.display = "block";
    } else {
        div_audiance.style.display = "none";
    }
}
function toggleHistorique(id) {
    var dossier = document.getElementById(id);
    if (dossier.style.display === "none") {
        dossier.style.display = "block"; // Show the element
    } else {
        dossier.style.display = "none"; // Hide the element
    }
}
