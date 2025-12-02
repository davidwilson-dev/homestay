// Format Currency

function formatCurrency(input) {
    let value = input.value.replace(/\./g, '').replace(/[^0-9.]/g, '');

    if (!isNaN(value) && value.length > 0) {
        value = parseFloat(value).toLocaleString('de-DE');
        input.value = value;
    } else {
        input.value = ''; 
    }
}
