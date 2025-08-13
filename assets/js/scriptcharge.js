function showInputs() {
    var numberSelect = document.getElementById("number");
    var selectedNumber = numberSelect.value;
    var inputsContainer = document.getElementById("inputs");

    while (inputsContainer.firstChild) {
        inputsContainer.firstChild.remove();
    }

    for (var i = 0; i < selectedNumber; i++) {
        var inputDiv = document.createElement("div");

        var designationInput = document.createElement("input");
        designationInput.type = "text";
        designationInput.name = "charge" + (i + 1);
        designationInput.placeholder = "Désignation " + (i + 1);
        designationInput.classList.add("form-control");
        inputDiv.appendChild(designationInput);

        var quantityInput = document.createElement("input");
        quantityInput.type = "number";
        quantityInput.name = "montant" + (i + 1);
        quantityInput.placeholder = "Montant " + (i + 1);
        quantityInput.classList.add("form-control");
        inputDiv.appendChild(quantityInput);

        inputsContainer.appendChild(inputDiv);
    }
}