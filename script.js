
const UNIT_PRICE = 1000; 


const unitPriceDisplay = document.getElementById('unitPriceDisplay');
const qtyInput = document.getElementById('qty');
const totalInput = document.getElementById('totalPrice');


unitPriceDisplay.textContent = UNIT_PRICE;

function updateTotal(){
 
  let q = Number(qtyInput.value);

  
  if (isNaN(q) || q < 0) {
    q = 0;
    qtyInput.value = 0; 
  }

  const total = UNIT_PRICE * q;

  
  totalInput.value = total;

  
  if (total > 1000){
    alert('You are eligible for a gift coupon!');
  }
}


qtyInput.addEventListener('input', updateTotal);


updateTotal();