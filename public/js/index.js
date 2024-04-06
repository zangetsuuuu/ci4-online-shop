function rupiahFormat(amount) {
    var numberString = amount.toString(),
        remainder = numberString.length % 3,
        rupiah = numberString.substr(0, remainder),
        thousands = numberString.substr(remainder).match(/\d{3}/g);

    if (thousands) {
        separator = remainder ? '.' : '';
        rupiah += separator + thousands.join('.');
    }

    return 'Rp. ' + rupiah;
}

const quantityInputs = document.querySelectorAll('#quantity');
const priceCells = document.querySelectorAll('#price');
const totalQuantityCell = document.getElementById('totalQuantity');
const totalPriceCell = document.getElementById('totalPrice');

function calculateTotal() {
    let totalQuantity = 0;
    let totalPrice = 0;

    for (let i = 0; i < quantityInputs.length; i++) {
        const quantity = parseInt(quantityInputs[i].value);
        const price = parseInt(priceCells[i].getAttribute('data-original-value'));
        
        totalQuantity += quantity;
        totalPrice += quantity * price;
    }

    totalQuantityCell.textContent = totalQuantity;
    totalPriceCell.textContent = rupiahFormat(totalPrice);
}

calculateTotal();
quantityInputs.forEach(function(input) {
    input.addEventListener('input', calculateTotal);
});