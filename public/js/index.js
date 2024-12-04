let totalInput = document.getElementById("total");
let priceInput = document.getElementById("harga");
let qtyInput = document.getElementById("jumlah");

priceInput.value = 5000;

function setTotalValue() {
    totalInput.value = priceInput.value * qtyInput.value;
}

priceInput.addEventListener("input", setTotalValue);
qtyInput.addEventListener("input", setTotalValue);

let json;
const typesURL = window.location.origin + "/laundry-types";
async function getLaundryTypes() {
    try {
        const response = await fetch(typesURL);
        if (!response.ok) {
            throw new Error("Error " + response.status);
        }

        json = await response.json();
    } catch (error) {
        console.error(error.message);
    }
}

getLaundryTypes();

let typesInput = document.getElementById("jenis");
function adjustPrice() {
    json.forEach(type => {
        if (type["name"] == typesInput.value) {
            priceInput.value = type["price"];
        }
    });

    setTotalValue();
}


