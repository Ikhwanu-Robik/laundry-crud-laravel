let laundryTypes;
const typesURL = window.location.origin + "/laundry-types";
async function getLaundryTypes() {
    try {
        const response = await fetch(typesURL);
        if (!response.ok) {
            throw new Error("Error " + response.status);
        }

        laundryTypes = await response.json();
    } catch (error) {
        console.error(error.message);
    }
}

getLaundryTypes();

let totalInput = document.getElementById("total");
let priceInput = document.getElementById("price");
let qtyInput = document.getElementById("qty");

//set the default value for price number field
priceInput.value = 5000;

function setTotalValue() {
    totalInput.value = priceInput.value * qtyInput.value;
}

priceInput.addEventListener("input", setTotalValue);
qtyInput.addEventListener("input", setTotalValue);

let typesInput = document.getElementById("types");
function adjustPrice() {
    laundryTypes.forEach(type => {
        if (type["name"] == typesInput.value) {
            priceInput.value = type["price"];
        }
    });

    setTotalValue();
}